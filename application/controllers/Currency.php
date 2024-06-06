<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Currency extends MY_Controller {
	
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
			$currency = $this->setting_model->get_full_currencys();

			$this->content->_list = $currency;
			// echo '<pre>';
			// print_r($this->content->_list); exit;
			
			$this->load_view('currency_view', $title);
		}
	}
	/*function fetch_all_currency(){

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
	*/

	function add_currency()
	{

		if($this->session->userdata('user_id'))
		{
			$this->content->extra_js  = array('custom','summernote/summernote1','summernote');
			$this->load->model('supplier_model');

			/** page level css & js * */
			$this->content->extra_js  = array('select2.full.min', 'select2');
			$this->content->extra_css = array();

			$title = 'Add Currency';
			$this->content->breadcrumb = array(
				'Currency' => 'currency',
				$title      => null
			);

			$this->content->title 	= $title;
			
			$this->load_view('add_edit_currency', $title);
		}
	}
	
	function edit_currency()
	{
		$this->load->model(array('setting_model'));
		$this->content->extra_js  = array('');

		$noti_id = $this->uri->segment(3);
		if(!$noti_id) {
			redirect('currency', 'refresh');
		}
		$title = 'Edit Currency';

		$this->content->breadcrumb = array(
			'Currency' => 'currency',
			$title      => null
		);

		$page_title = 'Edit Currency';
		$this->content->cur = $this->setting_model->get_currency($noti_id);
		$this->content->title 	 = $page_title;


		$this->load_view('add_edit_currency', $page_title);
	}
	
	function ajax_add_currency() {

		if($this->input->is_ajax_request()) {
			$post = $this->input->post();
			// xdebug($post);
			$this->load->model(array('setting_model'));
			if(!empty($post['id']) && isset($post['id'])) {
				$noti['curname'] 		= $post['curname'];
				$noti['id'] 	= $post['id'];
				$noti_id = $this->setting_model->currency_edit($noti);
				$message = 'Currency updated successfully';
			} else {
				
				$noti['curname'] 		= $post['curname'];
				$noti['created_at'] 	= date('Y-m-d H-i:s');
				$noti_id = $this->setting_model->currency_add($noti);
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


	

	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/currency/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

	
}
/* end of supplier */