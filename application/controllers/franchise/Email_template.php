<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email_Template extends MY_Controller
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

	function index()
	{ 
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');
		$this->content->extra_css = array('custom');

		$title = 'View Email Template';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->get_email_template = $this->setting_model->get_email_template_records();
		$this->load_view('view_email_template', $title);

	}

	function add()
	{ 
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','summernote/summernote1','summernote');
		$this->content->extra_css = array('custom');
		$title = 'Add Email Template';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'View Email Template'  => 'franchise/email_template/',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->_tag = $this->setting_model->get_all_template_meta_list(Meta::TEMPLATE_TAG, 'asc');
		
		$this->load_view('add_edit_email_template', $title);
	}

	function store_email_template_data(){
		if($this->input->post()){

			if($this->input->post('never_expiry') != ""){
				$enquiry = $this->input->post('never_expiry');
			}else{
				$enquiry = "0";
			}
			
			$template_array = array(
				'name' => $this->input->post('name'),
				// 'name' => $this->input->post('name'),
				'expiry_date' => date('Y-m-d H:i:s',strtotime($this->input->post('expiry_date'))),
				'description' => $this->input->post('description'),
				'is_expiry' => $enquiry,
				'franchise_id' => $this->session->userdata('user_id'),
				// 'franchise_id' => $this->session->userdata('id'),
			);
			if($this->input->post('template_id') > 0){
				$template_array['updated_at'] = date('Y-m-d H-i:s');
				$this->setting_model->update_email_template_data($template_array,$this->input->post('template_id')); 

				$response = array('status'=>'success','message' => 'Email Template Updated Successfully.');

			}else{	
				$template_array['created_at'] = date('Y-m-d H-i:s');

				$this->setting_model->store_email_template_data($template_array); 

				$response = array('status'=>'success','message' => 'Email Template Added Successfully.');
			}

		}else{
			$response = array('status'=>'failed','message' => 'Something Went Wrong.');

		}
		echo json_encode($response);
		die;
	}

	function edit_email_template(){
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','summernote/summernote1','summernote');
		$this->content->extra_css = array('custom');

		$id = $this->uri->segment(4);
		if(!$id)
		{
			redirect('franchise/email_template', 'refresh');
		}
		$title = 'Edit Email Template';
		$this->content->breadcrumb = array('Dashboard' => '','View Email Template'  => 'franchise/email_template/',$title => NULL);
		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->get_template_data = $this->setting_model->fetch_email_template_data_byid($id);
		$this->content->_tag = $this->setting_model->get_all_template_meta_list(Meta::TEMPLATE_TAG, 'asc');

		$this->load_view('add_edit_email_template', $title);
	}

	function delete_email_template_data(){
		if($this->input->post('id') > 0){
			$this->setting_model->delete_email_template_data($this->input->post('id'));
			$response = array('status' => 'success','message' => 'Template Removed Successfully.');
		}else{
			$response = array('status' => 'failed','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
	}

	private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/email-template/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}
?>