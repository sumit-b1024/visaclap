<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller
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
		$this->content->extra_js  = array('select2.full.min', 'select2','jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'Template';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list   = 	$this->setting_model->get_franchise_template();
		$this->load_view('template_view', $title);
	}

	

	function add_template()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array();

		$title = 'Add Template';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		if($this->form_validation->run('add-user'))
		{
			$post = $this->input->post();
			
			$template = array();
			$template['name'] 			        = 		strtolower($post['name']);
			$template['description']  			= 		$post['description'];
			$template['created_by'] 			= 		$this->session->userdata('user_id');
			$template['created_on'] 			= 		time();

			$user_id = $this->user_model->add_data($this->tbl_users, $user);

		}

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		
		$this->load_view('add_template', $title);
	}
	function savetemplate()
	{
			$post = $this->input->post();
			
			$template = array();
			$template['name'] 			        = 		strtolower($post['template_name']);
			$template['description']  			= 		trim($post['description']);
			
			

			if($this->input->post('template_id')){
				$template['updated_by'] 			= 		$this->session->userdata('user_id');
				$template['updated_on'] = time();
				$this->setting_model->update_franchise_template_data($template,$this->input->post('template_id'));
				$template_id = $this->input->post('template_id');
				
			}else{

				$template['created_by'] 			= 		$this->session->userdata('user_id');
				$template['created_on'] 			= 		time();
				
				$template_id =  $this->setting_model->store_franchise_template_data($template);
			}
			
				if ($_FILES['images']['tmp_name'] !== "") {
				
					$tmp_nm=$_FILES['images']['tmp_name'];
					$target_dir="upload/template_img/";
					$file_nm=basename($_FILES['images']['name']);
					$doc_nm=pathinfo($_FILES['images']['name']);
					$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
					$img_path=$target_dir.$rename_doc;
					$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	
					
					$this->setting_model->template_image_update($img_path,$template_id);
			}
				$response = array('status' => 'success', 'msg' => 'Template Updated Successfully.');
			
			echo json_encode($response);
			return;
			
	}

	function edit_template()
	{       
		$id = $this->uri->segment(3);

		if( !$id )
		{
			redirect('settings/users', 'refresh');
		}
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array();

		

		$title = 'Edit Template';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->load->library('form_validation');

		

		$this->content->title   	= 	$title;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->edit 		= 	$this->setting_model->get_franchise_template_detail($id);
		
		$this->load_view('add_template', $title);
	}

	function remove_template(){
		if($this->input->post('id')){
			$this->setting_model->delete_fran_template($this->input->post('id'));
			$response = array(
				'status' => 'success',
				'message' => 'Template Removed successfully',
			);
		}else{
			$response = array(
				'status' => 'failed',
				'message' => 'Something Went Wrong.',
			);
		}
		echo json_encode($response);
		return;
	}
	
	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('template/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}
/* end of settings */ 