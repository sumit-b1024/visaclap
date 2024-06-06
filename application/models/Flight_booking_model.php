<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flight_booking_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}

	
	function addflightbooking($bookdata){
        $this->db->insert(TBL_FLIGHT_BOOK,$bookdata);
        return $this->db->insert_id();
    }
    function subaddflightbooking($bookdata){
        $this->db->insert(TBL_SUB_FLIGHT_BOOK,$bookdata);
        return $this->db->insert_id();
    }

    function get_flightbooking_list($staff=0,$origin="",$destination="",$startdate=0,$enddate=0){
		$this->db->select('fb.*,CONCAT_WS(" ",sfb.firstname,sfb.lastname) as fullname');
		

		 $this->db->from(TBL_FLIGHT_BOOK . ' fb');
        $this->db->join(TBL_SUB_FLIGHT_BOOK . ' sfb', 'fb.id = sfb.book_id', 'LEFT');

		 if($this->session->userdata('user_role') == User_role::FRANCHISE){
		     $this->db->where('franchise_id',$this->session->userdata('user_id'));
		 }
		  if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
		     $this->db->where('staff_id',$this->session->userdata('user_id'));
		 }
		 if($staff > 0){
		     $this->db->where('staff_id',$staff);
		 }
		 if($origin != ""){
		     $this->db->where('origin',$origin);
		 }
		 if($destination != ""){
		     $this->db->where('destination',$destination);
		 }
		
		 if($startdate != "" && $enddate != ""){
			$this->db->where('DATE(booking_date) BETWEEN "'. $startdate. '" and "'. $enddate.'"');
		}
		$this->db->group_by('sfb.book_id');
    	$this->db->order_by('DATE(fb.booking_date)','desc');
		

		 $query = $this->db->get();
		 if($query->num_rows() > 0){
		    return $query->result();
		}
		return array();
    }
    function fetch_booking_report_detail_data($email="",$phone=""){
		$this->db->select('fb.*,CONCAT_WS(" ",sfb.firstname,sfb.lastname) as fullname');
		

		 $this->db->from(TBL_FLIGHT_BOOK . ' fb');
       $this->db->join(TBL_SUB_FLIGHT_BOOK . ' sfb', 'fb.id = sfb.book_id', 'LEFT');
		if($this->session->userdata('user_role') == User_role::FRANCHISE){
		     $this->db->where('fb.franchise_id',$this->session->userdata('user_id'));
		 }
		  if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
		     $this->db->where('fb.staff_id',$this->session->userdata('user_id'));
		 }
		 if($email != ""){
		     $this->db->where('fb.book_email',$email);
		 }
		 if($phone != ""){
		     $this->db->where('fb.book_phone',$phone);
		 }
		 $this->db->group_by('sfb.book_id');
    	$this->db->order_by('DATE(fb.booking_date)','desc');
		

		 $query = $this->db->get();
		 if($query->num_rows() > 0){
		    return $query->result();
		}
		return array();
    }

    function get_booking_subdetails($id){
		$this->db->select('*');
		 $this->db->from(TBL_SUB_FLIGHT_BOOK);
		 $this->db->where('book_id',$id);
		 $query = $this->db->get();
		 if($query->num_rows() > 0){
		    return $query->result();
		}
		return array();
    }

     public function get_ticket_booking_detail($ticketid)
    {
        $this->db->select('*');
        $this->db->from(TBL_FLIGHT_BOOK);
        $this->db->where(array('id' => $ticketid));
        
        return $this->db->get()->row();
    }

	

}
/* end of supplier model */