<?php
require APPPATH . 'libraries/REST_Controller.php';
class Category extends REST_Controller {
    public function __construct() {
     parent::__construct();
     $this->load->database();
 }
 public function index_post()
 {
    $db2 = $this->load->database('visaclap', TRUE); 
    $key = "12345";
    if(getallheaders()['key'] == ""){
       $this->response(array(
        'message' => 'Please Enter Api Key',
    ));
   } else if(getallheaders()['key'] == $key){
    $country_name = trim($this->input->post('country_name'));
    $user_id = $this->input->post('user_id');
    if($country_name != "" && $user_id){
        $db2->select('id');
        $db2->from('tbl_country');
        $db2->like('name', $country_name);
        $get_all_country_by_name =  $db2->get()->result();
        $country_id_array = array_column($get_all_country_by_name, 'id');

        $db2->select('*');
        $db2->from('tbl_subscription');
        $db2->where('user_id',$user_id);
        $query = $db2->get()->row();
        if(!empty($query)){
            $db2->select('request_per_minute');
            $db2->from('tbl_packages');
            $db2->where('id',$query->package_type);
            $get_package_req = $db2->get()->row();

            if(!empty($get_package_req)){
                $package_req_limit = $get_package_req->request_per_minute;
                if(is_null($query->request_count)){
                    $count_increase = array(
                        'request_count' => 1,
                        'request_time' => date('H:i:s'),
                    );
                }else{
                    $count_increase = array(
                        'request_count' => $query->request_count + 1,
                        'request_time' => date('H:i:s'),
                    );
                }
                $db2->set($count_increase);
                $db2->where('user_id',$user_id);
                $update_count_query = $db2->update('tbl_subscription');

                $dateTimeObject1 = date_create($query->request_time);
                $dateTimeObject2 = date_create(date('H:i:s'));

                $difference = date_diff($dateTimeObject1, $dateTimeObject2); 
                $minutes = $difference->days * 24 * 60;
                $minutes += $difference->h * 60;
                $minutes += $difference->i;

                if($minutes < 1){
                 $db2->select('*');
                 $db2->from('tbl_subscription');
                 $db2->where('user_id',$user_id);
                 $query = $db2->get()->row();

                 if($query->request_count > $package_req_limit){
                    $this->response(array(
                        'code' => 504,
                        'message' => "Request limit Exist In A Minute",
                    ), REST_Controller::HTTP_GATEWAY_TIMEOUT);

                }else{
                    if(!empty($country_id_array)){
                        $db2->select('*');
                        $db2->from('country_visa');
                        $db2->where_in('country_id', $country_id_array);
                        $country_visa =  $db2->get()->result();
                    }else{
                       $country_visa = array(); 
                   }

                   $this->response(array(
                    'code' => 200,
                    'message' => $country_visa,
                ), REST_Controller::HTTP_OK);
               }
           }else{
               $count_increase = array(
                'request_count' => null,
                'request_time' => date('H:i:s'),
            );
               $db2->set($count_increase);
               $db2->where('user_id',$user_id);
               $update_count_query = $db2->update('tbl_subscription');

               $db2->select('*');
               $db2->from('tbl_subscription');
               $db2->where('user_id',$user_id);
               $query = $db2->get()->row();

               if($query->request_count > $package_req_limit){
                $this->response(array(
                    'code' => 504,
                    'message' => "Request limit Exist In A Minute",
                ), REST_Controller::HTTP_GATEWAY_TIMEOUT);
            }else{
                if(!empty($country_id_array)){
                    $db2->select('*');
                    $db2->from('country_visa');
                    $db2->where_in('country_id', $country_id_array);
                    $country_visa =  $db2->get()->result();
                }else{
                   $country_visa = array(); 
               }

               $db2->set('request_count',1);
               $db2->where('user_id',$user_id);
               $update_count_query = $db2->update('tbl_subscription');

               $this->response(array(
                'code' => 200,
                'message' => $country_visa,
            ), REST_Controller::HTTP_OK);
           }
       }

   }else{
    $this->response(array(
        'code' => 200,
        'message' => "User Package Not Found.",
    ), REST_Controller::HTTP_OK);
}
}else{

    $this->response(array(
        'code' => 200,
        'message' => "No User Found.",
    ), REST_Controller::HTTP_OK);

}
}else{

    $this->response(array(
        'code' => 200,
        'message' => "Plase Enter Country Or User ID",
    ), REST_Controller::HTTP_OK);

}
}

}

}

?>
