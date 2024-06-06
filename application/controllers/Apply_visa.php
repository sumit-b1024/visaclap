<?php defined('BASEPATH') OR exit('No direct script access allowed');

###### This controller contains some common Ajax functions required globally ######
class Apply_visa extends MY_Controller
{
	
	function __construct()
	{
			parent::__construct();
			$this->load->model(array('supplier_model','setting_model'));
	}

	
	function visaform()
	{
			 $orign_country = $this->uri->segment('3'); 
			 $visapolicy_id =  $this->uri->segment('4'); 
			 $visa_id = $this->uri->segment('5'); 
			 $visa_type = $this->uri->segment('6'); 
			 $title          =  'Visa Form';										
			 $this->load_view('view_application_form',$title);

	}
   
    function newvisaform()
    {
             $orign_country = $this->uri->segment('3'); 
             $destinationcountry =  $this->uri->segment('4'); 
             $gid = $this->uri->segment('5');
             $visa_type = $this->uri->segment('6');  
             $visa_id = $this->uri->segment('7');
             $groupid = $this->uri->segment('10'); 
             $title          =  'Visa Form'; 
             /*echo $this->uri->segment('8');
             exit;*/
             //echo API_URL.'getform_visa'; exit;
              $url = API_URL.'getform_visa';
              $ch = curl_init($url);
              $data1 = array('gid'=>$gid,'visatype'=>$visa_id,'visaid'=>$visa_type,'origincountry'=>$orign_country,'destinationcountry'=>$destinationcountry);

                curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, VISA_API);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);
                $formdata = json_decode($result);

             
             $storerec   =   $this->setting_model->get_current_application_data($groupid); 
            $json  = json_encode($storerec);
            $array = json_decode($json, true);
        
             
             foreach($formdata->formdata as $key => $groups){   

                 
                foreach($groups as $key1 => $field){ 
                   $comparekey = strtolower(str_replace(" ","_",$key));
                   $label_name = strtolower(str_replace(" ","_",$field->label_name));

                   $test = array_filter($array, function ($var) use ($comparekey,$label_name,$field) { 
                        

                        if(in_array($comparekey,$var) && in_array($label_name,$var)){
                         $newfieldobj = $field;
                         $newfieldobj->new_value = $var["field_value"];
                        }

                   });
           
              } 
             
            }
           
             $this->content->total_visa_charge = $formdata->total_visa_charge;
             $this->content->origincountry = $formdata->origincountry;
             $this->content->destinationcountry = $formdata->destinationcountry;
             $this->content->visaname = $formdata->visaname->name;
             $this->content->visaid = $visa_type;
             $this->content->formfield = $formdata->formdata;
             $this->content->countrylist = $formdata->countrylist;
             $this->content->groupid = $groupid;
             //echo '<pre>'; print_r($this->content->formfield); exit;

             $this->load_view('view_application_form_new',$title);

    }

    public function  new_submit_traveler(){

        $postfields = $this->input->post();
        $groupid = $postfields["groupid"];
        
        foreach($postfields as $key=>$fields){ 
            if(!empty($fields) && is_array($fields)){
                foreach($fields as $keyl=>$fieldsv){
                     
                     $lebelkey = strtolower(str_replace(":",",", $keyl)); 
                     $mainkey = $key; 
                     if(is_array($fieldsv) && !array_key_exists("month",$fieldsv)){
                        $lebelvalue = implode(',',$fieldsv); 
                     }else{
                       $lebelvalue = $fieldsv;  
                     }
                     
                        if (array_key_exists("month",$fieldsv) && array_key_exists("day",$fieldsv)  && array_key_exists("year",$fieldsv)){
                         $lebelvalue = $fieldsv["month"]."-".$fieldsv["day"]."-".$fieldsv["year"];    
                        }
                     $profile_id = $this->supplier_model->updatetravelersrecord($mainkey,$lebelkey,$lebelvalue,$groupid);
                }    
               
            }
        }
        
       $response = array('status' => 'success', 'message' => 'Applicants Applying Successfully');
        echo json_encode($response);
        return;

    }

    public function submit_traveler(){

        //echo "<pre>";
        //print_r($this->input->post('fields')); exit;
        $no_of_travellers = $this->input->post('no_of_travellers');
        $allfields = $this->input->post('fields');
        $origincountry = $this->input->post('origincountry');
        $destinationcountry = $this->input->post('destinationcountry');
        $visa_type = $this->input->post('visaid');
        $visaname = $this->input->post('visaname');
        $franchise_id = $this->input->post('franchise_id');
        $passing = $this->input->post('passing');

        $franchis = $this->supplier_model->get_main_franchise_id($franchise_id);

        if($franchis->role == User_role::FRANCHISE_STAFF){
            $mainfranchise  =    $franchis->created_by;
        }else{
            $mainfranchise  =    0;
        }
        
        $allsub_array = [];
       
        for($i = 1; $no_of_travellers >= $i; $i++){
                     $sub_array = [];
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
                         $add_array = array('key' => $key2,'value' => $values1[$key2][$i],'form_group'=>$key1); 

                     }
                    
                     if($add_array['key'] != "" && $values1[$key2][$i] != ""){

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
                $travell['passing']  =    $passing;
                $travell['origin_country']  =    $origincountry;
                $travell['destination_country']  =    $destinationcountry;
                $travell['visa_type']  =    $visa_type;
                $travell['visa_name']  =    $visaname;
                $travell['group_id']  =    $gpid;
                $travell['no_of_travellers']  =    $newkey;
                $travell['franchise_id']  =    $franchise_id;
                $travell['staff_id']  =    $mainfranchise;
                $travell['created_at'] = date('Y-m-d h:i:s');
            }
           
           $profile_id = $this->supplier_model->addtravelers($travell);
            
            }          

        }

        $response = array('status' => 'success', 'message' => 'Applicants Applying Successfully');
        echo json_encode($response);
        return; 
    }

    
	private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
	{
	    $this->masterpage->setMasterPage('visa_master_page');
	    $this->masterpage->setPageTitle($page_title);
	    $this->masterpage->addContentPage($viewname , 'content', $this->content);
	    $this->masterpage->show();
	}


}
/* end Common */