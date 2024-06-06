<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}

	public function add($supplier) {
		if($this->db->insert('supplier_master', $supplier)) {
			return $this->db->insert_id();
		}
	}

	public function addtravelers($travellers) {

		if($this->db->insert('cs_visa_application', $travellers)) {
			return $this->db->insert_id();
		}
	}

	public function updatetravelersrecord($mainkey,$lebelkey,$lebelvalue,$groupid) {

		$this->db->set('field_value',$lebelvalue);
		$this->db->set('no_of_travellers',1);
		 $this->db->where('form_group',$mainkey);
		 $this->db->where('field_name',$lebelkey);
		 $this->db->where('group_id',$groupid);
		 $this->db->update(TBL_VISA_APPLICATION);
	}

	public function edit($supplier) {
		$this->db->where('supplier_id', $supplier['supplier_id']);
		if($this->db->update('supplier_master', $supplier)) {
			return $supplier['supplier_id'];
		} else {
			return false;
		}
	}
	
	public function get_list($user = NULL, $order = NULL, $is_active = NULL) {
		$this->db->select('s.supplier_id, s.user_id, s.code, s.firm_name, s.email, s.alter_email, s.address, s.note, s.created_on, s.updated_by, s.updated_on, u.first_name, u.last_name, um.user_status, um.first_name as first, um.last_name as last');
		$this->db->from('supplier_master as s');
		$this->db->join('user_master as u', 's.updated_by = u.user_id', 'left');
		$this->db->join('user_master as um', 's.user_id = um.user_id', 'left');
		$this->db->where(array('s.is_deleted' => Deleted_status::NOT_DELETED));
		if(!empty($order) && isset($order)) {
			$this->db->order_by('s.'.$order, 'asc');
		} else {
			$this->db->order_by('s.supplier_id', 'desc');
		}
		if(!empty($user) && isset($user)) {
			$this->db->where('um.role', $user);
		}
		if(!empty($is_active) && isset($is_active)) {
			$this->db->where('um.user_status', $is_active);
		}
		return $this->db->get()->result();
		
	}
	
	public function get_details($supplier_id, $role = NULL) {
		$this->db->select('s.supplier_id,s.contact_number ,s.user_id, s.code, s.firm_name, s.email, s.alter_email, s.retrieve_email, s.address, s.country,s.state, s.city, s.postal_code, s.website, s.gst_no, s.pan_no, s.note, s.created_on, s.is_corporate, s.is_fix_departure, s.is_contracted_hotel, s.is_visa_services, s.is_onflits, u.first_name, u.last_name, u.user_status');
		$this->db->from('supplier_master as s');
		$this->db->join('user_master as u', 's.user_id = u.user_id', 'left');
		// 'u.user_status' =>User_status::ACTIVE
		if(isset($role) && !empty($role)) {
			$this->db->where(array('u.role' => $role, 's.is_deleted' => Deleted_status::NOT_DELETED, 's.supplier_id' => $supplier_id));
		} else {
			$this->db->where(array('u.role' => User_role::SUPPLIER, 's.is_deleted' => Deleted_status::NOT_DELETED, 's.supplier_id' => $supplier_id));
		}
		// $this->db->where('supplier_id',$supplier_id);
		return $this->db->get()->row();
	}

	public function get_agent_details($supplier_id) {
		$this->db->select('s.supplier_id, s.user_id, s.code, s.firm_name, s.email, s.alter_email, s.retrieve_email, s.address, s.state, s.city, s.postal_code, s.website, s.gst_no, s.pan_no, s.note, s.created_on, s.is_corporate, s.is_fix_departure, s.is_contracted_hotel, s.is_visa_services, s.is_onflits, u.first_name, u.last_name, u.user_status');
		$this->db->from('supplier_master as s');
		$this->db->join('user_master as u', 's.user_id = u.user_id', 'left');
		// 'u.user_status' =>User_status::ACTIVE
		$this->db->where(array('u.role' => User_role::AGENT, 's.is_deleted' => Deleted_status::NOT_DELETED, 's.supplier_id' => $supplier_id));
		return $this->db->get()->row();
	}
	
	public function get_supplier_by_user_id($user_id, $role = NULL) {
		$this->db->select('s.supplier_id, s.is_corporate, s.firm_name');
		$this->db->from('supplier_master as s');
		$this->db->join('user_master as u', 's.user_id = u.user_id', 'left');
		if(isset($role) && !empty($role)) {
			$this->db->where(array('u.role' => $role, 'u.user_status' => User_status::ACTIVE, 's.user_id' => $user_id, 's.is_deleted' => Deleted::ACTIVE));
		} else {
			$this->db->where(array('u.role' => User_role::SUPPLIER, 'u.user_status' => User_status::ACTIVE, 's.user_id' => $user_id, 's.is_deleted' => Deleted::ACTIVE));
		}
		return $this->db->get()->row();
	}
	
	public function get_supplier_by_code($code) {
		$this->db->select('supplier_id');
		$this->db->from('supplier_master');
		$this->db->where(array('firm_name' => $code, 'is_deleted' => Deleted_status::NOT_DELETED));
		return $this->db->get()->row();
	}

	public function get_group() {
		$this->db->select('id,group_id');
		$this->db->from('cs_visa_application');
		$this->db->group_by('group_id');
		$this->db->order_by('id',"desc");
		$this->db->limit(1);
		return $this->db->get()->row();
	}
	/*public function get_group_count($count) {
		$this->db->select('id,group_id');
		$this->db->from('cs_visa_application');
		$this->db->where(array('group_id' => $count));
		$this->db->group_by('group_id');
		$this->db->order_by('group_id',"desc");
		$this->db->limit(1);
		//print_r($this->db->last_query());   
		return $this->db->get()->row();
	}*/

	public function check_code_exits($code) {
		$this->db->from('supplier_master');
		$this->db->where(array('code' => $code, 'is_deleted' => Deleted_status::NOT_DELETED));
		return $this->db->count_all_results();
	}
	##### contact #####
	public function add_edit_contact($contact) {
		if(empty($contact['contact_id'])) {
			if($this->db->insert('contact', $contact)) {
				return $this->db->insert_id();
			}
		} else {
			$this->db->where('contact_id', $contact['contact_id']);
			if($this->db->update('contact', $contact)) {
				return $contact['contact_id'];
			}
		}
	}
	
	public function get_supplier_contact($supplier_id, $is_contact = NULL) {
		$this->db->select('contact_id, first_name, last_name, contact, email, is_contact');
		$this->db->from('contact');
		$this->db->where(array('supplier_id' => $supplier_id));
		if(isset($is_contact) && !empty($is_contact)) {
			$this->db->where(array('is_contact' => NULL));
		} else {
			$this->db->where(array('is_contact !=' => NULL));
		}
		return $this->db->get()->result();
	}

	public function get_contact_person($supplier_id, $is_contact) {
		$this->db->select('contact_id, first_name, last_name, contact, email, is_contact');
		$this->db->from('contact');
		$this->db->where(array('supplier_id' => $supplier_id, 'is_contact' => $is_contact));
		return $this->db->get()->row();
	}
	
	##### banks #####
	public function add_edit_bank($bank) {
		if(empty($bank['bank_id'])) {
			if($this->db->insert('bank', $bank)) {
				return $this->db->insert_id();
			}
		} else {
			$this->db->where('bank_id', $bank['bank_id']);
			if($this->db->update('bank', $bank)) {
				return $bank['bank_id'];
			}
		}
	}


	
	
	##### airline #####
	public function add_edit_airline($airline) {
		if(empty($airline['supplier_airline_id'])) {
			$this->db->where(array('user_id' => $airline['user_id'], 'airline_id' => $airline['airline_id']));
			$row = $this->db->get('supplier_airline')->row();
			if(isset($row->supplier_airline_id) && !empty($row->supplier_airline_id)) {
				$this->db->where('supplier_airline_id', $row->supplier_airline_id);
				if($this->db->update('supplier_airline', $airline)) {
					return $row->supplier_airline_id;
				}
			} else {
				if($this->db->insert('supplier_airline', $airline)) {
					return $this->db->insert_id();
				}
			}
		} else {
			$this->db->where('supplier_airline_id', $airline['supplier_airline_id']);
			if($this->db->update('supplier_airline', $airline)) {
				return $airline['supplier_airline_id'];
			}
		}
	}
	
	##### sector #####
	public function add_edit_sector($sector) {
		if(empty($sector['supplier_sector_id'])) {
			$this->db->where(array('user_id' => $sector['user_id'], 'sector_id' => $sector['sector_id']));
			$row = $this->db->get('supplier_sector')->row();
			if(isset($row->supplier_sector_id) && !empty($row->supplier_sector_id)) {
				$this->db->where('supplier_sector_id', $row->supplier_sector_id);
				if($this->db->update('supplier_sector', $sector)) {
					return $row->supplier_sector_id;
				}
			} else {
				if($this->db->insert('supplier_sector', $sector)) {
					return $this->db->insert_id();
				}
			}
		} else {
			$this->db->where('supplier_sector_id', $sector['supplier_sector_id']);
			if($this->db->update('supplier_sector', $sector)) {
				return $sector['supplier_sector_id'];
			}
		}
	}
	
	public function get_supplier_bank($supplier_id)
	{
		$this->db->select('bank_id, supplier_id, bank_name, account_no, ifsc_code, branch');
		$this->db->from('bank');
		$this->db->where(array('supplier_id' => $supplier_id));
		return $this->db->get()->result();
	}



	public function get_all_country()
	{
		$this->db->select('*');
		$this->db->from(TBL_COUNTRIES_SUPPLIER);
		return $this->db->get()->result();
	}
	
	public function get_all_visa_application($visa_type="",$origin_country_id="",$destination_country_id="",$startdate=0,$enddate=0,$staff_id=0)
	{
		//echo '<pre>';
		//print_r($this->session); exit;

		$this->db->select('cv.field_name,cv.field_value,cv.origin_country,cv.group_id,cv.destination_country,cv.created_at,cv.passing');
		$this->db->from('cs_visa_application as cv');
		if($origin_country_id != ""){
			$this->db->where('cv.origin_country',$origin_country_id);
		}
		if($visa_type != ""){
			$this->db->where('cv.visa_type',$visa_type);
		}
		if($destination_country_id != ""){
			$this->db->where('cv.destination_country',$destination_country_id);
		}
		
		if($startdate > 0 && $enddate > 0){
			$this->db->where('DATE(cv.created_at) BETWEEN "'. $startdate. '" and "'. $enddate.'"');
		}
		if($staff_id > 0 && $staff_id > 0){
			$this->db->where('cv.franchise_id',$staff_id);
		}

    	/*if($this->session->userdata('user_role') == User_role::FRANCHISE){
        $this->db->where('cv.franchise_id',$this->session->userdata('user_id'));
        $this->db->or_where('cv.staff_id',$this->session->userdata('user_id'));
    }*/

    if($this->session->userdata('user_role') == User_role::FRANCHISE){
        //$this->db->where("('cv.franchise_id',$this->session->userdata('user_id'))");
    	$this->db->where("(cv.franchise_id='".$this->session->userdata('user_id')."' OR cv.staff_id='".$this->session->userdata('user_id')."')");
    }


    if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){   
	        //$this->db->where("(cv.franchise_id='".$this->session->userdata('user_id')."' OR cv.staff_id='".$this->session->userdata('user_id')."')");
    	$this->db->where('cv.franchise_id',$this->session->userdata('user_id'));
    }

    $this->db->group_by('group_id');
    $this->db->order_by('id','DESC');

    return $this->db->get()->result();
}

public function fetch_sub_application_data($gid="")
{

	$this->db->select('cv.field_name,cv.field_value,cv.origin_country,cv.form_group,cv.destination_country,cv.group_id,cv.no_of_travellers,cv.visa_name');
	$this->db->from('cs_visa_application as cv');
	$this->db->where('cv.group_id',$gid);

	return $this->db->get()->result();
}

public function fetch_merge_column($gid="")
{

	$this->db->select('cv.form_group,no_of_travellers');
	$this->db->from('cs_visa_application as cv');
	$this->db->where('cv.group_id',$gid);
	$this->db->group_by('cv.form_group');

	return $this->db->get()->result();

}
public function fetch_no_application($gid="")
{

	$this->db->from('cs_visa_application as cv');
	$this->db->select_max('cv.no_of_travellers');
	$this->db->where('cv.group_id',$gid);
	$this->db->group_by('group_id');
	$this->db->order_by("group_id", "DESC");
	$this->db->limit(1);
	return $this->db->get()->result();

}



public function getch_all_state_by_id($cid)
{
	$this->db->select('*');
	$this->db->from(TBL_STATES_SUPPLIER);
	$this->db->where('country_id',$cid);
	$query =  $this->db->get();
	if($query->num_rows() > 0){
		return $query->result();
	}
	return array();
}

public function getch_all_cities_by_id($stateid)
{
	$this->db->select('*');
	$this->db->from(TBL_CITIES_SUPPLIER);
	$this->db->where('state_id',$stateid);
	$query =  $this->db->get();
	if($query->num_rows() > 0){
		return $query->result();
	}
	return array();
}

function get_main_franchise_id($franchise_id){
	$this->db->select('*');
	$this->db->from(TBL_USERS);
	$this->db->where('user_id',$franchise_id);
	$query = $this->db->get();
	if($query->num_rows() > 0){
		return $query->row();
	}
	return array();
}
	// public function get_supplier_form_data($supplier_id){
	// 	$this->db->select('*');
	// 	$this->db->from(TBL_SUPPLIER);
	// 	$this->db->where('supplier_id',$supplier_id);
	// 	return $this->db->get()->row();
	// }

}
/* end of supplier model */