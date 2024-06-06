<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Itenerary extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
			// tables
		$this->tbl_users   		= 		TBL_USERS;
		$this->tbl_profile 		= 		TBL_PROFILE;
		$this->tbl_category 	= 		TBL_CATEGORY;
		$this->tbl_countries 	= 		TBL_COUNTRIES;
		$this->tbl_cities 		= 		TBL_CITIES;
		$this->tbl_activity 	= 		TBL_ACTIVITY;
		$this->load->model(array('user_model', 'setting_model','supplier_model'));
		$this->load->helper('theme_helper');
	}

	function index(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','select2.full.min', 'select2');
		$this->content->extra_css = array('custom');
		$title = 'View Itinerary';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Itinerary'      => 	'franchise/itenerary',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		
		if($this->session->userdata('user_role') == 6){

			$this->content->_view 		= 	$this->setting_model->get_all_itenerary_staff();
		}else{

			$this->content->_view 		= 	$this->setting_model->get_all_itenerary();
		}


		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		$this->content->_category   = 	$this->setting_model->get_category();
		$this->content->get_all_enquiry   = 	$this->setting_model->get_all_enquiry_by_franchise();


		$this->load_view('view_itenerary', $title);

	}

	function add(){
		/** page level css & js * */
		$this->content->extra_js  = array('table-data','date-picker/date-picker','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','summernote/summernote1','summernote');
		$this->content->extra_css = array('custom');
		$title = 'Add Itinerary';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		$this->content->_view 		= 	$this->setting_model->get_all_name_des_metadata();
		$this->load_view('add_edit_new_itenerary', $title);
	}

	function get_itinerary_tbl_records(){ 
		$post = $this->input->post();
		if($post['checkbox'] == "true"){
			$checked = 1;
		}else{
			$checked = 0;
		}
		if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
			$data['_view'] 		= 	$this->setting_model->get_all_itenerary_staff($post['destination'],$post['city'],$checked);
		}else{
			$data['_view'] = $this->setting_model->get_all_itenerary($post['destination'],$post['city'],$checked);
		}
		
		$this->load->view('console/itenerary/itenerary_tbl_view',$data);
	}

	function get_all_cities_by_country_ids(){
		if($this->input->post()){
			$destination = $this->input->post('destination');
			// $fetch_all_state_by_country = $this->supplier_model->getch_all_state_by_id($destination);
			// $all_state_id = array_column($fetch_all_state_by_country, 'id');
			$fetch_all_state_by_state = $this->setting_model->get_all_cities_by_country($destination);
			// xdebug($fetch_all_state_by_state);
			echo json_encode($fetch_all_state_by_state);
			return;
		}
	}

	function store_tenerary_data(){
		$post = $this->input->post();
		if($post){
			$masater_array = array(
				'destination' => $post['destination'],
				'city' => $post['city'],
				'i_name' => $post['i_name'],
				'description' => $post['description'],
				'franchise_id' => $this->session->userdata('user_id'),
				'created_at' => date('Y-m-d H:i:s'),
			);
			$id = $this->setting_model->store($masater_array,TBL_MASTER_ITENERARY);
			if($id > 0){
				foreach ($post['day'] as $key => $value) {
					$day = $post['day'][$key];
					$time = $post['time'][$key];
					$title = $post['title'][$key];
					$detail = $post['title'][$key];

					$sub_array = array(
						'master_id' => $id,
						'day' => $day,
						'time' => $time,
						'title' => $title,
						'detail' => $detail,
						'created_at' => date('Y-m-d H:i:s'),
					);
					$this->setting_model->store($sub_array,TBL_SUB_ITENERARY);
				}
				$response = array('status' => 'success', 'msg' => 'Itenerary Added Successfully');
			}else{

				$response = array('status' => 'failed', 'msg' => 'Something Went Wrong');
			}
		}else{
			$response = array('status' => 'failed', 'msg' => 'Something Went Wrong');

		}
		echo json_encode($response);
		return;
	}

	function edit_itenerary($id){
		/** page level css & js * */
		$this->content->extra_js  = array('table-data','date-picker/date-picker','select2.full.min', 'select2','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','summernote/summernote1','summernote');
		$this->content->extra_css = array('custom');
		$this->content->extra_css = array('custom');
		$title = 'Edit Itinerary';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Itinerary'      => 	'franchise/itenerary',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->_view 		= 	$this->setting_model->get_all_itenerary_by_id($id);
		// $this->content->get_all_cities 		= 	$this->supplier_model->getch_all_cities_by_id($this->content->_view->destination);
		$fetch_all_state_by_country = $this->supplier_model->getch_all_state_by_id($this->content->_view->destination);
		$all_state_id = array_column($fetch_all_state_by_country, 'id');
		$this->content->get_all_cities = $this->setting_model->getch_all_cities_by_id($all_state_id);
		
		$this->content->all_sub_entry = $this->setting_model->get_all_itenerarysub_entry($id);
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		// $this->content->view 		= 	$this->setting_model->get_all_name_des_metadata();
		if($this->content->_view->destination > 0 &&  $this->content->_view->city == 0){
			$this->content->view 	= 	$this->setting_model->get_all_itenerary_destination($this->content->_view->destination,$this->content->_view->city);
			// echo '1';
		}else if($this->content->_view->city > 0){
			$this->content->view 	= 	$this->setting_model->get_all_itenerary_city($this->content->_view->city);
			// echo '2';
		}
		// return;
		$this->load_view('edit_itenerary', $title);
	}

	function update_tenerary_data(){
		$post = $this->input->post();
		
		if($post){
			$masater_array = array(
				'destination' => $post['destination'],
				'city' => $post['city'],
				'i_name' => $post['i_name'],
				'description' => $post['description'],
				'franchise_id' => $this->session->userdata('user_id'),
				'created_at' => date('Y-m-d H:i:s'),
			);
			$this->setting_model->update_itenerary_master_elements($masater_array,$post['query_id']);

			$p_id = $post['p_id'];
			foreach ($p_id as $key => $p_data) {
				$day = $post['day'][$key];
				$time = $post['time'][$key];
				$title = $post['title'][$key];
				$detail = $post['title'][$key];
				$sub_array = array(
					'master_id' => $post['query_id'],
					'day' => $day,
					'time' => $time,
					'title' => $title,
					'detail' => $detail,
				);
				if($p_data == 0){
					$sub_array['created_at'] = date('Y-m-d H:i:s');
					$this->setting_model->store($sub_array,TBL_SUB_ITENERARY);
				}else{
					$sub_array['updated_at'] = date('Y-m-d H:i:s');
					$this->setting_model->update_itenerary_sub_elements($sub_array,$p_data);
				}			

			}
			$response = array('status' => 'success', 'msg' => 'Itinerary updated Successfully.');
		}else{
			$response = array('status' => 'failed', 'msg' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		return;
	}

	function remove_itenerary(){
		if($this->input->post('r_id')){
			$this->db->set('is_delete',1);
			$this->db->where('id',$this->input->post('r_id'));
			$this->db->update(TBL_SUB_ITENERARY);
			$response = array('status' => 'success', 'msg' => 'Itinerary Removed Successfully.');
		}else{
			$response = array('status' => 'failed', 'msg' => 'Something Went Wrong');
		}
		echo json_encode($response);
		return;
	}

	function delete_itenerary_data(){
		if($this->input->post('id')){
			$this->db->set('is_delete',1);
			$this->db->where('id',$this->input->post('id'));
			$this->db->update(TBL_MASTER_ITENERARY);
			$response = array('status' => 'success', 'msg' => 'Record Removed Successfully.');
		}else{
			$response = array('status' => 'failed', 'msg' => 'Something Went Wrong');
		}
		echo json_encode($response);
		return;
	}

	function get_des_by_name(){
		if($this->input->post('r_id')){
			$get_all_desc = $this->setting_model->get_all_desc_names($this->input->post('r_id'));
			echo json_encode($get_all_desc);
			return;
		}
	}

	function fetch_itenerary_data_view()
	{
		if($this->input->post() > 0){
			$data['fetch_itenerary_details'] = $this->setting_model->fetch_itenerary_details($this->input->post('r_id'));

			$desttingdata = $this->setting_model->fetch_sub_destinations_data($this->input->post('r_id'));

			$day_groups = array_column($desttingdata, 'day');

			$data['fetch_destinations_data'] = $this->setting_model->fetch_sub_destinations_data($this->input->post('r_id'));
			

			$this->load->view('console/itenerary/view_itenerary_modal_view',$data);
		}
	}
	
	function get_titles_by_cc(){
		$post = $this->input->post();
		if(isset($post) && $post['destination'] > 0 && isset($post) && $post['city'] == ""){
			$data 	= 	$this->setting_model->get_all_itenerary_destination($post['destination']);

		}else if(isset($post) && $post['city'] > 0){
			$data 	= 	$this->setting_model->get_all_itenerary_city($post['city']);
		}
		echo json_encode($data);
		return;
	}
	
	function generate_autometic_itinerary(){
		if($this->input->post()){

			$get_first_location = $this->setting_model->generate_autometic_itinerary_details($this->input->post('city'),$this->input->post('destination'));

			if(!empty($get_first_location)){
				$imp_array = implode(",",$this->input->post('itinerary_star'));

				$get_all_destinations = $this->setting_model->generate_autometic_itinerary_details_by_itenerary($this->input->post('city'),$get_first_location->latitude,$get_first_location->longitude,$get_first_location->meta_id,explode(",",$imp_array),$this->input->post('turist_category'));

				$post = $this->input->post();
				if(!empty($get_all_destinations)){
					// $get_destination_nm = $this->setting_model->get_country_name($post['destination'],TBL_COUNTRIES_SUPPLIER);
					// $get_city_nm = $this->setting_model->get_country_name($post['city'],TBL_CITIES_SUPPLIER);
					$masater_array = array(
						'destination' => $post['destination'],
						'city' => $post['city'],
						'i_name' => $post['i_name'],
						'franchise_id' => $this->session->userdata('user_id'),
						'created_at' => date('Y-m-d H:i:s'),
					);

					$id = $this->setting_model->store($masater_array,TBL_MASTER_ITENERARY);

					$total_day_minutes = array();
					$total_days_itinerary = $post['i_day'] * 500;

					$selectedTime = "09:00:00";
					$time_array = array();

					$x = 1;
					$length = count($get_all_destinations);
					foreach ($get_all_destinations as $key => $value) {
						if($x == 1){
							$first_lat = $value->latitude;
							$first_long = $value->longitude;

							$second_lat = $get_all_destinations[$key]->latitude;
							$second_long = $get_all_destinations[$key]->longitude;

						}else if($x == $length){

							$first_lat = $value->latitude;
							$first_long = $value->longitude;

							$second_lat = $get_all_destinations[$key-1]->latitude;
							$second_long = $get_all_destinations[$key-1]->longitude;
						}

						$get_distance_km = $this->getDistanceBetweenPointsNew($first_lat,$first_long,$second_lat,$second_long,'kilometers');

						$count_minutes_by_km =  round($get_distance_km) * 5 + 20 + $value->duration;
						
						$place_minute = $count_minutes_by_km;

						if(!empty($time_array)){
							$endTime = strtotime("+".$place_minute." minutes", strtotime(end($time_array)));
							$place_visit_time =  date('H:i:s', $endTime);
						}else{
							$place_visit_time =  "09:00:00";
						}

						array_push($total_day_minutes,$place_minute);
						array_push($time_array,$place_visit_time);

						// xdebug($total_days_itinerary);

						if($total_days_itinerary > array_sum($total_day_minutes)){
							$minutes = array_sum($total_day_minutes);

							if($minutes <= 500){
								$days = "1";
							}else if($minutes < 1000 && $minutes > 500){
								$days = "2";
							}else if($minutes < 1500 && $minutes > 1000){
								$days = "3";
							}else if($minutes < 2000 && $minutes > 1500){
								$days = "4";
							}else if($minutes < 2500 && $minutes > 2000){
								$days = "5";
							}else if($minutes < 3000 && $minutes > 2500){
								$days = "6";
							}else if($minutes < 3500 && $minutes > 3000){
								$days = "7";
							}else if($minutes < 4000 && $minutes > 3500){
								$days = "8";
							}else if($minutes < 4500 && $minutes > 4000){
								$days = "9";
							}else if($minutes < 5000 && $minutes > 4500){
								$days = "10";
							}
							if($id > 0){
								$sub_array = array(
									'master_id' => $id,
									'day' => $days,
									'time' => $place_visit_time,
									'title' => $value->meta_id,
									'detail' => $value->meta_id,
									'created_at' => date('Y-m-d H:i:s'),
								);

								$this->db->insert(TBL_SUB_ITENERARY,$sub_array);
							}
						}
						$x++;

					}

					$geneate_pdf = $this->generate_itineray_pdf($id);

					$response = array('status' => 'success', 'msg' => 'Itinerary Created Successfully.');
				}else{
					$response = array('status' => 'failed', 'msg' => 'No Turist Attraction Found.To Create An Itinerary.');
				}

			}else{

				$response = array('status' => 'failed', 'msg' => 'No Turist Attraction Found To Create Itenerary.');
			}

		}else{

			$response = array('status' => 'failed', 'msg' => 'Something Went Wrong.');

		}
		echo json_encode($response);

	}

	function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'miles') {
		$theta = $longitude1 - $longitude2; 
		$distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
		$distance = acos($distance); 
		$distance = rad2deg($distance); 
		$distance = $distance * 60 * 1.1515; 
		switch($unit) { 
			case 'miles': 
			break; 
			case 'kilometers' : 
			$distance = $distance * 1.609344; 
		} 
		return (round($distance,2)); 
	}

	function generate_itineray_pdf($id)
	{
		$pdfFilePath = "".$id.".pdf";
		$data['fetch_itenerary_details'] = $this->setting_model->fetch_itenerary_details($id);
		$data['fetch_destinations_data'] = $this->setting_model->fetch_sub_destinations_data($id);

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('console/itenerary/view_itenerary_modal_view',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output("./assets/itinerary_pdf/".$pdfFilePath);
	}

	function getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2) {
		$theta = $lon1 - $lon2;
		$miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
		$miles = acos($miles);
		$miles = rad2deg($miles);
		$miles = $miles * 60 * 1.1515;
		$feet = $miles * 5280;
		$yards = $feet / 3;
		$kilometers = $miles * 1.609344;
		$meters = $kilometers * 1000;
		return compact('miles','feet','yards','kilometers','meters'); 
	}	

	function send_email_of_itinerary(){
		$post = $this->input->post();
		
		if($post){
			if($this->session->userdata('user_role') == User_role::FRANCHISE){
				$fetch_user_email_credencials = $this->setting_model->fetch_user_email_credencials($this->session->userdata('user_id'));
			}else{
				$fetch_user_email_credencials = $this->setting_model->fetch_user_email_credencials($this->session->userdata('franchise_id'));
			}
			if(!empty($fetch_user_email_credencials)){ 
				define('GOOGLE_CLIENT_ID', $fetch_user_email_credencials->client_id);
				define('GOOGLE_CLIENT_SECRET', $fetch_user_email_credencials->client_secret);
				define('GOOGLE_CLIENT_EMAIL', $fetch_user_email_credencials->email);

				foreach ($post['enquiry_id'] as $key => $value) {
					$get_email_by_enquiry_id = $this->setting_model->get_email_by_enquiry_id($value);
					// $user_data = $this->setting_model->get_user_detail_by_id($value);
					if(isset($post['sub_array']) && $post['sub_array'] > 0){
						$get_content = $this->get_template_content($post['sub_array']);
						$send_mail = send_itinerary_email_with_file($get_email_by_enquiry_id->email,$get_content,$post['sub_array']);
						
					}else{
						$response = array('status'=>'failed','message' => 'Something Went Wrong.');
						echo json_encode($response);
						die;
					}

				}
				$get_content = $this->get_template_content($post['sub_array']);
				if($post["uemail"] != ""){
						$send_mail = send_itinerary_email_with_file($post['uemail'],$get_content,$post['sub_array']);
				}
				$response = array('status'=>'success','message' => 'Mail Sended Successfully.');
			}else{
				$response = array('status'=>'cred_non_added','message' => 'Please Add Email Credential.');
			}

		}else{
			$response = array('status'=>'failed','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		return;
	}

	function send_itinerary_image(){
		$post = $this->input->post();
		
		if ($_FILES['itinerary_att_image']['tmp_name'][0] !== "") {
				foreach ($_FILES['itinerary_att_image']['name'] as $key => $val) {
					$tmp_nm=$_FILES['itinerary_att_image']['tmp_name'][$key];
					$target_dir="upload/itinerary_img/";
					$file_nm=basename($_FILES['itinerary_att_image']['name'][$key]);
					$doc_nm=pathinfo($_FILES['itinerary_att_image']['name'][$key]);
					$rename_doc=mt_rand().".".strtolower($doc_nm['extension']);
					$img_path=$target_dir.$rename_doc;
					$uploda_ok=move_uploaded_file($tmp_nm, $img_path);	
					$item_image_data=array(
						'master_id' => $post['singleitinerary'],
						'img_name'=>$img_path,
						'created_at'=>date('Y-m-d H:i:s'),
					);
					$this->db->insert(TBL_ITENERARY_ATT_IMAGE,$item_image_data);
				}
			}
			echo json_encode(array('status'=> 'success', 'message'=> ' Image Updated successfully'));
		return;
	}

	function get_all_itinerary_images(){
		if($this->input->post()){
			$data['fetch_all_images'] = $this->setting_model->fetch_all_itenerary_image_data($this->input->post('record_id'));
			$this->load->view('console/itenerary/view_all_itenerary_img',$data);
		}
	}

	function send_wap_of_itinerary(){
		$post = $this->input->post();
		if($post){
			
			$mainitenery  =	$this->setting_model->get_all_itenerary_by_id($post['singleitinerary']);
		
			$all_sub_entry = $this->setting_model->get_all_itenerarysub_entry($post['singleitinerary']);
			$get_wap_by_enquiry_id = $this->setting_model->get_wap_by_enquiry_id($post['wap_enquiry_id']);
			
			//$message = '<h3>Main Itinerary : '.$mainitenery->i_name.'</h3>';

			$data = '*Main Itinerary '.$mainitenery->i_name.'*';
			foreach ($all_sub_entry as $key => $value) {
				$maintit  = $this->setting_model->get_all_desc_names($value->title);
				
				$data .= 'Sub Itinerary : '.$maintit[0]->name.'';
			}	
			

		$phonenumber = $get_wap_by_enquiry_id->mobile_no;
		$data = array(
                    'mobile_no' => isset($phonenumber) && $phonenumber ? $phonenumber : "",
                    'content' => isset($phonenumber) && $data ? $data : "",
                );

		$response = array('data'=>$data,'status'=>'success','message' => 'Watsapp Sended Successfully.');
		}else{
			$response = array('status'=>'failed','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		return;
	}


	function get_template_content($email_itinerary_name){
		// return base_url('upload/turist_img/1519662625.jpg');
		$fetch_itenerary_details = $this->setting_model->fetch_itenerary_details($email_itinerary_name);

		$fetch_destinations_data = $this->setting_model->fetch_sub_destinations_data($email_itinerary_name);

		$html = "";
		$html .= "
		<h4>Itinerary : ".$fetch_itenerary_details->i_name."</h4>
		<h4>Destination : ".$fetch_itenerary_details->c_name."</h4>
		<h4>City : ".$fetch_itenerary_details->city_nm."</h4>";
		if(!empty($fetch_destinations_data)){
			$html .= "<table class='table'>
			<thead>
			<tr>
			<th scope='col'>Day</th>
			<th scope='col'>Turist Place</th>
			<th scope='col'>Description</th>
			<th scope='col'>Image</th>
			</tr>
			</thead>
			<tbody>";
			foreach ($fetch_destinations_data as $key => $value) { 

				$html .= "<tr>
				<th>".$value->day."</th>
				<td>".$value->turist_place."</td>
				<td>".$value->turist_description."</td><td>";

				$fetch_all_images = $this->setting_model->fetch_all_turist_imgs($value->meta_id);

				foreach ($fetch_all_images as $key => $value) {
					$html .= "<img src='".base_url($value->img_name)."' class='img-bordered' height='50px' width='50px' />";
				}

				$html .="</td></tr>";
			}
			$html .= "</tbody><table>";
		}
		return $html;
		// $this->load->view('console/enquiry/itinerary_template_view');
	}
	
	function create_itinerary_by_turist_att_franchise(){
		$post = $this->input->post();
		$get_first_record = $this->setting_model->fetch_all_turist_attractions_by_ids(explode(',',$post['att_id'])[0]);
		$id_array = explode(',',$post['att_id']);
		
		if(!empty($get_first_record)){
			$get_all_destinations = $this->setting_model->get_turist_att_admin($get_first_record->latitude,$get_first_record->longitude,$id_array);

			if(!empty($get_all_destinations)){

				// $get_destination_nm = $this->setting_model->get_country_name($post['destination'],TBL_COUNTRIES_SUPPLIER);
				// $get_city_nm = $this->setting_model->get_country_name($post['city'],TBL_CITIES_SUPPLIER);

				$masater_array = array(
					'destination' => $get_first_record->country,
					'city' => $get_first_record->city,
					'i_name' => $post['itinerary_title'],
					'franchise_id' => $this->session->userdata('user_id'),
					'is_admin_or_franchise' => Itenerary_local_global_module::IS_FRANCHISE,
					'created_at' => date('Y-m-d H:i:s'),
				);
				$id = $this->setting_model->store($masater_array,TBL_MASTER_ITENERARY);
				$total_day_minutes = array();
				$total_days_itinerary = $post['i_day'] * 500;

				$selectedTime = "09:00:00";
				$time_array = array();

				$x = 1;
				$length = count($get_all_destinations);
				foreach ($get_all_destinations as $key => $value) {
				
					if($x === 1){
						$first_lat = $value->latitude;
						$first_long = $value->longitude;
						$second_lat = $get_all_destinations[$key]->latitude;
						$second_long = $get_all_destinations[$key]->longitude;
					}else if($x === $length){
						$first_lat = $value->latitude;
						$first_long = $value->longitude;
						$second_lat = $get_all_destinations[$key-1]->latitude;
						$second_long = $get_all_destinations[$key-1]->longitude;
					}
					$get_distance_km = $this->getDistanceBetweenPointsNew($first_lat,$first_long,$second_lat,$second_long,'kilometers');
					$count_minutes_by_km =  round($get_distance_km) * 5 + 20 + $value->duration;
					$place_minute = $count_minutes_by_km;
					if(!empty($time_array)){
						$endTime = strtotime("+".$place_minute." minutes", strtotime(end($time_array)));
						$place_visit_time =  date('H:i:s', $endTime);
					}else{
						$place_visit_time =  "09:00:00";
					}
					array_push($total_day_minutes,$place_minute);
					array_push($time_array,$place_visit_time);
					// xdebug($total_days_itinerary.'---'.array_sum($total_day_minutes));
					if($total_days_itinerary > array_sum($total_day_minutes)){
						$minutes = array_sum($total_day_minutes);
						if($minutes <= 500){
							$days = "1";
						}else if($minutes < 1000 && $minutes > 500){
							$days = "2";
						}else if($minutes < 1500 && $minutes > 1000){
							$days = "3";
						}else if($minutes < 2000 && $minutes > 1500){
							$days = "4";
						}else if($minutes < 2500 && $minutes > 2000){
							$days = "5";
						}else if($minutes < 3000 && $minutes > 2500){
							$days = "6";
						}else if($minutes < 3500 && $minutes > 3000){
							$days = "7";
						}else if($minutes < 4000 && $minutes > 3500){
							$days = "8";
						}else if($minutes < 4500 && $minutes > 4000){
							$days = "9";
						}else if($minutes < 5000 && $minutes > 4500){
							$days = "10";
						}
						if($id > 0){
							$sub_array = array(
								'master_id' => $id,
								'day' => $days,
								'time' => $place_visit_time,
								'title' => $value->meta_id,
								'detail' => $value->meta_id,
								'created_at' => date('Y-m-d H:i:s'),
							);
							$this->setting_model->store($sub_array,TBL_SUB_ITENERARY);
						}
					}
					$x++;
				}
				$geneate_pdf = $this->generate_itineray_pdf($id);

				$response = array('status' => 'success', 'msg' => 'Itinerary Created Successfully.');
			}else{
			$response = array('status' => 'failed', 'msg' => 'No Turist Attraction Found.To Create An Itinerary.');
			}
		}else{
			$response = array('status' => 'failed', 'msg' => 'No Turist Attraction Found.To Create An Itinerary.');
		}
		echo json_encode($response);
		return;
	}
	
	private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/itenerary/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}
}

?>