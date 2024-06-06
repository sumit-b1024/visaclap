<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Credencials extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->tbl_users   		= 		TBL_USERS;
		$this->tbl_profile 		= 		TBL_PROFILE;
		$this->tbl_category 	= 		TBL_CATEGORY;
		$this->tbl_countries 	= 		TBL_COUNTRIES;
		$this->tbl_cities 		= 		TBL_CITIES;
		$this->tbl_activity 	= 		TBL_ACTIVITY;
		$this->load->model(array('user_model', 'setting_model','supplier_model'));
	}
	public function index(){
        $this->content->extra_js = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','summernote/summernote1','summernote');
        $this->content->extra_css = array('custom');
        $title = 'View  Data';
        $this->content->breadcrumb = array(
            'Dashboard'      =>  '',
            $title          =>  NULL
        );
        $this->content->title       =   $title;
        $this->content->meta        =   $meta;
        $this->content->action      =   '';
        $this->content->info        =   '';
        $this->content->get_cred    =   $this->setting_model->get_all_cred($this->session->userdata('user_id'));
        $this->load_view('view_cred', $title);
    }
    
    public function add(){
      $this->content->extra_js  = array('custom','input-mask/jquery.mask.min','bootstrap/js/popper.min','select2.full.min', 'select2');
      $this->content->extra_css = array('custom');

      $title = 'Add Email Data';
      $this->content->breadcrumb = array(
        'Dashboard'     => 	'',
        'View Data'     =>  'franchise/credencials',
        $title         => 	NULL
    );
      $this->content->title   	= 	$title;
      $this->content->meta  	= 	$meta;
      $this->content->action  	= 	'';
      $this->content->info   	= 	'';
      $this->load_view('add_edit_cred', $title);
  }

  function store_email_temp_data(){
      if($this->input->post()){
         $data_array = array(
            'email' => strtolower(trim($this->input->post('u_email'))),
            'client_id' => trim($this->input->post('client_id')),
            'client_secret' => trim($this->input->post('client_secret')),
            'user_id' => $this->session->userdata('user_id'),
        );
         if($this->input->post('record_id') > 0){
            $data_array['updated_at'] = date('Y-m-d H:i:s');
            $update_record = $this->setting_model->update_record($data_array,$this->input->post('record_id'),TBL_STORE_EMAIL_CREDENCIALS);
            $response = array(
              'status' => 'success',
              'message' => 'Data Updated Successfully'
          );

        }else{
            $check_user_email_exist = $this->setting_model->check_user_email_exist_or_not($this->session->userdata('user_id'));
            if(!empty($check_user_email_exist)){
              $response = array(
                'status' => 'exist',
                'message' => 'You Can Not Add More Than One Credencials.'
            );
              echo json_encode($response);
              die();
          }
          $data_array['created_at'] = date('Y-m-d H:i:s');
          $store = $this->setting_model->store($data_array,TBL_STORE_EMAIL_CREDENCIALS);
          if($store != "" & $store > 0){
           $response = array(
              'status' => 'success',
              'message' => 'Data Stored Successfully'
          );
       }else{
           $response = array(
              'status' => 'failed',
              'message' => 'Something Went Wrong.'
          );

       }
   }
}else{

 $response = array(
    'status' => 'failed',
    'message' => 'Insert Data Properly.'
);

}
echo json_encode($response);
die();

}

function edit(){
    $this->content->extra_js  = array('custom','input-mask/jquery.mask.min','bootstrap/js/popper.min','select2.full.min', 'select2');
    $this->content->extra_css = array('custom');
    $title = 'Edit Email Data';
    $this->content->breadcrumb = array(
        'Dashboard'     =>  '',
        'View Data'     =>  'franchise/credencials',
        $title         =>    NULL
    );
    $id= $this->uri->segment(4);
    if( !$id )
    {
        redirect('franchise/credencials', 'refresh');
    }
    $this->content->title     =   $title;
    $this->content->meta      =   $meta;
    $this->content->action    =   '';
    $this->content->info      =   '';
    $this->content->ger_old_info  =   $this->setting_model->ger_old_info($id,TBL_STORE_EMAIL_CREDENCIALS,'id');

    $this->load_view('add_edit_cred', $title);
}

function delete_email_cread(){
    if($this->input->post('id')){
        $data_array = array('is_delete' => '1');
        $update_record = $this->setting_model->update_record($data_array,$this->input->post('id'),TBL_STORE_EMAIL_CREDENCIALS);
        $response = array(
          'status' => 'success',
          'message' => 'Data Removed Successfully.'
      );
    }else{
        $response = array(
          'status' => 'success',
          'message' => 'Something Went Wrong.'
      );

    }
    echo json_encode($response);
    die();
}

private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
{
  //$this->masterpage->setMasterPage('master_page');
    $this->masterpage->setMasterPage('franchise_setting_master');
  $this->masterpage->setPageTitle($page_title);
  $this->masterpage->addContentPage('console/cred/'.$viewname , 'content', $this->content);
  $this->masterpage->show();
}

}

