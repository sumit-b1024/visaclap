<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
			// tables
		$this->tbl_users   		= 		TBL_USERS;
		$this->tbl_profile 		= 		TBL_PROFILE;
		$this->tbl_category 	= 		TBL_CATEGORY;
		$this->tbl_countries 	= 		TBL_COUNTRIES;
		$this->tbl_cities 		= 		TBL_CITIES;
		$this->tbl_activity 	= 		TBL_ACTIVITY;

		$this->load->model(array('user_model', 'setting_model','supplier_model'));
		// $this->load->helper('theme_helper');
	}
	function index(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');

		
		$this->content->extra_css = array('custom');
		
		$title = 'Enquiry Report';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();

		$this->content->get_enquiry_type   = $this->setting_model->get_enquiry_type();
		// $this->content->get_country_city   = 	$this->setting_model->get_country_city();
		$this->content->get_email_template_data = $this->setting_model->get_email_template_data();
		$this->content->get_descriptions_of_admin 	= 	$this->setting_model->get_descriptions_of_master_module();
		$this->content->get_email_template_data = $this->setting_model->get_email_template_data();

		$this->content->get_whatsup_template_data = $this->setting_model->get_whatsup_template_data();

		$this->content->get_all_itenerary_names = $this->setting_model->get_all_itenerary_names();
		$this->content->get_all_staff_data = $this->setting_model->get_all_staff_data();
		$this->content->company_permission      	= 	$this->setting_model->get_booking_profit();
		$this->load_view('enquiry_report', $title);
	}

	function generate_enquiry_report(){	
		if($this->input->post()){
			$post = $this->input->post();
			$follow_up_date = $post['follow_up_date'];
			$language = $post['language'];
			$s_description = $post['s_description'];
			$p_valid_from = $post['p_valid_from'];
			$p_valid_to = $post['p_valid_to'];
			$i_country = $post['i_country'];
			$enquiry_from = $post['enquiry_from'];
			$enquiry_to = $post['enquiry_to'];
			$city = $post['city'];
			$enquiry_type = $post['enquiry_type'];
			$s_description = $post['s_description'];
			$staff_id = $post['enquiry_staff_id'];
			$data['fetch_enquiry_array'] = $this->setting_model->fetch_settings_report_data($follow_up_date,$language,$s_description,$staff_id,$p_valid_from,$p_valid_to,$i_country,$enquiry_from,$enquiry_to,0,$city,$enquiry_type);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
			
			//$this->load->view('console/reports/view_enquiry_report_page',$data);
		}
	}

	function generate_enquiry_detail_report(){	
		if($this->input->post()){
			$post = $this->input->post();
			$uname = $post['uname'];
			$email = $post['email'];
			$number = $post['number'];
			$data['fetch_enquiry_array'] = $this->setting_model->fetch_settings_report_detail_data(0,$uname,$email,$number);
			$this->load->view('console/reports/view_enquiry_report_page',$data);
		}
	}

	function generate_finalize_enquiry_report(){	
		if($this->input->post()){
			$post = $this->input->post();
			$follow_up_date = $post['follow_up_date'];
			$language = $post['language'];
			$s_description = $post['s_description'];
			$p_valid_from = $post['p_valid_from'];
			$p_valid_to = $post['p_valid_to'];
			$i_country = $post['i_country'];
			$enquiry_from = $post['enquiry_from'];
			$enquiry_to = $post['enquiry_to'];
			$enquiry_type = $post['enquiry_type'];
			$s_description = $post['s_description'];
			$reason_type = $post['reason_type'];
			$staff_id = $post['enquiry_staff_id'];
			$data['fetch_enquiry_array'] = $this->setting_model->fetch_settings_report_data($follow_up_date,$language,$s_description,$staff_id,$p_valid_from,$p_valid_to,$i_country,$enquiry_from,$enquiry_to,Enquiry_pool_status::FINALIZE,array(),$enquiry_type,$reason_type);
			$this->output->set_content_type('application/json')->set_output(json_encode($data)); 
			//$this->load->view('console/reports/view_finalize_enquiry_report_page',$data);
		}
	}

	function generate_finalize_detail_report(){	
		if($this->input->post()){
			$post = $this->input->post();
			$uname = $post['uname'];
			$email = $post['email'];
			$number = $post['number'];
			$data['fetch_enquiry_array'] = $this->setting_model->fetch_settings_report_detail_data(Enquiry_pool_status::FINALIZE,$uname,$email,$number);
			$this->output->set_content_type('application/json')->set_output(json_encode($data)); 
			//$this->load->view('console/reports/view_finalize_enquiry_report_page',$data);
		}
	}

	function generate_drop_enquiry_report(){	
		if($this->input->post()){
			$post = $this->input->post();
			$follow_up_date = $post['follow_up_date'];
			$language = $post['language'];
			$s_description = $post['s_description'];
			$p_valid_from = $post['p_valid_from'];
			$p_valid_to = $post['p_valid_to'];
			$i_country = $post['i_country'];
			$enquiry_from = $post['enquiry_from'];
			$enquiry_to = $post['enquiry_to'];
			$enquiry_type = $post['enquiry_type'];
			$reason_type = $post['reason_type'];
			$staff_id = $post['enquiry_staff_id'];
			
			$data['fetch_enquiry_array'] = $this->setting_model->fetch_settings_report_data($follow_up_date,$language,$s_description,$staff_id,$p_valid_from,$p_valid_to,$i_country,$enquiry_from,$enquiry_to,Enquiry_pool_status::DROP,array(),$enquiry_type,$reason_type);
			$data['company_permission'] = $this->setting_model->get_booking_profit();
			$this->load->view('console/reports/view_drop_enquiry_report_page',$data);
		}
	}

	function generate_drop_detail_report(){	
		if($this->input->post()){
			$post = $this->input->post();
			$uname = $post['uname'];
			$email = $post['email'];
			$number = $post['number'];
			$data['fetch_enquiry_array'] = $this->setting_model->fetch_settings_report_detail_data(Enquiry_pool_status::DROP,$uname,$email,$number);
			$data['company_permission'] = $this->setting_model->get_booking_profit();

			$this->load->view('console/reports/view_drop_enquiry_report_page',$data);
		}
	}


	function generate_process_enquiry_report(){	
		if($this->input->post()){
			$post = $this->input->post();
			$follow_up_date = $post['follow_up_date'];
			$language = $post['language'];
			$s_description = $post['s_description'];
			$p_valid_from = $post['p_valid_from'];
			$p_valid_to = $post['p_valid_to'];
			$i_country = $post['i_country'];
			$enquiry_from = $post['enquiry_from'];
			$enquiry_to = $post['enquiry_to'];
			$enquiry_type = $post['enquiry_type'];
			$reason_type = $post['reason_type'];
			$staff_id = $post['enquiry_staff_id'];
			$data['fetch_process_enquiry_data'] = $this->setting_model->fetch_settings_report_data($follow_up_date,$language,$s_description,$staff_id,$p_valid_from,$p_valid_to,$i_country,$enquiry_from,$enquiry_to,Enquiry_pool_status::PROCESS,array(),$enquiry_type,$reason_type);
			/*echo '<pre>';
			print_r($data['fetch_process_enquiry_data']); exit;*/
			$this->load->view('console/reports/view_process_enquiry_report_page',$data);
		}
	}

	function generate_process_detail_report(){	
		if($this->input->post()){
			$post = $this->input->post();
			$uname = $post['uname'];
			$email = $post['email'];
			$number = $post['number'];
			$data['fetch_process_enquiry_data'] = $this->setting_model->fetch_settings_report_detail_data(Enquiry_pool_status::PROCESS,$uname,$email,$number);
			$this->load->view('console/reports/view_process_enquiry_report_page',$data);
		}
	}

	function get_all_cities_by_country_id(){
		$post = $this->input->post();
		if($post){
			$this->db->select('id,name');
			$this->db->from(TBL_CITIES_SUPPLIER);
			$this->db->where_in('country_id',$post['destination']);
			// $this->db->limit('10');
			$get_city_query = $this->db->get()->result();

			echo json_encode($get_city_query);
			return;
		}
	}
	function get_all_visa_by_country_id(){
		$post = $this->input->post();
		if(isset($post["editvisa"])){
		
				$country = $post["destination"];
		}else{
			$country = $post["destination"];
		//$country = implode(',',$country);
		
		}

		if($post){
			//$url = API_URL.'getvisatype';
			//$ch = curl_init($url);
	        //$data1 = array('country'=>$country);
	        if($this->session->userdata('user_role') == User_role::FRANCHISE){
     			$fromcountry = $this->setting_model->get_user_country_id($this->session->userdata('user_id'));
			 }

			 if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
			  
			   $fromcountry = $this->setting_model->get_user_country_id($this->session->userdata('franchise_id'));  
			     
			 }

	        

	        $url = API_URL.'visacountry';
        $ch = curl_init($url);
        $data1 = array('from_country'=>$fromcountry->country,'to_country'=>$country);
	        curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, VISA_API);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        $result = curl_exec($ch);

	        print_r($result); exit;
	        echo $result;
       	    curl_close($ch);
		}else{
			$result = array("status"=>"false");
			echo json_encode($result);
		}
	}
	
	function get_all_visa_by_multi_country_id(){

		$post = $this->input->post();
		$country = $post["destination"];
		$country = implode(',',$country);
		if($post){

			$url = API_URL.'getvisatype';
	        $ch = curl_init($url);
	        $data1 = array('country'=>$country);
	        curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, VISA_API);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        $result = curl_exec($ch);
	         echo $result;
       	 curl_close($ch);

		}else{

			$result = array("status"=>"false");
			echo json_encode($result);
		}
	}
	function create_batch_of_enquiry(){
		$post = $this->input->post();
		if($post){
			$data = array(
				'batch_name' => $post['batch_name'],
				'enquiry_id' => implode(',',$post['sub_array']),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('user_id'),
			);
			$this->db->insert(TBL_BATCH_TBL,$data);
			$response = array(
				'status' => "success",
				'message' => "Batch Created Successfully.", 
			);
		}else{
			$response = array(
				'status' => "failed",
				'message' => "Something Went Wrong.", 
			);
		}
		echo json_encode($response);
		die;
	}

	function get_auto_supplier_by_name(){
		$this->db->select('name');
		$this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);

		if($this->session->userdata('user_role') == User_role::FRANCHISE){
        	$this->db->where('franchise_id',$this->session->userdata('user_id'));
	    }

	    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
	        $this->db->where('enquiry_staff_id',$this->session->userdata('user_id'));
	    }

		if($this->input->post('status') != ""){
			$this->db->where('pool_status',$this->input->post('status'));
		}	

		$this->db->like('name', $this->input->post('term'));
		$query = $this->db->get()->result();

		$skillData = array(); 

		if(!empty($query)){ 
			foreach ($query as $key => $value) {
					$data['name'] = $value->name; 
					array_push($skillData, $data); 
			} 
		} 
		
		echo json_encode($skillData); 
		return;
	}

	function get_auto_supplier_by_email(){
		$this->db->select('email');
		$this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
		if($this->session->userdata('user_role') == User_role::FRANCHISE){
         $this->db->where('franchise_id',$this->session->userdata('user_id'));

	    }

	    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
	        $this->db->where('enquiry_staff_id',$this->session->userdata('user_id'));
	    }

		if($this->input->post('status') != ""){
			$this->db->where('pool_status',$this->input->post('status'));
		}	
		
		$this->db->like('email', $this->input->post('term'));

		$query1 = $this->db->get()->result();

		$skillData1 = array(); 
		if(!empty($query1)){ 
			foreach ($query1 as $key => $value1) {
				$data['email'] = $value1->email; 
				array_push($skillData1, $data); 

			} 
		} 
		
		echo json_encode(array_unique($skillData1)); 
		return;
	}

	function get_auto_supplier_by_number(){
		$this->db->select('mobile_no');
		$this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
		
		if($this->session->userdata('user_role') == User_role::FRANCHISE){
        	$this->db->where('franchise_id',$this->session->userdata('user_id'));
	    }
	    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
	        $this->db->where('enquiry_staff_id',$this->session->userdata('user_id'));
	    }

		if($this->input->post('status') != ""){
			$this->db->where('pool_status',$this->input->post('status'));
		}
			
		/*$postIDs = array(Enquiry_pool_status::DROP,Enquiry_pool_status::PROCESS);
        $this->db->where_not_in('pool_status', $postIDs);	*/
		$this->db->like('mobile_no', $this->input->post('term'));
		$this->db->group_by('mobile_no');

		$query2 = $this->db->get()->result();
		
		$skillData2 = array(); 
		if(!empty($query2)){ 
			foreach ($query2 as $key => $value2) {
				$data['mobile_no'] = $value2->mobile_no; 
				array_push($skillData2, $data); 

			} 
		} 
		
		echo json_encode($skillData2); 
		return;
	}

	private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/reports/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}

?>