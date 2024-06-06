<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller
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

	public function index(){
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');
		$this->content->extra_css = array('custom');
		$title = 'View Template';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->get_all_templates   = 	$this->setting_model->get_all_templates();
		
		$this->load_view('view_template', $title);
	}

	public function add_template(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','summernote/summernote1','summernote');
		$this->content->extra_css = array('custom');

		$title = 'Add Template';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'View Template'   => 'franchise/template',
			$title         	=> 	"aaa"
		);
		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_tag = $this->setting_model->get_all_template_meta_list(Meta::TEMPLATE_TAG, 'asc');

		$this->load_view('add_edit_template', $title);
	}

	function save_template_data(){

		if($this->input->post()){
			if($this->input->post('never_expiry') != ""){
				$enquiry = $this->input->post('never_expiry');
			}else{
				$enquiry = "0";
			}

			if($this->input->post('expiry_date') != ""){
				$expiry_date = date('Y-m-d',strtotime($this->input->post('expiry_date')));
			}else{
				$expiry_date = NULL;
			}
			
			$data_array = array(
				'name' => $this->input->post('name'),
				'description' => trim($this->input->post('description')),
				'expiry_date' => $expiry_date,
				'is_expiry' => $enquiry,
				'franchise_id' => $this->session->userdata('user_id'),
			);
			
			if($this->input->post('template_id') > 0){
				$data_array['updated_at'] = date('Y-m-d H:i:s');
				$this->setting_model->update_template_record($data_array,$this->input->post('template_id'));
				$response = array(
					'status' => 'success',
					'message' => 'Template Data Updated Successfully.'
				);
			}else {
				$data_array['created_at'] = date('Y-m-d H:i:s');
				$this->setting_model->store_template_data($data_array);
				$response = array(
					'status' => 'success',
					'message' => 'Template Data Stored Successfully.'
				);
			}
			
		}else{
			$response = array(
				'status' => 'failed',
				'message' => 'Something Went Wrong.'
			);
		}
		echo json_encode($response);
		die;

	}
	function delete_template_data(){
		if($this->input->post('id') > 0){
			$this->setting_model->update_template_data($this->input->post('id'));
			$response = array(
				'status' => 'success',
				'message' => 'Template Removed Successfully.'
			);
		}else{
			$response = array(
				'status' => 'failed',
				'message' => 'Something Went Wrong.'
			);
		}
		echo json_encode($response);
		die;
	}

	function edit_template(){	
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','summernote/summernote1','summernote');
		$this->content->extra_css = array('custom');

		$id = $this->uri->segment(4);
		if(!$id)
		{
			redirect('franchise/template', 'refresh');
		}
		$title = 'Edit Template';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'View Template'   => 'franchise/template',
			$title         	=> 	NULL
		);
		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_tag = $this->setting_model->get_all_template_meta_list(Meta::TEMPLATE_TAG, 'asc');
		$this->content->get_template_data = $this->setting_model->fetch_template_data_byid($id);
		$this->load_view('add_edit_template', $title);
	}
	
	public function display_name_dynamic(){
		/** page level css & js * */
		$this->content->extra_js  = array('responsive.bootstrap5.min', 'table-data','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert');
		$this->content->extra_css = array('custom');

		$title = 'Set Field';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Set Name'   => 'franchise/template',
			$title         	=> 	"Set Field"
		);
		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->get_whatsup_template_data = $this->setting_model->get_email_template_records();
		$this->load_view('create_dynamic_template', $title);
	}


	function generate_dynamic_template(){

		if($this->input->post()){
			$emailid =$this->input->post('email_template_id');
			$name =$this->input->post('name');
			$lname =$this->input->post('lname');
			$data = $this->content->get_template_data = $this->setting_model->fetch_template_data_byid($emailid);
			print_r($data); exit;
			
		}
		echo json_encode($response);
		die;

	}



	private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/template/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}


}
?>
