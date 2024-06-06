<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

			// tables
		
		$this->tbl_template = 	TBL_OFFER;
		$this->load->library('excel');
		$this->load->library('Nectar');


		$this->load->model(array('setting_model'));
	}

	function index()
	{ 

		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2','jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'Ad';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list   = 	$this->setting_model->get_offer();
		$this->load_view('offer_view', $title);
	}

	

	function add_offer()
	{ 

		$this->content->extra_js  = array('responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker');
		$this->content->extra_css = array();

		$title = 'Add Ad';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		
		$this->load_view('add_offer', $title);
	}
	function saveoffer()
	{
			$post = $this->input->post();

			
			$template = array();
			$template['name'] 			        = 		strtolower($post['offer_name']);
			$template['offer_date']  			= 		$post['offer_date'];
			
			

			if($this->input->post('offer_id')){

				$template['updated_by'] 			= 	$this->session->userdata('user_id');
				$template['updated_at'] = date('Y-m-d H-i:s');
				$this->setting_model->update_offer_data($template,$this->input->post('offer_id'));
				$template_id = $this->input->post('offer_id');

				foreach($post["sub_offer_id"] as $key => $value){
					if($value == 0){
						
						$tmp_nm=$_FILES['images']['tmp_name'][$key];
						$target_dir="upload/offer_img/";
						$file_nm=basename($_FILES['images']['name'][$key]);
						$doc_nm=pathinfo($_FILES['images']['name'][$key]);
						$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
						$img_path=$target_dir.$rename_doc;
						$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	
						$item_image_data=array(
							'offer_id' => $template_id,
							'link' =>$post["offer_link"][$key],
							'image'=>$img_path
						);
						$this->db->insert(TBL_SUB_OFFER,$item_image_data);
						
					}else{
						if($_FILES['images']['tmp_name'][$key] != ""){
							$tmp_nm=$_FILES['images']['tmp_name'][$key];
							$target_dir="upload/offer_img/";
							$file_nm=basename($_FILES['images']['name'][$key]);
							$doc_nm=pathinfo($_FILES['images']['name'][$key]);
							$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
							$img_path=$target_dir.$rename_doc;
							$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	
							$item_image_data=array(
								'offer_id' => $template_id,
								'link' =>$post["offer_link"][$key],
								'image'=>$img_path
							);
							$oldimage = $this->setting_model->get_suboffer_image($post['sub_offer_id'][$key]);
							if (file_exists($oldimage->image)) {
							    @unlink($oldimage->image);
							} 
							$column_id = 'id';
							$this->setting_model->update_method(TBL_SUB_OFFER,$item_image_data,$post['sub_offer_id'][$key],$column_id);

						}
					}
					
				}
				
				
			}else{

				$template['created_by'] 			= 		$this->session->userdata('user_id');
				$template['created_at'] 			= 		date('Y-m-d H-i:s');
				
				$template_id =  $this->setting_model->store_offer_data($template);

					
					
					if ($_FILES['images']['tmp_name'][0] !== "") {
					foreach ($_FILES['images']['name'] as $key => $val) {
						$tmp_nm=$_FILES['images']['tmp_name'][$key];
						$target_dir="upload/offer_img/";
						$file_nm=basename($_FILES['images']['name'][$key]);
						$doc_nm=pathinfo($_FILES['images']['name'][$key]);
						$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
						$img_path=$target_dir.$rename_doc;
						$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	
						$item_image_data=array(
							'offer_id' => $template_id,
							'link' =>$post["offer_link"][$key],
							'image'=>$img_path
						);
						$this->db->insert(TBL_SUB_OFFER,$item_image_data);
					}
				}


			$response = array('status' => 'success', 'msg' => 'Offer Updated Successfully.');
			}
			
				
			
			echo json_encode($response);
			return;
			
	}

	function edit_offer()
	{       
		$id = $this->uri->segment(3);

		if( !$id )
		{
			redirect('settings/users', 'refresh');
		}
		/** page level css & js * */
		$this->content->extra_js  = array('responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker');
		$this->content->extra_css = array();

		

		$title = 'Edit Ad';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->load->library('form_validation');

		

		$this->content->title   	= 	$title;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->edit 		= 	$this->setting_model->get_offer_detail($id);
		$this->content->all_sub_offer = $this->setting_model->get_all_offer_entry($id);
		
		$this->load_view('add_offer', $title);
	}

	function remove_offer(){
		if($this->input->post('id')){
			$this->setting_model->delete_offer($this->input->post('id'));
			$response = array(
				'status' => 'success',
				'message' => 'Offer Removed successfully',
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

	function statuschnage(){
		if($this->input->post('id')){
			$offer = array();
			$offer["status"]= $this->input->post('status');
			$this->setting_model->update_offer_status($offer,$this->input->post('id'));
			$response = array(
				'status' => 'success',
				'message' => 'Status Update successfully',
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
	function remove_offer_banner(){

		if($this->input->post('r_id')){
			$oldimage = $this->setting_model->get_suboffer_image($this->input->post('r_id'));
							if (file_exists($oldimage->image)) {
							    @unlink($oldimage->image);
							} 
			$this->setting_model->remove_suboffer_banner($this->input->post('r_id'));
			$response = array(
				'status' => 'success',
				'message' => 'Delete  successfully',
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
		$this->masterpage->addContentPage('offer/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}
/* end of settings */ 