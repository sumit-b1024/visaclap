<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiry_Notification extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		// $this->page = ($this->uri->segment(5) != '') ? $this->uri->segment(5) : 1;
		// $this->per_page = NULL;
	}

	function index()
	{
		if($this->session->userdata('user_id'))
		{
			/** page level css & js * */
			$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','sweet-alert/sweetalert.min','sweet-alert');
			$this->content->extra_css = array();

			$title = 'Enquiry Notification';
			
			$this->content->breadcrumb = array(
				'Dashboard' => 'dashboard',
				$title      => null
			);

			$this->content->title   = 	$title;
			$this->content->action  = 	'';
			$this->content->info   	= 	'';

			$this->load->model(array('setting_model','user_model'));

			// echo User_role::SUPPLIER;
			$notifications = $this->setting_model->get_full_enquiry_notifications();

			$this->content->_list = $notifications;
			// echo '<pre>';
			// print_r($this->content->_list); exit;
			
			$this->load_view('notification_view', $title);
		}
	}
	function fetch_all_notification(){

		$this->load->model(array('setting_model'));
		$data['fetch_notification'] = $this->setting_model->get_all_notifications();
		
		$this->load->view('console/notification/notification_tbl', $data);
	}
	function fetch_today_notification(){
		$this->load->model(array('setting_model'));
		$today_date = date('Y-m-d');
		$data['fetch_notification']  = $this->setting_model->get_all_notifications($today_date);
		// xdebug($data['fetch_notification']);
		if(!empty($data['fetch_notification'])){
			$this->load->view('console/notification/notification_tbl', $data);
		}else{
			echo $data['fetch_notification'] = 'empty';
		}	
	}


	
	

	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('franchise/staff/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

	
}
/* end of supplier */