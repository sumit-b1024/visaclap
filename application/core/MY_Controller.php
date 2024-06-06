<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(0); ini_set('display_errors', 1);

date_default_timezone_set('Asia/Kolkata');

class MY_Controller extends CI_Controller
{
	
	public function __construct()
	{
			parent::__construct();
			// $this->_check_migration();
			$this->content = new stdClass();
			//$this->content->money_format 		= new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
			
			$this->content->current_directory   = strtolower($this->router->fetch_directory());
			$this->content->current_section     = strtolower($this->router->fetch_class());
			$this->content->current_sub_section = strtolower($this->router->fetch_method());
			$this->content->current_url         = str_replace(base_url(), '',current_url());
			$this->content->userdata            = $this->session->userdata();
			$this->content->_meta 				= Meta::getValue();
			
			$this->_check_access();
			$this->_get_sess_expiration_time();
			
			$this->content->pagetitle           = '';
			$this->content->breadcrumb          = [];

			// $me_access = $this->activity_model->get_access($this->session->userdata('user_id'));
			// $this->content->sub_menu     		= (!empty($me_access) ? json_decode($me_access->sub) : '');
			// $this->content->main_menu       	= (!empty($me_access) ? json_decode($me_access->main) : '');
			
			$enc_password = $this->hash_password('123456');
	}

	protected function set_pagetitle($title)
	{
			$this->content->pagetitle = $title;
	}

	protected function set_breadcrumb($arr)
	{
			$this->content->breadcrumb = $arr;
	}
	
	private function _check_migration()
	{
			$this->config->load('migration');
			if($this->config->item('migration_enabled'))
			{
					$this->load->library('migration');
					if($this->migration->latest())
					{
							$this->nectar->init_queries();
					}
			}
	}

	private function _get_sess_expiration_time()
	{
			if($this->session->userdata('user_id'))
			{
					$this->config->load('config');
					$this->content->sess_expiration_time = $this->config->item('sess_expiration') * 1000;
			}
	}

	private function _check_access()
	{
		$logged_in_user = $this->session->userdata('user_id');
		$folder         = $this->content->current_directory;
		$class          = $this->content->current_section;
		$method         = $this->content->current_sub_section;
		$access_for     = $class;
		$modify_for     = $class;
		
		if(isset($folder) && !empty($folder))
		{
			$access_for = $folder.$class;
		}

		if(isset($method) && !empty($method) && $method != 'index')
		{
			$modify_for = $class.'/'.$method;
		}

		$user_role  = $this->session->userdata('user_role');
		$permission = [];
		$permission = json_decode( $this->nectar->rolewise_access($user_role) );
		$is_ajax    = $this->input->is_ajax_request();

		########## Check protected pages ###########
		if( !in_array($access_for, $permission->public) )
		{
			if( in_array($access_for, $permission->protected) )
			{
				if( !$logged_in_user )
				{
					if ( $this->input->is_ajax_request() )
					{
						show_401();
					} else {
						redirect('account/login');
					}
				}
			}
			else
			{
				if( !$logged_in_user )
				{
					if ( $this->input->is_ajax_request() )
					{
						show_401();
					} else {
						redirect('account/login?continue='.current_url());
					}
				}
				else if( !in_array($access_for, $permission->private->access) )
				{
					show_403();
				}
				else if( in_array($modify_for, $permission->private->not_modify) )
				{
					show_403();
				}
				else
				{ 
				}
			}
		} else {
			//echo 'public access';
		}
	}

	protected function hash_password($password)
	{
			$enc_key = $this->config->item('encryption_key');
			$options = [
			    'salt' => '_Key&123$@!#'.$enc_key.'&123$@!#_',
			];
		
			return @password_hash($password, PASSWORD_BCRYPT, $options);
	}

	protected function _send_reset_link($user_data,$reset_code, $template)
	{
			$name = toProperCase($user_data->first_name .' '.$user_data->last_name);
			$data = array(
					'name'       => $name,
					'reset_link' => base_url().'account/reset-password/'.$reset_code
			);

			$this->load->library('email_service');
			$email_data                = new Send_email_options();
			$email_data->email_to      = $user_data->email;
			$email_data->email_subject = BASENAME . ' | Reset Password';
			
			if(!empty($template))
			{
				$email_data->template = $template;
			}
			$email_data->data = $data;

			if($this->email_service->send_email($email_data))
			{
				return TRUE;
			}
		
			return FALSE;
	}

	##### activity log #####
	protected function _activity_log($id, $action, $module)
	{
			$activity = new Activity_entity();
			$activity->relative_id = $id;
			$activity->module      = $module;
			$activity->action      = $action;
			$activity->ip          = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'UNKNOWN';
			$activity->created_by  = $this->session->userdata('user_id');
			$activity->created_on  = time();
			
			if($this->activity_model->add_data(TBL_ACTIVITY_LOG, $activity))
			{
					return TRUE;
			}
			
			return FALSE;
	}

	public function _menu_access($access)
	{
			$sub_menu = $this->content->sub_menu;

			if(!empty($access))
			{
					if( !in_array($access, $sub_menu) )
					{
							show_403();
					}
			}
	}
	

}
/* end my controller */