<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Batch extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_model', 'setting_model','supplier_model'));
	}
	public function index(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min');
		$this->content->extra_css = array('custom');
		$title = 'View Batch';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->_view   = 	$this->setting_model->get_all_batch_enquiry();
		$this->load_view('view_batch', $title);
	} 

	function view_batch_enquiry_group(){
		if($this->input->post('id')){
			$id = explode(',',$this->input->post('id'));
			$data['get_enquiry_list'] = $this->setting_model->get_enquiry_list_by_batch_group($id);
			$this->load->view('franchise/batch/batch_tbl_view',$data);
		}
	}

	private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('franchise/batch/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}
}

?>