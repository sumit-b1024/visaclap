<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
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
		$this->load->library('excel');
		$this->load->model(array('user_model', 'setting_model'));
	}


	function index()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2','jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'View All Users';
		$this->content->breadcrumb = array(
			'Home'         	=> 	'',
			$title         	=> 	null
		);
		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list 	= 	$this->user_model->get_user();
		$this->content->category_list 	= 	$this->user_model->get_all_category_list();

		$this->load_view('dashboard_view', $title);
	}

	function update_user_status(){
		$id     = $this->input->post('id');
		$row    = $this->input->post('row');
		$table  = $this->input->post('table');
		$status  = $this->input->post('status');

		if (!$id && !$row && !$table)
		{
			redirect('dashboard', 'refresh');
		}
		$this->load->model('user_model');

		$status = ( $status == User_status::ACTIVE ? User_status::DEACTIVATED : User_status::ACTIVE );
		$status_msg = ( $status == User_status::ACTIVE ? 'Activated' : 'Deactivated');

		$data       = array();
		$data[$row] = $id;
		$data['updated_by'] = $this->session->userdata['user_id'];
		$data['updated_on'] = time();
		$affected_id = $this->user_model->update_user_is_active_status($table, $id, $status);

		$response_array = array(
			'status'=>'success',
			'is_active' => $status,
			'message' => 'User '.$status_msg.' Successfully.');

		echo json_encode($response_array);
		return;
	}

	function get_user_filtered_data(){
		$post = $this->input->post();
		$data['_list'] = $this->user_model->get_all_user_by_category($post['account_status_id'],$post['customer_category']);
		$this->load->view('member/all_user_display_tbl',$data);
	}
	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('member/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}
	
}
/* end of dashboard */