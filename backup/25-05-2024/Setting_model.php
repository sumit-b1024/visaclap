<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_category()
    {
        $this->db->select('category_id, name, created_on');
        $this->db->from(TBL_CATEGORY);
        $this->db->where(array(
            'is_deleted'    =>  Deleted_status::NOT_DELETED,
        ));

        return $this->db->get()->result();
    }
    public function dateDiff($date1, $date2)
    {
        $date1_ts = strtotime($date1);
        $date2_ts = strtotime($date2);
        $diff = $date2_ts - $date1_ts;
        return round($diff / 86400);
    }
    public function get_string( $length ) {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";  

        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }

     public function get_numeric_string( $length ) {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  

        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }

    public  function get_all_category()
    {
        $this->db->select('category_id, name, created_on');
        $this->db->from(TBL_CATEGORY);
        $this->db->where(array(
            'is_deleted'   =>  Deleted_status::NOT_DELETED,
        ));

        return $this->db->get()->result();
    }
     public function get_all_airport_list()
    {
        $this->db->select('*');
        $this->db->from(TBL_FLIGHT_AIRPORT);
        return $this->db->get()->result();
    }

    public function get_all_currency()
    {
        $this->db->select('*');
        $this->db->from(TBL_CURRENCY);
        return $this->db->get()->result();
    }

    public function get_note_id($today_date){
        $this->db->select('trn.id');
        $this->db->from(TBL_NOTIFICATION. ' trn');
        if($today_date > 0){
            $this->db->where('DATE(created_at)',$today_date); 
        }
         $query = $this->db->get();
         //echo $this->db->last_query(); exit;
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return array();
    }

    public function bookmark_count($from_country,$to_country){
        $this->db->from(TBL_BOOKMARK);
        $this->db->where('user_id',$this->session->userdata('user_id')); 
        $this->db->where('from_country',$from_country); 
        $this->db->where('to_country',$to_country); 
        return $this->db->count_all_results(); 
    }    
    public function get_bookmark(){
        $this->db->select('*');
        $this->db->from(TBL_BOOKMARK);
        $this->db->where('user_id',$this->session->userdata('user_id')); 
         $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return array();
    }

    public function add_edit_bookmark($bookarray) {
        
            if($this->db->insert(TBL_BOOKMARK, $bookarray)) {
                return $this->db->insert_id();
            }
        
    }

    public function get_full_enquiry_notifications(){
        $this->db->select('*');
        $this->db->from(TBL_ENQUIRY_NOTIFICATION);
        $this->db->where('staff_id',$this->session->userdata('user_id')); 
         $this->db->order_by('created_at', 'DESC');
         $query = $this->db->get();
         //echo $this->db->last_query(); exit;
        if($query->num_rows() > 0){
            return $query->result();
        }
        return array();
    }

    public function get_full_notifications(){
        $this->db->select('trn.id,trn.description,trn.created_at');
        $this->db->from(TBL_NOTIFICATION. ' trn');
         $this->db->order_by('trn.created_at', 'DESC');
         $query = $this->db->get();
         //echo $this->db->last_query(); exit;
        if($query->num_rows() > 0){
            return $query->result();
        }
        return array();
    }

     public function get_full_currencys(){
        $this->db->select('crn.id,crn.curname,crn.created_at');
        $this->db->from(TBL_CURRENCY. ' crn');
         $this->db->order_by('DATE(crn.created_at)', 'DESC');
         $query = $this->db->get();
         //echo $this->db->last_query(); exit;
        if($query->num_rows() > 0){
            return $query->result();
        }
        return array();
    }


   


    public function get_all_notifications($today_date=0)
    {
        $user_id = $this->session->userdata('user_id');     
        $this->db->select('*');
        $this->db->from(TBL_READ_NOTIFICATION);
        $this->db->where('user_id',$user_id);
        $query = $this->db->get()->result();
        $notification_id = array_column($query, 'note_id');

        $this->db->select('*');
        $this->db->from(TBL_NOTIFICATION);
        $query1 = $this->db->get()->result();
        $all_notifications_id = array_column($query1, 'id');

        $result=array_diff($all_notifications_id,$notification_id);
        // print_r($result);
        if(empty($result)){
            $result ='';    
        }
      


        $this->db->select('tn.id,tn.description,tn.created_at');
        $this->db->from(TBL_NOTIFICATION. ' tn');
        // if(!empty($result)){
        $this->db->where_in('tn.id',$result); 
        // }

        // $this->db->group_start();
        // $this->db->where('rn.user_id !=',$user_id); 
        //     if(!empty($notification_id)){
        // // $this->db->where('FIND_IN_SET("'.$category_ID.'","category") <>','0');
        // $this->db->where_not_in('tn.id',$notification_id); 
        //     }   
        // $this->db->group_end();
        // if($today_date > 0){
            $this->db->where('DATE(tn.created_at)',$today_date); 
        // }
// 
        // $this->db->where(array(
        //     'tn.is_deleted'   =>  Deleted_status::NOT_DELETED,
        // ));

       
         $this->db->order_by('DATE(tn.created_at)', 'DESC');
         $query = $this->db->get();
         //echo $this->db->last_query(); exit;
        if($query->num_rows() > 0){
            return $query->result();
        }
        return array();

        //return $this->db->get()->result();
    }

     public function get_all_domain()
    {
        $this->db->select('id, domain_name, created_on');
        $this->db->from(TBL_DOMAIN);
        $this->db->where(array(
            'is_deleted'   =>  Deleted_status::NOT_DELETED,
        ));

        return $this->db->get()->result();
    }

    public function check_enquiry_number_exists($mobile,$query_id)
    {
        
        $this->db->select('mobile_no');
        $this->db->from('cs_supplier_tbl');
        $this->db->where('mobile_no',$mobile);
        $this->db->where('franchise_id',$this->session->userdata('user_id'));
        if($query_id > 0){
            $this->db->where('id !=',$query_id);    
        }
        $this->db->where('is_delete',Deleted_status::NOT_DELETED);
        return $this->db->get()->result();
    }

    public function get_all_country()
    {
        $this->db->select('name, id,country_image');
        $this->db->from(TBL_COUNTRIES_SUPPLIER);
        
        return $this->db->get()->result();
    }

    public function get_country_byid($allid)
    {
        $this->db->select('group_concat(DISTINCT(name) separator ",") as country');
        $this->db->from(TBL_COUNTRIES_SUPPLIER);
        $this->db->where_in('id',explode(",",$allid));
        
        return $this->db->get()->result();
    }

    public function get_all_json_country()
    {
        $this->db->select('id,name');
        $this->db->from(TBL_COUNTRIES_SUPPLIER);
        
        return $this->db->get()->result();
    }

    public function get_country_by_id($countryid)
    {
        
        $this->db->select('name, id,country_image');
        $this->db->from(TBL_COUNTRIES_SUPPLIER);
        $this->db->where(array('id' => $countryid));
        
        return $this->db->get()->result();
    }


    public function get_api_country_by_id($countryid)
    {
        

        $apiurl =  API_URL."getcountryname";
        
        $ch = curl_init();
        $params = array('countryid' => $countryid);
        curl_setopt($ch, CURLOPT_URL,$apiurl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, VISA_API);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        
        curl_close($ch);
        
        $countrydata  = json_decode($data);
        /* return country name */
        return $countrydata;
    }

    public function get_api_visaname_by_id($visaid)
    {
        

        $apiurl =  API_URL."getvisatypename";
        
        $ch = curl_init();
        $params = array('typeid' => $visaid);
        curl_setopt($ch, CURLOPT_URL,$apiurl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, VISA_API);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $vdata = curl_exec($ch);
        
        curl_close($ch);
        
        $visadata  = json_decode($vdata);
        
        /* return country name */
        return $visadata;
    }

    public function get_api_servicecharge($visaid,$intersted_country)
    {
        

        $apiurl =  API_URL."Getvisaservicefees";
        $ch = curl_init();
        //echo $visaid."---".$intersted_country; exit;
        $params = array('visaid' => $visaid,'intersted_country' => $intersted_country);
        curl_setopt($ch, CURLOPT_URL,$apiurl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, VISA_API);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $vdata = curl_exec($ch);
        
        curl_close($ch);
        
        $visaservice  = json_decode($vdata);
        
        /* return country name */
        return $visaservice;
    }

     public function get_api_country_by_name($countryname)
    {
        

        $apiurl =  API_URL."api/getcountryid";
        
        $ch = curl_init();
        $params = array('countryname' => $countryname);
        curl_setopt($ch, CURLOPT_URL,$apiurl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        
        $countrydata  = json_decode($data);
        /* return country id */
        return $countrydata;
    }

    function country_image_update($image,$id){
        $this->db->set('country_image',$image);
        $this->db->where('id',$id);
        $this->db->update(TBL_COUNTRIES_SUPPLIER);
    }
    function template_image_update($image,$id){
        $this->db->set('image',$image);
        $this->db->where('id',$id);
        $this->db->update(TBL_TEMPLATE);
    }

     function offer_image_update($image,$id){
        $this->db->set('image',$image);
        $this->db->where('id',$id);
        $this->db->update(TBL_OFFER);
    }
    function franchise_logo_update($image){
        $this->db->set('logo',$image);
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->update(TBL_FRANCHISE_SETTING);
    }
     function franchise_template_update($templateid){
        $this->db->set('template_id',$templateid);
        $this->db->set('updated_on',time());
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->update(TBL_FRANCHISE_SETTING);
    }
     function franchise_template_insert($templateid){
        $this->db->set('template_id',$templateid);
        $this->db->set('created_on',time());
        $this->db->set('created_by',$this->session->userdata('user_id'));
        $this->db->insert(TBL_FRANCHISE_SETTING);
    }
     function franchise_logo_insert($image){
        $this->db->set('logo',$image);
        $this->db->set('created_on',time());
        $this->db->set('created_by',$this->session->userdata('user_id'));
        $this->db->insert(TBL_FRANCHISE_SETTING);
    }

    function get_cusrrentuser_domainname(){
         $this->db->select('domain_name');
        $this->db->from(TBL_FRANCHISE_SETTING);
        $this->db->where('created_by',$this->session->userdata('user_id'));
        return $this->db->get()->row();
    }

     function checkdomain($domain){
       $this->db->select('*');
       $this->db->from(TBL_FRANCHISE_SETTING);
       $this->db->where('domain_name',$domain);
       $this->db->where_not_in('created_by', $this->session->userdata('user_id'));
       
        $query = $this->db->get();
        if($query->num_rows() > 0){
             return $query->num_rows();
        }
        return array();
    }

    
    public function category_detail($category_id)
    {
        $this->db->select('category_id, name');
        $this->db->from(TBL_CATEGORY);
        //$this->db->where(array('category_id' => $category_id, 'is_meta' => Deleted_status::NOT_DELETED));
        //$this->db->where('franchise_id',$this->session->userdata('user_id'));
        $this->db->where(array('category_id' => $category_id));
        
        return $this->db->get()->row();
    }

    public function get_user_last_payment_date($userid)
    {
        $this->db->select('payment_date,is_paid');
        $this->db->from(TBL_USER_PAYMENT_DATE);
        $this->db->where(array('user_id' => $userid));
        
        return $this->db->get()->row();
    }

    public function get_user_assign_country($userid)
    {
        $this->db->select('assign_from_country,assign_to_country');
        $this->db->from(TBL_USERS);
        $this->db->where(array('user_id' => $userid));
        return $this->db->get()->row();
    }
    public function get_user_country_id($userid)
    {
        $this->db->select('country');
        $this->db->from(TBL_PROFILE);
        $this->db->where(array('user_id' => $userid));
        
        return $this->db->get()->row();
    }

    function get_franchise_payment_detail($payid){

        $this->db->select('u.user_id, u.first_name, u.last_name, u.email, u.mobile, u.user_status, u.created_on, u.role,pf.address,p.pay_date,p.amount,p.payment_method');
        $this->db->from(TBL_PAYMENT . ' p');
        $this->db->join(TBL_USERS . ' u','u.user_id = p.user_id');
        $this->db->join(TBL_PROFILE . ' pf','pf.user_id = p.user_id');
        // $this->db->where($searchQuery);
        $this->db->where(array(
            'u.user_deleted' => Deleted_status::NOT_DELETED,
            'u.role ='      => User_role::FRANCHISE
        ));

        $this->db->where('p.id',$payid);

        return $records = $this->db->get()->row();

    }

    
    public function get_mail_detail($templateid)
    {
        $this->db->select('name, description');
        $this->db->from(TBL_EMAIL_TEMPLATE_STORE);
        $this->db->where(array('id' => $templateid, 'is_delete' => Deleted_status::NOT_DELETED));
        
        return $this->db->get()->row();
    }

    public function get_activities()
    {
        $this->db->select('a.activity_id, a.name, a.created_on, a.price, c.name as category, co.name as country, co.currency_symbol, ci.name as city');
        $this->db->from(TBL_ACTIVITY . ' a');
        $this->db->join(TBL_CATEGORY . ' c', 'a.category = c.category_id');
        $this->db->join(TBL_COUNTRIES . ' co', 'a.country = co.id');
        $this->db->join(TBL_CITIES . ' ci', 'a.city = ci.id');
        $this->db->where(array(
            'a.is_deleted'    =>  Deleted_status::NOT_DELETED,
        ));
        return $this->db->get()->result();
    }

    public function activity_detail($activity_id)
    {
        $this->db->select('activity_id, name, category, country, city, price, created_on');
        $this->db->from(TBL_ACTIVITY);
        $this->db->where(array('activity_id' => $activity_id, 'is_deleted' => Deleted_status::NOT_DELETED));
        
        return $this->db->get()->row();
    }

    ### hotel ###
    public function add_meta($meta)
    {
        if(isset($meta['name']) && !empty($meta['name']))
        {
            $this->db->where(
                array(
                    'name'      => $meta['name'],
                    'is_meta'   => $meta['is_meta'],
                    'is_deleted' => Deleted_status::NOT_DELETED
                )
            );
        }

        $query = $this->db->get(TBL_PACKAGE_META);
        if(!$query->num_rows() > 0)
        {
            if($this->db->insert(TBL_PACKAGE_META, $meta))
            {
                return $this->db->insert_id();
            }
        }
    }

    public function edit_meta($meta)
    {
        $this->db->where('meta_id', $meta['meta_id']);
        if($this->db->update(TBL_PACKAGE_META, $meta))
        {
            return $meta['meta_id'];
        } else {
            return false;
        }
    }
    
    public function get_meta_list($is_meta, $order = NULL)
    {
        $this->db->select('pm.meta_id, pm.name, pm.star, pm.room_category, ci.name as city, co.name as country, pm.sales_rate, pm.room_price, pm.address, pm.is_meta, pm.created_on,pm.is_status');
        $this->db->from(TBL_PACKAGE_META . ' pm');
        // $this->db->join(TBL_COUNTRIES . ' co', 'pm.country = co.id', 'LEFT');
        // $this->db->join(TBL_CITIES . ' ci', 'pm.city = ci.id', 'LEFT');
        $this->db->join(TBL_COUNTRIES_SUPPLIER . ' co', 'pm.country = co.id', 'LEFT');
        $this->db->join(TBL_CITIES_SUPPLIER . ' ci', 'pm.city = ci.id', 'LEFT');
        $this->db->where(
            array(
                'pm.is_meta'    => $is_meta,
                'pm.is_deleted'  => Deleted_status::NOT_DELETED
            ));

        if(isset($_GET['country']))
        {
            $this->db->where('pm.country',$_GET['country']);
        }
        if(isset($_GET['city']))
        {
            $this->db->where('pm.city',$_GET['city']);
        }
        if(isset($order) && !empty($order)) {
            $this->db->order_by('pm.name', $order);
        } else {
            $this->db->order_by('pm.name', 'desc');
        }
        // $this->db->where('is_local_or_global','2');
        return $this->db->get()->result();
    }


    public function get_all_template_meta_list($is_meta, $order = NULL)
    {
        $this->db->select('pm.meta_id, pm.name, pm.star, pm.room_category, ci.name as city, co.name as country, pm.sales_rate, pm.room_price, pm.address, pm.is_meta, pm.created_on,pm.is_status,pm.is_local_or_global,pm.duration,co.id as country_id,ci.id as city_id');
        $this->db->from(TBL_PACKAGE_META . ' pm');
        $this->db->join(TBL_COUNTRIES_SUPPLIER . ' co', 'pm.country = co.id', 'LEFT');
        // $this->db->join(TBL_COUNTRIES . ' co', 'pm.country = co.id', 'LEFT');
        // $this->db->join(TBL_CITIES . ' ci', 'pm.city = ci.id', 'LEFT');
        $this->db->join(TBL_CITIES_SUPPLIER . ' ci', 'pm.city = ci.id', 'LEFT');
        $this->db->where(
            array(
                'pm.is_meta'    => $is_meta,
                'pm.is_deleted'  => Deleted_status::NOT_DELETED
            ));
       
       
       
        return $this->db->get()->result();
    }
    public function get_all_meta_enquiry_category_list($is_meta)
    {

         $this->db->select('pm.meta_id, pm.name, pm.star, pm.room_category,pm.sales_rate, pm.room_price, pm.address, pm.is_meta, pm.created_on,pm.is_status,pm.is_local_or_global,pm.duration');
        $this->db->from(TBL_PACKAGE_META . ' pm');
         $this->db->where(
            array(
                'pm.is_meta'    => $is_meta,
                'pm.is_deleted'  => Deleted_status::NOT_DELETED
            ));
          $this->db->where('created_by',$this->session->userdata('user_id'));
          return $this->db->get()->result();
       
    }

    public function get_all_meta_enquiry_status_list($is_meta)
    {

         $this->db->select('pm.meta_id, pm.name, pm.star, pm.room_category,pm.sales_rate, pm.room_price, pm.address, pm.is_meta, pm.created_on,pm.is_status,pm.is_local_or_global,pm.duration');
        $this->db->from(TBL_PACKAGE_META . ' pm');
         $this->db->where(
            array(
                'pm.is_meta'    => $is_meta,
                'pm.is_deleted'  => Deleted_status::NOT_DELETED
            ));
          $this->db->where('created_by',$this->session->userdata('user_id'));
          return $this->db->get()->result();
       
    }
    

    
    public function get_all_meta_enquiry_description_list($is_meta)
    {

         $this->db->select('pm.meta_id, pm.name, pm.star, pm.room_category,pm.sales_rate, pm.room_price, pm.address, pm.is_meta, pm.created_on,pm.is_status,pm.is_local_or_global,pm.duration');
        $this->db->from(TBL_PACKAGE_META . ' pm');
         $this->db->where(
            array(
                'pm.is_meta'    => $is_meta,
                'pm.is_deleted'  => Deleted_status::NOT_DELETED
            ));
          $this->db->where('created_by',$this->session->userdata('user_id'));
          return $this->db->get()->result();
       
    }
    public function get_all_meta_list($is_meta, $order = NULL)
    {
        $this->db->select('pm.meta_id, pm.name, pm.star, pm.room_category, ci.name as city, co.name as country, pm.sales_rate, pm.room_price, pm.address, pm.is_meta, pm.created_on,pm.is_status,pm.is_local_or_global,pm.duration,co.id as country_id,ci.id as city_id');
        $this->db->from(TBL_PACKAGE_META . ' pm');
        $this->db->join(TBL_COUNTRIES_SUPPLIER . ' co', 'pm.country = co.id', 'LEFT');
        // $this->db->join(TBL_COUNTRIES . ' co', 'pm.country = co.id', 'LEFT');
        // $this->db->join(TBL_CITIES . ' ci', 'pm.city = ci.id', 'LEFT');
        $this->db->join(TBL_CITIES_SUPPLIER . ' ci', 'pm.city = ci.id', 'LEFT');
        $this->db->where(
            array(
                'pm.is_meta'    => $is_meta,
                'pm.is_deleted'  => Deleted_status::NOT_DELETED
            ));
        if(isset($_GET['country']) && $_GET['country'] > 0)
        {
            $this->db->where('pm.country',$_GET['country']);
        }
        if(isset($_GET['turist_category']) && $_GET['turist_category'] > 0)
        {
            // $value = $_GET['turist_category']; 

            // $this->db->where("find_in_set($value, pm.category_id) !=",0);
            $this->db->group_start();
            foreach(explode(',',$_GET['turist_category']) as $value)
            {
                $this->db->or_where("find_in_set($value, pm.category_id) !=",0);
            }
            $this->db->group_end();

        }
        if(isset($_GET['star']) && $_GET['star'] > 0)
        {
            $this->db->group_start();
            foreach(explode(',',$_GET['star']) as $value)
            {
                $this->db->or_where("find_in_set($value, pm.star) !=",0);
            }
            $this->db->group_end();
        }

        if(isset($_GET['city']) && $_GET['city'] > 0)
        {
            $this->db->where('pm.city',$_GET['city']);
        }
        if(isset($country) && $country > 0) {
            $this->db->order_by('pm.country', $country);
        }
        if(isset($city) && $city > 0) {
            $this->db->order_by('pm.city', $city);
        }

        if(isset($order) && !empty($order)) {
            $this->db->order_by('pm.name', $order);
        } else {
            $this->db->order_by('pm.name', 'desc');
        }

        if(isset($_GET['place']) && $_GET['place'] == 1)
        {
        // $this->db->where('pm.is_local_or_global',$_GET['country']);
        // $this->db->where('pm.created_by',$this->session->userdata('user_id'));
        $this->db->group_start();
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->or_where('is_local_or_global','2');
        $this->db->group_end();
        }else{
        $this->db->where('pm.is_local_or_global','2');
        }
        
        return $this->db->get()->result();
    }

    public function get_all_name_des_metadata()
    {
        $this->db->select('pm.meta_id, pm.name, pm.description');
        $this->db->from(TBL_PACKAGE_META . ' pm');

        if(isset($order) && !empty($order)) {
            $this->db->order_by('pm.name', $order);
        } else {
            $this->db->order_by('pm.name', 'desc');
        }
        $this->db->group_start();
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->or_where('is_local_or_global','2');
        $this->db->group_end();
        return $this->db->get()->result();
    }
    public function get_meta_details($meta_id)
    {
        $this->db->select('m.meta_id, m.name, m.star, m.room_category, m.country, m.city, m.sales_rate, m.room_price, m.address, m.is_meta, m.created_on, m.description,m.includedescription, m.duration,m.price,m.longitude,m.latitude,cit.img_name as enquiry_icon_image,m.category_id');
        $this->db->from(TBL_PACKAGE_META . ' m');
        $this->db->join(TBL_ENQUIRY_CATEGORY_ICON_TBL . ' cit','m.meta_id = cit.enquiry_id','left');
        $this->db->where(array('is_deleted' => Deleted_status::NOT_DELETED, 'meta_id' => $meta_id));
        return $this->db->get()->row();
    }
    public function get_domain_details()
    {
        $this->db->select('td.id,td.domain_name,td.logo,td.home_bg,td.address,td.keywords,td.business,td.contact_address,td.tou_att,td.tou_iti,td.country_id,td.coustmer_number,td.watsapp_number,td.markup_package,td.markup_visa,td.markup_flight,td.markup_hotel,td.template_id,td.facebook,td.linkedinlink,td.twitter,td.youtube,td.instagram,tmp.image,td.title,td.description,td.analytic_code');
        $this->db->from(TBL_FRANCHISE_SETTING . ' td');
        $this->db->join(TBL_TEMPLATE . ' tmp','tmp.id = td.template_id','left');
        $this->db->where(array('td.is_deleted' => Deleted_status::NOT_DELETED));
        $this->db->where('td.created_by',$this->session->userdata('user_id'));
        return $this->db->get()->row();
    }

    public function get_domain_list()
    {
        $this->db->select('td.domain_name,td.domain_name,mu.email,mu.mobile,mu.first_name,mu.last_name');
        $this->db->from(TBL_FRANCHISE_SETTING . ' td');
        $this->db->join(TBL_USERS . ' mu','mu.user_id = td.created_by','left');
        $this->db->where(array('mu.user_deleted' => Deleted_status::NOT_DELETED));
        return $this->db->get()->result();
    }

     public function get_single_user_detail($userkey)
    {
        $this->db->select('td.domain_name,td.domain_name,mu.email,mu.mobile,mu.first_name,mu.last_name');
        $this->db->from(TBL_FRANCHISE_SETTING . ' td');
        $this->db->join(TBL_USERS . ' mu','mu.user_id = td.created_by','left');
        $this->db->where(array('mu.user_key' => $userkey));
        return $this->db->get()->row();
    }

    public function get_booking_profit()
    {
        $this->db->select('*');
        $this->db->from(TBL_BOOKING_PROFIT);
        return $this->db->get()->row();
    }
    public function get_booking_profit_domestic()
    {
        $this->db->select('domestic_flight_profit as pper,domestic_flight_profit_fix as pfix');
        $this->db->from(TBL_BOOKING_PROFIT);
        return $this->db->get()->row();
    }
    public function get_booking_profit_international()
    {
        $this->db->select('international_flight_profit as pper,international_flight_profit_fix as pfix');
        $this->db->from(TBL_BOOKING_PROFIT);
        return $this->db->get()->row();
    }

    public function get_meta($meta_id)
    {
        $this->db->select('meta_id, name');
        $this->db->from(TBL_PACKAGE_META);
        $this->db->where_in('meta_id', $meta_id, FALSE);
        $this->db->where(array('is_deleted' => Deleted_status::NOT_DELETED));

        return $this->db->get()->result();
    }
    public function get_current_application_data($app_id)
    {
        $this->db->select('*');
        $this->db->from(TBL_VISA_APPLICATION);
        $this->db->where('group_id', $app_id);
        return $this->db->get()->result();
    }
    public function get_notifications($note_id)
    {
        $this->db->select('id, description');
        $this->db->from(TBL_NOTIFICATION);
        $this->db->where('id', $note_id);
        $this->db->where(array('is_deleted' => Deleted_status::NOT_DELETED));

        return $this->db->get()->row();
    }

    public function get_currency($c_id)
    {
        $this->db->select('id, curname');
        $this->db->from(TBL_CURRENCY);
        $this->db->where('id', $c_id);

        return $this->db->get()->row();
    }

    public function get_document_details($docid)
    {
        $this->db->select('doc_file');
        $this->db->from(TBL_ENQUIRY_DOCUMENT);
        $this->db->where('id', $docid);
        return $this->db->get()->row();
    }

    ### media ###
    public function add_media($media)
    {
        if($this->db->insert_batch('media', $media))
        {
            return $this->db->insert_id();
        }
    }

    public function get_media($meta_id, $type)
    {
        $this->db->select('m.media_id, m.meta_id, m.image, pm.name');
        $this->db->from('media as m');
        $this->db->join('package_meta as pm', 'pm.meta_id = m.meta_id', 'left');
        $this->db->where(array('m.meta_id' => $meta_id, 'm.type' => $type, 'm.is_deleted' => Deleted_status::NOT_DELETED));
        return $this->db->get()->result();
    }

    public function get_photos($meta_id, $type, $group_by)
    {
        $this->db->select('m.media_id, m.meta_id, m.image, pm.name');
        $this->db->from('media as m');
        $this->db->join('package_meta as pm', 'pm.meta_id = m.meta_id', 'left');
        $this->db->where('m.meta_id IN ('.trim($meta_id, ',').')', NULL, false);

        if(isset($group_by) && !empty($group_by)) {
            $this->db->group_by($group_by);
        }

        if(isset($type) && !empty($type)) {
            $this->db->where(array('m.type' => $type));
        }

        $this->db->where(array('m.is_deleted' => Deleted_status::NOT_DELETED));
        $this->db->order_by('m.type', 'asc');
        return $this->db->get()->result();
    }
    
   
    function update_turist_attraction_category_status($table,$id,$status){
        $this->db->set('is_status',$status);
        $this->db->where('meta_id',$id);
        $this->db->update($table);
    }
    function get_country_city($country_array=array()){
        $this->db->select('id,name');
        $this->db->from('cs_cities');
        if(!empty($country_array)){
            $this->db->where_in('country_id',$country_array);
        }
        return $this->db->get()->result();
    }

    function get_enquiry_type(){
        $this->db->select('meta_id,name');
        $this->db->from(TBL_PACKAGE_META);
        $this->db->where('is_meta',Meta::ENQUIRY_CATEGORY);
        $this->db->where('is_deleted',Deleted_status::NOT_DELETED);
        return $this->db->get()->result();

    }
     function get_franchise_template(){
        $this->db->select('id,name,description,image');
        $this->db->from(TBL_TEMPLATE);
        $this->db->where('is_deleted',Deleted_status::NOT_DELETED);
        return $this->db->get()->result();

    }
    function get_offer(){
        $this->db->select('id,name,offer_date,status');
        $this->db->from(TBL_OFFER);
        $this->db->where('is_deleted',Deleted_status::NOT_DELETED);
        return $this->db->get()->result();

    }
     function get_current_offer(){
        $this->db->select('tf.id,tsb.image,tsb.link');
        $this->db->from(TBL_OFFER);
        $this->db->from(TBL_OFFER . ' tf');
        $this->db->join(TBL_SUB_OFFER . ' tsb','tsb.offer_id = tf.id','left');
        $this->db->where('tf.is_deleted',Deleted_status::NOT_DELETED);
        $this->db->where('tf.status',Deleted_status::NOT_DELETED);
        $this->db->order_by('tsb.id', "random");

        return $this->db->get()->row();

    }
     function get_current_offer_count($id){

        $this->db->select('count(*) as total');
        $this->db->from(TBL_SUB_OFFER);
        $this->db->where('offer_id',$id);
        
        return $this->db->get()->result();

    }
    function store_qnuiry_data($enquiry_array){
        if($this->db->insert(TBL_SUPPLIER_ADD_FRANCHISE, $enquiry_array)) {
            return $this->db->insert_id();
        }
    }
    function store_domain_data($domain_array){
        $this->db->insert(TBL_FRANCHISE_SETTING,$domain_array);
    }
    function paymentstore($data){
            if($this->db->insert(TBL_PAYMENT, $data)) {
                return $this->db->insert_id();
            }

    }
    function passbookstore($data){
            if($this->db->insert(TBL_USER_PASSBOOK, $data)) {
                return $this->db->insert_id();
            }

    }

     

    function get_enquiry_list_data($status){
        $this->db->select('*');
        $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
        $this->db->where('pool_status',$status);
        $this->db->where('is_delete','0');
        $this->db->where('franchise_id',$this->session->userdata('user_id'));
        // $this->db->order_by('follow_up_date','desc');
        return $this->db->get()->result();
    }
    function get_all_enquiry_list_data(){
        $this->db->select('*');
        $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
        $this->db->where('is_delete','0');
        $this->db->where('franchise_id',$this->session->userdata('user_id'));
        $this->db->order_by('follow_up_date','desc');
        return $this->db->get()->result();
    }
    function fetch_enquiries_by_id($id){
       $this->db->select('enquiry_date');
       $this->db->from(TBL_ADD_ENQUIRY_STATUS);
       $this->db->where('enquiry_id',$id);
       $this->db->order_by('id','DESC');
       return $this->db->get()->result();
   }

   function get_franchise_template_detail($id){
       $this->db->select('*');
       $this->db->from(TBL_TEMPLATE);
       $this->db->where('id',$id);
       return $this->db->get()->row();
   }

   function get_offer_detail($id){
       $this->db->select('tof.*,tsoffer.link,tsoffer.image');
    $this->db->from(TBL_OFFER . ' tof');
    $this->db->join(TBL_SUB_OFFER . ' tsoffer','tsoffer.offer_id = tof.id','LEFT');
    $this->db->where('tof.id',$id);
       return $this->db->get()->row();
   }


   function get_enquiry_old_data($meta){
    $this->db->select('*');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    $this->db->where('id',$meta);
    return $this->db->get()->row();
}
function get_enquiry_old_document_data($meta){
    $this->db->select('*');
    $this->db->from(TBL_ENQUIRY_DOCUMENT);
    $this->db->where('sup_id',$meta);
    return $this->db->get()->result();
}
function update_qnuiry_data($enc,$id){
    $this->db->set($enc);
    $this->db->where('id',$id);
    $this->db->update(TBL_SUPPLIER_ADD_FRANCHISE);

}

function update_assign_country($country,$user_id){
    $this->db->set($country);
    $this->db->where('user_id',$user_id);
    $this->db->update(TBL_USERS);
}

function update_offer_status($offer,$id){
    $this->db->set($offer);
    $this->db->where('id',$id);
    $this->db->update(TBL_OFFER);
}

function update_doamin_data($enc){
    $this->db->set($enc);
    $this->db->where('created_by',$this->session->userdata('user_id'));
    $this->db->update(TBL_FRANCHISE_SETTING);
}

function update_profit_data($enc){
    $this->db->set($enc);
    $this->db->where('id','1');
    $this->db->update(TBL_BOOKING_PROFIT);
}

function get_wallet($uid){
    $this->db->select('balance,currency');
    $this->db->from(TBL_USERS. ' tp');
    $this->db->where('tp.user_id',$uid);
    return $this->db->get()->row();
}


function remove_domain($id){
 $this->db->set('is_deleted',Deleted_status::DELETED);
 $this->db->where('id',$id);
 $this->db->update(TBL_DOMAIN);
}

function remove_bookmark($id){
 $this->db->where('id',$id);
 $this->db->delete(TBL_BOOKMARK);
}

function remove_suboffer_banner($id){
 $this->db->where('id',$id);
 $this->db->delete(TBL_SUB_OFFER);
}

function remove_enquiry_document($id){
 $this->db->where('id',$id);
 $this->db->delete(TBL_ENQUIRY_DOCUMENT);
}

function noti_add($supplier) {
        if($this->db->insert('cs_notification_tbl', $supplier)) {
            return $this->db->insert_id();
        }
    }

function currency_add($supplier) {
        if($this->db->insert(TBL_CURRENCY, $supplier)) {
            return $this->db->insert_id();
        }
    }    

function read_noti($allnote="") {
        $notiid["note_id"] =  $allnote;
        $notiid["user_id"] =  $this->session->userdata('user_id');
        $notiid["status"] =  1;
        $this->db->insert(TBL_READ_NOTIFICATION,$notiid);
    }    

function noti_edit($supplier) {
        $this->db->where('id', $supplier['id']);
        if($this->db->update('cs_notification_tbl', $supplier)) {
            return $supplier['id'];
        } else {
            return false;
        }
    }   
function currency_edit($supplier) {
        $this->db->where('id', $supplier['id']);
        if($this->db->update(TBL_READ_NOTIFICATION, $supplier)) {
            return $supplier['id'];
        } else {
            return false;
        }
    }       
function remove_enquiry_data($id){
 $this->db->set('is_delete','1');
 $this->db->where('id',$id);
 $this->db->update(TBL_SUPPLIER_ADD_FRANCHISE);
}


function get_enquiry_status_data(){
    $this->db->select('*');
    $this->db->from(TBL_PACKAGE_META);
    $this->db->where('is_meta',Meta::ENQUIRY_STATUS);
    $this->db->where('is_deleted',Deleted_status::NOT_DELETED);
    return $this->db->get()->result();
}

function store_enquiry_status_data($status_array){
    $this->db->insert(TBL_ADD_ENQUIRY_STATUS,$status_array);
}

function fetch_follow_up_enquiry_by_id($id){
    $this->db->select('taes.*,tpm.name as enquiry_status,tpdf.follow_up_date as main_date');
    $this->db->from(TBL_ADD_ENQUIRY_STATUS . ' taes');
    $this->db->join(TBL_PACKAGE_META . ' tpm','taes.enquiry_status = tpm.meta_id','LEFT');
    $this->db->join(TBL_SUPPLIER_ADD_FRANCHISE . ' tpdf','taes.enquiry_id = tpdf.id','LEFT');
    $this->db->where('taes.enquiry_id',$id);
    // $this->db->where('taes.franchise_id',$this->session->userdata('user_id'));
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }
    return array();
}

function fetch_enquiry_document_by_id($id){
    $this->db->select('en.*');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' sp');
    $this->db->join(TBL_ENQUIRY_DOCUMENT . ' en','en.sup_id = sp.id','LEFT');
    $this->db->where('en.sup_id',$id);
    // $this->db->where('taes.franchise_id',$this->session->userdata('user_id'));
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }
    return array();
}

function fetch_visa_by_number($number){
    //echo $this->session->userdata('user_id'); exit;
    $this->db->select('*');
    $this->db->from('cs_visa_application');
    $this->db->where('passing',$number);
    //$this->db->where('franchise_id',$this->session->userdata('user_id'));
    $this->db->group_by('group_id');
    $this->db->order_by('id','DESC');
    return $this->db->get()->result();
}

function fetch_enquiry_date_byid($record_id){
 $this->db->select('follow_up_date');
 $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
 $this->db->where('id',$record_id);
 $query = $this->db->get();
 if($query->num_rows() > 0){
    return $query->row();
}
return array();

}

function store_template_data($data_array)
{
   $this->db->insert(TBL_TEMPLATE_STORE,$data_array);
}

function store_franchise_template_data($data_array)
{
   $this->db->insert(TBL_TEMPLATE,$data_array);
   return $this->db->insert_id();
}

function store_offer_data($data_array)
{
   $this->db->insert(TBL_OFFER,$data_array);
   return $this->db->insert_id();
}

function get_all_templates(){
 $this->db->select('*');
 $this->db->from(TBL_TEMPLATE_STORE);
 $this->db->where('is_delete',0);
 $this->db->where('franchise_id',$this->session->userdata('user_id'));
 $query = $this->db->get();
 if($query->num_rows() > 0){
    return $query->result();
}
return array();
}

function update_template_data($id){
    $this->db->set('is_delete',1);
    $this->db->where('id',$id);
    $this->db->update(TBL_TEMPLATE_STORE);
}

function delete_email_template_data($id){
    $this->db->set('is_delete',1);
    $this->db->where('id',$id);
    $this->db->update(TBL_EMAIL_TEMPLATE_STORE);
}

function fetch_template_data_byid($id){
    $this->db->select('*');
    $this->db->from(TBL_TEMPLATE_STORE);
    $this->db->where('id',$id);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->row();
    }
    return array();

}
function fetch_email_template_data_byid($id){
    $this->db->select('*');
    $this->db->from(TBL_EMAIL_TEMPLATE_STORE);
    $this->db->where('id',$id);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->row();
    }
    return array();
}

function update_email_template_data($template_array,$id){
  $this->db->set($template_array);
  $this->db->where('id',$id);
  $this->db->update(TBL_EMAIL_TEMPLATE_STORE);

}

function update_template_record($data_array,$id){
    $this->db->set($data_array);
    $this->db->where('id',$id);
    $this->db->update(TBL_TEMPLATE_STORE);
}

function update_franchise_template_data($data_array,$id){
    $this->db->set($data_array);
    $this->db->where('id',$id);
    $this->db->update(TBL_TEMPLATE);
}

function update_offer_data($data_array,$id){
    $this->db->set($data_array);
    $this->db->where('id',$id);
    $this->db->update(TBL_OFFER);
}
function store_email_template_data($template_array){
    $this->db->insert(TBL_EMAIL_TEMPLATE_STORE,$template_array);
}
function get_email_template_records(){
    $this->db->select('*');
    $this->db->from(TBL_EMAIL_TEMPLATE_STORE);
    $this->db->where('is_delete',0);
    $this->db->where('franchise_id',$this->session->userdata('user_id'));
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }
    return array();
}
function get_payment_records(){
    $this->db->select('*');
    $this->db->from(TBL_PAYMENT);
    $this->db->where('user_id',$this->session->userdata('user_id'));
    $this->db->order_by('pay_date', 'DESC');
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }
    return array();
}

function get_flights_record($id){
    $this->db->select('*');
    $this->db->from(TBL_FLIGHT_BOOK);
    $this->db->where('id',$id);
    
    $query = $this->db->get();
    if($query->num_rows() > 0){
         return $query->row();
    }
    return array();
}
    


function get_passbook_records($form="",$to=""){

   $this->db->select('amount,ref_type,service_type,ref_id,payment_type,contact,( CASE WHEN payment_type = 1 THEN "CREDIT" ELSE "DEBIT" END) AS ptype,created_at,( CASE WHEN service_type = 1 THEN "FLIGHT" WHEN service_type = 4 THEN "Softwere Monthly Charge Auto debit" WHEN service_type = 3 THEN "VISA" WHEN service_type = 6 THEN "Free Coupon" WHEN service_type = 7 THEN "Cash Hand"  ELSE "In Comming" END) AS servisetype , sum(case when payment_type = 0 then -amount when payment_type = 1 then amount  end) over(order by id rows unbounded preceding) as balance');

/*$this->db->select('amount,ref_type,service_type,ref_id,payment_type,contact,( CASE WHEN payment_type = 1 THEN "CREDIT" ELSE "DEBIT" END) AS ptype,created_at,( CASE WHEN service_type = 1 THEN "FLIGHT" WHEN service_type = 4 THEN "Softwere Monthly Charge Auto debit" WHEN service_type = 3 THEN "VISA" ELSE "In Comming" END) AS servisetype');*/


    $this->db->from(TBL_USER_PASSBOOK);
    $this->db->where('user_id',$this->session->userdata('user_id'));
    //$this->db->order_by('created_at', 'DESC');

    if($form != "" && $to != ""){
        $this->db->where('DATE(created_at) BETWEEN "'. date('Y-m-d', strtotime($form)). '" and "'. date('Y-m-d', strtotime($to)).'"');
    }
    $query = $this->db->get();
    //echo $this->db->last_query(); exit;
    if($query->num_rows() > 0){
        return $query->result();
    }
    return array();
}

function get_email_template_data(){
 $this->db->select('id,name');
 $this->db->from(TBL_EMAIL_TEMPLATE_STORE);
 $this->db->where('is_delete',0);
 if($this->session->userdata('user_role') == User_role::FRANCHISE){
     $this->db->where('franchise_id',$this->session->userdata('user_id'));
 }
 if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
     $this->db->where('franchise_id',$this->session->userdata('franchise_id'));
 }

 $query = $this->db->get();
 if($query->num_rows() > 0){
    return $query->result();
}
return array();
}

function get_template_description_by_id($email_template_id){
    $this->db->select('*');
    $this->db->from(TBL_EMAIL_TEMPLATE_STORE);
    $this->db->where('id',$email_template_id);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->row();
    }
    return array();
}
function get_user_detail_by_id($value){
    $this->db->select('*');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    $this->db->where('id',$value);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->row();
    }
    return array();
}

function check_email_enquiry($value){
    $this->db->select('*');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    $this->db->where('email',$value);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->row();
    }
    return array();
}

function check_phone_enquiry($value){
    $this->db->select('*');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    $this->db->where('mobile_no',trim($value));
    $this->db->where('franchise_id',$this->session->userdata('user_id'));
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->row();
    }
    return array();
}

function get_whatsup_template_data(){
   $this->db->select('id,name');
   $this->db->from(TBL_TEMPLATE_STORE);
   if($this->session->userdata('franchise_id') && $this->session->userdata('franchise_id') > 0 && $this->session->userdata('user_role') == "6"){
       $this->db->where('franchise_id',$this->session->userdata('franchise_id'));
   }else{
    $this->db->where('franchise_id',$this->session->userdata('user_id'));
}
$this->db->where('is_delete',0);
$query = $this->db->get();
if($query->num_rows() > 0){
    return $query->result();
}
return array();
}



function fetch_whatsup_desc_by_id($id){
    $this->db->select('*');
    $this->db->from(TBL_TEMPLATE_STORE);
    $this->db->where('id',$id);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->row();
    }
    return array();

}

function fetch_user_content_by_id($id){
    $this->db->select('*');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    $this->db->where('id',$id);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->row();
    }
    return array();
}

function store($data,$tbl){
    $this->db->insert($tbl,$data);
    return $this->db->insert_id();
}

function check_user_email_exist_or_not($id){
    $this->db->select('user_id');
    $this->db->from(TBL_STORE_EMAIL_CREDENCIALS);
    $this->db->where('user_id',$id);
    $this->db->where('is_delete',0);
    return $query = $this->db->get()->row();
    
}

function get_all_cred($id){
    $this->db->select('*');
    $this->db->from(TBL_STORE_EMAIL_CREDENCIALS);
    $this->db->where('user_id',$id);
    $this->db->where('is_delete',0);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }
    return array();
}

function ger_old_info($id,$tbl,$compare_field){
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($compare_field,$id);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->row();
    }
    return array();
}

function update_record($set,$id,$tbl){
    $this->db->set($set);
    $this->db->where('id',$id);
    $this->db->update($tbl);
}

function fetch_user_email_credencials($id){
 $this->db->select('email,client_id,client_secret');
 $this->db->from(TBL_STORE_EMAIL_CREDENCIALS);
 $this->db->where('user_id',$id);
 $this->db->where('is_delete',0);
 $query = $this->db->get();
 if($query->num_rows() > 0){
    return $query->row();
}
return array();
}

function fetch_settings_report_data($follow_up_date,$language,$s_description,$staff_id,$p_valid_from,$p_valid_to,$i_country=array(),$enquiry_from,$enquiry_to,$status,$city=array(),$enquiry_type=0,$reason_type=0){


    $this->db->select('saf.id,saf.name,saf.email,saf.company,saf.mobile_no,saf.enquiry_type,saf.visa_id,saf.city,saf.language,saf.s_description,saf.description,saf.supplier_id,saf.follow_up_date,saf.biomatric_date,saf.interview_date,saf.intersted_country,saf.created_at,saf.pool_status as current_pull, saf.passport_no,saf.p_valid_from,saf.p_valid_to,pm.name as enquiry_type_name,pm.meta_id as enquiry_type_id,u.first_name as staff_name,CASE WHEN EXISTS (select * from cs_visa_application B where B.passing = saf.mobile_no) THEN "yes" ELSE "no" END as passing,CASE WHEN EXISTS (select * from cs_visa_application B where B.passing = saf.email) THEN "yes" ELSE "no" END as emailpassing,count(ed.sup_id) as dtotal');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' saf');
    $this->db->join(TBL_USERS . ' u','saf.enquiry_staff_id = u.user_id','left');
    $this->db->join(TBL_PACKAGE_META . ' pm','saf.enquiry_type=pm.meta_id','left');
    $this->db->join(TBL_ENQUIRY_DOCUMENT . ' ed','saf.id=ed.sup_id','LEFT');

    //$this->db->join("($subquery)  t2","t2.sup_id = saf.id");
    

    if(isset($reason_type) && $reason_type > 0){
        $this->db->join(TBL_POOL_TBL_DESCRIPTION . ' ptd','saf.id=ptd.master_id','left');
    }
    

    if(isset($reason_type) && $reason_type > 0){
        $this->db->where('ptd.pool_status_des_id',$reason_type);
    }
    if(isset($language) && $language != ""){
        $this->db->where('language',$language);
    }
    if(isset($follow_up_date) && $follow_up_date != ""){
        $this->db->where('follow_up_date',date('Y-m-d',strtotime($follow_up_date)));
    }
    if(isset($s_description) && $s_description != ""){
        $this->db->where('s_description',$s_description);
    }
    
    if(isset($staff_id) && $staff_id != ""){
        $this->db->where('enquiry_staff_id',$staff_id);
    }

    if($enquiry_from != "" && $enquiry_to != ""){
        $this->db->where('DATE(created_at) BETWEEN "'. date('Y-m-d', strtotime($enquiry_from)). '" and "'. date('Y-m-d', strtotime($enquiry_to)).'"');
    }
    if(isset($enquiry_from) && $enquiry_from != "" && $enquiry_to == ""){
        $this->db->where('DATE(created_at)',date('Y-m-d',strtotime($enquiry_from)));
    }
    if(isset($enquiry_to) && $enquiry_to != "" && $enquiry_from == ""){
        $this->db->where('DATE(created_at)',date('Y-m-d',strtotime($enquiry_to)));
    }

    if(isset($enquiry_type) && $enquiry_type > 0){
        $this->db->where('enquiry_type',$enquiry_type);
    }



    if(!empty($i_country)){
     $this->db->group_start();
     foreach($i_country as $value)
     {
        $this->db->where("find_in_set($value, saf.intersted_country) !=",0);
     }
     $this->db->group_end();
    }

if(!empty($city)){
 $this->db->group_start();
 foreach($city as $value)
 {
    $this->db->where("find_in_set($value, saf.city) !=",0);
}
$this->db->group_end();
}

if(isset($p_valid_from) && $p_valid_from != ""){
    $this->db->where('p_valid_from',date('Y-m-d',strtotime($p_valid_from)));
}
if(isset($p_valid_to) && $p_valid_to != ""){
    $this->db->where('p_valid_to',date('Y-m-d',strtotime($p_valid_to)));
}

    if(isset($status) && $status > 0){
        $this->db->where('saf.pool_status',$status);
    }else{
        //$postIDs = array(Enquiry_pool_status::DROP,Enquiry_pool_status::PROCESS);
        $postIDs = array(Enquiry_pool_status::DROP,Enquiry_pool_status::PROCESS);
        $this->db->where_not_in('saf.pool_status', $postIDs);
    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('saf.franchise_id',$this->session->userdata('user_id'));

    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
        $this->db->where('saf.enquiry_staff_id',$this->session->userdata('user_id'));
    }
    $this->db->group_by('saf.id');
    $this->db->order_by('saf.id', 'desc');
   $query = $this->db->get();


if($query->num_rows() > 0){
    return $query->result();
}
return array();

}



function fetch_settings_report_detail_data($status,$uname="",$email="",$number=""){
    $this->db->select('saf.id,saf.name,saf.email,saf.company,saf.mobile_no,saf.enquiry_type,saf.city,saf.language,saf.visa_id,saf.s_description,saf.description,saf.supplier_id,saf.follow_up_date,saf.biomatric_date,saf.interview_date,saf.intersted_country,saf.created_at,saf.pool_status as current_pull,saf.passport_no,saf.p_valid_from,saf.p_valid_to,pm.name as enquiry_type_name,pm.meta_id as enquiry_type_id,u.first_name as staff_name,CASE WHEN EXISTS (select * from cs_visa_application B where B.passing = saf.mobile_no) THEN "yes" ELSE "no" END as passing,CASE WHEN EXISTS (select * from cs_visa_application B where B.passing = saf.email) THEN "yes" ELSE "no" END as emailpassing,count(ed.sup_id) as dtotal');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' saf');
    $this->db->join(TBL_PACKAGE_META . ' pm','saf.enquiry_type=pm.meta_id','left');
    $this->db->join(TBL_USERS . ' u','saf.enquiry_staff_id = u.user_id','left');
     $this->db->join(TBL_ENQUIRY_DOCUMENT . ' ed','saf.id=ed.sup_id','left');

    if(isset($uname) && $uname != ""){
        $this->db->where('saf.name',$uname);
    }
    if(isset($email) && $email != ""){
        $this->db->where('saf.email',$email);
    }
    if(isset($number) && $number != ""){
        $this->db->where('saf.mobile_no',$number);
    }
    
    
    if(isset($status) && $status > 0){
        $this->db->where('pool_status',$status);
    }else{
        //$postIDs = array(Enquiry_pool_status::DROP,Enquiry_pool_status::PROCESS);
        $postIDs = array(Enquiry_pool_status::DROP,Enquiry_pool_status::PROCESS);
        $this->db->where_not_in('saf.pool_status', $postIDs);
    }

     if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('saf.franchise_id',$this->session->userdata('user_id'));

    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
        $this->db->where('saf.enquiry_staff_id',$this->session->userdata('user_id'));
    }
      $this->db->group_by('saf.id');
    $this->db->order_by('saf.id', 'desc');
    $query = $this->db->get();
    

    if($query->num_rows() > 0){
        return $query->result();
    }
    return array();
}

function get_all_franchise_freecoupon($country="",$frim="",$type=""){
    
    $this->db->select('*');
    $this->db->from(TBL_USERS . ' u');
    $this->db->join(TBL_PROFILE . ' pf','pf.user_id=u.user_id','left');
    $this->db->join(TBL_USER_PASSBOOK . ' up','u.user_id=up.user_id','left');
    $this->db->select_sum('up.amount');
    
    if(isset($country) && $country > 0){
        $this->db->where('pf.country',$country);
    }
    if(isset($frim) && $frim != ""){
        $this->db->where('u.firm_name=',$frim);
    }
    if(isset($type) && $type != ""){
        $this->db->where('up.service_type',$type);
    }else{
        $this->db->where('up.service_type',Service_type::FREE_COUPON);
    }
    $this->db->group_by('u.user_id');
    $this->db->where('u.role',User_role::FRANCHISE);
   $query = $this->db->get();

   /*$str = $this->db->last_query();
    echo "<pre>";
    print_r($str);
    */
    if($query->num_rows() > 0){
        return $query->result();
    }
    return array();

}

function get_user_franchise_freecoupon($userid="",$type=""){
    
    $this->db->select('*');
    $this->db->from(TBL_USERS . ' u');
    $this->db->join(TBL_USER_PASSBOOK . ' up','u.user_id=up.user_id','left');
    $this->db->where('u.user_id',$userid);
    $this->db->where('u.role',User_role::FRANCHISE);
    if(isset($type) && $type != ""){
        $this->db->where('up.service_type',$type);
    }else{
        $this->db->where('up.service_type',Service_type::FREE_COUPON);
    }
    
   $query = $this->db->get();

    if($query->num_rows() > 0){
        return $query->result();
    }
    return array();

}

function fetch_country_name_byid($id){
    $this->db->select('name');
    $this->db->from(TBL_COUNTRIES_SUPPLIER);
    $this->db->where_in('id',$id);
    return $this->db->get()->result();
}
function fetch_deadline_description($id){
    $this->db->select('deadline_desc');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    $this->db->where_in('id',$id);
    return $this->db->get()->row();
}

function change_enquiry_pool_status($status,$r_id){
    $this->db->set($status);
    $this->db->where('id',$r_id);
    $this->db->update(TBL_SUPPLIER_ADD_FRANCHISE);
}
function fetch_interview_pool_data($pool_id,$enquiry_type_id=0,$staff_id=0,$startdate=0,$enddate=0){
    $this->db->select('sf.id,sf.name,sf.email,sf.follow_up_date,sf.biomatric_date,sf.interview_date,sf.description,sf.pool_status,sf.mobile_no,u.first_name as staff_name,eit.img_name as enquiry_type_icon_img');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' sf');
    $this->db->join(TBL_USERS . ' u','sf.enquiry_staff_id = u.user_id','left');
    $this->db->join(TBL_ENQUIRY_CATEGORY_ICON_TBL . ' eit','sf.enquiry_type = eit.enquiry_id','left');
    // $this->db->join(TBL_POOL_TBL_DESCRIPTION . ' td','sf.id = td.master_id');

    $this->db->where('sf.is_delete',0);
    $this->db->where('sf.pool_status',$pool_id);

    if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('sf.franchise_id',$this->session->userdata('user_id'));

    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
        $this->db->where('sf.enquiry_staff_id',$this->session->userdata('user_id'));
        
    }

    if($enquiry_type_id > 0){
        $this->db->where('sf.enquiry_type',$enquiry_type_id);
    }
    if($staff_id > 0){
        $this->db->where('sf.enquiry_staff_id',$staff_id);
    }
     if($startdate > 0 && $enddate > 0){
        $this->db->where('sf.interview_date >=', $startdate);
        $this->db->where('sf.interview_date <=', $enddate);
    }

    return $this->db->get()->result();

}
function fetch_pool_data($pool_id,$enquiry_type_id=0,$staff_id=0){
    $query =  $this->db->select('sf.id,sf.name,sf.email,sf.company,sf.follow_up_date,sf.biomatric_date,sf.created_at,sf.interview_date,sf.visa_id,sf.intersted_country,sf.description,sf.pool_status,sf.mobile_no,u.first_name as staff_name,tm.name as enquiry_type_name,CASE WHEN EXISTS (select * from cs_visa_application B where B.passing = sf.mobile_no) THEN "yes" ELSE "no" END as passing,CASE WHEN EXISTS (select * from cs_visa_application B where B.passing = sf.email) THEN "yes" ELSE "no" END as emailpassing,GROUP_CONCAT(co.name SEPARATOR ", ") AS countryname,count(ed.sup_id) as dtotal');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' sf');
    $this->db->join(TBL_USERS . ' u','sf.enquiry_staff_id = u.user_id','left');
    //$this->db->join(TBL_ENQUIRY_CATEGORY_ICON_TBL . ' eit','sf.enquiry_type = eit.enquiry_id','left');
    $this->db->join(TBL_PACKAGE_META . ' tm','sf.enquiry_type = tm.meta_id','left');
    $this->db->join(TBL_COUNTRIES_SUPPLIER. ' co',"FIND_IN_SET(co.id,sf.intersted_country) > 0","left");
    $this->db->join(TBL_ENQUIRY_DOCUMENT . ' ed','sf.id=ed.sup_id','left');


    $this->db->where('sf.is_delete',0);

    $this->db->group_start();
    $this->db->where('sf.pool_status',$pool_id);
    $this->db->or_where('sf.pool_status',4);
    $this->db->group_end();

    if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('sf.franchise_id',$this->session->userdata('user_id'));

    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
        $this->db->where('sf.enquiry_staff_id',$this->session->userdata('user_id'));
    }

    if($enquiry_type_id > 0){
        $this->db->where('sf.enquiry_type',$enquiry_type_id);
    }
    if($staff_id > 0){
        $this->db->where('sf.enquiry_staff_id',$staff_id);
    }
    $this->db->order_by('DATE(sf.follow_up_date)','DESC');
    $this->db->group_by('sf.id');
   
 
    return $this->db->get()->result();
    

}
function fetch_pool_data_staff($pool_id,$user_id){
    $this->db->select('id,name,email,follow_up_date,description,pool_status,mobile_no');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' sf');
    $this->db->where('sf.is_delete',0);
    $this->db->where('sf.pool_status',$pool_id);
    $this->db->where('sf.enquiry_staff_id',$user_id);
    return $this->db->get()->result();
}

function update_reset_password($data_array,$user_id){
 $this->db->set($data_array);
 $this->db->where('user_id',$user_id);
 $this->db->update(TBL_USERS);
}
function fetch_all_tbl_data(){
   $this->db->select('id,pool_status_info,( CASE WHEN pool_status = 1 THEN "PROCESS" WHEN pool_status = 2 THEN "FINALIZE" ELSE "DROP" END) AS status');
   $this->db->from(TBL_POOL_MASTER_TBL);
   $this->db->where('is_delete',0);
   return $this->db->get()->result();
}
function fetch_old_pool_record_data($id){
   $this->db->select('id,pool_status_info,pool_status');
   $this->db->from(TBL_POOL_MASTER_TBL);
   $this->db->where('id',$id);
   return $this->db->get()->row();
}

function view_pool_des_status(){
    $this->db->select('id,name,email,description,follow_up_date,pool_status');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    $this->db->where('is_delete',0);
    return $this->db->get()->result();
}
function fetch_all_pool_master_status($status){
    $this->db->select('id,pool_status_info');
    $this->db->from(TBL_POOL_MASTER_TBL);
    $this->db->where('pool_status',$status);
    $this->db->where('is_delete',0);
    return $this->db->get()->result();
}

function get_all_status_des_by_id($id){
    $this->db->select('ptd.id,ptd.pool_status,ptd.pool_description,pmt.pool_status_info,ptd.created_at');
    $this->db->from(TBL_POOL_TBL_DESCRIPTION . ' ptd');
    $this->db->join(TBL_POOL_MASTER_TBL . ' pmt','ptd.pool_status_des_id = pmt.id','left');
    $this->db->where('ptd.master_id',$id);
    return $this->db->get()->result();
}

function get_all_franchise_holder_name(){

    $this->db->select('user_id,first_name,last_name,firm_name');
    $this->db->from(TBL_USERS);
    $this->db->where('role',User_role::FRANCHISE);
    $this->db->where('user_deleted',Deleted_status::NOT_DELETED);
    return $this->db->get()->result();
}

function fetch_all_image_data($id){

    $this->db->select('img_name');
    $this->db->from(TBL_TURIST_ATT_IMAGE);
    $this->db->where('master_id',$id);
    $this->db->where('is_delete',0);
    return $this->db->get()->result();
}

function fetch_all_itenerary_image_data($id){

    $this->db->select('img_name');
    $this->db->from(TBL_ITENERARY_ATT_IMAGE);
    $this->db->where('master_id',$id);
    $this->db->where('is_delete',0);
    return $this->db->get()->result();
}

function get_firm_by_country($countryid){
    $this->db->select('u.user_id,u.firm_name,pf.country');
    $this->db->from(TBL_USERS . ' u');
    $this->db->join(TBL_PROFILE . ' pf','pf.user_id = u.user_id','left');
    $this->db->where('u.role',User_role::FRANCHISE);
    $this->db->where('pf.country',$countryid);
    $this->db->where('u.user_deleted',Deleted_status::NOT_DELETED);
    return $this->db->get()->result();

}

function fetch_admin_franchise_tbl_data($franchise_id,$s_status,$enquiry_from,$enquiry_to){
    $this->db->select('id,name,email,description,follow_up_date,pool_status,created_at');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    if(isset($franchise_id) && $franchise_id != ""){
        $this->db->where('franchise_id',$franchise_id);
    } 
    if(isset($s_status) && $s_status != ""){
        $this->db->where('pool_status',$s_status);
    } 
    if($enquiry_from != "" && $enquiry_to != ""){
        // $this->db->where('DATE(created_at) BETWEEN "'. date('Y-m-d', strtotime($enquiry_from)). '" and "'. date('Y-m-d', strtotime($enquiry_to)).'"');
        $this->db->where('DATE(created_at) >=', date('Y-m-d', strtotime($enquiry_from)));
        $this->db->where('DATE(created_at) <=', date('Y-m-d', strtotime($enquiry_to)));
        // $this->db->where('DATE(created_at) >=', date('Y-m-d', strtotime($enquiry_from)));
    }
    if(isset($enquiry_from) && $enquiry_from != "" && $enquiry_to == ""){
        $this->db->where('DATE(created_at)',date('Y-m-d',strtotime($enquiry_from)));
    }
    // $this->db->where('is_delete',0);
    if(isset($enquiry_to) && $enquiry_to != "" && $enquiry_from == ""){
        $this->db->where('DATE(created_at)',date('Y-m-d',strtotime($enquiry_to)));
    }
    $this->db->where('is_delete',0);
    return $this->db->get()->result();

}

function fetch_all_today_followup_data(){
 $this->db->select('*');
 $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
 $this->db->where('is_delete','0');
 $this->db->where('franchise_id',$this->session->userdata('user_id'));
   // if($today_date != ""){
   //     $this->db->where('follow_up_date',$today_date);
   // }
 $this->db->order_by('follow_up_date','desc');
 return $this->db->get()->result();
}
function fetch_all_todays_followup_data($today_date,$enquiry_type_id=0,$staff_id=0){
 $this->db->select('saf.*,u.first_name as staff_name,saf.visa_id,CASE WHEN EXISTS (select * from cs_visa_application B where B.passing = saf.mobile_no) THEN "yes" ELSE "no" END as passing,tm.name as enquiry_type_name,tm.meta_id as enquiry_type_id,CASE WHEN EXISTS (select * from cs_visa_application B where B.passing = saf.email) THEN "yes" ELSE "no" END as emailpassing,GROUP_CONCAT(co.name SEPARATOR ", ") AS countryname,count(ed.sup_id) as dtotal');
 $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' saf');
 $this->db->join(TBL_USERS . ' u','saf.enquiry_staff_id = u.user_id','left');
 //$this->db->join(TBL_ENQUIRY_CATEGORY_ICON_TBL . ' eit','saf.enquiry_type = eit.enquiry_id','left');
 $this->db->join(TBL_PACKAGE_META . ' tm','saf.enquiry_type = tm.meta_id','left');
 $this->db->join(TBL_COUNTRIES_SUPPLIER. ' co',"FIND_IN_SET(co.id,saf.intersted_country) > 0","left");
 $this->db->join(TBL_ENQUIRY_DOCUMENT . ' ed','saf.id=ed.sup_id','left');
 $this->db->where('saf.is_delete','0');
 $this->db->where('saf.pool_status','0');

 if($this->session->userdata('user_role') == User_role::FRANCHISE){ 
     $this->db->where('saf.franchise_id',$this->session->userdata('user_id'));
     //$this->db->or_where('saf.enquiry_staff_id',$this->session->userdata('user_id'));
 }
 if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
     $this->db->where('saf.enquiry_staff_id',$this->session->userdata('user_id'));
 }
 if($today_date != ""){
     $this->db->where('saf.follow_up_date',$today_date);

 }
 if($staff_id > 0){
    $this->db->where('saf.enquiry_staff_id',$staff_id);
}

if($enquiry_type_id > 0){
 $this->db->where('saf.enquiry_type',$enquiry_type_id);
}
$this->db->order_by('saf.follow_up_date','desc');
$this->db->group_by('saf.id');
return $this->db->get()->result();
}


function fetch_all_withoutdeadline(){
    
    $this->db->select('saf.*,u.first_name as staff_name,eit.img_name as enquiry_type_icon_img,pm.name as expriry_type_name');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' saf');
    $this->db->join(TBL_USERS . ' u','saf.enquiry_staff_id = u.user_id','left');
    $this->db->join(TBL_ENQUIRY_CATEGORY_ICON_TBL . ' eit','saf.enquiry_type = eit.enquiry_id','left');
    $this->db->join(TBL_PACKAGE_META . ' pm','saf.enquiry_type=pm.meta_id','left');
    $this->db->where('saf.is_delete','0');
    if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('saf.franchise_id',$this->session->userdata('user_id'));

    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
        $this->db->where('saf.enquiry_staff_id',$this->session->userdata('user_id'));
    }
    $this->db->where('saf.biomatric_date',NULL);
    $this->db->where('saf.interview_date',NULL);
    $this->db->where('saf.pool_status',Enquiry_pool_status::PROCESS);
    $this->db->order_by('saf.follow_up_date','desc');

    return $this->db->get()->result();
}

function fetch_all_upcommingdeadline($enquiry_from="",$enquiry_to="",$date=""){
    
    $this->db->select('saf.*,u.first_name as staff_name,saf.enquiry_type,eit.img_name as enquiry_type_icon_img,pm.name as expriry_type_name');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' saf');
    $this->db->join(TBL_USERS . ' u','saf.enquiry_staff_id = u.user_id','left');
    $this->db->join(TBL_ENQUIRY_CATEGORY_ICON_TBL . ' eit','saf.enquiry_type = eit.enquiry_id','left');
    $this->db->join(TBL_PACKAGE_META . ' pm','saf.enquiry_type=pm.meta_id','left');
    $this->db->where('saf.is_delete','0');
    if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('saf.franchise_id',$this->session->userdata('user_id'));

    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
        $this->db->where('saf.enquiry_staff_id',$this->session->userdata('user_id'));
    }
     if($enquiry_from > 0 && $enquiry_to > 0){
        $this->db->where('DATE(biomatric_date) BETWEEN "'. date("Y-m-d",strtotime($enquiry_from)). '" and "'. date("Y-m-d",strtotime($enquiry_to)).'"');
    }
    if($date != "" && $date != ""){
        $this->db->where('DATE(biomatric_date) BETWEEN "'. date('Y-m-d'). '" and "'. date('Y-m-d', strtotime($date)).'"');
    }
    //$this->db->where('saf.biomatric_date','');
    $this->db->where('saf.pool_status !=',Enquiry_pool_status::FINALIZE);
 
    $this->db->order_by('saf.follow_up_date','desc');

    return $this->db->get()->result();
}

function fetch_all_upcommingdeadline_count($date=""){
    
    $this->db->select('saf.*,u.first_name as staff_name,saf.enquiry_type,eit.img_name as enquiry_type_icon_img,pm.name as expriry_type_name');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' saf');
    $this->db->join(TBL_USERS . ' u','saf.enquiry_staff_id = u.user_id','left');
    $this->db->join(TBL_ENQUIRY_CATEGORY_ICON_TBL . ' eit','saf.enquiry_type = eit.enquiry_id','left');
    $this->db->join(TBL_PACKAGE_META . ' pm','saf.enquiry_type=pm.meta_id','left');
    $this->db->where('saf.is_delete','0');
    if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('saf.franchise_id',$this->session->userdata('user_id'));

    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
        $this->db->where('saf.enquiry_staff_id',$this->session->userdata('user_id'));
    }
    /* if($enquiry_from > 0 && $enquiry_to > 0){
        $this->db->where('DATE(biomatric_date) BETWEEN "'. date("Y-m-d",strtotime($enquiry_from)). '" and "'. date("Y-m-d",strtotime($enquiry_to)).'"');
    }*/
    if($date != "" && $date != ""){
        $this->db->where('DATE(biomatric_date) BETWEEN "'. date('Y-m-d'). '" and "'. date('Y-m-d', strtotime($date)).'"');
    }
    //$this->db->where('saf.biomatric_date','');
    $this->db->where('saf.pool_status !=', Enquiry_pool_status::FINALIZE);
 
    $this->db->order_by('saf.follow_up_date','desc');

    $query = $this->db->get();
        if($query->num_rows() > 0){
             return $query->num_rows();
        }
        return array();

}


function fetch_all_yesterday_followup_data($y_date,$enquiry_type_id=0,$staff_id=0){
    //,GROUP_CONCAT(co.name SEPARATOR ", ") AS countryname
    $this->db->select('saf.*,u.first_name as staff_name,CASE WHEN EXISTS (select * from cs_visa_application B where B.passing = saf.mobile_no) THEN "yes" ELSE "no" END as passing,tm.name as enquiry_type_name,tm.meta_id as enquiry_type_id,CASE WHEN EXISTS (select * from cs_visa_application B where B.passing = saf.email) THEN "yes" ELSE "no" END as emailpassing,count(ed.sup_id) as dtotal');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' saf');
    $this->db->join(TBL_USERS . ' u','saf.enquiry_staff_id = u.user_id','left');
    //$this->db->join(TBL_ENQUIRY_CATEGORY_ICON_TBL . ' eit','saf.enquiry_type = eit.enquiry_id','left');
    $this->db->join(TBL_PACKAGE_META . ' tm','saf.enquiry_type = tm.meta_id','left');
    $this->db->join(TBL_ENQUIRY_DOCUMENT . ' ed','saf.id=ed.sup_id','left');
    //$this->db->join(TBL_COUNTRIES_SUPPLIER. ' co',"FIND_IN_SET(co.id,saf.intersted_country) > 0","left");
    $this->db->where('saf.is_delete','0');
    $this->db->where('saf.pool_status','0');
    if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('saf.franchise_id',$this->session->userdata('user_id'));
    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
        $this->db->where('saf.enquiry_staff_id',$this->session->userdata('user_id'));
    }
    if($y_date != ""){
        $this->db->where('saf.follow_up_date <=',$y_date);
    }
    if($enquiry_type_id > 0){
        $this->db->where('saf.enquiry_type',$enquiry_type_id);
    }
    if($staff_id > 0){
        $this->db->where('saf.enquiry_staff_id',$staff_id);
    }
    $this->db->order_by('saf.follow_up_date','desc');
    $this->db->group_by('saf.id');
    return $this->db->get()->result();
  }

function get_all_enquiry_data_status($id){

 $this->db->select('enquiry_date');
 $this->db->from(TBL_ADD_ENQUIRY_STATUS);
 $this->db->where('enquiry_id',$id);
 $this->db->order_by('id','desc');
 return $this->db->get()->row();
}

function fetch_process_pool_last_entry($status,$r_id){
 $this->db->select('created_at');
 $this->db->from(TBL_POOL_TBL_DESCRIPTION);
 $this->db->where('pool_status',$status);
 $this->db->where('master_id',$r_id);
 $this->db->where('pool_status','1');
 $this->db->order_by('id','desc');
 return $this->db->get()->row();
}

function getch_all_cities_by_id($all_state_id){
    $this->db->select('id,name');
    $this->db->from(TBL_CITIES_SUPPLIER);
    if(!empty($all_state_id)){
        $this->db->where_in('state_id',$all_state_id);
        $this->db->or_where('state_id','0');
    }

    $this->db->order_by('id','ASC');
    return $this->db->get()->result();
}
function get_all_itenerary($country=0,$city=0,$is_global=0){
    $this->db->select('mt.i_name,mt.id,mt.destination,mt.city,tc.name as c_name,tct.name as city_nm');
    $this->db->from(TBL_MASTER_ITENERARY . ' mt');
    $this->db->join(TBL_COUNTRIES_SUPPLIER . ' tc','mt.destination = tc.id','left');
    $this->db->join(TBL_CITIES_SUPPLIER . ' tct','mt.city = tct.id','left');

    if(isset($country) && $country > 0){
        $this->db->where('mt.destination',$country);
    }

    if($is_global == 0){ 
        $this->db->where('mt.franchise_id',$this->session->userdata('user_id'));
        $this->db->where('mt.is_admin_or_franchise',Itenerary_local_global_module::IS_FRANCHISE);
    }else{
        $this->db->where('mt.is_admin_or_franchise',Itenerary_local_global_module::IS_ADMIN);
    }
   /* $test = $this->getdateuserdata($this->session->userdata('user_id'));
    xdebug($test);*/

    if(isset($city) && $city > 0){
        $this->db->where('mt.city',$city);
    }
    $this->db->where('mt.is_delete',0);
    $this->db->order_by('mt.id','desc');
    return $this->db->get()->result();
}

function get_all_itenerary_staff($country=0,$city=0,$is_global=0){
    $this->db->select('mt.i_name,mt.id,mt.franchise_id,mt.destination,mt.city,tc.name as c_name,tct.name as city_nm');
    $this->db->from(TBL_MASTER_ITENERARY . ' mt');
    $this->db->join(TBL_COUNTRIES_SUPPLIER . ' tc','mt.destination = tc.id','left');
    $this->db->join(TBL_CITIES_SUPPLIER . ' tct','mt.city = tct.id','left');


    if(isset($country) && $country > 0){
        $this->db->where('mt.destination',$country);
    }

    $this->db->where('mt.franchise_id',$this->session->userdata('franchise_id'));
    //$this->db->where('mt.is_admin_or_franchise',Itenerary_local_global_module::IS_FRANCHISE);
        

    if(isset($city) && $city > 0){
        $this->db->where('mt.city',$city);
    }
    $this->db->where('mt.is_delete',0);
    $this->db->order_by('mt.id','desc');
    return $this->db->get()->result();
}


/*
function getdateuserdata($id){
   $this->db->select('user_id');
   $this->db->where('user_id',$id);
   $this->db->from(TBL_USERS);
   return $this->db->get()->result();
     
}*/

function get_all_itenerary_destination($country=0,$city=0,$is_admin=0){
   $this->db->select('meta_id,name,description');
   $this->db->from(TBL_PACKAGE_META);
   $this->db->where('country',$country);
   if($city > 0){
       $this->db->where('city',$city);
   }
   if($is_admin > 0){
       $this->db->where('is_admin',$is_admin);
   }
   $this->db->where('is_deleted',0);
   $this->db->group_start();
   $this->db->where('created_by',$this->session->userdata('user_id'));
   $this->db->or_where('is_local_or_global','2');
   $this->db->group_end();
   return $this->db->get()->result();

}function get_all_itenerary_city($city){
   $this->db->select('meta_id,name,description');
   $this->db->from(TBL_PACKAGE_META);
   $this->db->where('city',$city);
   $this->db->where('is_deleted',0);
   $this->db->group_start();
   $this->db->where('created_by',$this->session->userdata('user_id'));
   $this->db->or_where('is_local_or_global','2');
   $this->db->group_end();

   return $this->db->get()->result();
}
function get_all_itenerary_by_id($id){
    $this->db->select('mt.id,mt.destination,mt.city,mt.i_name');
    $this->db->from(TBL_MASTER_ITENERARY . ' mt');
    $this->db->where('mt.id',$id);
    return $this->db->get()->row();
}

function get_all_drop_reason($status){
    $this->db->select('pb.pool_status_info,pb.pool_status,pb.id');
    $this->db->from(TBL_POOL_MASTER_TBL . ' pb');
    $this->db->where('pb.pool_status',$status);
   $this->db->where('pb.is_delete',0);
    return $this->db->get()->result();
}


function get_all_itenerary_names(){
    $this->db->select('mt.id,mt.i_name');
    $this->db->from(TBL_MASTER_ITENERARY . ' mt');
    // $this->db->where('mt.franchise_id',$this->session->userdata('user_id'));
    if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('mt.franchise_id',$this->session->userdata('user_id'));
    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
        $this->db->where('mt.franchise_id',$this->session->userdata('franchise_id'));
    }
    return $this->db->get()->result();
}
function get_all_itenerarysub_entry($id){
    $this->db->select('si.id,si.master_id,si.day,si.time,si.title,si.detail,pm.description as d_description');
    $this->db->from(TBL_SUB_ITENERARY . ' si');
    $this->db->join(TBL_PACKAGE_META . ' pm','si.detail = pm.meta_id','left');
    $this->db->where('si.master_id',$id);
    $this->db->where('is_delete',0);

    return $this->db->get()->result();
}
function get_all_things_entry($id){
    $this->db->select('thi.id,thi.master_id,thi.things_name');
    $this->db->from(TBL_SUB_TOURIST_THINGS . ' thi');
    $this->db->join(TBL_PACKAGE_META . ' pm','thi.master_id = pm.meta_id','left');
    $this->db->where('thi.master_id',$id);
    $this->db->where('is_delete',0);

    return $this->db->get()->result();
}

function get_all_offer_entry($id){
    $this->db->select('*');
    $this->db->from(TBL_SUB_OFFER . ' thi');
    $this->db->where('thi.offer_id',$id);
    
    return $this->db->get()->result();
}

function update_itenerary_sub_elements($data,$id){
    $this->db->set($data);
    $this->db->where('id',$id);
    $this->db->update(TBL_SUB_ITENERARY);

}

function update_tourist_thing_elements($data,$id){
    $this->db->set($data);
    $this->db->where('id',$id);
    $this->db->update(TBL_SUB_TOURIST_THINGS);
}

function update_itenerary_master_elements($data,$id){
    $this->db->set($data);
    $this->db->where('id',$id);
    $this->db->update(TBL_MASTER_ITENERARY);

}

function fetch_itenerary_details($id){
    $this->db->select('mt.id,mt.destination,mt.city,mt.i_name,tc.name as c_name,tct.name as city_nm');
    $this->db->from(TBL_MASTER_ITENERARY . ' mt');
    $this->db->join(TBL_COUNTRIES_SUPPLIER . ' tc','mt.destination = tc.id','left');
    $this->db->join(TBL_CITIES_SUPPLIER . ' tct','mt.city = tct.id','left');
    $this->db->where('mt.is_delete',0);
    $this->db->where('mt.franchise_id',$this->session->userdata('user_id'));
    $this->db->order_by('mt.id','desc');
    $this->db->where('mt.id',$id); 

    return $this->db->get()->row();
}

function get_all_desc_names($id){
   $this->db->select('meta_id,description,name');
   $this->db->from(TBL_PACKAGE_META);
   $this->db->where('meta_id',$id);
   return $this->db->get()->result();
}

function fetch_sub_destinations_data($id){
    $this->db->select('si.master_id,si.day,si.time,si.title,si.detail,pm.name as turist_place,pm.description as turist_description,pm.meta_id,si.time');
    $this->db->from(TBL_SUB_ITENERARY . ' si');
    $this->db->join(TBL_PACKAGE_META . ' pm','si.title = pm.meta_id','left');
    $this->db->where('si.master_id',$id);
    $this->db->where('si.is_delete',0);
    $this->db->order_by('si.day','asc');
    return $this->db->get()->result();
}

function fetch_all_turist_imgs($id){
    $this->db->select('img_name');
    $this->db->from(TBL_TURIST_ATT_IMAGE);
    $this->db->where('master_id',$id);
    return $this->db->get()->row();
}

function get_suboffer_image($id){
    $this->db->select('*');
    $this->db->from(TBL_SUB_OFFER);
    $this->db->where('id',$id);
    return $this->db->get()->row();
}

function get_all_staff_data($user_id = ""){
    $this->db->select('user_id,first_name,email');
    $this->db->from(TBL_USERS);
    $this->db->where('user_deleted',0);

    if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->where('role',User_role::FRANCHISE_STAFF);
    }
    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
        $this->db->where('created_by',$user_id);
        $this->db->where('role',User_role::FRANCHISE_STAFF);
    }

    return $this->db->get()->result();
}

function fetch_old_staff_data($id){
 $this->db->select('user_id,first_name,email,password,mobile');
 $this->db->from(TBL_USERS);
 $this->db->where('user_id',$id);
 return $this->db->get()->row();
}

function update_fran_staff_data($data,$id){
    $this->db->set($data);
    $this->db->where('user_id',$id);
    $this->db->update(TBL_USERS);

}

function delete_fran_staff($id){
    $this->db->set('user_deleted',1);
    $this->db->where('user_id',$id);
    $this->db->update(TBL_USERS);
}

function delete_fran_template($id){
    $this->db->set('is_deleted',1);
    $this->db->where('id',$id);
    $this->db->update(TBL_TEMPLATE);
}

function delete_offer($id){
    $this->db->set('is_deleted',1);
    $this->db->where('id',$id);
    $this->db->update(TBL_OFFER);
}

function generate_autometic_itinerary_details($city_id=0,$destination,$local_global_module=0){
     $this->db->select('meta_id,duration,country,city,description,address,duration,longitude,latitude');
     $this->db->from(TBL_PACKAGE_META);
     if($city_id > 0){
         $this->db->where('city',$city_id);
     }
     if($destination > 0){
         $this->db->where('country',$destination);
     }
     if($local_global_module > 0){
         $this->db->where('is_admin',$local_global_module);
     }
     $this->db->where('is_meta',Meta::TOURIST_ATTRACTION);
     $this->db->where('created_by',$this->session->userdata('user_id'));
     $this->db->where('is_local_or_global',1);
     $query =  $this->db->get()->row();
     if(!empty($query)){
        return $query;
    }else{
        $this->db->select('meta_id,duration,country,city,description,address,duration,longitude,latitude');
        $this->db->from(TBL_PACKAGE_META);
        if($city_id > 0){
         $this->db->where('city',$city_id);
     }
     if($destination > 0){
         $this->db->where('country',$destination);
     }
     $this->db->where('is_meta',Meta::TOURIST_ATTRACTION);
     $this->db->where('is_local_or_global','2');
     return $this->db->get()->row();
    }

}

function generate_autometic_itinerary_details_by_itenerary($city_id,$lat,$lng,$record_id,$star=array(),$category_id=array(),$is_admin_franchise=0){
    $this->db->select("*, ( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance");                         
    $this->db->from(TBL_PACKAGE_META);   
    if($city_id > 0){
     $this->db->where('city',$city_id);
 }
 if($is_admin_franchise > 0){
     $this->db->where('is_admin',$is_admin_franchise);
 }

 if(!empty($category_id)){
    $this->db->group_start();
    foreach($category_id as $value)
    {
        $this->db->or_where("find_in_set($value, category_id)");
    }
    $this->db->group_end();
    // $this->db->where('category_id',$category_id);
}
$this->db->where('is_meta',Meta::TOURIST_ATTRACTION);
if(!empty($star)){
    $this->db->where_in('star',$star);
}

$this->db->group_start();
$this->db->where('created_by',$this->session->userdata('user_id'));
$this->db->or_where('is_local_or_global','2');
$this->db->group_end(); 

$this->db->order_by('distance','ASC'); 
return $this->db->get()->result();
}

function get_country_name($c_id,$tbl){
    $this->db->select('name');
    $this->db->from($tbl);
    $this->db->where('id',$c_id);
    return $this->db->get()->row();
}

function get_code_by_country_name($ccode){
    $this->db->select('country,sort_name');
    $this->db->from(TBL_FLIGHT_AIRPORT);
    $this->db->where('code',$ccode);
    return $this->db->get()->row();
}


function update_method($tbl,$item_icon_data,$meta_id,$column_id)
{
    $this->db->set($item_icon_data);
    $this->db->where($column_id,$meta_id);
    $this->db->update($tbl);
}

function get_all_place_data(){
    $this->db->select('id,name');
    $this->db->from(TBL_CITIES_SUPPLIER);
    $this->db->where('id >','48356');
    return $this->db->get()->result();
}

function get_all_place_record($id){
    $this->db->select('id,name,state_id,country_id');
    $this->db->from(TBL_CITIES_SUPPLIER);
    $this->db->where('id',$id);
    return $this->db->get()->row();
}

function get_country_place_record($destination){
    $this->db->select('id,name');
    $this->db->from(TBL_CITIES_SUPPLIER);
    if($destination != ""){
        $this->db->where('country_id',$destination);
    }
    $this->db->where('id >','48356');
    return $this->db->get()->result();
}

function get_country_by_state($id){

    $this->db->select('country_id as country');
    $this->db->from(TBL_STATES_SUPPLIER);
    $this->db->where('id',$id);
    return $query = $this->db->get()->row();

}

function get_all_states_by_cid($id){
    $this->db->select('id,name');
    $this->db->from(TBL_STATES_SUPPLIER);
    $this->db->where('country_id',$id);
    return $this->db->get()->result();
}

function get_all_batch_enquiry(){
    $this->db->select('id,batch_name,enquiry_id,created_by');
    $this->db->from(TBL_BATCH_TBL);
    $this->db->where('created_by',$this->session->userdata('user_id'));
    return $this->db->get()->result();
}

function get_enquiry_list_by_batch_group($id){
    $this->db->select('name,id,email,mobile_no');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    if(!empty($id)){
        $this->db->where_in('id',$id);
    }
    return $this->db->get()->result();
}

function get_all_cities_by_country($c_id){
    $this->db->select('id,name');
    $this->db->from(TBL_CITIES_SUPPLIER);
    $this->db->where('country_id',$c_id);
    return $this->db->get()->result();
}

function get_all_enquiry_by_franchise(){
 $this->db->select('id,name,email,mobile_no');
 $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
 //$this->db->where('franchise_id',$this->session->userdata('user_id'));
 if($this->session->userdata('user_role') == User_role::FRANCHISE){ 
     $this->db->where('franchise_id',$this->session->userdata('user_id'));
     
 }
 if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
     $this->db->where('enquiry_staff_id',$this->session->userdata('user_id'));
 }
 return $this->db->get()->result(); 
}

function get_all_enquiry_only_process(){
 $this->db->select('id,name,email,mobile_no');
 $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
 //$this->db->where('franchise_id',$this->session->userdata('user_id'));
 if($this->session->userdata('user_role') == User_role::FRANCHISE){ 
     $this->db->where('franchise_id',$this->session->userdata('user_id'));
     
 }
 if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
     $this->db->where('enquiry_staff_id',$this->session->userdata('user_id'));
 }
 $wpoll = array(Enquiry_pool_status::PROCESS,Enquiry_pool_status::NO_STATUS,Enquiry_pool_status::ERROR);
 $this->db->where_in('pool_status',$wpoll);
 return $this->db->get()->result(); 
}

function get_email_by_enquiry_id($id){
    $this->db->select('id,email');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    $this->db->where('id',$id);
    return $this->db->get()->row();
}

function get_wap_by_enquiry_id($id){
    $this->db->select('id,email,mobile_no');
    $this->db->from(TBL_SUPPLIER_ADD_FRANCHISE);
    $this->db->where('id',$id);
    return $this->db->get()->row();
}

function get_franchise_name_by_franch_staff($f_name){
 $this->db->select('first_name,last_name');
 $this->db->from(TBL_USERS);
 $this->db->where('user_id',$f_name);
 return $this->db->get()->row();
}

function get_descriptions_of_master_module(){
    $this->db->select('meta_id,name');
    $this->db->from(TBL_PACKAGE_META);
    $this->db->where('is_meta',Meta::ENQUIRY_DESCRIPTION_ENQUIRY);
    $this->db->where('is_deleted',Deleted_status::NOT_DELETED);
    return $this->db->get()->result();
}

function fetch_all_turist_attractions_by_ids($r_ids_array){
    $this->db->select('*');
    $this->db->from(TBL_PACKAGE_META);
    $this->db->where('meta_id',$r_ids_array);
    return $this->db->get()->row();
}

function get_turist_att_admin($lat,$lng,$id_array){
    $this->db->select("*, ( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance");                         
    $this->db->from(TBL_PACKAGE_META);   
    $this->db->where('is_meta',Meta::TOURIST_ATTRACTION);
    $this->db->where_in('meta_id',$id_array);
    $this->db->order_by('distance','ASC'); 
    return $this->db->get()->result();
}

function get_all_city_by_country_id($c_id){
    $this->db->select('id,name');
    $this->db->from(TBL_CITIES_SUPPLIER);
    $this->db->where('country_id',$c_id);
    $this->db->where('is_delete',Deleted_status::NOT_DELETED);
    return $this->db->get()->result();
}

}

/* end of category */
