<?php
require APPPATH . 'libraries/REST_Controller.php';
class Visacountry_new extends REST_Controller {
  public function __construct() {
     parent::__construct();
     $this->load->database();
 }


public function index_post(){
   
    $this->db->select('mt.i_name,mt.id,mt.destination,mt.city,tc.name as c_name,tc.id as c_id,tc.country_image,tc.country_slug as coname,tct.name as city_nm,tc.sortname');
    $this->db->from(TBL_MASTER_ITENERARY . ' mt');
    $this->db->join(TBL_COUNTRIES_SUPPLIER . ' tc','mt.destination = tc.id','left');
    $this->db->join(TBL_CITIES_SUPPLIER . ' tct','mt.city = tct.id','left');


  
    $this->db->where('mt.is_delete',0);
    $this->db->order_by('mt.id','desc');
    $this->db->group_by('mt.destination');
    $country_data =  $this->db->get()->result();


    $this->db->select('mt.i_name,mt.id,mt.destination,mt.city,tc.name as c_name,tct.name as city_nm');
    $this->db->from(TBL_MASTER_ITENERARY . ' mt');
    $this->db->join(TBL_COUNTRIES_SUPPLIER . ' tc','mt.destination = tc.id','left');
    $this->db->join(TBL_CITIES_SUPPLIER . ' tct','mt.city = tct.id','left');

  
    $this->db->where('mt.is_delete',0);
    $this->db->order_by('mt.id','desc');
    $this->db->group_by('c_name');
    $city_data =  $this->db->get()->result();

    $this->db->select('mt.i_name,mt.id,mt.destination,mt.city,tc.name as c_name,tct.name as city_nm');
    $this->db->from(TBL_MASTER_ITENERARY . ' mt');
    $this->db->join(TBL_COUNTRIES_SUPPLIER . ' tc','mt.destination = tc.id','left');
    $this->db->join(TBL_CITIES_SUPPLIER . ' tct','mt.city = tct.id','left');
      
    $this->db->where('mt.is_delete',0);
    $this->db->order_by('mt.id','desc');
    $this->db->group_by('mt.i_name');
    $places_data =  $this->db->get()->result();
     
    

    
       $this->response(array(
          'code' => 200,
          'country_data' => $country_data,
          'city_data' => $city_data,
          'places_data' => $places_data,
      ), REST_Controller::HTTP_OK);

    }

}

?>