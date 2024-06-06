<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model(array('user_model', 'setting_model','supplier_model'));
		$this->load->helper('theme_helper');
	}
	function index(){
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','custom_for_all2');
		$this->content->extra_css = array();

		$title = 'Staff Dashboard';
		$this->content->breadcrumb = array(
			$title         	=> 	NULL
		);
		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';

		$this->load_view('dashboard', $title);
	}

	function fetch_process_pool_data(){

		$data['fetch_process_enquiry_data'] = $this->setting_model->fetch_pool_data_staff(Enquiry_pool_status::PROCESS,$this->session->userdata('user_id'));
		$this->load->view('console/enquiry/view_process_pool_data', $data);
	}

	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('franchise/staff/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}
?>