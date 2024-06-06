<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Nectar
{
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	public function init_queries()
	{
		/* Add super admin details */
		if($this->CI->db->count_all('user_master') == 0)
		{
			$user = array(
				'role'        => User_role::SUPER_ADMIN,
				'first_name'  => 'Super',
				'last_name'   => 'Admin',
				'mobile'      => '0987654321',
				'email'       => 'admin@vc.com',
				'password'    => '$2y$10$X0tleSYxMjMkQCEjQHBybuOHIVYM8KghOYmjQZMWKnCGu.0NNe9/.',
				'user_status' => User_status::ACTIVE,
				'created_on'  => time(),
				'updated_on'  => time()
			);

			$this->CI->db->insert('user_master', $user);
		}
	}

	public function loggedin_user()
	{
		return ($this->CI->session->userdata('user_name') != '') ? $this->CI->session->userdata('user_name') : '';
	}

	public function rolewise_access($user_role)
	{
		$permission              = [];
		$permission['public']    = ['common', 'account','account/forgotpassword','apply_visa','franchiseweb'];
		$permission['protected'] = ['dashboard'];

		if(isset($user_role) || !empty($user_role))
		{
			$permission['private'] = [];

			if( in_array($user_role, [User_role::SUPER_ADMIN]) )
			{
				$permission['private']['access'] = [
					'dashboard',
					'supplier',
					'settings',
					'settings/tourist_attraction_update_status',
					'reset_pwd',
					'pool_master',
					'add_place',
					'notification',
					'currency',
					'itenerary',
					'settings/country_list',
					'template',
					'offer',
					'fieldarrange',
					'franchise/bookflight',
					'hotelbooking',
					'domainlist',
					'freecoupon',
					'bookingprofit',
					'franchise/flightreport'


				];
				$permission['private']['not_modify'] = [];
			}
			else if ( in_array($user_role, [User_role::MANAGER]) )
			{
				$permission['private']['access'] = [
					'manager/dashboard',
				];
				$permission['private']['not_modify'] = [];
			}
			else if ( in_array($user_role, [User_role::FRANCHISE, User_role::CUSTOMER]) )
			{
				$permission['private']['access'] = [
					'franchise/dashboard',
					'franchise/settings',
					'franchise/enquiry',
					'franchise/template',
					'franchise/email_template',
					'franchise/credencials',
					'franchise/reports',
					'franchise/reset_pwd',
					'pool_master',
					'notification',
					'franchise/itenerary',
					'franchise/request',
					'franchise/get_form',
					'franchise/add_franchise_staff',
					'franchise/batch',
					'franchise/globel_setting',
					'franchise/bookflight',
					'hotelbooking',
					'franchise/flightreport',
					
				];
				$permission['private']['not_modify'] = [];
			}
			else if ( in_array($user_role, [User_role::FRANCHISE_STAFF]) )
			{
				$permission['private']['access'] = [
					 'franchise/staff/enquiry',
					//'franchise/enquiry',
					'franchise/enquiry',
					'franchise/itenerary',
					'franchise/reports',
					'notification',
					'pool_master',
					'franchise/request',
					'franchise/batch',
					'franchise/bookflight',
					'hotelbooking',
					'franchise/flightreport',
					'franchise/staff/enquiry_notification'
				];
				$permission['private']['not_modify'] = [];
			}
			if(empty($user_role) || (isset($permission['private']) && count($permission['private']) == 0))
			{
				show_410();
			}
		}

		return json_encode($permission);
	}

	public function generate_url_key($name, $table = 'user_master', $column_name = 'url_key', $index = 0)
	{
		$key = url_title($name, '-', TRUE);
		if($index >0)
		{
			$key = $key.$index;
		}
		
		$this->CI->db->where($column_name, $key);
		$this->CI->db->from($table);
		$cnt = $this->CI->db->count_all_results();
		
		if($cnt > 0)
		{
			$index++;
			return $this->generate_url_key($name, $table, $column_name, $index);
		}

		return $key;
	}

}



