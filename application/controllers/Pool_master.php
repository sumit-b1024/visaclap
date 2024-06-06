<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pool_master extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
			// tables
		$this->tbl_users   		= 		TBL_USERS;
		$this->tbl_profile 		= 		TBL_PROFILE;
		$this->tbl_category 	= 		TBL_CATEGORY;
		// $this->tbl_countries 	= 		TBL_COUNTRIES;
		// $this->tbl_cities 		= 		TBL_CITIES;
		$this->tbl_activity 	= 		TBL_ACTIVITY;
		$this->load->model(array('user_model', 'setting_model','supplier_model'));
		$this->load->helper('theme_helper');
	}

	function index(){
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');
		$this->content->extra_css = array('custom');
		$title = 'View Pool';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->fetch_pool_data   = 	$this->setting_model->fetch_all_tbl_data();

		$this->load_view('view_pool_master', $title);	
	}

	function add(){
		$this->content->extra_js  = array('select2.full.min', 'select2','custom');
		$this->content->extra_css = array('custom');
		$title = 'Add Pool';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Pool'      => 	'pool_master',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->all_pool_type  = 	Enquiry_pool_status::getValue();
		// $this->content->all_pool_type  = 	Enquiry_pool_status::pool_getValue();
		$this->load_view('add_pool_master', $title);
	}

	function edit(){
		
		$this->content->extra_js  = array('select2.full.min', 'select2','custom');
		$this->content->extra_css = array('custom');
		$title = 'Edit Pool';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Pool'      => 	'pool_master',
			$title         	=> 	NULL
		);
		$id = $this->uri->segment(3);
		if(!$id)
		{
			redirect('pool_master', 'refresh');
		}
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->fetch_record_data   = 	$this->setting_model->fetch_old_pool_record_data($id);
		$this->content->all_pool_type  = 	Enquiry_pool_status::getValue();
		// $this->content->all_pool_type  = 	Enquiry_pool_status::getall_poolValue();
		$this->load_view('add_pool_master', $title);
	}

	function store_pool_master_data(){
		if($this->input->post()){
			$data_array = array(
				'pool_status_info' => $this->input->post('pool_status'),
				'pool_status' => $this->input->post('pool_type'),
			);
			if($this->input->post('pool_id') > 0 ){
				$data_array['updated_at'] = date("Y-m-d H:i:s");

				$this->setting_model->update_record($data_array,$this->input->post('pool_id'),TBL_POOL_MASTER_TBL);
				$response = array('status'=>'success','message' => "Status Updated Successfully.");
			}else{
				$data_array['created_at'] = date("Y-m-d H:i:s");
				$this->setting_model->store($data_array,TBL_POOL_MASTER_TBL);
				$response = array('status'=>'success','message' => "Status Added Successfully.");
			}
		}else{
			$response = array('status'=>'failed','message' => "Something Went Wrong.");
		}
		echo json_encode($response);
		die;
	}
	function delete_pool_data(){
		if($this->input->post()){
			$this->setting_model->update_record(array('is_delete'=>1),$this->input->post('id'),$this->input->post('table'));
			$response = array('status'=>'success','message' => "Status Removed Successfully.");
		}else{
			$response = array('status'=>'failed','message' => "Something Went Wrong.");
		}
		echo json_encode($response);
		die;
	}
	function view_pool_status_info(){
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');
		$this->content->extra_css = array('custom');
		$title = 'View Pool Status';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->view_pool_des_status   = $this->setting_model->view_pool_des_status();
		$this->content->get_all_franchise  = $this->setting_model->get_all_franchise_holder_name();
		$this->content->all_pool_type  = 	Enquiry_pool_status::getValue();
		$this->load_view('view_pool_des_status', $title);
	}
	function get_all_pool_description(){
		if($this->input->post('record_id')){
			$data['get_all_status_des'] = $this->setting_model->get_all_status_des_by_id($this->input->post('record_id'));
			
			$this->load->view('console/pool/view_all_enquiry_follow_up_tbl',$data);

		}
	}

	function get_all_pool_status_data(){
		$post = $this->input->post();
		$franchise_id = $post['franchise_id'];
		$s_status = $post['s_status'];
		$end_date = $post['end_date'];
		$start_date = $post['start_date'];
		$data['f_pool'] = $this->setting_model->fetch_admin_franchise_tbl_data($franchise_id,$s_status,$start_date,$end_date);
		$this->load->view('console/pool/admin_pool_tbl',$data);
	}

	function view_chart(){
		$this->content->extra_js  = array('custom');
		$this->content->extra_css = array('custom');
		$title = 'View Chart';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->load_view('line_chart_tbl', $title);
	}

	function fetch_chart_tbl_data(){
		$this->db->select('*');
		$this->db->from('chart_tbl');
		$query = $this->db->get()->result_array();

		$rows = array();
		$table = array();

		$table['cols'] = array(
			array(
				'label' => 'Name', 
				'type' => 'string'
			),
			array(
				'label' => 'By Value', 
				'type' => 'number'
			),
			array(
				'label' => 'Shell Value', 
				'type' => 'number'
			)
		);

		foreach ($query as $key => $value) {

			$sub_array = array();
			$sub_array[] =  array(
				"v" => $value['name']
			);
			$sub_array[] =  array(
				"v" => $value['by_value']
			);
			$sub_array[] =  array(
				"v" => $value['shell_value']
			);
			$rows[] =  array(
				"c" => $sub_array
			);

			
		}

		$table['rows'] = $rows;
			// echo '<pre>';
			// print_r($table);
		echo $jsonTable = json_encode($table);
		return;

	}

	private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/pool/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}
?>