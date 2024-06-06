<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fieldarrange extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

			// tables
		
		$this->tbl_template 	= 		TBL_TEMPLATE;
		$this->load->library('excel');
		$this->load->library('Nectar');


		$this->load->model(array('setting_model'));
	}

	function index()
	{ 

		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','select2.full.min');
		$this->content->extra_css = array();

		$title = 'Form Fields';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';

		$db2 = $this->load->database('visaclapapi',TRUE);
		$db2->select('fm.form_group,fm.label_name,fm.input_type,fm.form_id');
        $db2->from('tbl_form_attribute as fm');
        $db2->group_by("fm.form_id");
        $formfields =  $db2->get()->result();  
       $this->content->_list = $formfields;
		$this->load_view('allform_view', $title);
	}


	function view_fields()
	{ 

		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','select2.full.min');
		$this->content->extra_css = array();
		$form_id = $this->uri->segment(3);
		
		$title = 'Form Fields Arrange';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Form Fields'    => 	'fieldarrange',
			$title         	 => 	NULL
		);

		

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';

		$db2 = $this->load->database('visaclapapi',TRUE);
		$db2->select('fm.form_group,fm.label_name,fm.input_type,fm.form_id,fm.id');
        $db2->from('tbl_form_attribute as fm');
        $db2->where(array('fm.form_id' => $form_id));
        $db2->order_by("fm.order_no","ASC");
        $formfields =  $db2->get()->result();  


       	$this->content->allfields = $formfields;
       	
		$this->load_view('fields_view', $title);
	}
	function order_update(){
		$post = $this->input->post();

		$post_order = isset($post["post_order_ids"]) ? $post["post_order_ids"] : [];
		if(count($post_order)>0){
			for($order_no= 0; $order_no < count($post_order); $order_no++)
			{
				$db2 = $this->load->database('visaclapapi',TRUE);
				$db2->set('order_no',($order_no+1));
		        $db2->where('id',$post_order[$order_no]);
		        $db2->where('form_id',$post['formid']);
		        $db2->update('tbl_form_attribute');
			}
			echo true; 
		}else{
			echo false; 
		}	
	}
	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('fields/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}
/* end of settings */ 