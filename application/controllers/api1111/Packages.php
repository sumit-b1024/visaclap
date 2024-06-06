<?php

require APPPATH . 'libraries/REST_Controller.php';

class Packages extends CI_Controller {
    public function __construct() {
     parent::__construct();
     $this->load->database();

     if($this->session->userdata('user_id') == ""){
        header("Location: http://localhost/visa_api/api/cred");
    }
}
function index(){
    $this->load->view('packages/add_edit_packages');
}

function store_packages(){
    $db2 = $this->load->database('visaclap', TRUE); 

    if($this->input->post()){
        $package_array = array(
            'package_name' => $this->input->post('package_name'),
            'request_per_minute' => $this->input->post('p_per_minute'),
        );
        if($this->input->post('record_id') > 0){
            $package_array['updated_at'] = date('Y-m-d H:i:s');
            // $update_package = $this->Packages_model->update('tbl_packages',$package_array,$this->input->post('record_id'));
            $db2->set($package_array);
            $db2->where('id',$this->input->post('record_id'));
            $db2->update('tbl_packages');
            $response = array('status'=> 'success','msg' => "Package Updated Successfully");

        }else{
            $package_array['created_at'] = date('Y-m-d H:i:s');
            // $store_packages = $this->Packages_model->store('tbl_packages',$package_array);

            $db2->insert('tbl_packages',$package_array);
            $store_packages =  $db2->insert_id();

            if($store_packages > 0){
                $response = array('status'=> 'success','msg' => "Package Created Successfully");
            }
        }
    }else{
        $response = array('status'=> 'failed','msg' => "Something Went Wrong.");
    }
    echo json_encode($response);
    return;
}

function get_all_packages(){    
    $db2 = $this->load->database('visaclap', TRUE); 
    $db2->select('*');
    $db2->from('tbl_packages');
    $db2->where('is_delete',0);
    $query =  $db2->get()->result();

    $data['get_all_pkg'] = $query;
    $this->load->view('packages/view_packages',$data);
}

function remove_packages(){
    $db2 = $this->load->database('visaclap', TRUE); 

    if($this->input->post('r_id')){
        $update_status = $this->Packages_model->remove_packages($this->input->post('r_id'));
        $response = array('status'=> 'success','msg' => "Package Removed Successfully");
    }else{
        $response = array('status'=> 'failed','msg' => "Something Went Wrong.");
    }
    echo json_encode($response);
    return;
}

}

?>
