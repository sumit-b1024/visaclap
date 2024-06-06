<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Request extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model', 'setting_model','supplier_model','franchiseweb_model'));
        $this->load->helper('theme_helper');
    }

    public function index(){
        /** page level css & js * */
        $this->content->extra_js  = array('select2.full.min', 'select2','show-password.min');
        $this->content->extra_css = array('custom');
        $title = 'Apply Visa';
        $this->content->breadcrumb = array(
            'Dashboard'      =>  '',
            $title          =>  NULL
        );
        $this->content->title       =   $title;
        $this->content->meta        =   $meta;
        $this->content->action      =   '';
        $this->content->info        =   '';
        $this->content->get_all_enquiry   =     $this->setting_model->get_all_enquiry_by_franchise();
        $this->content->bookmark = $this->setting_model->get_bookmark();
        $this->load_view('request_call',$title);

    }
    public function view_visa(){ 
        /** page level css & js * */
        $this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','select2.full.min','daterangepicker/moment.min','daterangepicker/daterangepicker', 'select2');
        $this->content->extra_css = array('custom','daterangepicker');
        $title = 'View Visa';
        $this->content->breadcrumb = array(
            'Dashboard'      =>  '',
            $title          =>  NULL
        );
        $this->content->title       =   $title;
        $this->content->meta        =   $meta;
        $this->content->action      =   '';
        $this->content->info        =   '';
        $this->content->get_all_staff_data   =   $this->setting_model->get_all_staff_data();

        $this->load_view('view_visa', $title);

        //$this->load->view('franchise/request/visa_table_view',$data);

    }

    function get_visaapplication_tbl_records(){
        $post = $this->input->post();

        $data['_view'] = $this->supplier_model->get_all_visa_application($post['visa_type'],$post['origin_country_id'],$post['destination_country_id'],$post['startdate'],$post['enddate'],$post['staff_id']);

        
        $this->load->view('franchise/request/visa_table_view',$data);
    }
    function savebookmark(){
        $post = $this->input->post();
        $bookmark = $this->setting_model->get_bookmark();
      
        $bookarray = array();
        $bookarray['from_country'] = $post['from_country'];
        $bookarray['to_country'] = $post['to_country'];
        $bookarray['user_id'] = $this->session->userdata('user_id');
        
       
            $this->setting_model->add_edit_bookmark($bookarray);
       
         $response = array('status'=>'success');

           
            echo json_encode($response);
            die;        
        
    }
    function deletebookmark(){
        $post = $this->input->post();
        if(!empty($post)){
       
            $this->setting_model->remove_bookmark($post['id']);
       
            $response = array('status'=>'success');
        }else{
            $response = array('status'=>'error');
        }
           
            echo json_encode($response);
            die;        
        
    }
    
    function fetch_visaapplication_data_groupby()
    {
           
        
            $data['fetch_application_data'] = $this->supplier_model->fetch_sub_application_data($this->input->post('group_id'));


            $noof = $this->supplier_model->fetch_no_application($this->input->post('group_id'));
            $form_groups = $this->supplier_model->fetch_merge_column($this->input->post('group_id'));
            
            $form_groups = array_column($form_groups, 'form_group');

            $data['origin_country'] = $data['fetch_application_data'][0]->origin_country;
            $data['destination_country'] = $data['fetch_application_data'][0]->destination_country;
            $data['no_of_travellers'] = $noof[0]->no_of_travellers;
            $data['visa_name'] = $data['fetch_application_data'][0]->visa_name;
           
            
            $main_array = array();

            foreach($form_groups as $key => $group){    
                $new = array_filter($data['fetch_application_data'], function ($var) use ($group) {
                    return ($var->form_group == $group);
                });
                
               
                for($i=1;$i<=$data['no_of_travellers'];$i++)
                {
                     $new_sub = array_filter($new, function ($var1) use ($i) {
                        return ($var1->no_of_travellers == $i);
                    });
                     $main_array[$group][$i] = $new_sub;
                }    
            }

            $data['form_groups'] = $form_groups;
            $data['main_array'] = $main_array;
            

            
            $this->load->view('franchise/request/view_application_model_view',$data);
    }
    public function send_watsapp_of_application(){

            $post = $this->input->post();
            $phonenumber = $this->input->post('phone');

            $enquiry_id = $post['enquiry_id'];

            if($phonenumber == ""){
                $phonenumber = $enquiry_id;
            }else{
                $phonenumber = $this->input->post('phone');    
            }
           
            $db2 = $this->load->database('visaclapapi',TRUE);
            $visaid = explode(",",$post['selectdvisa']);

            foreach($visaid as $key=>$value){
               /* $country_visa = $db2
               ->select("gi.id,gi.origin_country,gi.destination_country,GROUP_CONCAT(DISTINCT p.text) process, GROUP_CONCAT(DISTINCT cv.price ORDER BY cv.id ASC ) price, GROUP_CONCAT(DISTINCT cv.visa_type_id) visa_type_id,GROUP_CONCAT(DISTINCT cv.visa_validity ORDER BY cv.id ASC) visa_validity,GROUP_CONCAT(DISTINCT cv.length_of_stay ORDER BY cv.id ASC) length_of_stay,GROUP_CONCAT(DISTINCT cv.time_to_get_visa) time_to_get_visa,GROUP_CONCAT(DISTINCT cv.entry_type) entry_type,GROUP_CONCAT(DISTINCT cv.description ORDER BY cv.id ASC) description,GROUP_CONCAT(DISTINCT cv.service_charge) service_charge,GROUP_CONCAT(DISTINCT tov.name) type_of_visa,vg.document as all_document_id,GROUP_CONCAT(DISTINCT dg.document_id) all_document_name,GROUP_CONCAT(DISTINCT vf.visa_type ORDER BY gi.visa_type ASC) as visaformcompare,gi.process as process_docu,GROUP_CONCAT(DISTINCT gi.visa_type ORDER BY gi.visa_type ASC) as visa_type_form_id") 
               ->from("tbl_generalinfo AS gi")
               ->join("tbl_process AS p","FIND_IN_SET(p.id,gi.process) > 0","inner")
               ->join("country_visa AS cv","FIND_IN_SET(cv.id,gi.visa_type) > 0","inner")
               ->join("type_of_visa AS tov","FIND_IN_SET(tov.id,cv.visa_type_id) > 0","inner")
               ->join("visatypegroup AS vg","FIND_IN_SET(vg.visatype_id,gi.visa_type) > 0","inner")
               ->join("document_group AS dg","FIND_IN_SET(dg.id,vg.document) > 0","inner")
               // ->join('visapolicy_forms as vf','vf.visapolicy_id = gi.id')
               ->join('visapolicy_forms as vf','FIND_IN_SET(vf.visa_type,gi.visa_type) > 0','LEFT')
               ->where('gi.origin_country', $post['from_country'])
               ->where('gi.destination_country', $post['to_country'])
               ->where("FIND_IN_SET($value,cv.id)!=","inner")
          // ->distinct('name'); 
               ->group_by("gi.visa_type")
               ->group_by("cv.id")
               ->get()->result();*/

                $apiurl =  API_URL."api/getvisadetail";
        
                $ch = curl_init();
                $params = array('value' => $value,'origin_country' => $post['from_country'],'destination_country' => $post['to_country']);
                curl_setopt($ch, CURLOPT_URL,$apiurl);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $data = curl_exec($ch);
                curl_close($ch);
                $country_visa  = json_decode($data);


               if(!empty($country_visa)){
                     $html2 .="Visa type : ".$country_visa[0]->type_of_visa.""."%0A";
                     $html2 .="Valid for : ".$country_visa[0]->visa_validity.""."%0A";
                     $html2 .="Time to get visa : ".$country_visa[0]->time_to_get_visa.""."%0A";
                     $html2 .="Visa Fee : ".$country_visa[0]->price.""."%0A";
                     $html2 .="Our Service Fees : ".$country_visa[0]->service_charge.""."%0A";
                     $html2 .="Description : ".$country_visa[0]->description.""."%0A";

                     /* document */ 
                     $apiurl =  API_URL."api/getvisadocument";
        
                    $ch = curl_init();
                    $params = array('value' => $value);
                    curl_setopt($ch, CURLOPT_URL,$apiurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $data = curl_exec($ch);
                    curl_close($ch);
                    $document  = json_decode($data);


                      

                     $html2 .= "*".$documentid[0]->name."*%0A";
                   
                     $dolist = explode(",",$documentid[0]->document_id);

                      if(!empty($dolist)){
                            foreach($dolist as $key=>$dov){
                                 $db2->select('id, name');
                                    $db2->from('required_document');
                                    $db2->where('id', $dov);
                                   $listdocument =  $db2->get()->result();

                                $html2 .=  $listdocument[0]->name."%0A";
                            }    
                        }
                    if($country_visa[0]->process != ""){     
                            $html2 .= "*Process* %0A".$country_visa[0]->process."%0A";    
                    }

                    $db2->select('notes');
                    $db2->from('visapolicy_notes');
                    $db2->where_in('visa_type',$value);
                    $notes = $db2->get()->result();
                    
                    if(!empty($notes)){

                    $db2->select('name,notes');
                    $db2->from('tbl_notes');
                    $db2->where_in('id',$notes[0]->notes);
                    $allnotes = $db2->get()->result();

                     if(!empty($allnotes)){
                             $html2 .= "*".$allnotes[0]->name."*%0A";    
                             $html2 .= $allnotes[0]->notes."%0A"; 
                        }

                    }

                     $db2->select('fv.visapolicy_id,fv.country,fv.visa_type');
                        $db2->from('visapolicy_forms as fv');
                        $db2->where('country', $country_visa[0]->origin_country);
                        $db2->where('visa_type', $value);
                        $db2->where('visapolicy_id', $country_visa[0]->id);
                        $linkquery =  $db2->get()->result();  

                       $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "http" : "http") . "://$_SERVER[HTTP_HOST]";

                      
                     if(!empty($linkquery)){
                         $html2 .= "*Apply Visa*%0A"; 
                         $franchiseid = $this->session->userdata('user_id');
                         
                         $url = $actual_link."/"."visaclaptour/apply_visa/visaform/".$country_visa[0]->origin_country."/".$country_visa[0]->destination_country."/".$country_visa[0]->id."/".$country_visa[0]->visa_type_id."/".$linkquery[0]->visa_type."/".$franchiseid."/".trim($phonenumber);
                        
                        
                         $html2 .= $url;   
                     }    
                }
            }

            if($this->input->post()){

                $data = array(
                    'mobile_no' => isset($phonenumber) && $phonenumber ? $phonenumber : "",
                    'content' => isset($phonenumber) && $html2 ? $html2 : "",
                );
                if($post['enquiry_id'] == ""){
                 if($phonenumber != ""){
                    $result = $this->setting_model->check_phone_enquiry($phonenumber);

                    if(empty($result)){
                        $enqphone = "yes";
                    }else{
                        $enqphone = "no";
                    }

                   }
               }else{
                 $enqphone = "no";
               }
               
                $response = array('data'=>$data,'status'=>'success','message' => 'Watsapp Sended Successfully.','enquirystatus' => $enqphone);

            }else{
                $response = array(
                    'mobile_no' => "",
                    'content' => "",
                );
                $response = array('status'=>'error','message' => 'Mobile number not added.');
        }
            echo json_encode($response);
            die;          
    }
    public function send_email_of_application(){ 

             $post = $this->input->post();
            $db2 = $this->load->database('visaclapapi',TRUE);
            $visaid = explode(",",$post['selectdvisa']);
            $allemail = $post['email'];
            $enquiry_id = $post['enquiry_id'];

            
           
            
            foreach($visaid as $key=>$value){
                $country_visa = $db2
               ->select("gi.id,gi.origin_country,gi.destination_country,GROUP_CONCAT(DISTINCT p.text) process, GROUP_CONCAT(DISTINCT cv.price ORDER BY cv.id ASC ) price, GROUP_CONCAT(DISTINCT cv.visa_type_id) visa_type_id,GROUP_CONCAT(DISTINCT cv.visa_validity ORDER BY cv.id ASC) visa_validity,GROUP_CONCAT(DISTINCT cv.length_of_stay ORDER BY cv.id ASC) length_of_stay,GROUP_CONCAT(DISTINCT cv.time_to_get_visa) time_to_get_visa,GROUP_CONCAT(DISTINCT cv.entry_type) entry_type,GROUP_CONCAT(DISTINCT cv.description ORDER BY cv.id ASC) description,GROUP_CONCAT(DISTINCT cv.service_charge) service_charge,GROUP_CONCAT(DISTINCT tov.name) type_of_visa,vg.document as all_document_id,GROUP_CONCAT(DISTINCT dg.document_id) all_document_name,GROUP_CONCAT(DISTINCT vf.visa_type ORDER BY gi.visa_type ASC) as visaformcompare,gi.process as process_docu,GROUP_CONCAT(DISTINCT gi.visa_type ORDER BY gi.visa_type ASC) as visa_type_form_id") 
               ->from("tbl_generalinfo AS gi")
               ->join("tbl_process AS p","FIND_IN_SET(p.id,gi.process) > 0","inner")
               ->join("country_visa AS cv","FIND_IN_SET(cv.id,gi.visa_type) > 0","inner")
               ->join("type_of_visa AS tov","FIND_IN_SET(tov.id,cv.visa_type_id) > 0","inner")
               ->join("visatypegroup AS vg","FIND_IN_SET(vg.visatype_id,gi.visa_type) > 0","inner")
               ->join("document_group AS dg","FIND_IN_SET(dg.id,vg.document) > 0","inner")
               // ->join('visapolicy_forms as vf','vf.visapolicy_id = gi.id')
               ->join('visapolicy_forms as vf','FIND_IN_SET(vf.visa_type,gi.visa_type) > 0','LEFT')
               ->where('gi.origin_country', $post['from_country'])
               ->where('gi.destination_country', $post['to_country'])
               ->where("FIND_IN_SET($value,cv.id)!=","inner")
          // ->distinct('name'); 
               ->group_by("gi.visa_type")
               ->group_by("cv.id")
               ->get()->result();
            
               if(!empty($country_visa)){
                    $html .= "<table class='table' border='1' style='width:600px;'>
                    <thead>
                    <tr>
                        <th scope='col' colspan='2'>".$country_visa[0]->type_of_visa."</th>
                    </tr>
                    <tr>
                        <th scope='col' colspan='2'>Valid for ".$country_visa[0]->visa_validity."</th>
                    </tr>
                    <tr>
                        <th scope='col' colspan='2'>".$country_visa[0]->length_of_stay." Of Stay</th>
                    </tr>
                    <tr>
                        <th scope='col' colspan='2'>Time to get visa ".$country_visa[0]->time_to_get_visa."</th>
                    </tr>
                    <tr>
                        <th scope='col' colspan='2'>Visa Fee ".$country_visa[0]->price."</th>
                    </tr>
                     <tr>
                        <th scope='col' colspan='2'>Our Service Fees ".$country_visa[0]->service_charge."</th>
                    </tr>
                    <tr>
                        <th scope='col' colspan='2'>".$country_visa[0]->description."</th>
                    </tr>
                    </thead>
                    <tbody>";
                        $db2->select('id, document','visatype_id');
                        $db2->from('visatypegroup');
                        $db2->where('visatype_id', $value);
                       $document =  $db2->get()->result();
                      

                       $db2->select('id,name,document_id');
                        $db2->from('document_group');
                        $db2->where('id', $document[0]->document);
                       $documentid =  $db2->get()->result(); 

                      
                    $html .= "<tr><td><b>".$documentid[0]->name."<b></td><td>";

                        $dolist = explode(",",$documentid[0]->document_id);
                  
                        if(!empty($dolist)){
                            foreach($dolist as $key=>$dov){
                                 $db2->select('id, name');
                                    $db2->from('required_document');
                                    $db2->where('id', $dov);
                                   $listdocument =  $db2->get()->result();

                                $html .= $listdocument[0]->name."</br>";
                            }    
                        }
                       
                       $html .='</td></tr>';
                       if($country_visa[0]->process != ""){     
                            $html .= "<tr><td><b>Process Documents<b></td>";    
                            $html .= "<td>".$country_visa[0]->process."</tr>"; 
                        }
                        $db2->select('notes');
                        $db2->from('visapolicy_notes');
                        $db2->where_in('visa_type',$value);
                        $notes = $db2->get()->result();

                       if(!empty($notes)){ 
                       $db2->select('name,notes');
                        $db2->from('tbl_notes');
                        $db2->where_in('id',$notes[0]->notes);
                        $allnotes = $db2->get()->result();

                     if(!empty($allnotes)){
                             $html .= "<tr><td><b>".$allnotes[0]->name."<b></td>";    
                             $html .= "<td>".$allnotes[0]->notes."</td></tr>"; 
                        }
                       } 
                        
                        $db2->select('fv.visapolicy_id,fv.country,fv.visa_type');
                        $db2->from('visapolicy_forms as fv');
                        $db2->where('country', $country_visa[0]->origin_country);
                        $db2->where('visa_type', $value);
                        $db2->where('visapolicy_id', $country_visa[0]->id);
                        $linkquery =  $db2->get()->result();  

                       $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

                      if($allemail != ""){
                        $passing = "/".$allemail;
                      }
                     if(!empty($linkquery)){
                        $franchiseid = $this->session->userdata('user_id');
                         $html .= "<tr><td><b>Apply Visa<b></td>";    
                         $url = $actual_link."/"."visaclaptour/apply_visa/visaform/".$country_visa[0]->origin_country."/".$country_visa[0]->destination_country."/".$country_visa[0]->id."/".$country_visa[0]->visa_type_id."/".$linkquery[0]->visa_type."/".$franchiseid.$passing;
                        
                         $html .= "<td><a style='padding: 6px 10px;border: 1px solid #000;text-decoration: unset;border-radius: 5px;text-align: center;background-color: #000;color: #fff;font-weight: bold;line-height: 41px;' href='".$url."' target='_blank'>Click Here</td></tr>";   
                     }

                     
                }
            }
               
                      
            $fetch_user_email_credencials = $this->setting_model->fetch_user_email_credencials($this->session->userdata('user_id'));

            if(!empty($fetch_user_email_credencials)){

                define('GOOGLE_CLIENT_ID', $fetch_user_email_credencials->client_id);
                define('GOOGLE_CLIENT_SECRET', $fetch_user_email_credencials->client_secret);
                define('GOOGLE_CLIENT_EMAIL', $fetch_user_email_credencials->email);
                if($enquiry_id != ""){ 
                    foreach ($enquiry_id as $key => $value) {
                        $get_email_by_enquiry_id = $this->setting_model->get_email_by_enquiry_id($value);
                        $send_mail = send_application_email($get_email_by_enquiry_id->email,$html);
                    }
                }
                
                $send_mail = send_application_email($allemail,$html);
               if($allemail != ""){
                    $result = $this->setting_model->check_email_enquiry($allemail);

                    if(empty($result)){
                        $enqemail = "yes";
                    }else{
                        $enqemail = "no";
                    }
                    $data = array(
                        'email' => isset($allemail) && $allemail ? $allemail: "",
                    );

               }

               

                $response = array('data'=>$data,'status'=>'success','message' => 'Mail Sended Successfully.','enquiry' => $enqemail);
            }else{ 
                $response = array('status'=>'cred_non_added','message' => 'Please Add Email Credential.');
            }    
            echo json_encode($response);
        return;
          
    }
    public function get_form(){
        
        /** page level css & js * */
        $this->content->extra_js  = array('jquery.min','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','bootstrap-daterangepicker/moment.min','bootstrap-daterangepicker/daterangepicker','input-mask/jquery.mask.min','bootstrap/js/popper.min','custom_for_all');
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

        $this->content->franchisdata = $this->franchiseweb_model->get_franchise_data($this->session->userdata('user_id'));

        $this->content->get_enquiry_type   =    $this->setting_model->get_enquiry_type();

        $this->content->enquiry   =     $this->setting_model->get_enquiry_old_data($meta);

        $countrys = explode(',',$this->content->enquiry->intersted_country);
        $this->content->get_country_city  =     $this->setting_model->get_country_city($countrys);
        $this->content->get_descriptions_of_admin   =   $this->setting_model->get_descriptions_of_master_module();
        $this->content->get_all_country   =     $this->supplier_model->get_all_country();
        if($this->session->userdata('user_role') == User_role::FRANCHISE){
            $this->content->get_all_staff_data = $this->setting_model->get_all_staff_data();
        }
        if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
            $this->db->select('created_by');
            $this->db->from(TBL_USERS);
            $this->db->where('user_id',$this->session->userdata('user_id'));
            $franchise_id = $this->db->get()->row();

            if(!empty($franchise_id)){
                $this->content->get_all_staff_data = $this->setting_model->get_all_staff_data($franchise_id->created_by);
            }else{
                $this->content->get_all_staff_data = array();
            }
        }


        $this->content->get_all_enquiry   =     $this->setting_model->get_all_enquiry_by_franchise();

        $this->load_view('request_form',$title);

    }
    
    public function submit_traveler(){

       
        $no_of_travellers = $this->input->post('no_of_travellers');
        $allfields = $this->input->post('fields');
        $origincountry = $this->input->post('origincountry');
        $destinationcountry = $this->input->post('destinationcountry');
        $visa_type = $this->input->post('visaid');
        $visa_name = $this->input->post('visaname');
        $franchise_id = $this->input->post('franchise_id');

        $display_exist_filter = $this->input->post('display_exist_filter');
        if(isset($display_exist_filter)){ 
            $passing = $this->input->post('wap_enquiry_id');
        }else{ 
            $passing = $this->input->post('mobile_no');
        }
        
        $allsub_array = [];
        $sub_array = [];
        for($i = 1; $no_of_travellers >= $i; $i++){
            foreach($this->input->post('fields') as $key => $values){

                foreach($values as $key1 => $values1){

                    foreach($values1 as $key2 => $allvalues2){


                       if  (array_key_exists("month",$allvalues2) && array_key_exists("day",$allvalues2) && array_key_exists("year",$allvalues2)){

                           if($allvalues2['month'][$i] !=  "" && $allvalues2['day'][$i] !=  "" && $allvalues2['year'][$i] !=  ""){
                             $date = $allvalues2['month'][$i]."-".$allvalues2['day'][$i]."-".$allvalues2['year'][$i];
                             $value = $date;
                             $add_array = array('key' => $key2,'value' => $value,'form_group'=>$key1); 
                         }

                     }else{

                         $value = $allvalues2[$i];                       
                         $add_array = array('key' => $key2,'value' => $allvalues2[$i],'form_group'=>$key1); 

                     }

                     if($add_array['key'] != "" && $add_array['value'] != ""){

                        $sub_array[$i][]  = $add_array;
                    }

                } 
            }

        }  


    }

    foreach($sub_array as $newkey => $newva){
         $groupid = $this->supplier_model->get_group();
    
            if(empty($groupid)){
                $gpid  =  1; 
            }else{
                if($newkey == 1){
                    $gpid  =  $groupid->group_id+1; 
                }    
            }    

        for($j = 0;sizeof($newva) > $j; $j++){
            if(is_array($newva[$j]['value'])){
                $val = implode(",",$newva[$j]['value']);        
            }else{
                $val = $newva[$j]['value'];    
            }
           if($val != ""){
                $travell = array();
                $travell['field_name']  =    $newva[$j]['key'];
                $travell['field_value']  =    $val;
                $travell['form_group']  =    $newva[$j]['form_group'];
                $travell['origin_country']  =    $origincountry;
                $travell['destination_country']  =    $destinationcountry;
                $travell['visa_type']  =    $visa_type;
                $travell['visa_name']  =    $visa_name;
                $travell['group_id']  =    $gpid;
                $travell['no_of_travellers']  =    $newkey;
                $travell['franchise_id']  =    $franchise_id;
                $travell['passing']  =    $passing;

                if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
                    $travell['staff_id']  =    $this->session->userdata('franchise_id');
                }else{
                    $travell['staff_id']  =    0;
                }
                $travell['created_at'] = date('Y-m-d h:i:s');
            }
          
           $profile_id = $this->supplier_model->addtravelers($travell);
            
            }          

        }

                // inser data passbook and update user balance
        
                $currentuser = $this->supplier_model->get_main_franchise_id($this->session->userdata('user_id'));
                $totalbalance = ($currentuser->balance-$this->input->post('totalvisacharge'));

                $id   = $this->session->userdata('user_id');
                $user = array();
                $user['user_id']                =       $this->session->userdata('user_id');
                $user['balance']                =       $totalbalance;      
                $user['updated_on']             =       time();
                $user_id = $this->user_model->edit_data(TBL_USERS, $user, 'user_id', $id);


                $passtable = array();
                $passtable['ref_id']                =       "";     
                $passtable['ref_type']              =       $this->input->post('origincountry').",".$this->input->post('destinationcountry');        
                $passtable['payment_type']          =       Payment_type::DEBIT; 
                $passtable['service_type']          =       Service_type::VISA;
                $passtable['user_id']               =       $this->session->userdata('user_id');
                $passtable['contact']               =       $passing;
                $passtable['amount']                =       $this->input->post('totalvisacharge');
                $passtable['created_at']            =       date('Y-m-d h:i:s');
                
                $passbookid = $this->setting_model->passbookstore($passtable);

        if(!empty($this->input->post('name'))){

        if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF)
            { 
                $enquiry_staff_id = $this->session->userdata('user_id'); 
            }
            else
            {
                $enquiry_staff_id = $this->input->post('enquiry_staff_id');
            }

            $enquiry_array = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile_no' => $this->input->post('mobile_no') != "" ? $this->input->post('mobile_no') : NULL,
                'enquiry_type' => $this->input->post('enquiry_type'),
                'city' => implode(',',$this->input->post('city')),
                'language' => $this->input->post('language'),
                's_description' => $this->input->post('s_description'),
                'description' => $this->input->post('description'),
                'follow_up_date' => $this->input->post('follow_up_date') != "" ?date('Y-m-d',strtotime($this->input->post('follow_up_date'))) : NULL,
                'intersted_country' => implode(',',$this->input->post('i_country')),
                'passport_no' => $this->input->post('passport_no'),
                'p_valid_from' => $this->input->post('p_valid_from') != "" ?date('Y-m-d',strtotime($this->input->post('p_valid_from'))) : NULL,
                'p_valid_to' => $this->input->post('p_valid_to') != "" ?date('Y-m-d',strtotime($this->input->post('p_valid_to'))) : NULL,
                'franchise_id' => $this->session->userdata('user_id'),
                'enquiry_staff_id' => $enquiry_staff_id,
                
            );
            $this->setting_model->store_qnuiry_data($enquiry_array);




        }
        $response = array('status' => 'success', 'message' => 'Applicants Applying Successfully');
        echo json_encode($response);
        return; 
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