<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

			// tables
		$this->tbl_users   		= 		TBL_USERS;
		$this->tbl_profile 		= 		TBL_PROFILE;
		$this->tbl_category 	= 		TBL_CATEGORY;
		$this->tbl_countries 	= 		TBL_COUNTRIES;
		$this->tbl_cities 		= 		TBL_CITIES;
		$this->tbl_activity 	= 		TBL_ACTIVITY;

		$this->load->model(array('user_model', 'setting_model','supplier_model'));
	}

	function index()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array();
		$this->content->extra_css = array();

		$title = 'Dashboard';
		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';

		$this->load_view('dashboard_view', $title);
	}

	

	function users()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'Users';
		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list 	= 	$this->user_model->get_user();

		$this->load_view('user_view', $title);
	}

	function add_user()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array();

		$title = 'Add User';
		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			'Users'      	=> 	'settings/users',
			$title         	=> 	NULL
		);

		if($this->form_validation->run('add-user'))
		{
			$post = $this->input->post();
					// xdebug($post);

			$user = array();
			$user['first_name'] 			= 		strtolower($post['first_name']);
			$user['last_name']  			= 		strtolower($post['last_name']);
			$user['email']      			= 		strtolower($post['email']);
			$user['email']      			= 		strtolower($post['email']);
			$user['mobile']     			= 		$post['mobile'];		
			$user['role']       			= 		$post['role'];
			$user['password']   			= 		$this->hash_password('123456');
			
			$user['user_status']   			= 		User_status::ACTIVE;
			$user['created_by'] 			= 		$this->session->userdata('user_id');
			$user['created_on'] 			= 		time();

			$user_id = $this->user_model->add_data($this->tbl_users, $user);

			if( isset($user_id) && !empty($user_id) )
			{
				$profile = array();
				$profile['user_id']          = 		$user_id;
				$profile['address']          = 		strtolower($post['address']);
				$profile['country']          = 		strtolower($post['country']);
				$profile['state']          	 = 		strtolower($post['state']);
				$profile['city']             = 		strtolower($post['city']);
				$profile['postal_code']      = 		$post['postal_code'];

				$profile_id = $this->user_model->add_data($this->tbl_profile, $profile);

				if( isset($profile_id) && !empty($profile_id) )
				{
					redirect('settings/users', 'refresh');
				}
			}
		}

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->role   	= 	User_role::getValue();

		$this->load_view('add_user', $title);
	}
	function notsetapikey()
	{ 
		
		/** page level css & js * */
		$this->content->extra_js  = array('');
		$this->content->extra_css = array();

		$title = 'Please First Api Key Set';
		$this->content->breadcrumb = array(
			'Dashboard'      => '',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';

		$this->load_view('firstapikeyset', $data);
	}
	function edit_user()
	{       
		$id = $this->uri->segment(3);
		if( !$id )
		{
			redirect('settings/users', 'refresh');
		}

		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array();

		$title = 'Edit User';
		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			'Users'      	=> 	'settings/users',
			$title         	=> 	NULL
		);

		$this->load->library('form_validation');

		if($this->form_validation->run('edit-user'))
		{
			$post = $this->input->post();

			$user = array();
			$user['user_id'] 			    = 		$id;
			$user['first_name'] 			= 		strtolower($post['first_name']);
			$user['last_name']  			= 		strtolower($post['last_name']);
			$user['email']      			= 		strtolower($post['email']);
			$user['mobile']     			= 		$post['mobile'];		
			$user['role']       			= 		$post['role'];
			$user['updated_by'] 			= 		$this->session->userdata('user_id');
			$user['updated_on'] 			= 		time();
			$user_id = $this->user_model->edit_data($this->tbl_users, $user, 'user_id', $id);

			if( isset($user_id) && !empty($user_id) )
			{				
				$profile = array();
				$profile['user_id']          = 		$user_id;
				$profile['address']          = 		strtolower($post['address']);
				$profile['country']          = 		strtolower($post['country']);
				$profile['state']          	 = 		strtolower($post['state']);
				$profile['city']             = 		strtolower($post['city']);
				$profile['postal_code']      = 		$post['postal_code'];

				$profile_id = $this->user_model->edit_data($this->tbl_profile, $profile, 'user_id', $user_id);

				if( isset($profile_id) && !empty($profile_id) )
				{
					redirect('settings/users', 'refresh');
				}
			}
		}

		$this->content->title   	= 	$title;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->role   		= 	User_role::getValue();
		$this->content->edit 		= 	$this->user_model->user_detail($id);

		$this->load_view('add_user', $title);
	}

	function category()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'Category Manage';
		$this->content->breadcrumb = array(
			'Category'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list 	= 	$this->setting_model->get_category();

		$this->load_view('category_view', $title);
	}

	function add_category()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array();

		$title = 'Add Category';
		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			'Category'      => 	'settings/category',
			$title         	=> 	NULL
		);

		if($this->form_validation->run('add-category'))
		{
			$post = $this->input->post();
					// xdebug($post);

			$add = array();
			$add['name'] 				= 		$post['name'];
			$add['created_by'] 			= 		$this->session->userdata('user_id');
			$add['created_on'] 			= 		time();
			$category_id = $this->setting_model->add_data($this->tbl_category, $add);

			if( isset($category_id) && !empty($category_id) )
			{
				redirect('settings/category', 'refresh');
			}
		}

		$this->content->title   	= 	$title;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';

		$this->load_view('add_category', $title);
	}

	function edit_category()
	{       
		$id = $this->uri->segment(3);
		if( !$id )
		{
			redirect('settings/category', 'refresh');
		}

		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array();

		$title = 'Edit Category';
		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			'Category'      => 	'settings/category',
			$title         	=> 	NULL
		);

		$this->load->library('form_validation');

		if($this->form_validation->run('edit-category'))
		{
			$post = $this->input->post();

			$edit = array();
			$edit['category_id'] 		= 		$id;
			$edit['name'] 				= 		$post['name'];
			$edit['updated_by'] 		= 		$this->session->userdata('user_id');
			$edit['updated_on'] 		= 		time();
			$category_id = $this->setting_model->edit_data($this->tbl_category, $edit, 'category_id', $id);

			if( isset($category_id) && !empty($category_id) )
			{
				redirect('settings/category', 'refresh');
			}
		}

		$this->content->title   	= 	$title;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->edit 		= 	$this->setting_model->category_detail($id);

		$this->load_view('add_category', $title);
	}

	function activity()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'Activity Manage';
		$this->content->breadcrumb = array(
			'Activity'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list 	= 	$this->setting_model->get_activities();

		$this->load_view('activity_view', $title);
	}

	function add_activity()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array();

		$title = 'Add Activity';
		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			'Activity'      => 	'settings/activity',
			$title         	=> 	NULL
		);

		if($this->form_validation->run('add-activity'))
		{
			$post = $this->input->post();

			$add = array();
			$add['name'] 				= 		$post['name'];
			$add['category'] 			= 		$post['category'];
			$add['country'] 			= 		$post['country'];
			$add['city'] 				= 		$post['city'];
			$add['price'] 				= 		$post['price'];
			$add['created_by'] 			= 		$this->session->userdata('user_id');
			$add['created_on'] 			= 		time();
			$activity_id = $this->setting_model->add_data($this->tbl_activity, $add);

			if( isset($activity_id) && !empty($activity_id) )
			{
				redirect('settings/activity', 'refresh');
			}
		}

		$this->content->title   	= 	$title;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->_category 	= 	$this->setting_model->get_category();
		$this->content->_countries 	= 	$this->setting_model->get_table_data($this->tbl_countries, null, 'id, name');
		$this->content->_cities 	= 	$this->setting_model->get_table_data($this->tbl_cities, null, 'id, name');

		$this->load_view('add_activity', $title);
	}

	function edit_activity()
	{       
		$id = $this->uri->segment(3);
		if( !$id )
		{
			redirect('settings/activity', 'refresh');
		}

		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array();

		$title = 'Edit Activity';
		$this->content->breadcrumb = array(
			'Settings'      => 	'',
			'Activity'      => 	'settings/activity',
			$title         	=> 	NULL
		);

		$this->load->library('form_validation');

		if($this->form_validation->run('edit-activity'))
		{
			$post = $this->input->post();

			$edit = array();
			$edit['activity_id'] 		= 		$id;
			$edit['name'] 				= 		$post['name'];
			$edit['category'] 			= 		$post['category'];
			$edit['country'] 			= 		$post['country'];
			$edit['city'] 				= 		$post['city'];
			$edit['price'] 				= 		$post['price'];
			$edit['updated_by'] 		= 		$this->session->userdata('user_id');
			$edit['updated_on'] 		= 		time();
			$activity_id = $this->setting_model->edit_data($this->tbl_activity, $edit, 'activity_id', $id);

			if( isset($activity_id) && !empty($activity_id) )
			{
				redirect('settings/activity', 'refresh');
			}
		}

		$this->content->title   	= 	$title;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->_category 	= 	$this->setting_model->get_category();
		$this->content->_countries 	= 	$this->setting_model->get_table_data($this->tbl_countries, null, 'id, name');
		$this->content->_cities 	= 	$this->setting_model->get_table_data($this->tbl_cities, null, 'id, name');
		$this->content->edit 		= 	$this->setting_model->activity_detail($id);

		$this->load_view('add_activity', $title);
	}

	#### hotel ####
	function meta()
	{
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','select2.full.min','select2');
		$this->content->extra_css = array();

		$meta = $this->uri->segment(4);
		if(empty($meta) || !isset($meta))
		{
			redirect('settings', 'refresh');
		}

		$is_meta = Meta::getKey(strtoupper($meta));

		if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::HOTEL) {
			$title = 'Hotel';
		} else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ROOM_CATEGORY) {
			$title = 'Room Category';
		} else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::TOURIST_ATTRACTION) {
			$title = 'Tourist Attraction';
		}

		$this->content->breadcrumb = array(
			'Dashboard'  => '',
			$title     	=> null
		);

		$search=array();
		if(isset($_GET['country']))
		{
			$search=array('country'=>$_GET['country']);
		}
		// xdebug($search);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$query 	= 	$this->setting_model->get_all_meta_list($is_meta);
		$this->content->_category   = 	$this->setting_model->get_category();
		// $this->content->_view = null;

		// if($query){
		$this->content->_view =  $query;
		// }

		$this->content->_countries   = 	$this->supplier_model->get_all_country();

		$this->content->get_all_city_by_country_id = $this->setting_model->get_all_city_by_country_id($_GET['country']);

 	// xdebug($this->content->get_all_city_by_country_id);

		$this->load_view('hotel_list_view', $title);
	}

	function add_meta()
	{
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2','summernote/summernote1','summernote');
		$this->content->extra_css = array();

		$meta = $this->uri->segment(4);

		if(empty($meta) || !isset($meta))
		{
			redirect('settings', 'refresh');
		}

		$is_meta = Meta::getKey(strtoupper($meta));

		if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::HOTEL) {
			$title    = 'Add Hotel';
			$cats     = $this->setting_model->get_meta_list(Meta::ROOM_CATEGORY);
		} else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ROOM_CATEGORY) {
			$title    = 'Add Room Category';
			$cats     = '';
			$supplier = '';
		} else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::TOURIST_ATTRACTION) {
			$title 	  = 'Add Tourist Attraction';
			$cats     = '';
			$supplier = '';
		}

		$this->content->breadcrumb = array(
			'Dashboard'  => '',
			$title     	=> null
		);

		$this->content->title   	= 	$title;
		$this->content->meta    	= 	$meta;
		$this->content->is_meta 	= 	$is_meta;
		$this->content->cats    	= 	$cats;
		// $this->content->_countries 	= 	$this->setting_model->get_table_data($this->tbl_countries, null, 'id, name');
		$this->content->_countries   = 	$this->supplier_model->get_all_country();
		$this->content->_category   = 	$this->setting_model->get_category();
		// $this->content->_cities 	= 	$this->setting_model->get_table_data($this->tbl_cities, null, 'id, name');

		$this->load_view('hotel_add_edit_view', $title);
	}
	
	function edit_meta()
	{
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2','summernote/summernote1','summernote','sweet-alert/sweetalert.min','sweet-alert');
		$this->content->extra_css = array();

		$meta    = $this->uri->segment(4);
		$meta_id = $this->uri->segment(5);

		if(!$meta_id)
		{
			redirect('settings', 'refresh');
		}

		$is_meta = Meta::getKey(strtoupper($meta));


		if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::HOTEL)
		{
			$title    = 'Edit Hotel';
			$cats     = $this->setting_model->get_meta_list(Meta::ROOM_CATEGORY);
		} else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ROOM_CATEGORY) {
			$title    = 'Edit Room Category';
			$cats     = '';
			$supplier = '';
		} else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::TOURIST_ATTRACTION) {
			$title 	  = 'Edit Tourist Attraction';
			$cats     = '';
			$supplier = '';
		}

		$this->content->breadcrumb = array(
			'Dashboard'  => '',
			$title     	=> null
		);

		$this->content->title     	= 	$title;
		$this->content->meta      	= 	$meta;
		$this->content->is_meta   	= 	$is_meta;
		$this->content->cats      	= 	$cats;
		$this->content->view      	= 	$this->setting_model->get_meta_details($meta_id);
		$this->content->all_sub_things = $this->setting_model->get_all_things_entry($meta_id);
		// $this->content->_countries 	= 	$this->setting_model->get_table_data($this->tbl_countries, null, 'id, name');
		// $this->content->_cities 	= 	$this->setting_model->get_table_data($this->tbl_cities, null, 'id, name');
		$this->content->_countries   = 	$this->supplier_model->get_all_country();
		$fetch_all_state_by_country = $this->supplier_model->getch_all_state_by_id($this->content->view->country);
		$all_state_id = array_column($fetch_all_state_by_country, 'id');
		$this->content->_cities = $this->setting_model->getch_all_cities_by_id($all_state_id);
		$this->content->_category   = 	$this->setting_model->get_category();
		
		$this->load_view('hotel_add_edit_view', $title);
	}

	function ajax_add_hotel()
	{
		/*echo '<pre>';	
		print_r($this->input->post());
		exit;	*/
		// if($this->input->post())
		// {
		$post = $this->input->post();
		$result = preg_replace('/[ ,]+/', '-', trim($post['name']));
		if( !empty($post['meta_id']) && isset($post['meta_id']) )
		{
			$meta['meta_id']    =  $post['meta_id'];
			$meta['name']       =  encode($post['name']);
			$meta['meta_slug']       =  encode($result);
			$meta['is_meta']    =  $post['is_meta'];

			if( isset($post['is_meta']) && !empty($post['is_meta']) && in_array($post['is_meta'], [Meta::HOTEL, Meta::TOURIST_ATTRACTION]) )
			{
				$meta['star']          	= 	$post['star'];
				$meta['city']          	= 	$post['city'];
				$meta['country']        = 	$post['country'];
				$meta['room_category'] 	= 	$post['room_category'];
				$meta['sales_rate']    	= 	$post['sales_rate'];
				$meta['room_price']    	= 	$post['room_price'];
				$meta['address']       	= 	$post['address'];
				$meta['description']    = 	$post['description'];
				$meta['includedescription']    = 	$post['includedescription'];
				$meta['duration']    = 	$post['duration'];
				$meta['price']    = 	$post['price'];
				$meta['latitude']    = 	$post['latitude'];
				$meta['longitude']    = 	$post['longitude'];
				$meta['category_id']    = 	implode(',',$post['turist_category']);
				$meta['is_local_or_global']  = $this->session->userdata('user_role') == 1 ? "2" : "1";
			}
			$meta['updated_by'] = $this->session->userdata('user_id');
			$meta['updated_on'] = time();


			if(in_array($post['is_meta'], [Meta::TOURIST_ATTRACTION]) )
				{

					$t_id = $post['things_id'];
					foreach ($t_id as $key => $t_data) {
					$things = $post['things'][$key];
						

						$sub_array = array(
							'master_id' => $post['meta_id'],
							'things_name' => $things,
							'created_at' => date('Y-m-d H:i:s'),
						);

						
						if($t_data == 0){
							$sub_array['created_at'] = date('Y-m-d H:i:s');
							$this->setting_model->store($sub_array,TBL_SUB_TOURIST_THINGS);
						}else{
							$sub_array['updated_at'] = date('Y-m-d H:i:s');
							$this->setting_model->update_tourist_thing_elements($sub_array,$t_data);
						}	

					}
				}		


			if ($_FILES['turist_att_image']['tmp_name'][0] !== "") {
				foreach ($_FILES['turist_att_image']['name'] as $key => $val) {
					$tmp_nm=$_FILES['turist_att_image']['tmp_name'][$key];
					$target_dir="upload/turist_img/";
					$file_nm=basename($_FILES['turist_att_image']['name'][$key]);
					$doc_nm=pathinfo($_FILES['turist_att_image']['name'][$key]);
					$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
					$img_path=$target_dir.$rename_doc;
					$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	
					$item_image_data=array(
						'master_id' => $post['meta_id'],
						'img_name'=>$img_path,
						'created_at'=>date('Y-m-d H:i:s'),
					);
					$this->db->insert(TBL_TURIST_ATT_IMAGE,$item_image_data);
				}
			}

			$meta_id = $this->setting_model->edit_meta($meta);
			if( !empty($meta_id) || isset($meta_id) || count($meta_id) > 0 )
			{
				echo json_encode(array('status'=> 'success', 'message'=> Meta::getValue($post['is_meta']).' Updated successfully'));
			}
			else
			{
				echo json_encode(array('status'=> 'failed'));
			}
		}
		else
		{
			$meta['name']       = encode($post['name']);
			$meta['meta_slug']       =  encode($result);
			$meta['is_meta']    = $post['is_meta'];

			if( isset($post['is_meta']) && !empty($post['is_meta']) && in_array($post['is_meta'], [Meta::HOTEL, Meta::TOURIST_ATTRACTION]) )
			{
				$meta['star']          = $post['star'];
				$meta['city']          = $post['city'];
				$meta['country']       = $post['country'];
				$meta['room_category'] = $post['room_category'];
				$meta['sales_rate']    = $post['sales_rate'];
				$meta['room_price']    = $post['room_price'];
				$meta['address']       = $post['address'];
				$meta['duration']    = 	$post['duration'];
				$meta['price']    = 	$post['price'];
				$meta['latitude']    = 	$post['latitude'];
				$meta['longitude']    = 	$post['longitude'];
				$meta['category_id']    = 	implode(',',$post['turist_category']);
				$meta['is_local_or_global']  = $this->session->userdata('user_role') == 1 ? "2" : "1";
				$meta['description']    = 	$post['description'];
				$meta['includedescription']    = 	$post['includedescription'];

			}
			$meta['created_by'] = $this->session->userdata('user_id');
			$meta['created_on'] = time();

			// $record_id = $this->setting_model->add_meta($meta);
			$this->db->insert(TBL_PACKAGE_META,$meta);
			$record_id = $this->db->insert_id();
			if(in_array($post['is_meta'], [Meta::TOURIST_ATTRACTION]) )
				{
					foreach ($post['things'] as $key => $value) {
						$things = $post['things'][$key];
						

						$sub_array = array(
							'master_id' => $record_id,
							'things_name' => $things,
							'created_at' => date('Y-m-d H:i:s'),
						);

						$this->setting_model->store($sub_array,TBL_SUB_TOURIST_THINGS);

					}
				}	
				// if($record_id = $this->setting_model->add_meta($meta))
				// {
			if ($_FILES['turist_att_image']['tmp_name'][0] !== "") {
				foreach ($_FILES['turist_att_image']['name'] as $key => $val) {
					$tmp_nm=$_FILES['turist_att_image']['tmp_name'][$key];
					$target_dir="upload/turist_img/";
					$file_nm=basename($_FILES['turist_att_image']['name'][$key]);
					$doc_nm=pathinfo($_FILES['turist_att_image']['name'][$key]);
					$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
					$img_path=$target_dir.$rename_doc;
					$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	
					$item_image_data=array(
						'master_id' => $record_id,
						'img_name'=>$img_path,
						'created_at'=>date('Y-m-d H:i:s'),
					);
					$this->db->insert(TBL_TURIST_ATT_IMAGE,$item_image_data);
				}
			} 
			echo json_encode(array('status' => 'success', 'message' => Meta::getValue($post['is_meta']).' Added successfully'));
				// }
		}

	}
	// }

	### media ###
	function media()
	{	
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array();

		$title = 'Add Media';
		$this->content->breadcrumb = array(
			'Settings'  => 'settings',
			$title     	=> null
		);

		$this->content->title 	= $title;
		$this->content->_hotel  = $this->setting_model->get_meta_list(Meta::HOTEL, 'asc');
		$this->load_view('media_add_edit_view', $title);
	}

	function ajaxAddMedia()
	{
		if($this->input->is_ajax_request())
		{
			$post = $this->input->post();
			//xdebug($post);

			// File Upload
			$filesCount = count($_FILES['images']['name']);

			for($i = 0; $i < $filesCount; $i++)
			{
				$_FILES['image']['name']     = $_FILES['images']['name'][$i];
				$_FILES['image']['type']     = $_FILES['images']['type'][$i];
				$_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
				$_FILES['image']['error']    = $_FILES['images']['error'][$i];
				$_FILES['image']['size']     = $_FILES['images']['size'][$i];

				$uploadPath = 'upload/media/';

				if(!is_dir($uploadPath))
				{
					mkdir($uploadPath, 0755, true);
				}

				$config['upload_path']   = $uploadPath;
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']      = 2097152;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('image'))
				{
					$fileData = $this->upload->data();
					$uploadData[$i]['image']      = $fileData['file_name'];
					$uploadData[$i]['meta_id']    = $post['hotel'];
					$uploadData[$i]['type']       = Media_type::HOTEL;
					$uploadData[$i]['created_by'] = $this->session->userdata('user_id');
					$uploadData[$i]['created_on'] = time();
				}
			}

			if(!empty($uploadData)) {
				$media_id = $this->setting_model->add_media($uploadData);
			}

			if(!empty($media_id)) {
				echo json_encode(array('status' => 'success'));
			}
		} else {
			show_400();
		}
	}
function remove_things(){
		if($this->input->post('r_id')){
			$this->db->set('is_delete',1);
			$this->db->where('id',$this->input->post('r_id'));
			$this->db->update(TBL_SUB_TOURIST_THINGS);
			$response = array('status' => 'success', 'msg' => 'Things Removed Successfully.');
		}else{
			$response = array('status' => 'failed', 'msg' => 'Something Went Wrong');
		}
		echo json_encode($response);
		return;
	}
	function get_media($meta_id) {
		$title = 'Media';
		$meta  = $this->setting_model->get_meta_details($meta_id);
		$is_meta = $meta->is_meta;

		if(isset($is_meta) && $is_meta == Meta::HOTEL)
		{
			$this->content->breadcrumb = array(
				'Settings'  => 'dashboard',
				'Hotel'     => 'settings/meta/hotel',
				$meta->name => 'settings/meta/hotel',
				$title      => null
			);
			$this->content->_list = $this->setting_model->get_media($meta_id, Media_type::HOTEL);
		}

		$this->content->title 	= $title;

		$this->load_view('media_view', $title);
	}

	function get_all_enquiry_images(){
		if($this->input->post()){
			$data['fetch_all_images'] = $this->setting_model->fetch_all_image_data($this->input->post('record_id'));
			$this->load->view('console/settings/view_all_enquiry_img',$data);
		}
	}

	function get_all_enquiry_records(){

		$data['meta'] = "tourist_attraction";
		$data['title'] = "Tourist Attraction";

		$is_meta = Meta::getKey(strtoupper($data['meta']));

		$data['_view'] 	= 	$this->setting_model->get_all_meta_list($is_meta);
		$this->load->view('franchise/turist_attraction_tbl',$data);
	}
	
	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('franchise/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}
	
}
/* end of settings */ 