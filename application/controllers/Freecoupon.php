<?php defined('BASEPATH') OR exit('No direct script access allowed');


if(IS_LIVE == TRUE){
require_once (APPPATH . 'libraries/razorpay/razorpay-php/Razorpay.php');
}else{
require_once (APPPATH . 'libraries\razorpay\razorpay-php\razorpay.php');
}


use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Freecoupon extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model(array('user_model', 'setting_model','supplier_model'));
		$this->load->helper('theme_helper');
	}

	function index()
	{ 

		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array('custom');
		$title = 'Freecoupon List';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->get_all_franchise  = $this->setting_model->get_all_franchise_holder_name();	
		
		$url = DOMAIN_LIST;
        $ch = curl_init($url);
        curl_setopt($crl, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, DOMAIN_API);
        curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $data = json_decode($result);
        $this->content->view      	= 	$data->data;
		$this->load_view('view_freecoupon', $title);
		
	}

	public function ajax_add_freecoupon(){
		if($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$stype = Service_type::getValue($post['type']);
			
			$currentuser = $this->supplier_model->get_main_franchise_id($post['firm_id']);

				$balance = ($currentuser->balance+$post['amount']);

				$id = $post['firm_id'];
				$user = array();
				$user['user_id'] 			    = 		$post['firm_id'];
				$user['balance']     			= 		$balance;		
				$user['updated_on'] 			= 		time();
				$user_id = $this->user_model->edit_data(TBL_USERS, $user, 'user_id', $id);

				$data = array(
					'amount' => $post['amount'],
					'user_id' => $post['firm_id'],
					'payment_method' => $stype,
					'status' => 'captured',
					'created_on' => time(),
					'pay_date' => strtotime("now")
				);
				$paymentid = $this->setting_model->paymentstore($data);

				$passtable = array();
				$passtable['ref_id']     			= 		$paymentid;		
				$passtable['ref_type']     			= 		TBL_PAYMENT;		
				$passtable['payment_type']     		= 		Payment_type::CREDIT;
				$passtable['service_type'] 			= 	    $post['type'];
				$passtable['user_id'] 			    = 		$post['firm_id'];
				$passtable['amount']     		    = 		$post['amount'];
				$passtable['created_at'] 			= 		date('Y-m-d h:i:s');
				
				$passbookid = $this->setting_model->passbookstore($passtable);
			$message = 'Free Coupon added successfully';
			echo json_encode(array('status'=> 'success', 'message'=> $message));
		}else{
			echo json_encode(array('status'=> 'failed'));
		}	
	}

    public function get_freecoupon_report(){

    	$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array('custom');
		$title = 'Freecoupon List';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$filter_country = $this->input->post('filter_country');
		$firm_id = $this->input->post('firm_id');
		$type = $this->input->post('type');
		$data['get_franchise_freecoupon']  = $this->setting_model->get_all_franchise_freecoupon($filter_country,$firm_id,$type);	
		
		$this->load->view('console/freecoupon/freecoupon_table', $data);
		

    }
    public function get_user_freecoupon_report(){

    	$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array('custom');
		$title = 'Freecoupon List';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$userid = $this->input->post('userid');
		$type = $this->input->post('type');
		$data['get_user_franchise_freecoupon']  = $this->setting_model->get_user_franchise_freecoupon($userid,$type);	
		
		$this->load->view('console/freecoupon/user_freecoupon_table', $data);
		

    }
	
	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/freecoupon/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}
/* end of settings */ 