<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Add_franchise_staff extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model(array('user_model', 'setting_model','supplier_model'));
	}

	function index()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'View Staff';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->get_all_staff 	= 	$this->setting_model->get_all_staff_data();
		
		$this->load_view('view_staff', $title);

	}

	function add(){
		/** page level css & js * */
		$this->content->extra_js  = array('common');
		$this->content->extra_css = array();

		$title = 'Add Staff';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Staff'      => 	'franchise/add_franchise_staff',
			$title         	=> 	NULL
		);
		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->load_view('add_edit_staff', $title);
	}
	function store(){
		$post = $this->input->post();

		if($post){
			if($post['record_id']){

				$staff_array = array(
					'first_name' => $post['s_name'],
					'email' => $post['s_email'],
					'mobile' => $post['s_mobile'],
					'updated_by' => $this->session->userdata('user_id'),
					'updated_on' => 	time(),
					'role' => User_role::FRANCHISE_STAFF,
				);
				if(isset($post['s_password']) && $post['s_password'] != ""){
					$staff_array['password'] = $this->hash_password($post['s_password']);
				}
				$this->setting_model->update_fran_staff_data($staff_array,$post['record_id']);

				$response = array(
					'status' => 'success',
					'message' => 'Staff Updated Successfully.',
				);

			}else{
				if(isset($post['s_password']) && $post['s_password'] != ""){
					$password = $post['s_password'];
				}else{
					$password = "123456";
				}
				$staff_array = array(
					'first_name' => $post['s_name'],
					'email' => $post['s_email'],
					'mobile' => $post['s_mobile'],
					'password' => $this->hash_password($password),
					'created_by' => $this->session->userdata('user_id'),
					'created_on' => time(),
					'role' => User_role::FRANCHISE_STAFF,
					'user_status' => User_status::ACTIVE,
				);
				$store_staff_data = $this->setting_model->store($staff_array,TBL_USERS);
				if(isset($store_staff_data) && $store_staff_data > 0){
					$response = array(
						'status' => 'success',
						'message' => 'Staff Created Successfully.',
					);
				}else{
					$response = array(
						'status' => 'failed',
						'message' => 'Something Went Wrong.',
					);
				}
			}
		}else{
			$response = array(
				'status' => 'failed',
				'message' => 'Something Went Wrong.',
			);
		}
		echo json_encode($response);
		return;
	}
	function edit_staff(){
		/** page level css & js * */
		$this->content->extra_js  = array('common');
		$this->content->extra_css = array();
		$id = $this->uri->segment(4);
		if(!$id)
		{
			redirect('franchise/add_franchise_staff', 'refresh');
		}
		$title = 'Edit Staff';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Staff'      => 	'franchise/add_franchise_staff',
			$title         	=> 	NULL
		);
		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->old_data   	= 	$this->setting_model->fetch_old_staff_data($id);
		$this->load_view('add_edit_staff', $title);

	}
	function remove_staff(){
		if($this->input->post('id')){
			$this->setting_model->delete_fran_staff($this->input->post('id'));
			$response = array(
				'status' => 'success',
				'message' => 'Staff Removed successfully',
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
		$this->masterpage->setMasterPage('franchise_setting_master');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('franchise/staff/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}