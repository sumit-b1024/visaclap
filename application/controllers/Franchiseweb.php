<?php defined('BASEPATH') OR exit('No direct script access allowed');


###### This controller contains some common Ajax functions required globally ######
class Franchiseweb extends MY_Controller
{
	
	 function __construct()
    {
        parent::__construct();
        $this->load->model(array('franchiseweb_model'));
        $this->load->helper('theme_helper');
       
    }

	
	function index($fransme="")
	{
			 
		    $frid = $this->franchiseweb_model->get_franchisid($fransme);

		    if(!empty($frid)){
				$data["franchisdetail"] = $this->franchiseweb_model->get_franchise_data($frid[0]->user_id); 
				$template = $data["franchisdetail"][0]->template_id;
				if($template == ""){
					$template = "template1";
				}
			}	
			if($data["franchisdetail"][0]->country_id != ""){
				$data["countries"] = $this->franchiseweb_model->get_franchise_countries(explode(",",$data["franchisdetail"][0]->country_id)); 
			}
			
			if($data["franchisdetail"][0]->tou_iti == 0 && $data["franchisdetail"][0]->tou_iti == ""){
					$data["places_data"] = $this->franchiseweb_model->get_places_data_by_franchise($data["franchisdetail"][0]->created_by); 

			}else{
				$data["places_data"] = $this->franchiseweb_model->get_places_data_admin(); 

			}
			
			$data["franhisurl"] = $this->uri->segment(1)."/".$this->uri->segment(2)."/";
			  
			$this->load->view('fronted/'.$template.'/index',$data);
	}
	
	function get_tourist($fransme="",$country="")
	{
			 
		    $frid = $this->franchiseweb_model->get_franchisid($fransme);
		    $franchisdetail = $this->franchiseweb_model->get_franchise_data($frid[0]->user_id); 
		    
		    $template = $franchisdetail[0]->template_id;
				if($template == ""){
					$template = "template1";
				}

		    $reversedParts = explode('-', strrev($country), 3);
            $couid =  strrev($reversedParts[2]); 
			$country = $this->franchiseweb_model->get_country_by_slug($couid);
            
            if($franchisdetail[0]->tou_iti == 0){
		   		$data["places_data"] = $this->franchiseweb_model->get_places_data_by_franchise($frid[0]->user_id,$country[0]->id); 
            }else{
            	$data["places_data"] = $this->franchiseweb_model->get_places_data_admin($country[0]->id); 
            }
           
            if($franchisdetail[0]->tou_att == 0){ 
		   		$data["category_data"] = $this->franchiseweb_model->get_franchisid_tourist_category($frid[0]->user_id,$country[0]->id); 
            }else{ 
            	$data["category_data"] = $this->franchiseweb_model->get_franchisid_tourist_category(Itenerary_local_global_module::IS_ADMIN,$country[0]->id); 
            }

            if($franchisdetail[0]->tou_att == 0){ 
		   		$data["tourist_data"] = $this->franchiseweb_model->get_franchisid_tourist($frid[0]->user_id,$country[0]->id,$data["category_data"]); 
            }else{ 
            	$data["tourist_data"] = $this->franchiseweb_model->get_franchisid_tourist(Itenerary_local_global_module::IS_ADMIN,$country[0]->id,$data["category_data"]); 
            }
           $data["franchisdetail"] = $franchisdetail; 
           $data["franhisurl"] = $this->uri->segment(1)."/".$this->uri->segment(2)."/";
		   $this->load->view('fronted/'.$template.'/tourlist',$data);
	}
	function category_tourist($fransme="",$country="",$category="")
	{
		 $frid = $this->franchiseweb_model->get_franchisid($fransme);
		 $franchisdetail = $this->franchiseweb_model->get_franchise_data($frid[0]->user_id); 
		 $template = $franchisdetail[0]->template_id;
				if($template == ""){
					$template = "template1";
				}

         if(!empty($category)){
         	$catrecord = $this->franchiseweb_model->get_franchisid_category($category); 	
         }
      
         if($franchisdetail[0]->tou_att == 0){
		   		$data["tourist_data"] = $this->franchiseweb_model->get_franchisid_category_attraction($frid[0]->user_id,$catrecord->category_id); 
            }else{
            	$data["tourist_data"] = $this->franchiseweb_model->get_franchisid_category_attraction(Itenerary_local_global_module::IS_ADMIN,$catrecord->category_id); 
            }
         	$data["franhisurl"] = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3)."/".$this->uri->segment(4)."/";
         	$data["franchisdetail"] = $franchisdetail; 
         	$this->load->view('fronted/'.$template.'/tourlistview',$data);
	}
	
	function tourist_view($fransme="",$country="",$category="",$tourslug="")
	{
		 $frid = $this->franchiseweb_model->get_franchisid($fransme);	
		 $franchisdetail = $this->franchiseweb_model->get_franchise_data($frid[0]->user_id); 
		 $data["tourdetail"] = $this->franchiseweb_model->get_franchisid_attraction_detail($tourslug); 
		 $data["franchisdetail"] = $franchisdetail; 
         $this->load->view('fronted/tourview',$data);
	}
		
	
	
}
/* end Common */