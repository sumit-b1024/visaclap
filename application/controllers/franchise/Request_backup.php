<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Request extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model', 'setting_model','supplier_model'));
    }

    public function index(){
        /** page level css & js * */
        $this->content->extra_js  = array('select2.full.min', 'select2','show-password.min');
        $this->content->extra_css = array('custom');
        $title = 'View Visa';
        $this->content->breadcrumb = array(
            'Dashboard'      =>  '',
            $title          =>  NULL
        );
        $this->content->title       =   $title;
        $this->content->meta        =   $meta;
        $this->content->action      =   '';
        $this->content->info        =   '';
        $this->load_view('request_call',$title);

    }
    public function get_form(){
        /** page level css & js * */
        $this->content->extra_js  = array('select2.full.min', 'select2','show-password.min');
        $this->content->extra_css = array('custom');
        $title = '';
        $this->content->breadcrumb = array(
            'Dashboard'      =>  '',
            $title          =>  NULL
        );
        $this->content->title       =   $title;
        $this->content->meta        =   $meta;
        $this->content->action      =   '';
        $this->content->info        =   '';
        $this->load_view('request_form',$title);

    }
    
    public function submit_traveler(){

        $mailhtml = '<h2>APPLICANTS APPLYING TRAVELERS</h2>';
        //echo "<pre>";
        //print_r($this->input->post('fields')); exit;
        $no_of_travellers = $this->input->post('no_of_travellers');
        $allfields = $this->input->post('fields');


       $allsub_array = [];
        for($i = 1; $no_of_travellers >= $i; $i++){
            foreach($this->input->post('fields') as $key => $values){
        $sub_array = [];
                foreach($values as $key1 => $values1){
                    
                    foreach($values1 as $key2 => $allvalues2){
                      
                        if  (array_key_exists("month",$allvalues2) && array_key_exists("day",$allvalues2) && array_key_exists("year",$allvalues2)){
                           if($allvalues2['month'][$i] !=  "" && $allvalues2['day'][$i] !=  "" && $allvalues2['year'][$i] !=  ""){
                             $date = $allvalues2['month'][$i]."-".$allvalues2['day'][$i]."-".$allvalues2['year'][$i];
                             $value = $date;

                          
                         $add_array = array('key' => $key2,'value' => $value); 
                        
                         }

                     }else{
                         $value = $allvalues2[$i];
                         // $add_array['key'] = $key2;
                         // $add_array['value'] = $allvalues2[$i];
                       
                         $add_array = array('key' => $key2,'value' => $allvalues2[$i]); 


                     }

                        $sub_array[]  = $add_array;
                 } 

             }

         }  


     }
                $this->supplier_model->addtravelers($sub_array);
           
       
}

private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
{
    $this->masterpage->setMasterPage('master_page');
    $this->masterpage->setPageTitle($page_title);
    $this->masterpage->addContentPage('franchise/request/'.$viewname , 'content', $this->content);
    $this->masterpage->show();
}

}
?>