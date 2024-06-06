<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(IS_LIVE == TRUE){
require_once (APPPATH . 'libraries/razorpay/razorpay-php/Razorpay.php');
}else{
require_once (APPPATH . 'libraries\razorpay\razorpay-php\razorpay.php');
}


use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Franchise_payment extends CI_Controller {
	/**
	 * This function loads the registration form
	 */

	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array('user_model', 'setting_model','supplier_model'));
		$this->load->helper('theme_helper');


	}

	// public function index(){

	// 	echo APPPATH . 'libraries\razorpay\razorpay-php\Razorpay.php';

	// }


	/**
	 * This function creates order and loads the payment methods
	 */
	public function sendpaymeny()
	{

		$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		
		$formdata = $this->input->post();

		/**
		 * You can calculate payment amount as per your logic
		 * Always set the amount from backend for security reasons
		 */
		$_SESSION['payable_amount'] = $formdata['amount'];

		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' => 1 // auto capture
		));


		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$_SESSION['razorpay_order_id'] = $razorpayOrderId;

		$data = $this->prepareData($amount,$razorpayOrderId);


		$this->load->view('franchise/globel_setting/rezorpay',array('data' => $data));

	}

	/**
	 * This function verifies the payment,after successful payment
	 */
	public function verify()
	{

		$success = true;
		$error = "payment_failed";
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
			

		try {
				$attributes = array(
					'razorpay_order_id' => $_SESSION['razorpay_order_id'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature']
				);
				$api->utility->verifyPaymentSignature($attributes);

				$datarecord = $api->payment->fetch($_POST['razorpay_payment_id']);
				/*echo '<pre>';
				print_r($datarecord); exit;*/
				
				$data = array(
					'card_name' => $datarecord['card']['network'],
					'card_type' => $datarecord['card']['type'],
					'card_id' => $datarecord['card']['id'],
					'holder_name' => $datarecord['card']['name'],
					'order_id' => $datarecord['order_id'],
					'payment_method' => $datarecord['method'],
					'amount' => $_SESSION['payable_amount'],
					'pay_id' => $datarecord['id'],
					'order_id' => $datarecord['order_id'],
					'user_id' => $this->session->userdata('user_id'),
					'use_number' => $datarecord['contact'],
					'status' => $datarecord['status'],
					'vpa' => $datarecord['vpa'],
					'merchant_order_id' => $datarecord['notes']['merchant_order_id'],
					'upi_transaction_id' => $datarecord['acquirer_data']['upi_transaction_id'],
					'created_on' => time(),
					'pay_date' => $datarecord['created_at']
				);
				
				
				$currentuser = $this->supplier_model->get_main_franchise_id($this->session->userdata('user_id'));

				$balance = ($currentuser->balance+$_SESSION['payable_amount']);

				$id = $this->session->userdata('user_id');
				$user = array();
				$user['user_id'] 			    = 		$this->session->userdata('user_id');
				$user['balance']     			= 		$balance;		
				$user['updated_on'] 			= 		time();
				$user_id = $this->user_model->edit_data(TBL_USERS, $user, 'user_id', $id);



				$paymentid = $this->setting_model->paymentstore($data);

				$passtable = array();
				$passtable['ref_id']     			= 		$paymentid;		
				$passtable['ref_type']     			= 		TBL_PAYMENT;		
				$passtable['payment_type']     		= 		Payment_type::CREDIT;
				$passtable['service_type'] 			= 	    Service_type::INCOMMING;
				$passtable['user_id'] 			    = 		$this->session->userdata('user_id');
				$passtable['amount']     		    = 		$_SESSION['payable_amount'];
				$passtable['created_at'] 			= 		date('Y-m-d h:i:s');
				
				$passbookid = $this->setting_model->passbookstore($passtable);

			} catch(SignatureVerificationError $e) {
				
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
				
				
			}
		}


		if ($success === true) {
			/**
			 * Call this function from where ever you want
			 * to save save data before of after the payment
			 */
			$this->setRegistrationData();
			
			redirect(base_url().'franchise/globel_setting/success');
		}
		else {
			redirect(base_url().'franchise/globel_setting/paymentFailed');
		}
	}

	/**
	 * This function preprares payment parameters
	 * @param $amount
	 * @param $razorpayOrderId
	 * @return array
	 */
	public function prepareData($amount,$razorpayOrderId)
	{
		$name = $this->session->userdata('user_name');
		$email = $this->session->userdata('email');

		$data = array(
			"key" => RAZOR_KEY,
			"amount" => $amount,
			"name" => "Visa Clap",
			"description" => "Visa Clap Wallet",
			//"image" => "https://demo.codingbirdsonline.com/website/img/coding-birds-online/coding-birds-online-favicon.png",
			"prefill" => array(
				"name"  => $name,
				"email"  => $email,
			),
			"notes"  => array(
				"address"  => "Visa Clap",
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#6c5ffc"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}

	/**
	 * This function saves your form data to session,
	 * After successfull payment you can save it to database
	 */
	public function setRegistrationData()
	{
		$name = $this->session->userdata('user_name');
		$email = $this->session->userdata('email');
		$name = $name;
		$email = $email;
		$amount = $_SESSION['payable_amount'];

		$registrationData = array(
			'order_id' => $_SESSION['razorpay_order_id'],
			'name' => $name,
			'email' => $email,
			'amount' => $amount,
		);
		// save this to database

	}

	

	private function load_view($viewname = 'domain_view', $page_title)
	{
		$this->masterpage->setMasterPage('franchise_setting_master');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('franchise/globel_setting/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}
	
	
}
