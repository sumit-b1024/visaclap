<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    { 
        $this->login();
    }

    function login()
    {
        
        /** page level css & js * */
         $this->content->extra_js  = array('index','global');
        $this->content->extra_css = array();

        $this->load->model('account_model');
        $user_role = $this->session->userdata('user_role');
        $user_id   = $this->session->userdata('user_id');

        if ($this->session->userdata('user_id'))
        {
                if(USER_API_ACCESS != ""){
                    
                    if ( !empty($user_role) && in_array($user_role, [User_role::SUPER_ADMIN]) )
                    {
                        redirect('dashboard', 'refresh');
                    }
                    else if ( !empty($user_role) && in_array($user_role, [User_role::MANAGER]) )
                    {
                        redirect('manager/dashboard', 'refresh');
                    }
                    else if ( !empty($user_role) && in_array($user_role, [User_role::FRANCHISE, User_role::CUSTOMER]) )
                    {
                        redirect('franchise/enquiry', 'refresh');
                    }
                    else if ( !empty($user_role) && in_array($user_role, [User_role::FRANCHISE_STAFF]) )
                    {
                        redirect('franchise/staff/enquiry', 'refresh');
                    }
                }else{
                    if ( !empty($user_role) && in_array($user_role, [User_role::SUPER_ADMIN]) )
                    {
                        redirect('settings/notsetapikey', 'refresh');
                    }
                    else if ( !empty($user_role) && in_array($user_role, [User_role::FRANCHISE, User_role::FRANCHISE_STAFF]) )
                    {
                        redirect('franchise/settings/notsetapikey', 'refresh');
                    }
                    
                    
                }    
        }
        $this->load_view('login_view', 'Login');
    }
    function forgotpassword()
    {
          $this->content->extra_js  = array('');
        $this->content->extra_css = array('index','checkEmail');
         $this->load_view('forgot_view', 'Forgot password');
    }
    function ajax_forgot()
    { 
        if ($this->input->is_ajax_request())
        {
           

            $status     = 'success';
            $error_type = '';
            $post       = $this->input->post();
            $login_id   = $post['email'];

            $this->load->model('account_model');
            $this->load->model('setting_model');
            $user_data = $this->account_model->get_user_data_by_login_id($login_id);
            
            if (!empty($user_data))
            {
              /* $data_array = array('password' => $this->hash_password($this->input->post('password')));
            $user_id = $user_data->user_id;

            $this->setting_model->update_reset_password($data_array,$user_id);*/

            /*$password = $this->setting_model->get_numeric_string(6);
            $data_array = array('password' => $this->hash_password($password));
            $user_id = $user_data->user_id;
            $this->setting_model->update_reset_password($data_array,$user_id);

            $tomail = $user_data->email;
            $toname = $user_data->first_name." ".$user_data->last_name;
            
            $content = "<html><head></head><body><p>Hi, ".$toname."<br/>Your New Password This ".$password."</p></body></html>";

            $send_mail = send_mailrelay_email("","",$tomail,$toname,"Forgot Password",$content);*/

              
              $status     = 'success';
              $error_type = '';
              $data = $user_data->email;    
            }else{
              $status     = 'error';
              $error_type = 'login';  
              $data = '';
            }
             echo json_encode(array('status' => $status, 'error_type' => $error_type, 'data' => $data));
        }else {

            show_400();
        }
    }        
    function ajax_login()
    { 
        if ($this->input->is_ajax_request())
        {
            $this->load->library('form_validation');
            if ($this->form_validation->run('login_form') == FALSE)
            {
                echo json_encode($this->form_validation->error_array());
                exit;
            }
            
            $status     = 'success';
            $error_type = '';
            $post       = $this->input->post();
            $login_id   = $post['username'];
            
            if (isset($post['action'])) {
                $password = $post['password'];
            } else {
                $password = $this->hash_password($post['password']);
            }
            
            $this->load->model('account_model');
            $this->load->model('setting_model');
            $user_data = $this->account_model->get_user_data_by_login_id($login_id);
            

            if (!empty($user_data))
            {
                /* if($user_data->role == User_role::MEMBER && $user_data->is_login_rights == 0) {
                  $status = 'fail';
                  $error_type = 'no_login_rights';
              } else */ if ($user_data->user_status == User_status::ACTIVE)
              {
                if ($user_data->password == $password)
                {
                    $ipaddress = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'UNKNOWN';
                    if ($this->account_model->update_login_data($user_data->user_id, $ipaddress))
                    {

                        $pastdate = $this->setting_model->get_user_last_payment_date($user_data->user_id);

                       $currentdate = date("Y-m-d",time());
                       $pastdatepay = $pastdate->payment_date;
                       //echo $is_paid = $pastdate->is_paid."<br/>";
                       $is_paid = $pastdate->is_paid;
 
                       if($is_paid == 0){
                        $limitdays = 90;
                       }else{
                        $limitdays = 30;
                       }

                        $totaldays = $this->setting_model->dateDiff($pastdatepay, $currentdate);   
                       // echo $totaldays."-------".$limitdays; exit;
                        if($totaldays > $limitdays){
                            $addpayment = "addpayment";
                        }else{
                            $addpayment = "";
                        }


                        $session_data = array(
                            'user_id'   => $user_data->user_id,
                            'user_role' => $user_data->role,
                            'user_name' => toProperCase($user_data->first_name . ' ' . $user_data->last_name),
                            'email'     => $user_data->email,
                            'country'   => $user_data->country,
                            'days'      => $addpayment,
                        );

                        if(User_role::FRANCHISE_STAFF){
                            $session_data['franchise_id'] = $user_data->created_by;
                            $franchise_data = $this->account_model->get_franchis_data_country($user_data->created_by);
                            $session_data['franchise_country'] = $franchise_data->country;
                        }
                          
                        $this->session->set_userdata($session_data);

                    } else {
                        $status     = 'fail';
                        $error_type = 'database';
                    }
                } else {
                    $status     = 'error';
                    $error_type = 'password';
                }
            } else if ($user_data->user_status == User_status::DEACTIVATED) {
                $status     = 'fail';
                $error_type = 'deactivated';
            } else if ($user_data->user_status == User_status::INACTIVE) {
                $status     = 'fail';
                $error_type = 'inactive';
            }
        } else {
            $status     = 'error';
            $error_type = 'login';
        }
        echo json_encode(array('status' => $status, 'error_type' => $error_type));
    } else {
        show_400();
    }
}

function signout()
{
    $this->session->sess_destroy();
    redirect('account', 'refresh');
}

function secondsToTime($seconds)
{
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a');
}


private function load_view($viewname = 'login_view', $page_title)
{
    $this->masterpage->setMasterPage('login_master_page');
    $this->masterpage->setPageTitle($page_title);
    $this->masterpage->addContentPage('account/' . $viewname, 'content', $this->content);
    $this->masterpage->show();
}

}

/* end of account */