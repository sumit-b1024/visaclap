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
		$this->tbl_user_payment 	= 		TBL_USER_PAYMENT_DATE;
		$this->load->library('excel');
		$this->load->library('Nectar');


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
	function trialexplist()
	{
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2','jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui');
		$this->content->extra_css = array();

		$title = 'Trail Expiring List';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list 	= 	$this->user_model->get_user_trial_exp();
		$this->load_view('trialexp_user_view', $title);
	}
	function users()
	{ 

			
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2','jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'Users';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list 	= 	$this->user_model->get_user();
		$this->content->category_list 	= 	$this->user_model->get_all_category_list();

		$this->load_view('user_view', $title);

	}
	function filleragent(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'Filler with manager Country assign';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list 	= 	$this->user_model->get_filler_user();
		

		$this->load_view('filler_user_view', $title);
	}
	function referenceuser(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'Reference Users';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list 	= 	$this->user_model->get_user_reference();
		

		$this->load_view('reference_user_view', $title);
	}

	function get_franchise(){
		
		$reference = $this->input->post('reference');
		$data['get_ref_franch'] = $this->user_model->get_reference_franchise($reference);
		
		$this->load->view('console/settings/reference_franchise', $data);

	}

	

	function add_user()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2','common');
		$this->content->extra_css = array();

		$title = 'Add User';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Users'      	=> 	'settings/users',
			$title         	=> 	NULL
		);

		if($this->form_validation->run('add-user'))
		{
			$post = $this->input->post();
			

			$urlk = strtolower($post['first_name']).strtolower($post['last_name']);
			$userkey = $this->nectar->generate_url_key($urlk,TBL_USERS,'user_key');
			$user = array();
			$user['first_name'] 			= 		strtolower($post['first_name']);
			$user['last_name']  			= 		strtolower($post['last_name']);
			$user['firm_name'] 			    = 		$post['firm_name'];
			$user['email']      			= 		strtolower($post['email']);
			$user['refere_nces']      		= 		$post['refere_nces'];
			$user['user_key']      			= 		$userkey;
			$user['mobile']     			= 		$post['mobile'];		
			$user['role']       			= 		$post['role'];
			$user['currency']      			= 		$post['currency'];
			$user['password']   			= 		$this->hash_password('123456');
			$user['user_status']   			= 		User_status::ACTIVE;
			$user['created_by'] 			= 		$this->session->userdata('user_id');
			$user['created_on'] 			= 		time();

			$user_id = $this->user_model->add_data($this->tbl_users, $user);
			if($post['role'] == 3){
				if( isset($user_id) && !empty($user_id) )
				{
					$payment = array();
					$payment['user_id']          = 		$user_id;
					$payment['payment_date']     = 		date("Y-m-d");
					$payment['is_paid']     = 		0;
					$payment['created_at']     = 		date('Y-m-d H-i:s');
					$profile_id = $this->user_model->add_data($this->tbl_user_payment, $payment);
					
				}	
			}	
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
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		$this->content->currency   = 	$this->setting_model->get_all_currency();
		$this->content->reference 	= 	$this->user_model->get_user_reference();
		$this->load_view('add_user', $title);
	}

	function edit_user()
	{       
		$id = $this->uri->segment(3);
		if( !$id )
		{
			redirect('settings/users', 'refresh');
		}
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2','common');
		$this->content->extra_css = array();

		$title = 'Edit User';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Users'      	=> 	'settings/users',
			$title         	=> 	NULL
		);

		$this->load->library('form_validation');

		if($this->form_validation->run('edit-user'))
		{
			$post = $this->input->post();
			
			//generate_url_key()

			$urlk = strtolower($post['first_name']).strtolower($post['last_name']);
			$userkey = $this->nectar->generate_url_key($urlk,TBL_USERS,'user_key');
			
			$user = array();
			$user['user_id'] 			    = 		$id;
			$user['first_name'] 			= 		strtolower($post['first_name']);
			$user['last_name']  			= 		strtolower($post['last_name']);
			$user['firm_name'] 			    = 		$post['firm_name'];
			$user['email']      			= 		strtolower($post['email']);
			$user['user_key']      			= 		$userkey;
			$user['mobile']     			= 		$post['mobile'];		
			//$user['role']       			= 		$post['role'];
			$user['currency']      			= 		$post['currency'];
			$user['updated_by'] 			= 		$this->session->userdata('user_id');
			$user['updated_on'] 			= 		time();
			$user_id = $this->user_model->edit_data($this->tbl_users, $user, 'user_id', $id);

			if( isset($user_id) && !empty($user_id) )
			{				
				$profile = array();
				$profile['user_id']          = 		$user_id;
				$profile['address']          = 		strtolower($post['address']);
				//$profile['country']          = 		strtolower($post['country']);
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
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		$this->content->currency   = 	$this->setting_model->get_all_currency();
		$this->content->edit 		= 	$this->user_model->user_detail($id);
		$this->content->reference 	= 	$this->user_model->get_user_reference();
		
		$this->load_view('add_user', $title);
	}

	function country_list()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'Country Manage';
		$this->content->breadcrumb = array(
			'Dashboard'      => '',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->_list 	= 	$this->setting_model->get_all_country();

		$this->load_view('country_view', $title);
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

	function getvisacountry(){
		//header('Access-Control-Allow-Origin: *');
       // header("Access-Control-Allow-Methods: GET, OPTIONS");
        $url = API_URL.'visacountry';
       	
        $ch = curl_init($url);
        $data1 = [];

        curl_setopt($crl, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, VISA_API);
        curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        echo $result;
        curl_close($ch);

    }

    function getcountrybyfirm(){
    	$post = $this->input->post();
		
		if($post){
			$result = $this->setting_model->get_firm_by_country($post["destination"]);
			if(!empty($result)){
			$response =  json_encode(array('status'=> 'success', 'data'=> $result));
			}else{
            $response = array('status'=>'failed','message' => 'Data Not avilable');
			}
		}else{
			$response = array('status'=>'failed','message' => 'Something Went Wrong.');
		}
		echo  $response;

    }
	public function send_country_image(){
		$post = $this->input->post();
		if($post){
			
			if ($_FILES['country_image']['tmp_name'] !== "") {
				
					$tmp_nm=$_FILES['country_image']['tmp_name'];
					$target_dir="upload/country_img/";
					$file_nm=basename($_FILES['country_image']['name']);
					$doc_nm=pathinfo($_FILES['country_image']['name']);
					$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
					$img_path=$target_dir.$rename_doc;
					$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	
					
					$this->setting_model->country_image_update($img_path,$post["countryid"]);
				
			}
		}	
			echo json_encode(array('status'=> 'success', 'message'=> ' Image Updated successfully'));

		return;
	}
	
	function get_country_images()
	{ 
		$post = $this->input->post();
		
		if($post){
			$result = $this->setting_model->get_country_by_id($post["record_id"]);
		}

		$countryimage = "";	
		if($result[0]->country_image != "")
		{	
			$countryimage =  "<div class='col-md-4'><image src=".base_url().$result[0]->country_image." /></div>";
		}
		echo  $countryimage;

	}

	

	function category()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data');
		$this->content->extra_css = array();

		$title = 'Category Manage';
		$this->content->breadcrumb = array(
			'Dashboard'      => '',
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
			'Dashboard'      => 	'',
			'Category'      => 	'settings/category',
			$title         	=> 	NULL
		);

		if($this->form_validation->run('add-category'))
		{
			$post = $this->input->post();
			$cname = strtolower($post['name']);
			$catslug = preg_replace('#\s+#', '-', $cname);
			
					// xdebug($post);

			$add = array();
			$add['name'] 				= 		$post['name'];
			$add['cat_slug'] 			= 	$catslug;
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
			'Dashboard'      => 	'',
			'Category'      => 	'settings/category',
			$title         	=> 	NULL
		);

		$this->load->library('form_validation');

		if($this->form_validation->run('edit-category'))
		{
			$post = $this->input->post();
			$cname = strtolower($post['name']);
			$catslug = preg_replace('#\s+#', '-', $cname);

			$edit = array();
			$edit['category_id'] 		= 		$id;
			$edit['name'] 				= 		$post['name'];
			$edit['cat_slug'] 			= 	$catslug;
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
			'Dashboard'      => 	'',
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
			'Dashboard'      => 	'',
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
			'Dashboard'      => 	'',
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

		$meta = $this->uri->segment(3);
		
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
		else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ENQUIRY_STATUS) {
			$title 	  = 'Enquiry Follow Up Status';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::TEMPLATE_TAG) {
			$title 	  = 'Template Tag';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::CUSTOMER_CATEGORY) {
			$title 	  = ' Customer Category';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ENQUIRY_CATEGORY) {
			$title 	  = ' Enquiry Category';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ENQUIRY_DESCRIPTION_ENQUIRY) {
			$title 	  = 'Add Enquiry Description';
		}
		
		$this->content->breadcrumb = array(
			'Dashboard'  => 'dashboard',
			$title     	=> null
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		// $this->content->_view 		= 	$this->setting_model->get_meta_list($is_meta);
		$this->content->_countries   = 	$this->supplier_model->get_all_country();
		/*if($is_meta != Meta::ENQUIRY_CATEGORY){ echo "category"; exit;
			$query 	= 	$this->setting_model->get_all_meta_list($is_meta);
		}elseif($is_meta != Meta::ENQUIRY_DESCRIPTION_ENQUIRY){  echo "category desc"; exit;
			$query 	= 	$this->setting_model->get_all_meta_enquiry_category_list($is_meta);
		}else{  echo "category123"; exit;
			$query 	= 	$this->setting_model->get_all_meta_enquiry_category_list($is_meta);
		}*/

		if($is_meta == Meta::ENQUIRY_CATEGORY){ 
			$query 	= 	$this->setting_model->get_all_meta_enquiry_category_list($is_meta);
		}elseif($is_meta == Meta::ENQUIRY_DESCRIPTION_ENQUIRY){  
			$query 	= 	$this->setting_model->get_all_meta_enquiry_description_list($is_meta);
		}elseif($is_meta == Meta::ENQUIRY_STATUS || $is_meta == Meta::TEMPLATE_TAG){  
			$query 	= 	$this->setting_model->get_all_meta_enquiry_status_list($is_meta);
		}else{ 
			$query 	= 	$this->setting_model->get_all_meta_list($is_meta);
		}


		$this->content->_view = null;
		$this->content->_category   = 	$this->setting_model->get_category();
		
		if($query){
			$this->content->_view =  $query;
		}

		$this->load_view('hotel_list_view', $title);
	}

	function add_meta()
	{
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2','summernote/summernote1','summernote');
		$this->content->extra_css = array();

		$meta = $this->uri->segment(3);

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
		} 
		else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::TOURIST_ATTRACTION) {
			$title 	  = 'Add Tourist Attraction';
			$cats     = '';
			$supplier = '';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::CUSTOMER_CATEGORY) {
			$title 	  = 'Add Customer Category';
			$cats     = '';
			$supplier = '';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ENQUIRY_STATUS) {
			$title 	  = 'Add Enquiry Follow Up Status';
			$cats     = '';
			$supplier = '';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ENQUIRY_CATEGORY) {
			$title 	  = 'Add Enquiry Category';
			$cats     = '';
			$supplier = '';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ENQUIRY_DESCRIPTION_ENQUIRY) {
			$title 	  = 'Add Enquiry Description';
			$cats     = '';
			$supplier = '';
		}

		$this->content->breadcrumb = array(
			'Dashboard'  => 'dashboard',
			$title     	=> null
		);

		$this->content->title   	= 	$title;
		$this->content->meta    	= 	$meta;
		$this->content->is_meta 	= 	$is_meta;
		$this->content->cats    	= 	$cats;
		// $this->content->_countries 	= 	$this->setting_model->get_table_data($this->tbl_countries, null, 'id, name');
		// $this->content->_cities 	= 	$this->setting_model->get_table_data($this->tbl_cities, null, 'id, name');
		$this->content->_countries   = 	$this->supplier_model->get_all_country();
		$this->content->_category   = 	$this->setting_model->get_category();

		// $this->content->cities   = 	$this->supplier_model->get_all_cities($_GET['country']);

		$this->load_view('hotel_add_edit_view', $title);
	}
	function get_all_cities_by_country_id(){
		if($this->input->post()){
			$destination = $this->input->post('destination');
			$fetch_all_state_by_country = $this->supplier_model->getch_all_state_by_id($destination);
			$all_state_id = array_column($fetch_all_state_by_country, 'id');
			$fetch_all_state_by_state = $this->setting_model->getch_all_cities_by_id($all_state_id);

			echo json_encode($fetch_all_state_by_state);
			return;
		}
	}
	
	function edit_meta()
	{
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2','summernote/summernote1','summernote','sweet-alert/sweetalert.min','sweet-alert');
		$this->content->extra_css = array();

		$meta    = $this->uri->segment(3);
		$meta_id = $this->uri->segment(4);

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
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ENQUIRY_CATEGORY) {
			$title 	  = 'Edit Enquiry Category';
			$cats     = '';
			$supplier = '';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ENQUIRY_STATUS) {
			$title 	  = 'Edit Enquiry Follow Up Status';
			$cats     = '';
			$supplier = '';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::CUSTOMER_CATEGORY) {
			$title 	  = 'Edit Customer Category';
			$cats     = '';
			$supplier = '';
		}else if(isset($is_meta) && !empty($is_meta) && $is_meta == Meta::ENQUIRY_DESCRIPTION_ENQUIRY) {
			$title 	  = 'Edit Enquiry Description';
			$cats     = '';
			$supplier = '';
		}

		$this->content->breadcrumb = array(
			'Dashboard'  => 'dashboard',
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
		// $this->content->_countries   = 	$this->supplier_model->get_all_country();
		// $fetch_all_state_by_country = $this->supplier_model->getch_all_state_by_id($this->content->view->country);
		$this->content->_countries   = 	$this->supplier_model->get_all_country();
		// $all_state_id = array_column($fetch_all_state_by_country, 'id');
		$this->content->_cities = $this->setting_model->get_all_cities_by_country($this->content->view->country);

		$this->content->_category   = 	$this->setting_model->get_category();

		$this->load_view('hotel_add_edit_view', $title);
	}

	function ajax_add_hotel()
	{

		// xdebug($this->input->post());
		
		

		if($this->input->is_ajax_request())
		{

			$post = $this->input->post();
			
			//$str = preg_replace('#\s+#','-',trim($post['name']));
			$result = preg_replace('/[ ,]+/', '-', trim($post['name']));
			//echo $output = preg_replace(',','-', $str);

			if(!empty($post['meta_id']) && isset($post['meta_id']) )
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
					$meta['is_admin']    = 		"1"; //admin add
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


				if(in_array($post['is_meta'], [Meta::ENQUIRY_CATEGORY]) )
				{
					if ($_FILES['enquiry_category_img']['tmp_name'][0] !== "") {
						$tmp_nm=$_FILES['enquiry_category_img']['tmp_name'];
						$target_dir="upload/enquiry_category_icons/";
						$file_nm=basename($_FILES['enquiry_category_img']['name']);
						$doc_nm=pathinfo($_FILES['enquiry_category_img']['name']);
						$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
						$img_path=$target_dir.$rename_doc;
						$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	

						$item_icon_data=array(
							'enquiry_id' => $post['meta_id'],
							'img_name'=>$img_path,
						);

						if(isset($post['enquiry_img_icon']) && $post['enquiry_img_icon'] != ""){
							$item_icon_data['updated_at'] = date('Y-m-d H:i:s');
							$item_icon_data['updated_by'] = $this->session->userdata('user_id');

							$column_id = 'enquiry_id';
							$this->setting_model->update_method(TBL_ENQUIRY_CATEGORY_ICON_TBL,$item_icon_data,$post['meta_id'],$column_id);
							if(isset($post['enquiry_img_icon']) && $post['enquiry_img_icon'] != ""){
								unlink($post['enquiry_img_icon']);
							}

						}else{
							$item_icon_data['created_at'] = date('Y-m-d H:i:s');
							$item_icon_data['created_by'] = $this->session->userdata('user_id');
							$this->db->insert(TBL_ENQUIRY_CATEGORY_ICON_TBL,$item_icon_data);
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
					$meta['description']    = 	$post['description'];
					$meta['includedescription']    = 	$post['includedescription'];
					$meta['duration']    = 	$post['duration'];
					$meta['price']    = 	$post['price'];
					$meta['latitude']    = 	$post['latitude'];
					$meta['longitude']    = 	$post['longitude'];
					$meta['is_admin']    = 		"1"; 
					$meta['category_id']    = 	implode(',',$post['turist_category']);
					$meta['is_local_or_global']  = $this->session->userdata('user_role') == 1 ? "2" : "1";
				}

				$meta['created_by'] = $this->session->userdata('user_id');
				$meta['created_on'] = time();

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



				if(in_array($post['is_meta'], [Meta::ENQUIRY_CATEGORY]) )
				{
					if ($_FILES['enquiry_category_img']['tmp_name'][0] !== "") {

						$tmp_nm=$_FILES['enquiry_category_img']['tmp_name'];
						$target_dir="upload/enquiry_category_icons/";
						$file_nm=basename($_FILES['enquiry_category_img']['name']);
						$doc_nm=pathinfo($_FILES['enquiry_category_img']['name']);
						$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
						$img_path=$target_dir.$rename_doc;
						$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	
						$item_icon_data=array(
							'enquiry_id' => $record_id,
							'img_name'=>$img_path,
							'created_at'=>date('Y-m-d H:i:s'),
							'created_by'=>$this->session->userdata('user_id'),
						);
						$this->db->insert(TBL_ENQUIRY_CATEGORY_ICON_TBL,$item_icon_data);
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
							'master_id' => $record_id,
							'img_name'=>$img_path,
							'created_at'=>date('Y-m-d H:i:s'),
						);
						$this->db->insert(TBL_TURIST_ATT_IMAGE,$item_image_data);

					}
				} 

				echo json_encode(array('status' => 'success', 'message' => Meta::getValue($post['is_meta']).' Added successfully'));
			}
		}
		else
		{
			show_400();
		}
	}

	### media ###
	function media()
	{	
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array();

		$title = 'Add Media';
		$this->content->breadcrumb = array(
			'Settings'  => 'dashboard',
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
					$uploadData[$i]['updated_by'] = $this->session->userdata('user_id');
					$uploadData[$i]['updated_on'] = time();
					// $fileData = $this->upload->data();
					// $uploadData[$i]['media']      = $fileData['file_name'];
					// $uploadData[$i]['relative_id']    = $post['hotel'];
					// $uploadData[$i]['module']       = Media_type::HOTEL;
					// $uploadData[$i]['updated_by'] = $this->session->userdata('user_id');
					// $uploadData[$i]['updated_on'] = time();
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

	function company_permission() {
		$title = 'Company Permission';
		$this->content->title 	= $title;
		$this->content->view      	= 	$this->setting_model->get_booking_profit();	
        $this->load_view('company_permission', $title);
	}


	function save_company_permission(){

		if($this->input->post()){
		$post = $this->input->post();
			
			$domain_array = array(
				'company_permission' => $this->input->post('val'),
			);
			if($this->input->post('profit_id')){
				$this->setting_model->update_profit_data($domain_array,$this->input->post('profit_id'));
				$response = array('status'=>'success','message' => 'Company Permission.');
			}
		}else{
			$response = array('status'=>'error','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
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



	function get_assigncountry(){
		if($this->input->post('userid')){
			$usercountry = $this->setting_model->get_user_assign_country($this->input->post('userid'));
			$response = array('status' => 'success', 'msg' => 'Things Removed Successfully.','data' => $usercountry);
		}else{
			$response = array('status' => 'failed', 'msg' => 'Something Went Wrong','data' => '');
		}
		echo json_encode($response);
		return;
	}
	function save_assigncountry(){
		if($this->input->post('user_id')){
			$country = array();
			if($this->input->post('from_country') != ""){
				$country['assign_from_country'] 	= 	implode(',',$this->input->post('from_country'));
			}else{
				$country['assign_from_country'] 	= "";
			}
			if($this->input->post('to_country') != ""){	
				$country['assign_to_country'] = implode(',',$this->input->post('to_country'));
			}else{
				$country['assign_to_country'] = "";
			}	
			
			$this->setting_model->update_assign_country($country,$this->input->post('user_id'));
			
			$response = array(
				'status' => 'success',
				'message' => 'Country assign successfully',
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
	function update_user_status(){

		$id     = $this->input->post('id');
		$row    = $this->input->post('row');
		$table  = $this->input->post('table');
		$status  = $this->input->post('status');

		if (!$id && !$row && !$table)
		{
			redirect('dashboard', 'refresh');
		}
		$this->load->model('user_model');

		$status = ( $status == User_status::ACTIVE ? User_status::DEACTIVATED : User_status::ACTIVE );
		$status_msg = ( $status == User_status::ACTIVE ? 'Activated' : 'Deactivated');

		$data       = array();
		$data[$row] = $id;
		$data['updated_by'] = $this->session->userdata['user_id'];
		$data['updated_on'] = time();
		$affected_id = $this->user_model->update_user_is_active_status($table, $id, $status);

		$response_array = array(
			'status'=>'success',
			'is_active' => $status,
			'message' => 'User '.$status_msg.' Successfully.');

		echo json_encode($response_array);
		return;
	}
	function update_turist_category_status()
	{
		$id     = $this->input->post('id');
		$row    = $this->input->post('row');
		$table  = $this->input->post('table');
		$status  = $this->input->post('status');

		if (!$id && !$row && !$table)
		{
			redirect('dashboard', 'refresh');
		}

		$this->load->model('user_model');

		$status = ( $status == Yes_no::No ? Yes_no::Yes : Yes_no::No );
		$status_msg = ( $status == Yes_no::No ? 'Deactivated' : 'Activated' );

		$data       = array();
		$data[$row] = $id;
		$data['updated_by'] = $this->session->userdata['user_id'];
		$data['updated_on'] = time();
		$affected_id = $this->setting_model->update_turist_attraction_category_status($table, $id, $status);

		$response_array = array(
			'status'=>'success',
			'is_active' => $status,
			'message' => 'Category '.$status_msg.' Successfully.');
		echo json_encode($response_array);
		return;
	}

	function upload_user_data_script(){
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];	
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
    				// user table info
					$first_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$last_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$email = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$mobile = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     				// user profile tbl info
					$address = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$landmark = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$area = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$pincode = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

					$data = array(
						'first_name'  => $first_name,
						'last_name'   => $last_name,
						'email'   => $email,
						'mobile'   => $mobile,
						'role'   => User_role::CUSTOMER,
					);
					$landmark_array = array(
						'address' => $address.'-'.$landmark.'-'.$area,
						'postal_code' => $pincode,
						'user_category_id' => $this->input->post('customer_category'),
					);
					if($first_name != "" &&  $last_name != "" && $email != "" && $mobile != ""){
						$user_info = $this->user_model->importdata_user($data);
						$landmark_array['user_id'] = $user_info;
						$this->user_model->importdata_user_landmark_data($landmark_array);
					}
				}
			}
			$response_array = array(
				'status'=>'success',
				'message' => 'User Imported Successfully.');
		} else{
			$response_array = array(
				'status'=>'failed',
				'message' => 'Something Went Wrong.');
		}
		echo json_encode($response_array);
		return;      
	}
	function get_all_enquiry_images(){
		if($this->input->post()){
			$data['fetch_all_images'] = $this->setting_model->fetch_all_image_data($this->input->post('record_id'));
			$this->load->view('console/settings/view_all_enquiry_img',$data);
		}
	}
	function get_auto_suggestion_by_name(){
		$this->db->select('name,address,latitude,longitude');
		$this->db->from(TBL_PACKAGE_META);
		$this->db->where('is_meta',Meta::TOURIST_ATTRACTION);
		$this->db->like('name', $this->input->post('term'));
		$query = $this->db->get()->result();

		$skillData = array(); 
		if(!empty($query)){ 
			foreach ($query as $key => $value) {
				$data['value'] = $value->name; 
				$data['address'] = $value->address; 
				$data['latitude'] = $value->latitude; 
				$data['longitude'] = $value->longitude; 
				array_push($skillData, $data); 
			} 
		} 
		echo json_encode($skillData); 
		return; 
	}
	
	function create_custom_template(){
		
		
		$this->content->domain 	= "page.hifyc.link";

		$this->load_view('csdm-create-domain', $title);
		
	}


	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/settings/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}
/* end of settings */ 