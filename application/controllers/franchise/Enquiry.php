<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends MY_Controller
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
		$this->load->helper('theme_helper');
	}

	function fetch_process_pool_data(){
		$data['fetch_process_enquiry_data'] = $this->setting_model->fetch_pool_data(Enquiry_pool_status::PROCESS,$this->input->post('enquiry_type'),$this->input->post('staff_id'));
		/*echo '<pre>';
		print_r($data['fetch_process_enquiry_data']);
		exit;*/
		$this->load->view('console/enquiry/view_process_pool_tbl', $data);
	}
	function fetch_date_process_pool_data(){
		$data['fetch_process_enquiry_data'] = $this->setting_model->fetch_interview_pool_data(Enquiry_pool_status::PROCESS,$this->input->post('enquiry_type'),$this->input->post('staff_id'),$this->input->post('startdate'),$this->input->post('enddate'));
		$this->load->view('console/enquiry/view_process_pool_tbl', $data);
	}

	function finalize_pool_data(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.min','jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker');
		$this->content->extra_css = array('custom');
		$title = 'View Finalize Pool Data';
		$this->content->breadcrumb = array(
			'Dashboard'      => '',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->fetch_finalize_enquiry_data = $this->setting_model->fetch_pool_data(Enquiry_pool_status::FINALIZE);
		$this->content->get_whatsup_template_data = $this->setting_model->get_whatsup_template_data();
		$this->content->get_email_template_data = $this->setting_model->get_email_template_data();
		$this->content->get_all_country  = $this->supplier_model->get_all_country();
		$this->content->get_descriptions_of_admin 	= 	$this->setting_model->get_descriptions_of_master_module();
		$this->content->get_enquiry_type   = $this->setting_model->get_enquiry_type();
		$this->content->get_all_itenerary_names = $this->setting_model->get_all_itenerary_names();
		$this->content->get_all_drop_reason = $this->setting_model->get_all_drop_reason(Enquiry_pool_status::FINALIZE);
		$this->content->get_all_staff_data = $this->setting_model->get_all_staff_data();
		$this->load_view('view_finalize_pool_data', $title);
	}

	function fetch_finalize_tbl_pool_data(){
		$data['fetch_finalize_enquiry_data'] = $this->setting_model->fetch_pool_data(Enquiry_pool_status::FINALIZE);
		$this->load->view('console/enquiry/view_finalize_tbl', $data);
	}

	function fetch_drop_tbl_pool_data(){
		$data['fetch_drop_enquiry_data'] = $this->setting_model->fetch_pool_data(Enquiry_pool_status::DROP);
		$this->load->view('console/enquiry/view_drop_tbl', $data);
	}

	function get_all_today_follow_up_data(){
		$today_date = date('Y-m-d');
		$data['_view'] = $this->setting_model->fetch_all_todays_followup_data($today_date,$this->input->post('enquiry_type'),$this->input->post('staff_id'));
		
		$this->load->view('console/enquiry/follow_up/today_follow_up',$data);
	}
	function get_all_yesterday_follow_up_data(){
		$yester_day_date = date('Y-m-d',strtotime('-1 day'));
		$data['_view'] = $this->setting_model->fetch_all_todays_followup_data($yester_day_date,$this->input->post('enquiry_type'),$this->input->post('staff_id'));
		$this->load->view('console/enquiry/follow_up/yesterday_follow_up',$data);
	}
	function get_all_missed_follow_up_data(){
		$yester_day_date = date('Y-m-d',strtotime('-2 days'));
		$data['_view'] = $this->setting_model->fetch_all_yesterday_followup_data($yester_day_date,$this->input->post('enquiry_type'),$this->input->post('staff_id'));
		// $data['_view'] = $this->setting_model->get_all_enquiry_list_data();
		$this->load->view('console/enquiry/follow_up/missed_follow_up',$data);
	}
	function drop_pool_data(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');
		$this->content->extra_css = array('custom');
		$title = 'View Drop Pool Data';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->fetch_drop_enquiry_data = $this->setting_model->fetch_pool_data(Enquiry_pool_status::DROP);
		$this->content->get_whatsup_template_data = $this->setting_model->get_whatsup_template_data();
		$this->content->get_email_template_data = $this->setting_model->get_email_template_data();
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		$this->content->get_descriptions_of_admin 	= 	$this->setting_model->get_descriptions_of_master_module();
		$this->content->get_enquiry_type   = 	$this->setting_model->get_enquiry_type();
		$this->content->get_all_itenerary_names = $this->setting_model->get_all_itenerary_names();
		$this->content->get_all_drop_reason = $this->setting_model->get_all_drop_reason(Enquiry_pool_status::DROP);
		$this->content->get_all_staff_data = $this->setting_model->get_all_staff_data();

		$this->load_view('view_drop_pool_data', $title);
	}

	function process_pool_data(){ 
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');

		
		$this->content->extra_css = array('custom');
		$title = 'Process Pool Data';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->fetch_process_enquiry_data = $this->setting_model->fetch_pool_data(Enquiry_pool_status::PROCESS);
		$this->content->get_whatsup_template_data = $this->setting_model->get_whatsup_template_data();
		$this->content->get_email_template_data = $this->setting_model->get_email_template_data();
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		$this->content->get_descriptions_of_admin 	= 	$this->setting_model->get_descriptions_of_master_module();
		$this->content->get_enquiry_type   = 	$this->setting_model->get_enquiry_type();
		$this->content->get_all_itenerary_names = $this->setting_model->get_all_itenerary_names();
		$this->content->get_all_drop_reason = $this->setting_model->get_all_drop_reason(Enquiry_pool_status::PROCESS);
		$this->content->get_all_staff_data = $this->setting_model->get_all_staff_data();


		$this->load_view('view_process_pool_data', $title);
	}
	
	function withoutdeadline(){ 
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.min','jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');
		$this->content->extra_css = array('custom');
		$title = 'Without Deadline';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		
		$this->content->_view  = $this->setting_model->fetch_all_withoutdeadline();

		$this->load_view('view_without_deadline', $title);
	}

	function upcommingdeadlinefillerdata(){
		$post = $this->input->post();

		if($post["days"] == ""){
			$day = '+7 days';
		}else{
			$day = $post["days"]." days";
		}
		if($post['enquiry_from'] == ''){
			$enquiryfrom = "";
		}else{
			$enquiryfrom = $post['enquiry_from'];
		}
		if($post['enquiry_to'] == ''){
			$enquiryto = "";
		}else{
			$enquiryto = $post['enquiry_to'];
		}
		if($post["days"] != ""){
			$enquiryfrom = "";
			$enquiryto = "";
		}
		
		$upcomming_day_date = date('Y-m-d',strtotime($day));
		$data['fetch_upcommingdeadline_filler_data'] = $this->setting_model->fetch_all_upcommingdeadline($enquiryfrom,$enquiryto,$upcomming_day_date);
		
		$this->load->view('console/enquiry/upcomming_deadline_table', $data);
	}

	function upcommingdeadline(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.min','jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');
		$this->content->extra_css = array('custom');
		$title = 'UpComming Deadline';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		//$upcomming_day_date = date('Y-m-d',strtotime('+7 days'));
		//$this->content->_view  = $this->setting_model->fetch_all_upcommingdeadline($upcomming_day_date);

		$this->load_view('view_upcomming_deadline', $title);
	}




	function add()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('custom_for_all','common');
		$this->content->extra_css = array('custom');

		$title = 'Add Enquiry';
		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			$title         	=> 	NULL
		);
		$data['title']   = 	$title;
		$data['action']  = 	'';
		$data['info']   	= 	'';
		// $data['get_country_city']   = 	$this->setting_model->get_country_city();
		$data['get_enquiry_type']   = 	$this->setting_model->get_enquiry_type();
		$data['get_all_country']   = 	$this->supplier_model->get_all_country();
		$data['get_all_staff_data'] = $this->setting_model->get_all_staff_data();
		$data['get_descriptions_of_admin'] 	= 	$this->setting_model->get_descriptions_of_master_module();

		$this->load->view('console/enquiry/add_edit_new_enquiry', $data);
	}
	function index(){
		
		// xdebug($this->session->all_userdata());
		/** page level css & js * */

		/*$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2','select2.full.min','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','daterangepicker/moment.min','daterangepicker/daterangepicker','custom_for_all');*/

		$userdays = $this->session->userdata('days');
		if($userdays == 'addpayment'){
			
			redirect("franchise/globel_setting/monthlytoppop/addpayment");

		}


		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','daterangepicker/moment.min','daterangepicker/daterangepicker','custom_for_all','common');
		$this->content->extra_css = array('custom','daterangepicker');
		$title = '';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->get_all_enquiry_status = $this->setting_model->get_enquiry_status_data();

		$this->content->_view = $this->setting_model->get_all_enquiry_list_data();
		
		$this->content->all_enquiry_view = $this->setting_model->get_enquiry_list_data(Enquiry_pool_status::PROCESS);
		
		$this->content->fetch_all_pool_master_status = $this->setting_model->fetch_all_pool_master_status(Enquiry_pool_status::PROCESS);

		$this->content->get_email_template_data = $this->setting_model->get_email_template_data();

		$this->content->get_whatsup_template_data = $this->setting_model->get_whatsup_template_data();

		$this->content->get_all_itenerary_names = $this->setting_model->get_all_itenerary_names();

		$this->content->get_all_staff 	= 	$this->setting_model->get_all_staff_data();
		
		$this->content->get_enquiry_type   = 	$this->setting_model->get_enquiry_type();

		$this->content->get_offer   = 	$this->setting_model->get_current_offer();

		$this->content->get_offer_count   = 	$this->setting_model->get_current_offer_count($this->content->get_offer->id);
		
		$this->load_view('enquiry_list_view', $title);
	}

	function get_pool_status_change(){
		if($this->input->post('btn_val')){
			if($this->input->post('btn_val') == 1)
			{
				$type = Enquiry_pool_status::PROCESS;
				$status = "process";
			}else if($this->input->post('btn_val') == 2){
				$type = Enquiry_pool_status::FINALIZE;
				$status = "finalize";
			}else{
				$type = Enquiry_pool_status::DROP;
				$status = "drop";
			}

			$fetch_all_pool_master_status = $this->setting_model->fetch_all_pool_master_status($type);
			$data["status"] = $status;
			$data["result"] = $fetch_all_pool_master_status;
			echo json_encode($fetch_all_pool_master_status);
		}
	}
	function ajax_enquiry_number_exist()
	{
			$post = $this->input->post();
		
			
			
			$number_data = $this->setting_model->check_enquiry_number_exists($post['mobile'],$post['query_id']);
			/*echo '<pre>';
			print_r($number_data);*/
			if( ! $number_data)
			{
					echo json_encode(array('user_exist' => FALSE));
			}
			else
			{
					echo json_encode(array('user_exist' => TRUE));
			}
	}
	function send_whats_up_description(){
		if($this->input->post()){
			$get_template_data = $this->setting_model->fetch_whatsup_desc_by_id($this->input->post('w_template_id'));
			$get_user_content_data = $this->setting_model->fetch_user_content_by_id($this->input->post('w_template_user_id'));

			

			$NAME = $get_user_content_data->name;
			$FOLLOWODATE = $get_user_content_data->follow_up_date;
			
			if($get_user_content_data->intersted_country != ""){
				//$ICOUNTRY = $get_user_content_data->intersted_country;
				//$allc = $this->setting_model->get_country_byid($get_user_content_data->intersted_country);
				//$ICOUNTRY = $allc[0]->country;

				$country = explode(",",$get_user_content_data->intersted_country);
	             $allcountryname = array();
	              for($i=0;$i<count($country);$i++){ //echo $country[$i]; exit;
	                 $from = $this->setting_model->get_api_country_by_id($country[$i]);
	                 $allcountryname[] = $from->countrydata[0]->name;
	               } 
	                $allcountry =  implode(',',$allcountryname);
	                $ICOUNTRY = $allcountry; 

			}else{
				$ICOUNTRY = "";
			}

			if($get_user_content_data->visa_id != ""){
				 $url = API_URL.'getform_visa'; 
	            $ch = curl_init($url);
	            $data1 = array('visaid'=>$get_user_content_data->visa_id);
	            curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
	            curl_setopt($ch, CURLOPT_HTTPHEADER, VISA_API);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	            $result = curl_exec($ch);
	            curl_close($ch);
	            $formdat = json_decode($result);
	           // echo '<pre>';
	           // print_r($formdat); exit;
	            //echo $formdat->visaname; exit;
				$VISATYPE = $formdat->visaname->name;
			}else{
				$VISATYPE = "";
			}	
			
			$find = ['{{name}}','{{Follow_Up_Date}}','{{Intersted_Country}}','{{Visa_Type}}','&nbsp;','<p>','</p>'];
			$replace = compact('NAME', 'FOLLOWODATE','ICOUNTRY','VISATYPE',' ','');
			
			$text_description = str_replace('&nbsp;', ' ', $get_template_data->description);

			
			$wasdesc = str_replace($find, $replace, $text_description);
			
			$response = array(
				'mobile_no' => isset($get_user_content_data) && $get_user_content_data->mobile_no ? $get_user_content_data->mobile_no : "",
				'content' => isset($get_template_data) && $get_template_data->description ? $wasdesc : "",
			);
		}else{
			$response = array(
				'mobile_no' => "",
				'content' => "",
			);
		}
		echo json_encode($response);
		die;	
	}
	function save_enquiry_data(){

		if($this->input->post()){
			if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF)
			{ 
				$enquiry_staff_id = $this->session->userdata('user_id'); 
			}
			else
			{
				$enquiry_staff_id = $this->input->post('enquiry_staff_id');
			}

			if($this->input->post('enquiry_type') == '32'){
				$intersted_country = $this->input->post('i_country');
				$visaid = $this->input->post('visatype');
			}else{
				$intersted_country = implode(',',$this->input->post('i_country'));
				 $visaid = implode(',',$this->input->post('visatype'));
			}

			$enquiry_array = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile_no' => $this->input->post('mobile_no') != "" ? $this->input->post('mobile_no') : NULL,
				'enquiry_type' => $this->input->post('enquiry_type'),
				//'city' => implode(',',$this->input->post('city')),
				//'visa_id' => implode(',',$this->input->post('visatype')),
				'visa_id' => $this->input->post('visatype'),
				'language' => $this->input->post('language'),
				's_description' => $this->input->post('s_description'),
				'description' => $this->input->post('description'),
				'follow_up_date' => $this->input->post('follow_up_date') != "" ? date('Y-m-d',strtotime($this->input->post('follow_up_date'))) : NULL,
				//'intersted_country' => implode(',',$this->input->post('i_country')),
				'intersted_country' => $intersted_country,
				'passport_no' => $this->input->post('passport_no'),
				'p_valid_from' => $this->input->post('p_valid_from') != "" ? date('Y-m-d',strtotime($this->input->post('p_valid_from'))) : NULL,
				'p_valid_to' => $this->input->post('p_valid_to') != "" ? date('Y-m-d',strtotime($this->input->post('p_valid_to'))) : NULL,
				'franchise_id' => $this->session->userdata('user_id'),
				'enquiry_staff_id' => $enquiry_staff_id,
				
			);
			
			if($this->input->post('query_id')){ 
				$enquiry_array['updated_at'] = date('Y-m-d h:i:s');
				$this->setting_model->update_qnuiry_data($enquiry_array,$this->input->post('query_id'));

				if(!empty($this->input->post('enq_docu'))){ 
					foreach ($this->input->post('enq_docu') as $key => $val) {
						$docname = $val['docname'];
						$spid = $val['spid'];
						
						if(!empty($this->input->post('enq_docu')[$key]['spid'])){
							if(!empty($_FILES['enq_docu']['tmp_name'][$key]['docfile']) != ""){

								$enqudocument = $this->setting_model->get_document_details($this->input->post('enq_docu')[$key]['spid']);	

								if (file_exists($enqudocument->doc_file)) {
								    @unlink($enqudocument->doc_file);
								}
								
								$tmp_nm=$_FILES['enq_docu']['tmp_name'][$key]['docfile'];
								$target_dir="upload/enquiry_document/";
								$file_nm=basename($_FILES['enq_docu']['name'][$key]['docfile']);
								$doc_nm=pathinfo($_FILES['enq_docu']['name'][$key]['docfile']);
								$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
								$img_path1=$target_dir.$rename_doc;
								$uploda_ok=move_uploaded_file($tmp_nm, $img_path1);	
								
								$item_image_data=array(
										'sup_id' => $this->input->post('query_id'),
										'doc_name'=>$docname,
										'doc_file'=>$img_path1,
										'created_at'=>date('Y-m-d H:i:s'),
										);
								
								
							}else{
								$item_image_data=array(
										'sup_id' => $this->input->post('query_id'),
										'doc_name'=>$docname,
										'created_at'=>date('Y-m-d H:i:s'),
										);
							}
							$column_id = 'id';
							$this->setting_model->update_method(TBL_ENQUIRY_DOCUMENT,$item_image_data,$spid,$column_id);

						}else{
							if(!empty($this->input->post('enq_docu')[$key]['docname']) != ""){

							$tmp_nm=$_FILES['enq_docu']['tmp_name'][$key]['docfile'];
							$target_dir="upload/enquiry_document/";
							$file_nm=basename($_FILES['enq_docu']['name'][$key]['docfile']);
							$doc_nm=pathinfo($_FILES['enq_docu']['name'][$key]['docfile']);
							$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
							$img_path1=$target_dir.$rename_doc;
							$uploda_ok=move_uploaded_file($tmp_nm, $img_path1);	
							
							$item_image_data=array(
									'sup_id' => $this->input->post('query_id'),
									'doc_name'=>$docname,
									'doc_file'=>$img_path1,
									'created_at'=>date('Y-m-d H:i:s'),
									);
							$this->db->insert(TBL_ENQUIRY_DOCUMENT,$item_image_data);

						}
						}

					}
				}


				$response = array('status'=>'success','message' => 'Enquiry Updated Successfully.');
			}else{ 
				$enquiry_array['created_at'] = date('Y-m-d h:i:s');
				$inserec = $this->setting_model->store_qnuiry_data($enquiry_array);
				/*echo '<pre>';
				print_r($this->input->post()); 
				echo '<pre>';
				print_r($_FILES); exit;*/
				if(!empty($this->input->post('enq_docu')[0]['docname'])){ 
					foreach ($this->input->post('enq_docu') as $key => $val) {
						$docname = $val['docname'];
						$tmp_nm=$_FILES['enq_docu']['tmp_name'][$key]['docfile'];
						$target_dir="upload/enquiry_document/";
						$file_nm=basename($_FILES['enq_docu']['name'][$key]['docfile']);
						$doc_nm=pathinfo($_FILES['enq_docu']['name'][$key]['docfile']);
						$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
						$img_path1=$target_dir.$rename_doc;
						$uploda_ok=move_uploaded_file($tmp_nm, $img_path1);	
						
						$item_image_data=array(
								'sup_id' => $inserec,
								'doc_name'=>$docname,
								'doc_file'=>$img_path1,
								'created_at'=>date('Y-m-d H:i:s'),
								);
						$this->db->insert(TBL_ENQUIRY_DOCUMENT,$item_image_data);
					}
				}


				$response = array('status'=>'success','message' => 'Enquiry Added Successfully.');
			}
			
		}else{
			$response = array('status'=>'error','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
	}
	
	function edit(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.min','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','bootstrap-daterangepicker/moment.min','bootstrap-daterangepicker/daterangepicker','input-mask/jquery.mask.min','bootstrap/js/popper.min','select2.full.min', 'select2');
		$this->content->extra_css = array('custom');

		$title = 'Edit Enquiry';
		$meta    = $this->uri->segment(4);

		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			$title         	=> 	NULL
		);
		$data['title']   = 	$title;
		$data['action']  = 	'';
		$data['info']   	= 	'';
		$data['get_enquiry_type']   = 	$this->setting_model->get_enquiry_type();
		$data['enquiry']   = 	$this->setting_model->get_enquiry_old_data($meta);
		$data['enquiry_document']   = 	$this->setting_model->get_enquiry_old_document_data($meta);

//int_r($data['enquiry_document']); exit;
		$countrys = explode(',',$data['enquiry']->intersted_country);
		
		
		$data['get_country_city']   = 	$this->setting_model->get_country_city($countrys);
		$data['get_descriptions_of_admin'] 	= 	$this->setting_model->get_descriptions_of_master_module();
		$data['get_all_country']   = 	$this->supplier_model->get_all_country();

		if($this->session->userdata('user_role') == User_role::FRANCHISE){
			$data['get_all_staff_data'] = $this->setting_model->get_all_staff_data();
		}

		if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
			$this->db->select('created_by');
			$this->db->from(TBL_USERS);
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$franchise_id = $this->db->get()->row();

			if(!empty($franchise_id)){
				$data['get_all_staff_data'] = $this->setting_model->get_all_staff_data($franchise_id->created_by);
			}else{
				$data['get_all_staff_data'] = array();
			}
		}
		$this->load->view('console/enquiry/add_edit_new_enquiry', $data);
	}

function editinquiry(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.min','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','bootstrap-daterangepicker/moment.min','bootstrap-daterangepicker/daterangepicker','input-mask/jquery.mask.min','bootstrap/js/popper.min');
		$this->content->extra_css = array('custom');

		$title = 'Edit Enquiry';
		$meta    = $this->uri->segment(4);

		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   = 	$title;
		$data['action']  = 	'';
		$data['info']   	= 	'';
		$this->content->get_enquiry_type   = 	$this->setting_model->get_enquiry_type();

		$this->content->enquiry   = 	$this->setting_model->get_enquiry_old_data($meta);
		$this->content->enquiry_document  = 	$this->setting_model->get_enquiry_old_document_data($meta);
		$countrys = explode(',',$this->content->enquiry->intersted_country);
		$this->content->get_country_city  = 	$this->setting_model->get_country_city($countrys);
		$this->content->get_descriptions_of_admin 	= 	$this->setting_model->get_descriptions_of_master_module();
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		if($this->session->userdata('user_role') == User_role::FRANCHISE){
			$this->content->get_all_staff_data = $this->setting_model->get_all_staff_data();
		}
		if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
			$this->db->select('created_by');
			$this->db->from(TBL_USERS);
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$franchise_id = $this->db->get()->row();

			if(!empty($franchise_id)){
				$this->content->get_all_staff_data = $this->setting_model->get_all_staff_data($franchise_id->created_by);
			}else{
				$this->content->get_all_staff_data = array();
			}
		}
		
		$this->load_view('edit_new_enquiry', $title);
	}

	function staffeditinquiry(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.min','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','bootstrap-daterangepicker/moment.min','bootstrap-daterangepicker/daterangepicker','input-mask/jquery.mask.min','bootstrap/js/popper.min');
		$this->content->extra_css = array('custom');

		$title = 'Edit Enquiry';
		$meta    = $this->uri->segment(4);

		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   = 	$title;
		$data['action']  = 	'';
		$data['info']   	= 	'';
		$this->content->get_enquiry_type   = 	$this->setting_model->get_enquiry_type();

		$this->content->enquiry   = 	$this->setting_model->get_enquiry_old_data($meta);
		$this->content->enquiry_document  = 	$this->setting_model->get_enquiry_old_document_data($meta);
		$countrys = explode(',',$this->content->enquiry->intersted_country);
		$this->content->get_country_city  = 	$this->setting_model->get_country_city($countrys);
		$this->content->get_descriptions_of_admin 	= 	$this->setting_model->get_descriptions_of_master_module();
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		if($this->session->userdata('user_role') == User_role::FRANCHISE){
			$this->content->get_all_staff_data = $this->setting_model->get_all_staff_data();
		}
		if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
			$this->db->select('created_by');
			$this->db->from(TBL_USERS);
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$franchise_id = $this->db->get()->row();

			if(!empty($franchise_id)){
				$this->content->get_all_staff_data = $this->setting_model->get_all_staff_data($franchise_id->created_by);
			}else{
				$this->content->get_all_staff_data = array();
			}
		}
		
		$this->load_view('staff/edit_new_enquiry', $title);
	}

	function addinquiry(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.min','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','bootstrap-daterangepicker/moment.min','bootstrap-daterangepicker/daterangepicker','input-mask/jquery.mask.min','bootstrap/js/popper.min','custom_for_all');
		$this->content->extra_css = array('custom');

		$title = 'Add Enquiry';
		$meta    = $this->uri->segment(4);

		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   = 	$title;
		$data['action']  = 	'';
		$data['info']   	= 	'';
		$this->content->get_enquiry_type   = 	$this->setting_model->get_enquiry_type();

		$this->content->enquiry   = 	$this->setting_model->get_enquiry_old_data($meta);

		$countrys = explode(',',$this->content->enquiry->intersted_country);
		$this->content->get_country_city  = 	$this->setting_model->get_country_city($countrys);
		$this->content->get_descriptions_of_admin 	= 	$this->setting_model->get_descriptions_of_master_module();
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		if($this->session->userdata('user_role') == User_role::FRANCHISE){
			$this->content->get_all_staff_data = $this->setting_model->get_all_staff_data();
		}
		if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
			$this->db->select('created_by');
			$this->db->from(TBL_USERS);
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$franchise_id = $this->db->get()->row();

			if(!empty($franchise_id)){
				$this->content->get_all_staff_data = $this->setting_model->get_all_staff_data($franchise_id->created_by);
			}else{
				$this->content->get_all_staff_data = array();
			}
		}
		
		$this->load_view('add_new_enquiry', $title);
	}

	function remove_enquiry(){
		if($this->input->post()){
			$remove_enquiry_data = $this->setting_model->remove_enquiry_data($this->input->post('id'));
			$response = array('status'=>'success','message' => 'Enquiry Removed Successfully.');
			echo json_encode($response);
			die;
		}
	}

	function remove_enq_doc(){
		if($this->input->post()){
			$remove_enquiry_data = $this->setting_model->remove_enquiry_document($this->input->post('dataid'));
			$response = array('status'=>'success','message' => 'Enquiry Document Removed Successfully.');
			echo json_encode($response);
			die;
		}
	}

	
	function add_enquiry_status(){
		if($this->input->post('record_id')){
			$get_follow_up_date = $this->setting_model->fetch_enquiry_date_byid($this->input->post('record_id'));
			if(!empty($get_follow_up_date)){

				if($get_follow_up_date->follow_up_date > date('Y-m-d',strtotime($this->input->post('enquiry_date')))){
					$response = array('status'=>'date_error','message' => 'Date Can Not Be Less Than The Follow Up Date.');
					echo json_encode($response);
					die;
				}else{
					$status_array = array(
						'enquiry_id' => $this->input->post('record_id'),
						'enquiry_date' => $this->input->post('enquiry_date') != "" ?date('Y-m-d',strtotime($this->input->post('enquiry_date'))) : "",
						'enquiry_status' => $this->input->post('enquiry_status'),
						'follow_up_time' => $this->input->post('follow_up_time'),
						'e_description' => $this->input->post('e_description'),
						'created_at' => date('Y-m-d H:i:s'),
						'franchise_id' => $this->session->userdata('user_id')
					);
					$update_follow_up_date = $this->db->set('follow_up_date',date('Y-m-d',strtotime($this->input->post('enquiry_date'))));
					$this->db->where('id',$this->input->post('record_id'));
					$this->db->update(TBL_SUPPLIER_ADD_FRANCHISE);

					$this->setting_model->store_enquiry_status_data($status_array);
					$response = array('status'=>'success','message' => 'Enquiry Status Addeds Successfully.');
				}

			}else{
				$response = array('status'=>'error','message' => 'No Enquiry Found.');
			}
		} else{
			$response = array('status'=>'error','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
	}

	/* interview date add */
	function add_interview_date(){
		if($this->input->post('record_id')){
			
			$interview_array = array(
				'biomatric_date' => date('Y-m-d',strtotime($this->input->post('bio_matric_date'))),
				'interview_date' => date('Y-m-d',strtotime($this->input->post('interview_date'))),
				'deadline_desc' => $this->input->post('deadline_desc')
			);
			$update_biomatric_date = $this->db->set($interview_array);
			$this->db->where('id',$this->input->post('record_id'));
			$this->db->update(TBL_SUPPLIER_ADD_FRANCHISE);
			$response = array('status'=>'success','message' => 'Interview Addeds Successfully.');
			
		} else{
			$response = array('status'=>'error','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
	}
	/* end */ 

	/* followup date add */
	function add_followup_date(){
		if($this->input->post('record_id')){
			
			$follow_up_array = array(
				'follow_up_date' => date('Y-m-d',strtotime($this->input->post('followup')))
			);
			$update_follow_up_date = $this->db->set($follow_up_array);
			$this->db->where('id',$this->input->post('record_id'));
			$this->db->update(TBL_SUPPLIER_ADD_FRANCHISE);
			$response = array('status'=>'success','message' => 'Interview Addeds Successfully.');
			
		} else{
			$response = array('status'=>'error','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
	}
	/* end */ 

	/* followup date add */
	function add_dropfollowup_date(){
		if($this->input->post('record_id')){
			
			$follow_up_array = array(
				'follow_up_date' => date('Y-m-d',strtotime($this->input->post('followup'))),
				'pool_status' => 0
			);
			$update_follow_up_date = $this->db->set($follow_up_array);
			$this->db->where('id',$this->input->post('record_id'));
			$this->db->update(TBL_SUPPLIER_ADD_FRANCHISE);
			$response = array('status'=>'success','message' => 'Interview Addeds Successfully.');
			
		} else{
			$response = array('status'=>'error','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
	}
	/* end */ 


	
	function view_all_followup_enquiry(){
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array('custom');

		if($this->input->post('id')){
			$data['get_enquiry'] = $this->setting_model->fetch_follow_up_enquiry_by_id($this->input->post('id'));
			
			$this->load->view('console/enquiry/view_follow_up',$data);
		}else{

		}
	}

	function view_all_enquiry_document(){
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array('custom');

		if($this->input->post('id')){
			$data['get_enquiry_document'] = $this->setting_model->fetch_enquiry_document_by_id($this->input->post('id'));
			
			$this->load->view('console/enquiry/view_enquiry_document',$data);
		}else{

		}
	}

	function view_all_visa_report(){
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array('custom');

		if($this->input->post('number')){
			$data['get_enquiry'] = $this->setting_model->fetch_visa_by_number($this->input->post('number'));
			
			$this->load->view('console/enquiry/view_visa_data',$data);
		}else{

		}
	}
	function send_bulk_email(){
		if($this->input->post()){
			$user_id = $this->input->post('sub_array');		

			$email_template_id = $this->input->post('email_template_id');
			$email_itinerary_name = $this->input->post('email_itinerary_name');

			$get_template_description_by_id = $this->setting_model->get_template_description_by_id($email_template_id);
			$maildescription = $get_template_description_by_id->description;
			if($this->session->userdata('user_role') == User_role::FRANCHISE){
				$fetch_user_email_credencials = $this->setting_model->fetch_user_email_credencials($this->session->userdata('user_id'));
			}else{
				$fetch_user_email_credencials = $this->setting_model->fetch_user_email_credencials($this->session->userdata('franchise_id'));
			}

			if(!empty($fetch_user_email_credencials)){
				define('GOOGLE_CLIENT_ID', $fetch_user_email_credencials->client_id);
				define('GOOGLE_CLIENT_SECRET', $fetch_user_email_credencials->client_secret);
				define('GOOGLE_CLIENT_EMAIL', $fetch_user_email_credencials->email);
				foreach ($user_id as $key => $value) {
					$user_data = $this->setting_model->get_user_detail_by_id($value);

					$NAME = $user_data->name;
					$FOLLOWODATE = $user_data->follow_up_date;
					$ICOUNTRY = $user_data->intersted_country;

					$find = ['{{name}}','{{Follow_Up_Date}}','{{Intersted_Country}}'];
					$replace = compact('NAME', 'FOLLOWODATE','ICOUNTRY');

					$desc = str_replace($find, $replace, $maildescription);

					if(isset($email_template_id) && $email_template_id > 0){
						$send_mail = send_email_to_user(trim($user_data->email), $desc);
					}else if(isset($email_itinerary_name) && $email_itinerary_name > 0){
						$get_content = $this->get_template_content($email_itinerary_name);
						$send_mail = send_email_to_user($user_data->email,$get_content);
					}else{
						$response = array('status'=>'failed','message' => 'Something Went Wrong.');
						echo json_encode($response);
						die;
					}
				}
				$response = array('status'=>'success','message' => 'Mail Sended Successfully.');
			}else{
				$response = array('status'=>'cred_non_added','message' => 'Please Add Email Credential.');
			}
		}else{
			$response = array('status'=>'failed','message' => 'Something Went Wrong.');

		}

		echo json_encode($response);
		die;
	}

	function get_template_content($email_itinerary_name){
		// return base_url('upload/turist_img/1519662625.jpg');
		$fetch_itenerary_details = $this->setting_model->fetch_itenerary_details($email_itinerary_name);

		$fetch_destinations_data = $this->setting_model->fetch_sub_destinations_data($email_itinerary_name);

		$html = "";
		$html .= "
		<h4>Itinerary : ".$fetch_itenerary_details->i_name."</h4>
		<h4>Destination : ".$fetch_itenerary_details->c_name."</h4>
		<h4>City : ".$fetch_itenerary_details->city_nm."</h4>";
		if(!empty($fetch_destinations_data)){
			$html .= "<table class='table'>
			<thead>
			<tr>
			<th scope='col'>Day</th>
			<th scope='col'>Turist Place</th>
			<th scope='col'>Description</th>
			<th scope='col'>Image</th>
			</tr>
			</thead>
			<tbody>";
			foreach ($fetch_destinations_data as $key => $value) { 

				$html .= "<tr>
				<th>".$value->day."</th>
				<td>".$value->turist_place."</td>
				<td>".$value->turist_description."</td><td>";

				$fetch_all_images = $this->setting_model->fetch_all_turist_imgs($value->meta_id);

				foreach ($fetch_all_images as $key => $value) {
					$html .= "<img src='".base_url($value->img_name)."' class='img-bordered' height='50px' width='50px' />";
				}

				$html .="</td></tr>";
			}
			$html .= "</tbody><table>";
		}


		return $html;
		// $this->load->view('console/enquiry/itinerary_template_view');
	}

	function change_enquiry_pool_status(){
		if($this->input->post()){
			$post = $this->input->post();
			$status = $post['btn_val'];
			$r_id = $post['record_id'];
			$data = array(
				'pool_status' => $status
			);

			$update_pool_status = $this->setting_model->change_enquiry_pool_status($data,$r_id);
			$response = array('status'=>'success','value' => $status);

		}else{
			$response = array('status'=>'error','value' => '');
		}

		echo json_encode($response);
		die;
	}
	function add_pool_staus_description(){
		if($this->input->post()){
			$post = $this->input->post();
			$data_array = array(
				'master_id' => $post['pool_record_id'],
				'pool_status' => $post['btn_val'],
				'pool_status_des_id' => $post['pool_status'],
				'pool_description' => $post['pool_description'],
				'created_at' => date('Y-m-d H:i:s'),
			);
		// if($this->input->post()){
			$data = array(
				'pool_status' => $post['btn_val']
			);
			$this->setting_model->store($data_array,TBL_POOL_TBL_DESCRIPTION);
			$update_pool_status = $this->setting_model->change_enquiry_pool_status($data,$post['pool_record_id']);

			$response = array('status'=>'success','message' => "Pool Status Changed Successfully.",'pool_status' => $post['btn_val']);
		}else{
			$response = array('status'=>'failed','message' => "Something Went Wrong.");
		}

		echo json_encode($response);
		die;
	}

	function service_charge_pull_status(){
		
		if($this->input->post()){
			
			 $currentuser = $this->supplier_model->get_main_franchise_id($this->session->userdata('user_id'));
                $totalbalance = ($currentuser->balance-$this->input->post('service'));

                $id   = $this->session->userdata('user_id');
                $user = array();
                $user['user_id']                =       $this->session->userdata('user_id');
                $user['balance']                =       $totalbalance;      
                $user['updated_on']             =       time();

                $user_id = $this->user_model->edit_data(TBL_USERS, $user, 'user_id', $id);

                $passtable = array();
                $passtable['ref_id']                =       "";     
                //$passtable['ref_type']              =       $this->input->post('origincountry').",".$this->input->post('destinationcountry');        
                $passtable['ref_type']              =      "";        
                $passtable['payment_type']          =       Payment_type::DEBIT; 
                $passtable['service_type']          =       Service_type::VISA;
                $passtable['user_id']               =       $this->session->userdata('user_id');
                $passtable['contact']               =       "";
                $passtable['amount']                =       $this->input->post('service');
                $passtable['created_at']            =       date('Y-m-d h:i:s');

                $passbookid = $this->setting_model->passbookstore($passtable);



                /*$supplier = array();
                $supplier['id']                =       $post["pool_record_id"];
                $supplier['company']           =       "yes";  
                $supplier['pool_status']       =       "1";      
                $user_id = $this->user_model->edit_data(TBL_SUPPLIER_ADD_FRANCHISE, $supplier, 'id', $post["pool_record_id"]);*/


                $enid = $this->input->post('pool_record_id');
                $enquiry = array('pool_status' => 1,'company' => "yes");
                $this->setting_model->update_qnuiry_data($enquiry,$enid);

                $response = array('status'=>'success','message' => "Pool Status Changed Successfully.");

		}else{
			$response = array('status'=>'failed','message' => "Something Went Wrong.");
		}

		echo json_encode($response);
		die;
	}




	function call_back_url(){
		require_once 'config.php';
		try {
			$adapter->authenticate();
			$token = $adapter->getAccessToken();
			$db = new DB();
			$db->update_access_token(json_encode($token));
			echo "Access token inserted successfully.";
			redirect("franchise/enquiry");
		}
		catch( Exception $e ){
			echo $e->getMessage() ;
		}
	}

	function get_auto_suggestion_by_name(){
		$this->db->select('name,address,latitude,longitude');
		$this->db->from(TBL_PACKAGE_META);
		$this->db->where('is_meta',Meta::TOURIST_ATTRACTION);
		$this->db->like('name', $this->input->post('term'));
		$query = $this->db->get()->result();

		$skillData = array(); 
		if(!empty($query)){ 
			foreach ($query as $key => $value) {
				$data['value'] = $value->name; 
				$data['address'] = $value->address; 
				$data['latitude'] = $value->latitude; 
				$data['longitude'] = $value->longitude; 
				array_push($skillData, $data); 
			} 
		} 
		echo json_encode($skillData); 
		return;
	}
	private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/enquiry/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}



}

