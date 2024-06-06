<?php
require APPPATH . 'libraries/REST_Controller.php';
class Visacountry_new extends REST_Controller {
  public function __construct() {
     parent::__construct();
     $this->load->database();
 }


public function index_post(){
       $this->db->select('id,name');
       $this->db->from('cs_countries_no');
       $country_visa =  $this->db->get()->result();
       $this->response(array(
          'code' => 200,
          'message' => $country_visa,
      ), REST_Controller::HTTP_OK);

    }

}

?>