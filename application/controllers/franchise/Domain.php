<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Domain extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model(array('user_model', 'setting_model','supplier_model'));
	}


	function index(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert');
		$this->content->extra_css = array('custom');
		$title = 'Your Domain';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
			
		$this->load_view('domain_view', $title);
	}
	function save_domain_data(){

		if($this->input->post()){
			$domain_array = array(
				'domain_name' => $this->input->post('domain_name'),
				'created_by' => $this->session->userdata('user_id'),
			);
			if($this->input->post('dom_id')){
				$domain_array['updated_on'] = time();
				$this->setting_model->update_doamin_data($domain_array,$this->input->post('dom_id'));
				$response = array('status'=>'success','message' => 'Domain Updated Successfully.');
			}else{
				$domain_array['created_on'] = time();
				$this->setting_model->store_domain_data($domain_array);
				$response = array('status'=>'success','message' => 'Domain Added Successfully.');
			}
		}else{
			$response = array('status'=>'error','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
	}

function edit()
	{
		/** page level css & js * */
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert');
		$this->content->extra_css = array('custom');
		$title = 'Edit Domain';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		
		
		$id = $this->uri->segment(4);
		
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->view      	= 	$this->setting_model->get_domain_details($id);	
		$this->load_view('domain_view', $title);
	}
	function remove_domain(){
	    

	    if($this->input->post('r_id')){
	        $update_status = $this->setting_model->remove_domain($this->input->post('r_id'));
	        $response = array('status'=> 'success','msg' => "Domain ( Removed Successfully");
	    }else{
	        $response = array('status'=> 'failed','msg' => "Something Went Wrong.");
	    }
	    echo json_encode($response);
	    return;
	}

	function get_all_domain(){
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert');
		$data['get_all_domain'] = $this->setting_model->get_all_domain();
        $this->load->view('franchise/domain/domain_table',$data);
	}	

	

	private function load_view($viewname = 'domain_view', $page_title)
	{
		$this->masterpage->setMasterPage('franchise_setting_master');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('franchise/domain/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}
}	