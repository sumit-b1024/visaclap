<?php 

class Packages_model extends CI_Model {

	function store($tbl,$data){
		$db2 = $this->load->database('visaclap', TRUE);
		$db2->insert($tbl,$data);
		return $db2->insert_id();
	}
	function view(){
		$db2 = $this->load->database('visaclap', TRUE);
		$db2->select('*');
		$db2->from('tbl_packages');
		$db2->where('is_delete',0);
		return $db2->get()->result();
	}
	function update($tbl,$data,$r_id){
		$db2 = $this->load->database('visaclap', TRUE);

		$db2->set($data);
		$db2->where('id',$r_id);
		$db2->update($tbl);
	}
	function remove_packages($r_id){
		$db2 = $this->load->database('visaclap', TRUE);

		$db2->set('is_delete',1);
		$db2->where('id',$r_id); 		
		$db2->update('tbl_packages');
	}

	function check_email_existance($email){
		$db2 = $this->load->database('visaclap', TRUE);
		$db2->select('email');
		$db2->from('user_login');
		$db2->where('email',$email);
		return $query = $db2->get()->row();
	}

	function check_user_credencials($email,$pwd){
		$db2 = $this->load->database('visaclap', TRUE);

		$db2->select('*');
		$db2->from('user_login');
		$db2->where('email',$email);
		$db2->where('password',md5($pwd));
		return $query = $db2->get()->row();

	}

}