<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends MY_Controller {
	
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
			$this->content->extra_js  = array('jquery.min','jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker');
			$this->content->extra_css = array();

			$title = 'Notification';
			
			$this->content->breadcrumb = array(
				'Dashboard' => 'dashboard',
				$title      => null
			);

			$this->content->title   = 	$title;
			$this->content->action  = 	'';
			$this->content->info   	= 	'';

			$this->load->model(array('setting_model'));

			// echo User_role::SUPPLIER;
			$notifications = $this->setting_model->get_full_notifications();

			/*echo '<pre>';
			print_r($notifications); exit;*/

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

	function convert_multi_array($array) {
  $out = implode(",",array_map(function($a) {return implode("~",$a);},$array));
  return $out;
}
	function add_notification()
	{

		if($this->session->userdata('user_id'))
		{
			$this->content->extra_js  = array('custom','summernote/summernote1','summernote');
			$this->load->model('supplier_model');

			/** page level css & js * */
			$this->content->extra_js  = array('select2.full.min', 'select2');
			$this->content->extra_css = array();

			$title = 'Add Notification';
			$this->content->breadcrumb = array(
				'Notification' => 'notification',
				$title      => null
			);

			$this->content->title 	= $title;
			
			$this->load_view('add_edit_notification', $title);
		}
	}
	
	function edit_notification()
	{
		$this->load->model(array('setting_model'));
		$this->content->extra_js  = array('custom','summernote/summernote1','summernote');

		$noti_id = $this->uri->segment(3);
		if(!$noti_id) {
			redirect('notification', 'refresh');
		}
		$title = 'Edit Notification';

		$this->content->breadcrumb = array(
			'Notification' => 'notification',
			$title      => null
		);

		$page_title = 'Edit Notification';
		$this->content->notifications = $this->setting_model->get_notifications($noti_id);
		$this->content->title 	 = $page_title;


		$this->load_view('add_edit_notification', $page_title);
	}
	
	function ajax_add_notification() {

		if($this->input->is_ajax_request()) {
			$post = $this->input->post();
			// xdebug($post);
			$this->load->model(array('setting_model'));
			if(!empty($post['id']) && isset($post['id'])) {
				$noti['description'] 		= $post['description'];
				$noti['updated_at'] 	= date('Y-m-d H-i:s');
				$noti['id'] 	= $post['id'];
				$noti_id = $this->setting_model->noti_edit($noti);
				$message = 'Notification updated successfully';
			} else {
				
				$noti['description'] 		= $post['description'];
				$noti['created_at'] 	= date('Y-m-d H-i:s');
				$noti_id = $this->setting_model->noti_add($noti);
				$message = 'Notification added successfully';
			}
			
			if(!empty($noti_id) && isset($noti_id) && $noti_id > 0) {
				echo json_encode(array('status'=> 'success', 'message'=> $message));
			} else {
				echo json_encode(array('status'=> 'failed'));
			}
		} else {
			show_400();
		}
	}
	
	
	
	function delete() {
		$supplier_id = $this->input->post('id');
		if(!$supplier_id) {
			redirect('supplier', 'refresh');
		}
		$this->load->model('setting_model');
		$supplier = array();
		$supplier['id']= $supplier_id;
		$supplier['updated_at']	= date('Y-m-d H-i:s');
		$supplier['is_deleted'] 	=  Deleted_status::DELETED;
		if($this->setting_model->noti_edit($supplier)) {
			//$this->load->library('Notify_service');
			//$options = $this->notify_service->notify_success('Media Delete Successfully !');
			echo "success";
		}
	}

	function read_notification() {
			$this->load->model('setting_model');
		$noteid = $this->input->post('noteid');
		$i = 0;
		foreach($noteid as $val){
			$this->setting_model->read_noti($val);
			 $i++;
		}

		echo json_encode(array('status'=> 'success'));
		
	}

	
	
	

	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/notification/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

	
}
/* end of supplier */