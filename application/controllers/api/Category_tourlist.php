<?php
require APPPATH . 'libraries/REST_Controller.php';
class Category_tourlist extends REST_Controller {
  public function __construct() {
     parent::__construct();
     $this->load->database();
 }


public function index_post(){
  
    $category = $_POST["category"];
    $page = $_POST["page"];
    
    if($category != ""){
       

        $this->db->select('category_id,name');
        $this->db->from(TBL_CATEGORY);
        $this->db->where(array('cat_slug' => $category));
        $catid =  $this->db->get()->row();



          $this->db->select('pm.meta_id,pm.name,pm.meta_slug,pm.star,pm.price,pm.country,pm.category_id');
          $this->db->from(TBL_PACKAGE_META . ' pm');
          $this->db->where("find_in_set($catid->category_id, pm.category_id) !=",0);
          $tourist_data =  $this->db->get()->result();
          if(!empty($tourist_data)){
            foreach($tourist_data as $keys=>$vals){ 
            /* get image data */
            $this->db->select('GROUP_CONCAT(im.img_name) as all_image');
            $this->db->from(TBL_TURIST_ATT_IMAGE . ' im');
            $this->db->where('im.master_id',$vals->meta_id);
            $image_data =  $this->db->get()->result();
            /* get things data */
            $this->db->select('GROUP_CONCAT(it.things_name SEPARATOR "==") as all_things');
            $this->db->from(TBL_SUB_TOURIST_THINGS . ' it');
            $this->db->where('it.master_id',$vals->meta_id);
            $this->db->where('it.is_delete',Deleted_status::NOT_DELETED);
            $thing_data =  $this->db->get()->result();

            $image = (!empty($image_data)) ? $image_data[0]->all_image : "" ; 
            $thing = (!empty($thing_data)) ? $thing_data[0]->all_things : "" ; 

           
            $tourist_data[$keys]->all_image  =  $image;
            $tourist_data[$keys]->all_things  =  $thing;
            }
            
          }

       //echo $this->db->last_query(); 
       
       
       

        $this->response(array(
          'code' => 200,
          'tourist_data' => $tourist_data,
      ), REST_Controller::HTTP_OK);

    } 

  }  

}

?>