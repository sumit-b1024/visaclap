<?php
require APPPATH . 'libraries/REST_Controller.php';
class Get_tourist extends REST_Controller {
  public function __construct() {
     parent::__construct();
     $this->load->database();
 }


public function index_post(){

    $id = $_POST["id"];
    $category_data = array();
    if($id != ""){

    
    $this->db->select('cat.id,cat.name');
    $this->db->from(TBL_COUNTRIES_SUPPLIER . ' cat');
    $this->db->where_in('cat.country_slug',$id);
    $country =  $this->db->get()->result();
    if(!empty($country))
            {    
              $this->db->select('pm.meta_id,pm.name,pm.country,pm.price,pm.category_id,i.img_name,co.country_slug');
              $this->db->from(TBL_PACKAGE_META . ' pm');
              $this->db->join(TBL_TURIST_ATT_IMAGE . ' i','pm.meta_id=i.master_id','left');
              $this->db->join(TBL_COUNTRIES_SUPPLIER . ' co','co.id=pm.country','left');
              

              $this->db->where(array('pm.country' =>$country[0]->id, 'is_meta' => Meta::TOURIST_ATTRACTION));
              $this->db->group_by('pm.meta_id');
           
              $tourist_data =  $this->db->get()->result();  
          
            /* get country tourist category */  
            foreach($tourist_data as $key=>$value){
              $ids = explode(",",$value->category_id);
              array_push($category_data,$ids);
            }

            $result = array_unique(array_reduce($category_data, 'array_merge', array()));
            
          if(!empty($result)){
            $this->db->select('tc.category_id,tc.name,tc.cat_slug');
            $this->db->from(TBL_CATEGORY . ' tc');
            $this->db->where_in('tc.category_id',$result);
            $cat_data =  $this->db->get()->result();
          }else{
            $cat_data = array();
          } 
             $main_array = array();
              foreach($cat_data as $key => $cat)
            {
                
                 $new_sub = array_filter($tourist_data, function ($tourist) use ($cat) {
                    $cid = $cat->category_id;
                    $tcid = $tourist->category_id;
                    if (preg_match('/\b' . $cid . '\b/', $tcid)) { 
                       return $tourist;
                    }
                });
                 $new_sub = array_values($new_sub); 
                  $new_sub = array_slice($new_sub, 0,3); 
                 $main_array[$cat->cat_slug] = $new_sub;
            }   
          

            $this->db->select('mt.i_name,mt.id,mt.destination,mt.city,i.img_name');
            $this->db->from(TBL_MASTER_ITENERARY . ' mt');
            $this->db->join(TBL_ITENERARY_ATT_IMAGE . ' i','mt.id=i.master_id','left');
            $this->db->where(array('mt.destination'=>$country[0]->id,'mt.is_delete' => Deleted_status::NOT_DELETED));
            $this->db->group_by('mt.id');
            $places_data =  $this->db->get()->result();
   }

       $this->response(array(
          'code' => 200,
          'category_data' => $cat_data,
          'tourist_data' => $main_array,
          'places_data' => $places_data,
      ), REST_Controller::HTTP_OK);

   } 

  }  


  

}

?>