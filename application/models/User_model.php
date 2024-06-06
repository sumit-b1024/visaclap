<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

load_entities(array('user'));

class User_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function user_exist($mobile)
    {
        $this->db->select('u.user_id, u.email, u.mobile, u.user_status, up.gst_no, up.pan_no');
        $this->db->from('user_master as u');
        $this->db->join('user_profile as up', 'up.user_id = u.user_id', 'left');
        $this->db->where(array(
            'u.user_deleted' => Deleted_status::NOT_DELETED,
            'u.role' => User_role::CLIENT, 'u.mobile' => $mobile
        ));

        return $this->db->get('user_master')->row();
    }

    public function check_user_exists($mobile, $app_id)
    {
        $this->db->where(array('mobile' => $mobile, 'user_deleted' => Deleted_status::NOT_DELETED, 'role' => User_role::MEMBER, 'app_id' => $app_id, 'user_status' => User_status::INACTIVE, 'profile_status' => User_status::ACTIVE));

        return $this->db->get('user_master')->row();
    }

    function update_password($user_id, $password)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->update('user_master', array('password' => $password));
        if ($query)
        {
            return true;
        }

        return false;
    }

    function get_users($post = null)
    {
        $response = array();

            ## Read value
        $draw            = $post['draw'];
        $start           = $post['start'];
        $rowPerPage      = $post['length'];
        $columnIndex     = $post['order'][0]['column'];
        $columnName      = $post['columns'][$columnIndex]['data'];
        $columnSortOrder = $post['order'][0]['dir'];
        $searchValue     = $post['search']['value'];

            // Custom search filter 
        $name   = $post['name'];
        $mobile = $post['mobile'];
        $status = $post['status'];

            ## Search 
        $search_arr  = array();
        $searchQuery = "";

        if ($searchValue != '')
        {
            $search_arr[] = " (
            u.first_name like '%" . $searchValue . "%' or 
            u.mobile like '%" . $searchValue . "%' or 
            u.user_status like'%" . $searchValue . "%' ) ";
        }

        if ($status != '')
        {
            $search_arr[] = " u.user_status = '" . $status . "' ";
        }

        if ($name != '')
        {
            $search_arr[] = " u.first_name like '%" . $name . "%' ";
        }

        if ($mobile != '')
        {
            $search_arr[] = " u.mobile like '%" . $mobile . "%' ";
        }

        if (count($search_arr) > 0)
        {
            $searchQuery = implode(" and ", $search_arr);
        }

            ## Total number of records without filtering
        $this->db->from(TBL_USERS . ' u');
        $this->db->where(array(
            'u.user_deleted' => Deleted_status::NOT_DELETED,
            'u.role !='      => User_role::SUPER_ADMIN
        ));

        if ($searchQuery != '')
        {
            $this->db->where($searchQuery);
            $totalRecordwithFilter = $this->db->count_all_results();

                ## Total number of records without filtering
            $this->db->from(TBL_USERS);
            $this->db->where(array(
                'user_deleted'  =>  Deleted_status::NOT_DELETED,
                'role !='       =>  User_role::SUPER_ADMIN
            ));
            $totalRecords = $this->db->count_all_results();
        }
        else
        {
            $totalRecords          = $this->db->count_all_results();
            $totalRecordwithFilter = $totalRecords;
        }

            ## Fetch records
        $this->db->select('u.user_id, u.first_name, u.last_name, u.email, u.mobile, u.user_status, u.created_on');
        $this->db->from(TBL_USERS . ' u');

        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->where(array(
            'u.user_deleted' => Deleted_status::NOT_DELETED,
            'u.role !='      => User_role::SUPER_ADMIN
        ));
        $this->db->order_by('u.user_id', 'desc');
        $this->db->group_by('u.user_id');
        $this->db->limit($rowPerPage, $start);
        $records = $this->db->get()->result();

        $data = array();

        foreach ($records as $list) :
            $data[] = array(

                'DT_RowId'  => 'rw-' . $list->user_id,
                'user_id'   =>  $list->user_id,

                'name'      =>  '<div class="d-flex align-items-center">
                <div class="ml-3">' . toPropercase($list->first_name . ' ' . $list->last_name) . '<br>
                <a href="javascript:;" class="text-muted text-hover-primary">' . $list->email . '</a>
                </div>
                </div>',

                'mobile'    =>  $list->mobile,

                'user_status' => ((isset($list->user_status) && $list->user_status == User_status::INACTIVE ? '<span id="us-' . $list->user_id . '" class="btn btn-link-danger font-weight-bold status_btn" data-id="' . $list->user_id . '" data-table="user_master" data-row="user_id" data-status="' . User_status::ACTIVE . '" data-value="Active" title="User Status"> ' . User_status::getValue($list->user_status) . ' </span>' : '<span id="us-' . $list->user_id . '" class="btn btn-link-info label-inline mr-2 font-weight-bold status_btn" data-id="' . $list->user_id . '" data-table="user_master" data-row="user_id" data-status="' . User_status::INACTIVE . '" data-value="Inactive" title="User Status"> ' . User_status::getValue($list->user_status) . ' </span>' )),

                'created_on' => '<span class="btn btn-link-info font-weight-bold">' . ($list->created_on ? date('d M Y H:i', $list->created_on) : '') . '</span>',

                'action'    =>  '<a href="' . CL_SETTINGS . '/user-edit/' . $list->user_id . '" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit">
                <i class="flaticon-edit text-success"></i>
                </a>
                <a href="' . CL_SETTINGS . '/user-access/' . $list->user_id . '" class="btn btn-sm btn-clean btn-icon mr-2" title="Give permission">
                <i class="fas fa-user-cog text-warning"></i>
                </a>
                <a href="javascript:;" data-id="' . $list->user_id . '" data-table="' . TBL_USERS . '" data-row="user_id" data-module="' . Module::USER . '" class="btn btn-sm btn-clean btn-icon mr-2 delete_btn" title="Delete">
                <i class="far fa-trash-alt text-danger"></i>
                </a>'
            );
        endforeach;

            ## Response
        $response = array(
            'draw'                 => intval($draw),
            'iTotalRecords'        => $totalRecords,
            'iTotalDisplayRecords' => $totalRecordwithFilter,
            'aaData'               => $data
        );

        return $response;
    }

    public function get_user()
    {
        $this->db->select('u.user_id, u.first_name,u.firm_name, u.last_name, u.email, u.mobile, u.role, u.created_on,u.user_status,u.created_by');
        $this->db->from(TBL_USERS . ' u');
        $this->db->where(array(
            'u.user_deleted'    =>  Deleted_status::NOT_DELETED,
            'u.role !='         =>  User_role::SUPER_ADMIN
        ));

        return $this->db->get()->result();
    }

    public function get_user_trial_exp()
    {
        $this->db->select('*');
        $this->db->from(TBL_USERS);
        //$this->db->join(TBL_USER_PAYMENT_DATE . ' ud','u.user_id=ud.user_id','left');

        $this->db->where("user_id IN (SELECT user_id FROM ".TBL_USER_PAYMENT_DATE." WHERE CURDATE() BETWEEN DATE_ADD(payment_date, INTERVAL 81 DAY) AND DATE_ADD(payment_date, INTERVAL 90 DAY))");

        $this->db->where(array(
            'user_deleted'    =>  Deleted_status::NOT_DELETED,
            'role ='         =>  User_role::FRANCHISE
        ));
       
         return $this->db->get()->result();
         
    }

    public function get_reference_franchise($ref)
    {
        $this->db->select('u.user_id, u.first_name,u.firm_name, u.last_name, u.email, u.mobile, u.role, u.created_on,u.user_status,u.created_by');
        $this->db->from(TBL_USERS . ' u');
        $this->db->where(array(
            'u.user_deleted'    =>  Deleted_status::NOT_DELETED,
            'u.role'         =>  User_role::FRANCHISE,
            'u.refere_nces'         =>  $ref
        ));

        return $this->db->get()->result();

    }

    public function get_user_reference()
    {
        $this->db->select('u.user_id, u.first_name,u.firm_name, u.last_name, u.email, u.mobile, u.role, u.created_on,u.user_status,u.created_by');
        $this->db->from(TBL_USERS . ' u');
        $this->db->where(array(
            'u.user_deleted'    =>  Deleted_status::NOT_DELETED,
            'u.role'         =>  User_role::REFERENCES
        ));

        return $this->db->get()->result();

    }

    public function get_filler_user()
    {
        $this->db->select('u.user_id, u.first_name,u.firm_name, u.last_name, u.email, u.mobile, u.role, u.created_on,u.user_status,u.created_by');
        $this->db->from(TBL_USERS . ' u');
        $this->db->where('u.user_deleted', Deleted_status::NOT_DELETED);
        $bind = array(User_role::FORM_FILLER, User_role::MANAGER);
        $this->db->where_in('u.role', $bind);
        
       /* $this->db->where(array(
            'u.user_deleted'    =>  Deleted_status::NOT_DELETED,
            'u.role'         =>  User_role::FORM_FILLER
        ));*/

        return $this->db->get()->result();

    }

    public function user_detail($user_id)
    {
        $this->db->select('u.user_id,u.user_key,u.refere_nces, u.first_name,u.firm_name, u.last_name, u.email, u.mobile, u.role,u.currency, up.*');
        $this->db->from(TBL_USERS . ' u');
        $this->db->join('user_profile as up', 'up.user_id = u.user_id', 'left');
        $this->db->where(array('u.user_id' => $user_id, 'u.user_deleted' => Deleted_status::NOT_DELETED));
        
        return $this->db->get()->row();
    }

    public function get_user_document($user_id){
        $this->db->select('*');
        $this->db->where('user_id',$user_id);
        $this->db->from(TBL_USER_DOCUMENT);
        return  $this->db->get()->result();
    }
    public function get_document_record($docu_id){
        $this->db->select('*');
        $this->db->where('id',$docu_id);
        $this->db->from(TBL_USER_DOCUMENT);
        return  $this->db->get()->row();
    }

    public function update_user_is_active_status($table, $id, $status){
        $this->db->set('user_status',$status);
        $this->db->where('user_id',$id);
        $this->db->update($table);
    }

    public function get_user_list(){
        $this->db->select('*');
        $this->db->from(TBL_USERS);
        return  $query = $this->db->get()->result();

    }
    public function importdata_user($data){
        $this->db->insert(TBL_USERS,$data);
        return $this->db->insert_id();
    }
    public function importdata_user_landmark_data($landmasrk_array){
        $this->db->insert(TBL_PROFILE,$landmasrk_array);
    }
    
    function get_all_category_list(){
        $this->db->select('meta_id,name,is_meta');
        $this->db->from(TBL_PACKAGE_META);
        $this->db->where('is_meta',Meta::CUSTOMER_CATEGORY);
        return $this->db->get()->result();
    }

    function delete_supplier($table, $data, $row, $id){
        $this->db->set('is_deleted','1');
        $this->db->where('supplier_id',$id);
        $this->db->update($table);

    }


    function get_all_user_by_category($account_status_id,$customer_category){

        $this->db->select('u.user_id, u.first_name, u.last_name, u.email, u.mobile, u.user_status, u.created_on, u.role');
        $this->db->from(TBL_USERS . ' u');
        $this->db->join(TBL_PROFILE . ' p','u.user_id = p.user_id');
        // $this->db->where($searchQuery);
        $this->db->where(array(
            'u.user_deleted' => Deleted_status::NOT_DELETED,
            'u.role !='      => User_role::SUPER_ADMIN
        ));

        if($account_status_id != ""){
            $this->db->where('u.user_status',$account_status_id);
        }

         if($customer_category != ""){
            $this->db->where('p.user_category_id',$customer_category);
        }

        $this->db->order_by('u.user_id', 'desc');
        $this->db->group_by('u.user_id');
        return $records = $this->db->get()->result();

    }

    /*public function get_user_access( $id )
    {
            $this->db->select('*');
            $this->db->from(TBL_USER_ACCESS .' a');
            $this->db->where(array('a.user_id' => $id, 'a.is_deleted' => Deleted_status::NOT_DELETED));
            
            return $this->db->get()->row();
        }*/

    }

/* end of user model */