<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(IS_LIVE == TRUE){
require_once (APPPATH . 'libraries/razorpay/razorpay-php/Razorpay.php');
}else{
require_once (APPPATH . 'libraries\razorpay\razorpay-php\razorpay.php');
}




use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Globel_setting extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model(array('user_model', 'setting_model','supplier_model'));
		$this->load->helper('theme_helper');
	}


	function index(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert');
		$this->content->extra_css = array('custom');
		$title = 'Global Setting';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		
		$this->content->_country 	= 	$this->setting_model->get_all_country();
		$this->content->get_enquiry_type   = 	$this->setting_model->get_enquiry_type();
		
		$this->content->view      	= 	$this->setting_model->get_domain_details();	
		$this->content->templist   = 	$this->setting_model->get_franchise_template();

		
		$this->load_view('domain_view', $title);
	}

	function get_logo(){
		/** page level css & js * */
		$this->content->extra_js  = array();
		$this->content->extra_css = array('custom');
		$title = 'Your Logo';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';

		$this->content->view      	= 	$this->setting_model->get_domain_details();	
		$this->load_view('logo_view', $title);
	}


	function set_template(){
		
			
			if ($this->input->post('image_radio') != "") {
				
				$templateid = $this->input->post('image_radio');
				
				$settingdata = $this->setting_model->get_domain_details();		
					if(!empty($settingdata)){
						$this->setting_model->franchise_template_update($templateid);
					}else{
						$this->setting_model->franchise_template_insert($templateid);
					}	
				$response = array('status'=> 'success', 'message'=> ' Template Updated successfully');
				
			}else{

				$response = array('status'=>'error','message' => 'Something Went Wrong.');	

			}
			echo json_encode($response);
		die;
	}

	function save_domain_name(){
		if($this->input->post()){
			$url = DOMAIN_LIST;
	        $ch = curl_init($url);
	        curl_setopt($crl, CURLOPT_URL, $url);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, DOMAIN_API);
	        curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        $result = curl_exec($ch);
	        $domainlist = json_decode($result);



			$post = $this->input->post();
			$domain_array = array(
				'domain_name' => trim($this->input->post('domain_name')),
				'created_by' => $this->session->userdata('user_id'),
			);
			$domainname = trim($this->input->post('domain_name'));
			$countdomain = $this->setting_model->checkdomain($domainname);
			$olddomainname = $this->setting_model->get_cusrrentuser_domainname();
			/*echo '<pre>';
			print_r($olddomainname); exit;*/

			if(!empty($countdomain)){
				
				$response = array('status'=>'error','message' => 'Allready Domain Exsit.');

			}else{

			if($this->input->post('dom_id')){ 
				$domain_array['updated_on'] = time();

				$url = CREATE_DOMAIN_URL;
		        $ch = curl_init($url);
		        
		        $data1 = array('incoming_address'=>$olddomainname->domain_name);
        		curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
		        curl_setopt($ch, CURLOPT_HTTPHEADER, DOMAIN_API);
		        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		         curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        $result = curl_exec($ch);
				curl_close($ch);

				$this->setting_model->update_doamin_data($domain_array,$this->input->post('dom_id'));
				$response = array('status'=>'success','message' => 'Domain Updated Successfully.');
			}else{
				$domain_array['created_on'] = time();
				$this->setting_model->store_domain_data($domain_array);
				$response = array('status'=>'success','message' => 'Domain Added Successfully.');
			}


				if(IS_LIVE == TRUE){
					$target_ports = 443;
				}else{
					$target_ports = 80;
				}

				$url = CREATE_DOMAIN_URL;
		        $ch = curl_init($url);
		        $data1 = [];
		        $data1 = array('incoming_address'=>$domainname,'target_address'=>$this->input->post('target_address'),'target_ports'=>$target_ports);
        		curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
		        curl_setopt($ch, CURLOPT_HTTPHEADER, DOMAIN_API);
		        curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        $result = curl_exec($ch);
		    }   
		}else{
			$response = array('status'=>'error','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;

	}	
	
	function save_domain_data(){

		if($this->input->post()){
		$post = $this->input->post();
		

			$settingdata = $this->setting_model->get_domain_details();		
			if ($_FILES['franchise_logo']['tmp_name'] !== "") {
				
					$tmp_nm=$_FILES['franchise_logo']['tmp_name'];
					$target_dir="upload/franchise_logo/";
					$file_nm=basename($_FILES['franchise_logo']['name']);
					$doc_nm=pathinfo($_FILES['franchise_logo']['name']);
					$rename_doc = mt_rand().".".strtolower($doc_nm['extension']);
					$img_path=$target_dir.$rename_doc;
					$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	
					
					if (file_exists($settingdata->logo)) {
					    @unlink($settingdata->logo);
					} 
			}else{
				$img_path = $settingdata->logo;	
			}
			if ($_FILES['home_bg']['tmp_name'] !== "") {
				
					$home_tmp_nm=$_FILES['home_bg']['tmp_name'];
					$home_target_dir="upload/home_background/";
					$home_file_nm=basename($_FILES['home_bg']['name']);
					$home_doc_nm=pathinfo($_FILES['home_bg']['name']);
					$home_rename_doc = mt_rand().".".strtolower($home_doc_nm['extension']);
					$home_img_path=$home_target_dir.$home_rename_doc;
					$home_uploda_ok=move_uploaded_file($home_tmp_nm, $home_img_path);	
					
					if (file_exists($settingdata->home_bg)) {
					    @unlink($settingdata->home_bg);
					} 
			}else{
				$home_img_path = $settingdata->home_bg;	
			}


			$domain_array = array(
				'logo' => $img_path,
				'home_bg' => $home_img_path,
				'tou_att' => $this->input->post('tou_att'),
				'tou_iti' => $this->input->post('tou_iti'),
				'coustmer_number' => $this->input->post('coustmer_number'),
				'watsapp_number' => $this->input->post('watsapp_number'),
				'address' => $this->input->post('address'),
				'contact_address' => $this->input->post('contact_address'),
				'keywords' => $this->input->post('keywords'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'analytic_code' => $this->input->post('analytic_code'),
				'markup_package' => $this->input->post('markup_package'),
				'markup_visa' => $this->input->post('markup_visa'),
				'markup_flight' => $this->input->post('markup_flight'),
				'markup_hotel' => $this->input->post('markup_hotel'),
				'facebook' => $this->input->post('facebook'),
				'linkedinlink' => $this->input->post('linkedinlink'),
				'twitter' => $this->input->post('twitter'),
				'youtube' => $this->input->post('youtube'),
				'instagram' => $this->input->post('instagram'),
				'country_id' => implode(',',$post['country']),
				'business' => implode(',',$post['business']),
				'created_by' => $this->session->userdata('user_id'),
			);
			if($this->input->post('dom_id')){
				$domain_array['updated_on'] = time();
				$this->setting_model->update_doamin_data($domain_array,$this->input->post('dom_id'));
				$response = array('status'=>'success','message' => 'Setting Updated Successfully.');
			}else{
				$domain_array['created_on'] = time();
				$this->setting_model->store_domain_data($domain_array);
				$response = array('status'=>'success','message' => 'Setting Added Successfully.');
			}
		}else{
			$response = array('status'=>'error','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
	}


	function remove_domain(){
	    

	    if($this->input->post('r_id')){
	        $update_status = $this->setting_model->remove_domain($this->input->post('r_id'));
	        $response = array('status'=> 'success','msg' => "Domain ( Removed Successfully");
	    }else{
	        $response = array('status'=> 'failed','msg' => "Something Went Wrong.");
	    }
	    echo json_encode($response);
	    return;
	}

	function get_all_domain(){
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert');
		$data['get_all_domain'] = $this->setting_model->get_all_domain();
        $this->load->view('franchise/globel_setting/domain_table',$data);
	}	
	function generatepdf(){
		
		/*print_r($this->input->post());
		exit;*/
		// Generate the PDF content
		$pid = $this->input->post('pid');
		$paymentdetail = $this->setting_model->get_franchise_payment_detail($pid);
		/*echo '<pre>';
		print_r($paymentdetail); exit;*/
		$fullname = $paymentdetail->first_name." ".$paymentdetail->last_name;
		$paydate  = date("d-m-Y",$paymentdetail->pay_date);
		$address = $paymentdetail->address;
		$filename = time();
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML('<h1>Date : '.$paydate.'</h1>');
		$mpdf->WriteHTML('<h1>From : Vughy.com</h1>');
		$mpdf->WriteHTML('<h1>Franchise Name : '.$fullname.'</h1>');
		$mpdf->WriteHTML('<h1>Address : '.$address.'</h1>');
		$mpdf->WriteHTML('<h1>Payment- amount : '.$paymentdetail->payment_method.'-'.$paymentdetail->amount.'</h1>');
		$pdfContent = $mpdf->Output('', 'S');

		// Set the appropriate headers for the download
		header('Content-Type: application/pdf');
		//header('Content-Disposition: attachment; filename='.$filename.'".pdf"');

		// Send the PDF content as the response
		echo $pdfContent;
		exit;
	}
	function toppop(){
		
		$this->content->extra_js  = array();
		$this->content->extra_css = array('custom');
		$title = 'Top Up';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';

		$this->load_view('toppop', $title);
		
	}
	function viewprofile(){
		
		$this->content->extra_js  = array();
		$this->content->extra_css = array('custom');
		$title = 'Profile';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';

		if(!empty($this->session->userdata('user_id'))){
			$this->content->userdetail  = 	$this->user_model->user_detail($this->session->userdata('user_id'));
			$this->content->userdocument  = 	$this->user_model->get_user_document($this->session->userdata('user_id'));
		}

		$this->load_view('franchiseprofile', $title);
		
	}

	function monthlytoppop(){
		$this->content->extra_js  = array();
		$this->content->extra_css = array('custom');
		$title = 'Monthly Top Up';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->currentuser = $this->supplier_model->get_main_franchise_id($this->session->userdata('user_id'));


		$this->load_view('monthlytoppop', $title);
		
	}	

	function delete_document_data(){

		if($this->input->post('id') > 0){
			$documentdata = $this->user_model->get_document_record($this->input->post('id'));
			if (file_exists($documentdata->document_file)) {
			    @unlink($documentdata->document_file);
			}
			$this->db->where('id',$this->input->post('id'));
			$this->db->delete(TBL_USER_DOCUMENT); 
			$response = array('status' => 'success','message' => 'Document Removed Successfully.');

		}else{
			$response = array('status' => 'failed','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
	}
	
	

	/**
	 * This is a function called when payment successfull,
	 * and shows the success message
	 */
		public function success()
		{
		    $this->content->extra_js  = array();
		    $this->content->extra_css = array('custom');
		    $tomail = $this->session->userdata('email');
		    $toname = $this->session->userdata('email');
		    
		    $title = 'Success';
		    $content = "<html><head></head><body><p>My html content.</p></body></html>";

		   // $send_mail = send_mailrelay_email("","",$tomail,$toname,"Payment Sucess",$content);
		    $this->load_view('success', $title);
		}

	

	public function monthlysuccess()
	{
		$this->content->extra_js  = array();
		$this->content->extra_css = array('custom');
		$title = 'Sucess';

		$currentuser = $this->supplier_model->get_main_franchise_id($this->session->userdata('user_id'));
		$pastdate = $this->setting_model->get_user_last_payment_date($currentuser->user_id);

		$currentdate = date("Y-m-d",time());
        $pastdate1 = $pastdate->payment_date;

         $is_paid = $pastdate->is_paid;

        $totaldays = $this->setting_model->dateDiff($pastdate1, $currentdate);  

         if($is_paid == 0){
            $limitdays = 90;
           }else{
            $limitdays = 30;
           }

          /* echo $totaldays;
           echo $currentuser->balance."<br/>".MINIMUM_BALANCE;
           
           if($totaldays > 30 && $currentuser->balance >= MINIMUM_BALANCE){
           	echo  "under";

           }else{
           	echo  "bhar";
           }
           exit;*/
        if($totaldays > $limitdays && $currentuser->balance >= MINIMUM_BALANCE){

         	$user_id = $this->session->userdata('user_id');
        	$payment = array();
			$payment['user_id']          = 		$user_id;
			$payment['payment_date']     = 		date("Y-m-d");
			$payment['is_paid']          = 		1;
			$payment['created_at']       = 		date('Y-m-d H-i:s');
			$profile_id = $this->user_model->edit_data(TBL_USER_PAYMENT_DATE, $payment, 'user_id', $user_id);

			/* user balance update */
			$totalbalance = $currentuser->balance-MINIMUM_BALANCE;
			$user = array();
			$user['user_id'] 		= 		$user_id;
			$user['balance']     	= 		$totalbalance;		
			$user['updated_on'] 	= 		time();
			$user_id = $this->user_model->edit_data(TBL_USERS, $user, 'user_id', $user_id);


			$passtable = array();
			$passtable['ref_id']     			= 		NULL;		
			$passtable['ref_type']     			= 		NULL;		
			$passtable['payment_type']     		= 		Payment_type::DEBIT; 
			$passtable['service_type'] 			= 	    Service_type::SOFTWERE_CHARGES; 
			$passtable['user_id'] 			    = 		$this->session->userdata('user_id');
			$passtable['amount']     		    = 		MINIMUM_BALANCE;
			$passtable['created_at'] 			= 		date('Y-m-d h:i:s');
			
			$passbookid = $this->setting_model->passbookstore($passtable);

			$this->session->set_userdata('days', '');

        }
		$this->load_view('success', $title);
	}

	public function update_profile()
	{

		$user_id = $this->session->userdata('user_id');
		if(!empty($user_id)){

			$user = array();
			$user['user_id'] 		= 		$user_id;
			$user['mobile'] 		= 		$this->input->post('mobile');
			$user['first_name'] 		= 		$this->input->post('first_name');
			$user['last_name'] 		= 		$this->input->post('last_name');
			$user['firm_name'] 		= 		$this->input->post('firm_name');
			$user['updated_on'] 	= 		time();
			$user_id = $this->user_model->edit_data(TBL_USERS, $user, 'user_id', $user_id);

			$userprofile = array();
			$userprofile['user_id'] 		= 		$user_id;
			$userprofile['bio']     	    = 		$this->input->post('bio');		
			$userprofile['address']     	    = 		$this->input->post('address');		
			//$userprofile['country']     	    = 		$this->input->post('country');		
			
			if ($_FILES['profilephoto']['tmp_name'] !== "") {
					$tmp_nm=$_FILES['profilephoto']['tmp_name'];
					$target_dir="upload/profilephoto/";
					$file_nm=basename($_FILES['profilephoto']['name']);
					$doc_nm=pathinfo($_FILES['profilephoto']['name']);
					$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
					$img_path=$target_dir.$rename_doc;
					$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	


					$userprofileimage = $this->user_model->user_detail($user_id);	

					if (file_exists($userprofileimage->profile_photo)) {
					    @unlink($userprofileimage->profile_photo);
					}
					$userprofile['profile_photo']  = $img_path;		
			}
			$user_id = $this->user_model->edit_data(TBL_PROFILE, $userprofile, 'user_id', $user_id);


			if ($_FILES['profiledocument']['tmp_name'][0] !== "") {
				foreach ($_FILES['profiledocument']['name'] as $key => $val) {
					$tmp_nm1=$_FILES['profiledocument']['tmp_name'][$key];
					$target_dir1="upload/user_document/";
					$file_nm1=basename($_FILES['profiledocument']['name'][$key]);
					$doc_nm1=pathinfo($_FILES['profiledocument']['name'][$key]);
					$rename_doc1=mt_rand().".".strtolower($doc_nm1['extension']);
					$file_path=$target_dir1.$rename_doc1;
					$uploda_ok1=move_uploaded_file($tmp_nm1, $file_path);	
					$item_image_data=array(
						'user_id' => $user_id,
						'document_file'=>$file_path,
						'created_at'=>date('Y-m-d H:i:s'),
					);
					$this->db->insert(TBL_USER_DOCUMENT,$item_image_data);
				}
			}
			$response = array('status'=> 'success','message' => "Profile Update successfully");
		}else{
			$response = array('status'=> 'failed','message' => "Something Went Wrong.");
		}

	    echo json_encode($response);
	    return;


	}	


	
	/**
	 * This is a function called when payment failed,
	 * and shows the error message
	 */
	public function paymentFailed()
	{
		$this->content->extra_js  = array();
		$this->content->extra_css = array('custom');
		$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		$datarecord1 = $api->order->fetch($_SESSION['razorpay_order_id'])->payments();
		$failditem = $datarecord1['items'][0];
		if(!empty($failditem)){ 
			$data = array(
					'card_name' => $failditem['card']['network'],
					'card_type' => $failditem['card']['type'],
					'card_id' => $failditem['card']['id'],
					'order_id' => $failditem['order_id'],
					'payment_method' => $failditem['method'],
					'amount' => $_SESSION['payable_amount'],
					'pay_id' => $failditem['id'],
					'order_id' => $failditem['order_id'],
					'user_id' => $this->session->userdata('user_id'),
					'use_number' => $failditem['contact'],
					'status' => $failditem['status'],
					'vpa' => $failditem['vpa'],
					'error_reason' => $failditem['error_reason'],
					'merchant_order_id' => $failditem['notes']['merchant_order_id'],
					'upi_transaction_id' => $failditem['acquirer_data']['upi_transaction_id'],
					'created_on' => time(),
					'pay_date' => $failditem['created_at']
				);
				
				$this->setting_model->paymentstore($data);
		}

		$title = 'Error';
		$this->load_view('error', $title);

	}
	public function payment_history()
	{
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');
		$this->content->extra_css = array('custom');

		$title = 'View Payment History';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->get_payment_history = $this->setting_model->get_payment_records();
		
		$this->load_view('view_payment_history', $title);

	}

	public function mypassbook()
	{
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');


		$this->content->extra_css = array('custom');

		$title = 'View Passbook History';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		
		
		$this->load_view('view_passbook_history', $title);

	}
	public function getpassbookrecord()
	{
		$form = $this->input->post('from');
		$to = $this->input->post('to');

		$data['get_passbook_history'] = $this->setting_model->get_passbook_records($form,$to);
		/*echo '<pre>';
		print_r($data['get_passbook_history']); exit;*/
		$this->load->view('franchise/globel_setting/passbook_table', $data);
	}	




	public function exportpassbook()
	{
		$data = array(array('Amount', 'Type', 'Service Type', 'Customer Mobile', 'Date', 'Balance'));

	    $form = $this->input->post('from');
		$to = $this->input->post('to');

		$get_passbook_history = $this->setting_model->get_passbook_records($form,$to);

		$newdata = array();
		$result = [];
		foreach ($get_passbook_history as $obj) {
	    
	    $objArray = (array) $obj;
		$values = array($objArray['amount'],$objArray['ptype'],$objArray['servisetype'],$objArray['contact'],$objArray['created_at'],$objArray['balance']);
		$result[] = $values;
		}


	// Print the result
	$fullarray = array_merge($data,$result);
	$filename = 'data.csv';
	// Set headers for download
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . $filename . '"');

	// Open file pointer
	$fp = fopen('php://output', 'w');

	foreach ($fullarray as $row) {
	    fputcsv($fp, $row);
	}

	fclose($fp);
	}	
	function sendmailchip(){
	

		$data = [
		    'from' => [
		        'email' => 'yamunesh@vughy.com',
		        'name' => 'yamunesh'
		    ],
		    'to' => [
		        [
		            'email' => 'rajeshmokariya9999@gmail.com',
		            'name' => 'Rajesh Mokariya'
		        ]
		    ],
		    'subject' => 'My Testing Mail',
		    'html_part' => '<html>\n<head></head>\n<body><p>My html content.</p></body>\n</html>\n',
		    'text_part' => 'My text content.',
		    'text_part_auto' => false,
		    'headers' => [
		        'X-CustomHeader' => 'Header value'
		    ],
		    'smtp_tags' => [
		        'string'
		    ]
		];

		$curl = curl_init();
		$stringdata = json_encode($data);
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://vughy.ipzmarketing.com/api/v1/send_emails",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $stringdata,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/json",
		    "x-auth-token: uwguUtYeHwv6hQgj65_omouCA2ym_gyJ9_z8e_yL"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}	
	

	private function load_view($viewname = 'domain_view', $page_title)
	{
		$this->masterpage->setMasterPage('franchise_setting_master');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('franchise/globel_setting/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}
}	