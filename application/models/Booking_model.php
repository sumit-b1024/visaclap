<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

load_entities(array('booking'));

class Booking_model extends MY_Model {
	
	var $column_order = array(null, 'sm.firm_name', 'se.place_from', 'fb.depart', 'fb.returns', 'fb.depart_time', 'fb.arrival_time', 'am.name', 'fb.no_of_seats', 'fb.sales_rate');
    var $column_search = array('sm.firm_name', 'se.place_from', 'fb.depart', 'fb.returns', 'fb.depart_time', 'fb.arrival_time', 'am.name', 'fb.no_of_seats', 'fb.sales_rate');
    var $order = array('fb.created_on' => 'desc');
	
	public function __construct() {
		parent::__construct();
			$this->load->database();
			$this->where = array('fb.depart >' => strtotime(date('d-m-Y', strtotime('+2 day'))), 'fb.is_delete' => Deleted::ACTIVE, 'fb.sector_id !=' => NULL, 'fb.depart_time !=' => NULL, 'fb.depart !=' => NULL, 'fb.airline_id !=' => NULL, 'fb.no_of_seats !=' => NULL, 'fb.depart_time !=' => '00:00');
	}

	public function add(Booking_entity $booking) {
		if($this->db->insert('flight_booking', $booking)) {
			return $this->db->insert_id();
		}
	}

	/*public function add_multi($booking) {
		// if($this->db->insert_batch('flight_booking', $booking)) {
		if($this->db->replace('flight_booking', $booking)) {
			return $this->db->insert_id();
		}
	}*/

	public function add_multi($booking) {
		foreach ($booking as $book) {
			// check exits
			$this->db->select('flight_id, no_of_seats');
    		$this->db->where(array('trip' => $book['trip'], 'airline_id' => $book['airline_id'], 'depart' => $book['depart'], 'sector_id' => $book['sector_id'], 'depart_time' => $book['depart_time'], 'traveller_class' => $book['traveller_class'], 'supplier_id' => $book['supplier_id'], 'arrival_time' => $book['arrival_time']));
			$query = $this->db->get('flight_booking');
			if(!($query->num_rows() > 0)) {
				$book['created_on'] = time();
				if($this->db->insert('flight_booking', $book)) {
					$return = $this->db->insert_id();
				}
			} else {
				$flbk = $query->row();
				/*if(isset($book['no_of_seats']) && $book['no_of_seats'] != $flbk->no_of_seats) {*/
					$this->db->where(array('flight_id' => $flbk->flight_id));
					$book['is_delete']  = Deleted::NOT_DELETED;
					$book['updated_on'] = time();
					$book['updated_by'] = $this->session->userdata('user_id');
					if($this->db->update('flight_booking', $book)) {					
						$return = $flbk->flight_id;
					}
				/*} else {
					$this->db->where(array('flight_id' => $flbk->flight_id));
					$ractive['is_delete']  = Deleted::ACTIVE;
					if($this->db->update('flight_booking', $ractive)) {					
						$return = $flbk->flight_id;
					}
				}*/
				$return = $flbk->flight_id;
			}
 		}
 		return $return;
	}

	public function edit(Booking_edit_entity $booking) {
		$this->db->where('flight_id', $booking->flight_id);
		if($this->db->update('flight_booking', $booking)) {
			return $booking->flight_id;
		} else {
			return false;
		}
	}

	public function record_count() {
		$this->db->from('flight_booking');
		$this->db->where(array('is_delete' => Deleted::ACTIVE));
		return $this->db->count_all_results();
	}
	
	public function get_list($limit = NULL, $offset = NULL, $user_id = NULL, $is_active = NULL) {
		$this->db->select('fb.trip, fb.sales_rate, fb.flight_id, fb.supplier_id, fb.depart, fb.returns, fb.depart_time, fb.arrival_time, fb.rt_depart_time, fb.rt_arrival_time, fb.no_of_seats, a.airbus_no, am.name, am.code, sm.firm_name, se.place_from, se.place_to, se.place_origin');
		$this->db->from('flight_booking as fb');
		$this->db->join('airbus_master as a', 'a.airbus_id = fb.airbus_id', 'left');
		$this->db->join('airline_master as am', 'am.airline_id = fb.airline_id', 'left');
		$this->db->join('supplier_master as sm', 'sm.supplier_id = fb.supplier_id', 'left');
		$this->db->join('sector_master as se', 'se.sector_id = fb.sector_id', 'left');
		$this->db->where(array(
				'fb.depart >'  => strtotime(date('d-m-Y', strtotime('+2 day'))),
				'fb.is_delete' => Deleted::ACTIVE,
				'fb.is_active' => $is_active
		));
		
		if(isset($user_id) && !empty($user_id))
		{
			$this->db->where(array('fb.created_by' => $user_id));
		}
		
		$this->db->limit(20, 0);

		if(isset($limit) && isset($offset))
		{
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('fb.created_on', 'desc');
		return $this->db->get()->result();
	}
	
	public function get_filter($sector = NULL, $airline = NULL , $month = NULL, $supplier = NULL, $seatStart = NULL, $seatEnd = NULL, $salesStart = NULL, $salesEnd = NULL, $is_active = NULL) {
		$this->db->select('fb.trip, fb.sales_rate, fb.flight_id, fb.supplier_id, fb.depart, fb.returns, fb.depart_time, fb.arrival_time, fb.rt_depart_time, fb.rt_arrival_time, fb.no_of_seats, a.airbus_no, am.name, am.code, sm.firm_name, se.place_from, se.place_to, se.place_origin');
		$this->db->from('flight_booking as fb');
		$this->db->join('airbus_master as a', 'a.airbus_id = fb.airbus_id', 'left');
		$this->db->join('airline_master as am', 'am.airline_id = fb.airline_id', 'left');
		$this->db->join('supplier_master as sm', 'sm.supplier_id = fb.supplier_id', 'left');
		$this->db->join('sector_master as se', 'se.sector_id = fb.sector_id', 'left');
		$this->db->where(array('fb.depart >' => strtotime(date('d-m-Y', strtotime('+2 day'))), 'fb.is_delete' => Deleted_status::NOT_DELETED, 'fb.is_active' => $is_active));
		if(isset($sector) && !empty($sector)) {
			$this->db->where(array('fb.sector_id' => $sector));
		}
		if(isset($airline) && !empty($airline)) {
			$this->db->where(array('fb.airline_id' => $airline));
		}
		if(isset($month) && !empty($month)) {
			$where = 'MONTH(FROM_UNIXTIME(depart)) = '.$month;
			$this->db->where($where);
		}
		if(isset($supplier) && !empty($supplier)) {
			$this->db->where(array('fb.supplier_id' => $supplier));
		}
		if(isset($seatStart) && isset($seatEnd)) {
			$this->db->where('fb.no_of_seats BETWEEN '.$seatStart.' AND '.$seatEnd.'');
		}
		if(isset($salesStart) && isset($salesEnd)) {
			$this->db->where('fb.sales_rate BETWEEN '.$salesStart.' AND '.$salesEnd.'');
		}
		$this->db->order_by('fb.created_on', 'desc');
		return $this->db->get()->result();
	}
	
	public function get_member_list($limit = NULL, $offset = NULL) {
		$this->db->select('fb.trip, fb.sales_rate, fb.flight_id, fb.supplier_id, fb.depart, fb.returns, fb.depart_time, fb.arrival_time, fb.rt_depart_time, fb.rt_arrival_time, fb.no_of_seats, a.airbus_no, am.name, am.code, sm.firm_name, se.place_from, se.place_to, se.place_origin');
		$this->db->from('flight_booking as fb');
		$this->db->join('airbus_master as a', 'a.airbus_id = fb.airbus_id', 'left');
		$this->db->join('airline_master as am', 'am.airline_id = fb.airline_id', 'left');
		$this->db->join('supplier_master as sm', 'sm.supplier_id = fb.supplier_id', 'left');
		$this->db->join('sector_master as se', 'se.sector_id = fb.sector_id', 'left');
		$this->db->where(array('fb.depart >' => strtotime(date('d-m-Y', strtotime('+2 day'))), 'fb.is_delete' => Deleted_status::NOT_DELETED, 'fb.sector_id !=' => NULL));
		if(isset($limit) && isset($offset)) {
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('fb.created_on', 'desc');
		return $this->db->get()->result();
	}
	
	public function get_member_filter($sector = NULL, $airline = NULL , $month = NULL) {
		$this->db->select('fb.*, a.airbus_no, am.name, am.code, sm.firm_name, se.place_from, se.place_to, se.place_origin');
		$this->db->from('flight_booking as fb');
		$this->db->join('airbus_master as a', 'a.airbus_id = fb.airbus_id', 'left');
		$this->db->join('airline_master as am', 'am.airline_id = fb.airline_id', 'left');
		$this->db->join('supplier_master as sm', 'sm.supplier_id = fb.supplier_id', 'left');
		$this->db->join('sector_master as se', 'se.sector_id = fb.sector_id', 'left');
		// $this->db->where(array('fb.depart >' => strtotime(date('d-m-Y', strtotime('+2 day'))), 'fb.is_delete' => Deleted_status::NOT_DELETED, 'fb.sector_id !=' => NULL));
		$this->db->where($this->where);
		if(isset($sector) && !empty($sector)) {
			$this->db->where(array('fb.sector_id' => $sector));
		}
		if(isset($airline) && !empty($airline)) {
			$this->db->where(array('fb.airline_id' => $airline));
		}
		if(isset($month) && !empty($month)) {
			$where = 'MONTH(FROM_UNIXTIME(depart)) = '.$month;
			$this->db->where($where);
		}
		$this->db->order_by('fb.created_on', 'desc');
		return $this->db->get()->result();
	}
	
	public function get_details($flight_id) {
		$this->db->select('fb.flight_id, fb.supplier_id, fb.sector_id, fb.airline_id, fb.rt_airline_id, fb.airbus_id, fb.rt_airbus_id, fb.pnr, fb.depart, fb.cut_of_date, fb.returns, fb.depart_time, fb.arrival_time, fb.rt_depart_time, fb.rt_arrival_time, fb.purchase_rate, fb.sales_rate, fb.tantitative_rate, fb.no_of_seats, fb.traveller_class, fb.created_by, fb.created_on, fb.updated_on, fb.trip, sm.place_from, sm.place_to, sm.place_origin, su.code, su.firm_name, c.first_name as first, c.last_name as last, c.email, c.contact, su.address, su.gst_no, su.pan_no, su.website, ad.name as air_name, ad.code as air_code, ar.name as rt_air_name, ar.code as rt_air_code, abd.airbus_no as air_no, abr.airbus_no as rt_air_no');
		$this->db->from('flight_booking as fb');
		$this->db->join('sector_master as sm', 'sm.sector_id = fb.sector_id', 'left');
		$this->db->join('supplier_master as su', 'su.supplier_id = fb.supplier_id', 'left');
		$this->db->join('contact as c', 'c.supplier_id = su.supplier_id', 'left');
		$this->db->join('airline_master as ad', 'ad.airline_id = fb.airline_id', 'left');
		$this->db->join('airline_master as ar', 'ar.airline_id = fb.rt_airline_id', 'left');
		$this->db->join('airbus_master as abd', 'abd.airbus_id = fb.airbus_id', 'left');
		$this->db->join('airbus_master as abr', 'abr.airbus_id = fb.rt_airbus_id', 'left');
		$this->db->where(array('fb.is_delete' => Deleted_status::NOT_DELETED, 'fb.flight_id' => $flight_id));
		$this->db->or_where(array('c.is_contact' => Contact_type::ADMIN));
		return $this->db->get()->row();
	}

	public function get_flight_detail($flight_id) {
		$this->db->select('fb.flight_id, fb.supplier_id, fb.sector_id, fb.airline_id, fb.rt_airline_id, fb.airbus_id, fb.rt_airbus_id, fb.pnr, fb.depart, fb.cut_of_date, fb.returns, fb.depart_time, fb.arrival_time, fb.rt_depart_time, fb.rt_arrival_time, fb.purchase_rate, fb.sales_rate, fb.tantitative_rate, fb.no_of_seats, fb.traveller_class, fb.created_by, fb.created_on, fb.updated_on, fb.trip, sm.place_from, sm.place_to, sm.place_origin, su.code, su.firm_name, c.first_name as first, c.last_name as last, c.email, c.contact, su.address, su.gst_no, su.pan_no, su.website, ad.name as air_name, ad.code as air_code, ar.name as rt_air_name, ar.code as rt_air_code, abd.airbus_no as air_no, abr.airbus_no as rt_air_no');
		$this->db->from('flight_booking as fb');
		$this->db->join('sector_master as sm', 'sm.sector_id = fb.sector_id', 'left');
		$this->db->join('supplier_master as su', 'su.supplier_id = fb.supplier_id', 'left');
		$this->db->join('contact as c', 'c.supplier_id = su.supplier_id', 'left');
		$this->db->join('airline_master as ad', 'ad.airline_id = fb.airline_id', 'left');
		$this->db->join('airline_master as ar', 'ar.airline_id = fb.rt_airline_id', 'left');
		$this->db->join('airbus_master as abd', 'abd.airbus_id = fb.airbus_id', 'left');
		$this->db->join('airbus_master as abr', 'abr.airbus_id = fb.rt_airbus_id', 'left');
		$this->db->where(array('fb.is_delete' => Deleted_status::NOT_DELETED, 'fb.flight_id' => $flight_id));
		return $this->db->get()->row();
	}
	
	public function get_supplier_details($flight_id) {
		$this->db->select('s.firm_name, s.address, s.gst_no, s.pan_no, fb.purchase_rate, fb.sales_rate, c.first_name, c.last_name, c.contact');
		$this->db->from('flight_booking as fb');
		$this->db->join('supplier_master as s', 'fb.supplier_id = s.supplier_id', 'left');
		$this->db->join('contact as c', 's.supplier_id = c.supplier_id', 'left');
		$this->db->where(array('s.is_delete' => Deleted_status::NOT_DELETED, 'fb.flight_id' => $flight_id, 'c.is_contact' => Contact_type::ADMIN));
		return $this->db->get()->row();
	}
	
	public function get_today_flight() {
		$where = 'fb.depart < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 DAY))';
		$this->db->select('fb.flight_id, fb.created_by, fb.created_on');
		$this->db->from('flight_booking as fb');
		$this->db->where($where);
		//$this->db->where(array('fb.is_delete' => Deleted_status::NOT_DELETED));
		return $this->db->get()->result();
	}
	
	######## start datatable server side ########
	private function _get_datatables_query() {
		$this->db->select('fb.trip, fb.sales_rate, fb.flight_id, fb.supplier_id, fb.depart, fb.returns, fb.depart_time, fb.arrival_time, fb.rt_depart_time, fb.rt_arrival_time, fb.no_of_seats, fb.is_active, a.airbus_no, am.name, am.code, sm.firm_name, se.place_from, se.place_to, se.place_origin');
		$this->db->from('flight_booking as fb');
		$this->db->join('airbus_master as a', 'a.airbus_id = fb.airbus_id', 'left');
		$this->db->join('airline_master as am', 'am.airline_id = fb.airline_id', 'left');
		$this->db->join('supplier_master as sm', 'sm.supplier_id = fb.supplier_id', 'left');
		$this->db->join('sector_master as se', 'se.sector_id = fb.sector_id', 'left');
		$this->db->where($this->where);
        $i = 0;
        foreach ($this->column_search as $item) {
            if($_POST['search']['value']) {
                if($i===0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
         
        if(isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($user_id = NULL, $user_role = NULL) {
        $this->_get_datatables_query();
		
		if($this->input->post('sector')) {
			$this->db->where(array('fb.sector_id' => $this->input->post('sector')));
		}
		if($this->input->post('airline')) {
			$this->db->where(array('fb.airline_id' => $this->input->post('airline')));
		}
		if($this->input->post('month')) {
			$where = 'MONTH(FROM_UNIXTIME(depart)) = '.$this->input->post('month');
			$this->db->where($where);
		}
		if($this->input->post('supplier')) {
			$this->db->where(array('fb.supplier_id' => $this->input->post('supplier')));
		}
		if(isset($user_id) && !empty($user_id) && $user_role != 'help-desk' ) {
			$this->db->where(array('fb.supplier_id' => $user_id));
		}
		if(isset($user_id) && !empty($user_id) && $user_role == 'help-desk' ) {
			$this->db->where(array('fb.created_by' => $user_id));
		}
		if(isset($user_role) && !empty($user_role) && $user_role != 'help-desk'){
			$this->db->where(array('fb.is_active' => User_status::ACTIVE));
		}
		if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
		$this->db->order_by('fb.depart', 'asc');
        return $this->db->get()->result();
    }
 
    function count_filtered($user_id = NULL, $user_role = NULL) {
        $this->_get_datatables_query();
		
		if($this->input->post('sector')) {
			$this->db->where(array('fb.sector_id' => $this->input->post('sector')));
		}
		if($this->input->post('airline')) {
			$this->db->where(array('fb.airline_id' => $this->input->post('airline')));
		}
		if($this->input->post('month')) {
			$where = 'MONTH(FROM_UNIXTIME(depart)) = '.$this->input->post('month');
			$this->db->where($where);
		}
		if($this->input->post('supplier')) {
			$this->db->where(array('fb.supplier_id' => $this->input->post('supplier')));
		}
		if(isset($user_id) && !empty($user_id) && $user_role != 'help-desk' ) {
			$this->db->where(array('fb.supplier_id' => $user_id));
		}
		if(isset($user_id) && !empty($user_id) && $user_role == 'help-desk' ) {
			$this->db->where(array('fb.created_by' => $user_id));
		}
		if(isset($user_role) && !empty($user_role) && $user_role != 'help-desk') {
			$this->db->where(array('fb.is_active' => User_status::ACTIVE));
		}
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($user_id = NULL, $user_role = NULL) {
		$this->db->from('flight_booking as fb');
		$this->db->join('airbus_master as a', 'a.airbus_id = fb.airbus_id', 'left');
		$this->db->join('airline_master as am', 'am.airline_id = fb.airline_id', 'left');
		$this->db->join('supplier_master as sm', 'sm.supplier_id = fb.supplier_id', 'left');
		$this->db->join('sector_master as se', 'se.sector_id = fb.sector_id', 'left');
		$this->db->where($this->where);
		if(isset($user_id) && !empty($user_id)){
			$this->db->where(array('fb.supplier_id' => $user_id));
		}
		if(isset($user_id) && !empty($user_id) && $user_role == 'help-desk' ) {
			$this->db->where(array('fb.created_by' => $user_id));
		}
        return $this->db->count_all_results();
    }	
	######## end datatable server side ########

	public function get_last_update($supplier_id) {
		$this->db->select('fb.created_on as create, fb.updated_on as update');
		$this->db->from('flight_booking as fb');
		$this->db->where(array('fb.is_delete' => Deleted_status::NOT_DELETED, 'fb.supplier_id' => $supplier_id));
		$this->db->order_by('fb.flight_id', 'desc');
		return $this->db->get()->row();
	}
	
}
/* end of booking model */