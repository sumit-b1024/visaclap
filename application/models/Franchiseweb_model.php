<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Franchiseweb_model extends MY_Model
{
	public function __construct()
    {
        parent::__construct();
    }


    public function get_country_by_slug($cslug)
    {
        $this->db->select('id,sortname,name');
        $this->db->from(TBL_COUNTRIES_SUPPLIER);
        $this->db->where('country_slug',$cslug);
        return $this->db->get()->result();
    }

    public function get_franchisid($franchise)
    {
        $this->db->select('user_id');
        $this->db->from(TBL_USERS);
        $this->db->where('role',User_role::FRANCHISE);
        $this->db->where('user_key',$franchise);
        return $this->db->get()->result();
    }

    public function get_franchise_data($franchiseid)
    {
        $this->db->select('logo,tou_att,tou_iti,country_id,title,description,keywords,markup_package,domain_name,watsapp_number,coustmer_number,contact_address,keywords,facebook,linkedinlink,twitter,youtube,instagram,home_bg,created_by,template_id');
        $this->db->from(TBL_FRANCHISE_SETTING);
        $this->db->where(array('created_by' => $franchiseid));
        return $this->db->get()->result();
    }

    public function get_franchise_countries($countires=0)
    {

        $this->db->select('id,country_slug,name,country_image');
        $this->db->from(TBL_COUNTRIES_SUPPLIER);
        $this->db->where_in('id',$countires);
        return $this->db->get()->result();
    }
    public function get_places_data_admin($countryid=0)
    {
        $this->db->select('mt.i_name,mt.id,mt.destination,mt.city,i.img_name');
        $this->db->from(TBL_MASTER_ITENERARY . ' mt');
        $this->db->join(TBL_ITENERARY_ATT_IMAGE . ' i','mt.id=i.master_id','left');
        $this->db->where(array('mt.is_admin_or_franchise'=>Itenerary_local_global_module::IS_ADMIN,'mt.is_delete' => Deleted_status::NOT_DELETED));
     	if(isset($countryid) && $countryid > 0){
  		    $this->db->where('mt.destination',$countryid);
		}	
        $this->db->group_by('mt.id');

        return  $this->db->get()->result();

    }
    public function get_places_data_by_franchise($franchiseid=0,$countryid=0)
    {
    	$this->db->select('mt.i_name,mt.id,mt.destination,mt.city,i.img_name');
        $this->db->from(TBL_MASTER_ITENERARY . ' mt');
        $this->db->join(TBL_ITENERARY_ATT_IMAGE . ' i','mt.id=i.master_id','left');
        $this->db->where(array('mt.franchise_id'=>$franchiseid,'mt.is_delete' => Deleted_status::NOT_DELETED,'mt.is_admin_or_franchise' => Itenerary_local_global_module::IS_FRANCHISE));
        if(isset($countryid) && $countryid > 0){
  		    $this->db->where('mt.destination',$countryid);
		}
        $this->db->group_by('mt.id');
	    return $this->db->get()->result();
   	}  

    public function get_franchisid_tourist_category($franchisid=0,$countryid=0){
        $category_data = array();
         $this->db->select('pm.meta_id,pm.name,pm.country,pm.category_id,i.img_name,co.country_slug');
              $this->db->from(TBL_PACKAGE_META . ' pm');
              $this->db->join(TBL_TURIST_ATT_IMAGE . ' i','pm.meta_id=i.master_id','left');
              $this->db->join(TBL_COUNTRIES_SUPPLIER . ' co','co.id=pm.country','left');
              $this->db->where(array('pm.country' =>$countryid, 'is_meta' => Meta::TOURIST_ATTRACTION));

              if(isset($franchisid) && $franchisid != 1){
                $this->db->where('pm.created_by',$franchisid);
              }else{
                $this->db->where('pm.is_admin',$franchisid);
              }
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
            return $cat_data;

    }

     public function get_franchisid_tourist($franchisid=0,$countryid=0,$catarray=array()){
               $main_array = array();
              $this->db->select('pm.meta_id,pm.name,pm.country,pm.category_id,i.img_name,co.country_slug');
              $this->db->from(TBL_PACKAGE_META . ' pm');
              $this->db->join(TBL_TURIST_ATT_IMAGE . ' i','pm.meta_id=i.master_id','left');
              $this->db->join(TBL_COUNTRIES_SUPPLIER . ' co','co.id=pm.country','left');
              $this->db->where(array('pm.country' =>$countryid, 'is_meta' => Meta::TOURIST_ATTRACTION));
               if(isset($franchisid) && $franchisid != 1){
                $this->db->where('pm.created_by',$franchisid);
              }else{
                $this->db->where('pm.is_admin',$franchisid);
              }
              $this->db->group_by('pm.meta_id');
                $tourist_data =  $this->db->get()->result(); 
                foreach($catarray as $key => $cat)
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
                return $main_array;   

    }  
    public function get_franchisid_category($cat){
        $this->db->select('category_id,name');
        $this->db->from(TBL_CATEGORY);
        $this->db->where(array('cat_slug' => $cat));
        return $this->db->get()->row();

    }        
    
    public function get_franchisid_category_attraction($franchisid=0,$cat=0){

        $this->db->select('pm.meta_id,pm.name,pm.meta_slug,pm.star,pm.price,pm.country,pm.category_id');
          $this->db->from(TBL_PACKAGE_META . ' pm');
          $this->db->where("find_in_set($cat, pm.category_id) !=",0);
          if(isset($franchisid) && $franchisid != 1){
                $this->db->where('pm.created_by',$franchisid);
           }else{
                $this->db->where('pm.is_admin',$franchisid);
           }
          
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
          return $tourist_data;
    }
    public function get_franchisid_attraction_detail($tourslug=0){

            $this->db->select('pm.meta_id,pm.name,pm.price,pm.meta_slug,pm.star,pm.country,pm.category_id');
          $this->db->from(TBL_PACKAGE_META . ' pm');
          $this->db->where('pm.meta_slug', $tourslug);
          $this->db->where('pm.is_deleted', Deleted_status::NOT_DELETED);
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

          return $tourist_data;

    }

}	