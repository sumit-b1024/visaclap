<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_pwd extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model', 'setting_model','supplier_model'));
    }

    function index()
    {
        /** page level css & js * */
        $this->content->extra_js  = array('select2.full.min', 'select2','show-password.min');
        $this->content->extra_css = array('custom');
        $title = 'Forgot Password';
        $this->content->breadcrumb = array(
            'Settings'      =>  '',
            $title          =>  NULL
        );
        $this->content->title       =   $title;
        $this->content->meta        =   $meta;
        $this->content->action      =   '';
        $this->content->info        =   '';
        $this->load_view('reset_password',$title);
    }
    function update_user_password(){
        if($this->input->post()) {
            $data_array = array(
                'password' => $this->hash_password($this->input->post('password')),
            );
            $user_id = $this->session->userdata('user_id');

            $this->setting_model->update_reset_password($data_array,$user_id);
            $response = array('status'=>'success','message' => 'Password Updated Successfully.');
        }else{
            $response = array('status'=>'success','message' => 'Something Went Wrong.');
        }
        echo json_encode($response);
        die;
    }

    private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
    {
        $this->masterpage->setMasterPage('master_page');
        $this->masterpage->setPageTitle($page_title);
        $this->masterpage->addContentPage('common/'.$viewname , 'content', $this->content);
        $this->masterpage->show();
    }

}

?>
