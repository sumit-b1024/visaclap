<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cred extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Packages_model'));
	}
	public function index()
	{
		$this->load->view('includes/login');
	}
	public function register()
	{
		$this->load->view('includes/register');
	}
	function register_user(){
    $db2 = $this->load->database('visaclap', TRUE); 

		if($this->input->post()){
			$post = $this->input->post();
			$reg_array = array(
				'name' => $post['u_name'],
				'email' => $post['u_email'],
				'country_name' => $post['u_country'],
				'password' => md5($post['u_password']),
				'created_at' => date('Y-md-d H:i:s'),
			);
			$store_reg = $this->Packages_model->store('user_login',$reg_array);
			if($store_reg > 0){
				$response = array('status'=> 'success','msg' => "Registered Successfully.");
			}else{
				$response = array('status'=> 'failed','msg' => "Something Went Wrong.");
			}
		}else{
			$response = array('status'=> 'failed','msg' => "Something Went Wrong.");
		}
		echo json_encode($response);
		return;
	}
	function email_check_duplication(){
		if($this->input->post('u_email')){
			$db2->select('email');
			$db2->from('user_login');
			$db2->where('email',$this->input->post('u_email'));
			$query = $db2->get();
			if ($query->num_rows() > 0) {
				echo json_encode(FALSE);
			} else{
				echo json_encode(TRUE); 
			}
		}
	}

	function login_register_user(){
		if($this->input->post()){
			$check_user_register_or_not = $this->Packages_model->check_email_existance($this->input->post('u_email'));

			if(!empty($check_user_register_or_not)){

				$chk_credencials = $this->Packages_model->check_user_credencials($this->input->post('u_email'),$this->input->post('u_pwd'));
				if(!empty($chk_credencials)){
					$response = array('status'=> 'success','msg' => "Login Successfull.");
					$this->session->set_userdata('user_id',$chk_credencials->id);
					$this->session->set_userdata('name',$chk_credencials->name);
				}else{
					$response = array('status'=> 'failed','msg' => "Wrong Credencials.");
				}
			}else{
				$response = array('status'=> 'failed','msg' => "Please Register Your Email.");

			}
		}else{
			$response = array('status'=> 'failed','msg' => "Something Went Wrong.");

		}
		echo json_encode($response);
		return;
	}

	function logout_user(){
		session_destroy();
		header("Location: http://localhost/visa_api/api/cred");
		exit();

	}
}
