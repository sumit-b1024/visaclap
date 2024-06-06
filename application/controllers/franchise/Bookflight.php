<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bookflight extends MY_Controller
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
		$this->load->model(array('user_model', 'setting_model','supplier_model','flight_booking_model'));
		$this->load->helper('theme_helper');
		$this->load->library('session');
	}

	
	function index(){


		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','daterangepicker/moment.min','daterangepicker/daterangepicker','custom_for_all');
		$this->content->extra_css = array('custom','daterangepicker');
		$title = 'Book Flight';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';

		
		
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		$this->content->get_all_airport   = 	$this->setting_model->get_all_airport_list();

		
		
		$this->load_view('bookflight_view', $title);
	}
	function getflightdata(){

		$post = $this->input->post();	
          $formcountryname = $this->setting_model->get_api_country_by_name($post['formcountry']);	
          $tocountryname = $this->setting_model->get_api_country_by_name($post['tocountry']);   
          /*echo '<pre>';
          print_r($tocountryname->countrydata->id); exit;*/

		/* get api ti visadata*/ 
		$db2 = $this->load->database('visaclapapi', TRUE);
		/*$db2->select('id');
		$db2->from('tbl_country');
		$db2->like('name', $post['formcountry']);
		$formcountryname =  $db2->get()->row();

		$db2->select('id');
		$db2->from('tbl_country');
		$db2->like('name', $post['tocountry']);
		$tocountryname =  $db2->get()->row();*/


        /*$country_visa = 
       $db2
       ->select("gi.id,gi.origin_country,gi.destination_country,GROUP_CONCAT(DISTINCT p.text) process, GROUP_CONCAT(DISTINCT cv.price ORDER BY cv.id ASC ) price, GROUP_CONCAT(DISTINCT cv.visa_type_id) visa_type_id,GROUP_CONCAT(DISTINCT cv.visa_validity ORDER BY cv.id ASC) visa_validity,GROUP_CONCAT(DISTINCT cv.length_of_stay ORDER BY cv.id ASC) length_of_stay,GROUP_CONCAT(DISTINCT cv.time_to_get_visa) time_to_get_visa,GROUP_CONCAT(DISTINCT cv.entry_type) entry_type,GROUP_CONCAT(DISTINCT cv.description ORDER BY cv.id ASC) description,GROUP_CONCAT(DISTINCT cv.service_charge) service_charge,GROUP_CONCAT(DISTINCT tov.name) type_of_visa,GROUP_CONCAT(DISTINCT vg.document) all_document_id,GROUP_CONCAT(DISTINCT dg.document_id) all_document_name,GROUP_CONCAT(DISTINCT vf.visa_type ORDER BY gi.visa_type ASC) as visaformcompare,gi.process as process_docu,GROUP_CONCAT(DISTINCT gi.visa_type ORDER BY gi.visa_type ASC) as visa_type_form_id") 
       ->from("tbl_generalinfo AS gi")
       ->join("tbl_process AS p","FIND_IN_SET(p.id,gi.process) > 0","inner")
       ->join("country_visa AS cv","FIND_IN_SET(cv.id,gi.visa_type) > 0","inner")
       ->join("type_of_visa AS tov","FIND_IN_SET(tov.id,cv.visa_type_id) > 0","inner")
       ->join("visatypegroup AS vg","FIND_IN_SET(vg.visatype_id,gi.visa_type) > 0","inner")
       ->join("document_group AS dg","FIND_IN_SET(dg.id,vg.document) > 0","inner")
       // ->join('visapolicy_forms as vf','vf.visapolicy_id = gi.id')
       ->join('visapolicy_forms as vf','FIND_IN_SET(vf.visa_type,gi.visa_type) > 0','LEFT')
       ->where('gi.origin_country', $formcountryname->id)
       ->where('gi.destination_country', $tocountryname->id)
  // ->distinct('name'); 
       ->group_by("gi.visa_type")
       ->group_by("cv.id")
       ->get()->result();*/

       $country_visa =   $db2->select("gi.id,gi.origin_country,gi.destination_country,GROUP_CONCAT(DISTINCT p.text) process, GROUP_CONCAT(DISTINCT cv.price ORDER BY cv.id ASC ) price, GROUP_CONCAT(DISTINCT cv.visa_type_id) visa_type_id,GROUP_CONCAT(DISTINCT cv.visa_validity ORDER BY cv.id ASC) visa_validity,GROUP_CONCAT(DISTINCT cv.length_of_stay ORDER BY cv.id ASC) length_of_stay,GROUP_CONCAT(DISTINCT cv.time_to_get_visa) time_to_get_visa,GROUP_CONCAT(DISTINCT cv.entry_type) entry_type,GROUP_CONCAT(DISTINCT cv.description ORDER BY cv.id ASC) description,GROUP_CONCAT(DISTINCT cv.service_charge) service_charge,GROUP_CONCAT(DISTINCT tov.name) type_of_visa") 
       ->from("tbl_generalinfo AS gi")
       ->join("tbl_process AS p","FIND_IN_SET(p.id,gi.process) > 0","inner")
       ->join("country_visa AS cv","FIND_IN_SET(cv.id,gi.visa_type) > 0","inner")
       ->join("type_of_visa AS tov","FIND_IN_SET(tov.id,cv.visa_type_id) > 0","inner")
       ->join("visatypegroup AS vg","FIND_IN_SET(vg.visatype_id,gi.visa_type) > 0","inner")
       ->join("document_group AS dg","FIND_IN_SET(dg.id,vg.document) > 0","inner")
       // ->join('visapolicy_forms as vf','vf.visapolicy_id = gi.id')
       ->join('visapolicy_forms as vf','FIND_IN_SET(vf.visa_type,gi.visa_type) > 0','LEFT')
       ->where('gi.origin_country', $formcountryname->countrydata->id)
       ->where('gi.destination_country', $tocountryname->countrydata->id)
  // ->distinct('name'); 
       ->group_by("gi.visa_type")
       ->group_by("cv.id")
       ->get()->result();



       $flightarray = array();
       $flightdata = array(
       	'departureDate'  => $post['departureDate'],
       	'AdultCount'     => $post['adults'],
       	'ChildCount'     => $post['children'],
       	'InfantCount'     => $post['infants'],
       	'JourneyType'     => $post['trip'],
       	'CabinClass'     => $post['cabinclass'],
       	'PreferredAirlines' =>    array(),
       	'Origin' => $post['origin'],
       	'Destination' => $post['destination']
       );

       $this->session->set_userdata('fightdata',$flightdata);

       $departureDate = $post['departureDate']."T00:00:00";

       $flightarray['AdultCount']	= $post['adults'];
       $flightarray['ChildCount']	= $post['children'];
       $flightarray['InfantCount']	= $post['infants'];
       $flightarray['JourneyType']	= $post['trip'];
       $flightarray['PreferredAirlines']	= array();
       $flightarray['CabinClass']	= $post['cabinclass'];

       $flightarray['Segments']=array();
       $Segments['Origin']= $post['origin'];
       $Segments['Destination']= $post['destination'];
       $Segments['DepartureDate']= $departureDate;


       array_push($flightarray['Segments'],$Segments);

       
       $url =  BOOKING_API_URL.'Search';

       $ch = curl_init($url);

       $data1 = json_encode($flightarray);
       curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
       curl_setopt($ch, CURLOPT_HTTPHEADER, HEADER_API);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $result = curl_exec($ch);
       curl_close($ch);

       $result1 = json_decode($result,true); 
       
       $data['flight_data'] = $result1['Search']['FlightDataList']['JourneyList'][0];
        

       $data['status'] = $result1['Status']; 
       $data['message'] = $result1['Message']; 
       $data['passbookingdate']= $post['departureDate'];
       $data['trip']= $post['trip'];

       $scountryname =  $this->setting_model->get_code_by_country_name($post['origin']);
       $ecountryname =  $this->setting_model->get_code_by_country_name($post['destination']);

       if($scountryname->country == 'India' && $ecountryname->country == 'India'){
       	$data['bookingprofit']   = 	$this->setting_model->get_booking_profit_domestic();
       }else{
       	$data['bookingprofit']   = 	$this->setting_model->get_booking_profit_international();
       }
       if($scountryname->country != 'India' || $ecountryname->country != 'India'){
       	$data['country_visa'] = $country_visa;
       }	

       $this->load->view('franchise/flight_tbl_record', $data);


   }


   function  getfarerule(){


   	$post = $this->input->post();		
   	if(!empty($post)){
   		$flightarray = array();
   		$flightarray['ResultToken']	= $post['token'];


   		$url = BOOKING_API_URL.'FareRule';
   		$ch = curl_init($url);
   		$data1 = json_encode($flightarray);

   		curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);   
   		curl_setopt($ch, CURLOPT_HTTPHEADER, HEADER_API);
   		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   		$result = curl_exec($ch);
   		curl_close($ch);

   		$result1 = json_decode($result,true); 

   		$data['ruledata'] = $result1['FareRule']['FareRuleDetail']; 

   		$data['status'] = $result1['Status']; 
   		$data['message'] = $result1['Message']; 
   	}else{
   		$data['status'] = 0; 
   		$data['message'] = "Invalid Fare Rule Request";
   	}  

   	$this->load->view('flight/flight_farerule', $data);

   }

   function  updatefarequote(){

   	$this->content->extra_js  = array('dataTables.bootstrap5.min', 'responsive.bootstrap5.min', 'date-picker/date-picker','date-picker/jquery-ui','sweet-alert/sweetalert.min','sweet-alert','custom_for_all');

   	$post = $this->input->post();	

   	$title = 'Booking Flight';
   	$this->content->breadcrumb = array(
   		'Dashboard'      => 	'',
   		$title         	=> 	NULL
   	);
   	$this->content->title   	= 	$title;
   	if(!empty($post)){
   		$flightarray = array();
   		$flightarray['ResultToken']	= $post['bookingtoken'];
   		$this->content->newbookingdate = $post['departureDate'];
          $this->content->trip = $post['trip']; 

   		$url = BOOKING_API_URL.'UpdateFareQuote';
   		$ch = curl_init($url);
   		$data1 = json_encode($flightarray);

   		curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
   		curl_setopt($ch, CURLOPT_HTTPHEADER, HEADER_API);
   		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   		$result = curl_exec($ch);
   		curl_close($ch);

   		$result1 = json_decode($result,true); 

   		if($result1['Status'] != 0){


   			$this->content->flightdetail = $result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['FlightDetails']; 
   			$this->content->pricePassenger = $result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['Price']; 
   			$this->content->ResultToken = $result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['ResultToken']; 




   			$first = reset($result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['FlightDetails']['Details'][0]);
   			$last = end($result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['FlightDetails']['Details'][0]);

   			$sacode = $first['Origin']['AirportCode'];
   			$eacode = $last['Destination']['AirportCode'];


   			$this->content->from = $sacode; 
   			$this->content->to = $eacode; 


   			$scountryname =  $this->setting_model->get_code_by_country_name($sacode);
   			$ecountryname =  $this->setting_model->get_code_by_country_name($eacode);
   			if($scountryname->country == 'India' && $ecountryname->country == 'India'){
   				$this->content->flighttype   = 	"domestic";
   			}else{
   				$this->content->flighttype  = 	"International";
   				$this->content->country 	= 	$this->setting_model->get_all_country();
   			}



   			if($scountryname->country == 'India' && $ecountryname->country == 'India'){
   				$bookingprofit   = 	$this->setting_model->get_booking_profit_domestic();
   			}else{
   				$bookingprofit   = 	$this->setting_model->get_booking_profit_international();
   			}

   			if($bookingprofit->pper != ""){
   				$profit = $bookingprofit->pper;  
   				$profitlabel = "per";  
   			}else{
   				$profit = $bookingprofit->pfix;  
   				$profitlabel = "fix";  
   			}


   			$BasicFare = $result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['Price']['TotalDisplayFare'];
   			if($profitlabel == 'per'){
   				$total = ($BasicFare*$profit)/100;
   				$this->content->totalcost = $total+$BasicFare;
   			}else{
   				$this->content->totalcost = $BasicFare+$profit;
   			}




   		}
   		$this->content->status = $result1['Status']; 
   		$this->content->message = $result1['Message']; 
   	}else{
   		$this->content->status = 0; 
   		$this->content->message = "Invalid Fare Rule Request";
   	}  

   	$this->load_view('flight_bookingform', $title);

   }
   function submitflight(){


   	$post = $this->input->post();
   	if(!empty($post)){

   		$flightarray = array();
   		$flightarray['ResultToken']	= $post['rtoken'];

   		$url = BOOKING_API_URL.'UpdateFareQuote';
   		$ch = curl_init($url);
   		$data1 = json_encode($flightarray);

   		curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
   		curl_setopt($ch, CURLOPT_HTTPHEADER, HEADER_API);
   		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   		$result = curl_exec($ch);
   		curl_close($ch);

   		$result1 = json_decode($result,true); 
          
   		if($result1['Status'] != 0){


   			$submitarray = array();
   			$submitarray['AppReference']	= $post['appreference'];
   			$submitarray['SequenceNumber']	= 0;
   			$submitarray['ResultToken']	= $post['rtoken'];
   			$submitarray['Passengers']=array();
   			for($i = 0 ;$i < count($post['first_name']);$i++){ 

   				if($i==0){
   					$Passengers['IsLeadPax']= "1";
   				}else{
   					$Passengers['IsLeadPax']= "0";
   				}
   				$Passengers['Title']= $post['name_title'][$i];
   				$Passengers['FirstName']= $post['first_name'][$i];
   				$Passengers['LastName']= $post['last_name'][$i];
   				$Passengers['Gender']= 1;
   				$Passengers['DateOfBirth']= $post['date_of_birth'][$i];


   				$first = reset($result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['FlightDetails']['Details'][0]);
   				$last = end($result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['FlightDetails']['Details'][0]);
   				$sacode = $first['Origin']['AirportCode'];
   				$eacode = $last['Destination']['AirportCode'];

   				$scountryname =  $this->setting_model->get_code_by_country_name($sacode);
   				$ecountryname =  $this->setting_model->get_code_by_country_name($eacode);

   				if($scountryname->country == 'India' && $ecountryname->country == 'India'){
   					$bookingprofit   = 	$this->setting_model->get_booking_profit_domestic();
   				}else{
   					$bookingprofit   = 	$this->setting_model->get_booking_profit_international();
   				}

   				if($bookingprofit->pper != ""){
   					$profit = $bookingprofit->pper;  
   					$profitlabel = "per";  
   				}else{
   					$profit = $bookingprofit->pfix;  
   					$profitlabel = "fix";  
   				}


   				$BasicFare = $result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['Price']['TotalDisplayFare'];
   				if($profitlabel == 'per'){
   					$total = ($BasicFare*$profit)/100;
   					$totalcost = $total+$BasicFare;
   				}else{
   					$totalcost = $BasicFare+$profit;
   				}
	         	//$countrycode = 

   				if($scountryname->country == 'India' && $ecountryname->country == 'India'){
   					$Passengers['PassportNumber']= "";
   					$Passengers['CountryCode']= "IN";
   					$Passengers['CountryName']= $ecountryname->country;
   					$Passengers['City']= $last['Destination']['CityName'];
   					$Passengers['PinCode']= $post['pincode'][$i];
   					$Passengers['AddressLine1']= $post['address'][$i];
   				}else{
   					$Passengers['PassportNumber']= $post['passport_no'][$i];
   					$Passengers['PassportExpiry']= $post['passenger_passport_expiry_day'][$i];
   					$Passengers['CountryCode']= $ecountryname->sort_name;
   					$Passengers['CountryName']= $post['passenger_passport_issuing_country'][$i];
   					$Passengers['City']= $last['Destination']['CityName'];
   					$Passengers['PinCode']= $post['pincode'][$i];
   					$Passengers['AddressLine1']= $post['address'][$i];
   				}

   				$Passengers['ContactNo']= $post['contactnumber'];
   				$Passengers['Email']= $post['contactemail'];
   				if($post['type'][$i] == 'ADT'){
   					$Passengers['PaxType']= "1";
   				}elseif($post['type'][$i] == 'CHD'){
   					$Passengers['PaxType']= "2";
   				}elseif($post['type'][$i] == 'INF'){
   					$Passengers['PaxType']= "3";
   				}

   				array_push($submitarray['Passengers'],$Passengers);
   			}
   			$submitdata = json_encode($submitarray);

   			$url = BOOKING_API_URL.'CommitBooking';
   			$ch = curl_init($url);
   			curl_setopt($ch, CURLOPT_POSTFIELDS,$submitdata);
   			curl_setopt($ch, CURLOPT_HTTPHEADER, HEADER_API);
   			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   			$bookingre = curl_exec($ch);
   			curl_close($ch);

   			$completebookingresult = json_decode($bookingre,true); 


   			if($completebookingresult['Status'] != 0){

   				$bookresult = $completebookingresult["CommitBooking"]["BookingDetails"];


   				if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
   					$staffid = $this->session->userdata('user_id');
   					$franchise_id = $this->session->userdata('franchise_id');
   				} 
   				if($this->session->userdata('user_role') == User_role::FRANCHISE){
   					$franchise_id = $this->session->userdata('user_id');
   				} 		

   				$bookdata = array();
   				$bookdata['franchise_id']  =    $franchise_id;
   				$bookdata['staff_id']  =    $staffid;
                    $bookdata['journeytype']  =    $post["trip"];
   				$bookdata['price_detail']  =     json_encode($result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['Price']);
                    $bookdata['flightdetails']  =    json_encode($result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']['FlightDetails']['Details']);
                    $bookdata['resulttoken']  =    $result1['UpdateFareQuote']['FareQuoteDetails']['JourneyList']["ResultToken"];
                   // $bookdata['resulttoken']  =    $post['rtoken'];
   				$bookdata['appreference']  =   $post['appreference'];
   				$bookdata['bookingid']  =    $bookresult["BookingId"];
   				$bookdata['pnr']  =    $bookresult["PNR"];
   				$bookdata['book_email']  =    $post['contactemail'];
   				$bookdata['book_phone']  =    $post['contactnumber'];
   				$bookdata['totalprice']  =    $totalcost;
   				$bookdata['booking_date']  =    $post['bookingdate'];
   				$bookdata['origin']  =    $post['from'];
   				$bookdata['destination']  =    $post['to'];
   				$bookdata['created_at'] = date('Y-m-d H:i:s');
   				$bookinfinsertid = $this->flight_booking_model->addflightbooking($bookdata);

   				if( isset($bookinfinsertid) && !empty($bookinfinsertid) )
   				{

   					$subbookdataprofile = array();
   					for($i = 0 ;$i < count($bookresult['PassengerDetails']);$i++){ 
   						$subbookdataprofile['book_id']  =    $bookinfinsertid;
   						$subbookdataprofile['passengerid']  =    $bookresult['PassengerDetails'][$i]["PassengerId"];
   						$subbookdataprofile['ticketid']  =    $bookresult['PassengerDetails'][$i]["TicketId"];
   						$subbookdataprofile['ticketnumber']  =    $bookresult['PassengerDetails'][$i]["TicketNumber"];
   						$subbookdataprofile['ptype']  =    $bookresult['PassengerDetails'][$i]["PassengerType"];
   						$subbookdataprofile['title']  =    $bookresult['PassengerDetails'][$i]["Title"];
   						$subbookdataprofile['firstname']  =    $bookresult['PassengerDetails'][$i]["FirstName"];
   						$subbookdataprofile['lastname']  =    $bookresult['PassengerDetails'][$i]["LastName"];
   						$subbookdataprofile['passport_no']  =    $post['passport_no'][$i];
                              $subbookdataprofile['birth_date']  =    $post['date_of_birth'][$i];
                              $subbookdataprofile['gender']  =    1;
   						$subbookdataprofile['passport_expiry']  =    $post['passenger_passport_expiry_day'][$i];
   						$subbookdataprofile['passport_country']  =    $post['passenger_passport_issuing_country'][$i];
   						$subbookdataprofile['created_at'] = date('Y-m-d H:i:s');
   						$subbookinfinsertid = $this->flight_booking_model->subaddflightbooking($subbookdataprofile);
   					}

   				}
   				

   				$passtable = array();
   				$passtable['ref_id']     			= 		$bookinfinsertid;		
   				$passtable['ref_type']     			= 		TBL_FLIGHT_BOOK;		
   				$passtable['payment_type']     		= 		Payment_type::DEBIT;
   				$passtable['user_id'] 			    = 		$this->session->userdata('user_id');
   				$passtable['amount']     		    = 		$totalcost;
   				$passtable['user_id'] 			    = 		$this->session->userdata('user_id');
                    $passtable['contact']                  =          $post['contactnumber'];
   				$passtable['service_type'] 			= 	    Service_type::FLIGHT;
   				$passtable['created_at'] 			= 		date('Y-m-d h:i:s');

   				$passbookid = $this->setting_model->passbookstore($passtable);

   				$currentuser = $this->supplier_model->get_main_franchise_id($this->session->userdata('user_id'));

   				$balance = ($currentuser->balance-$totalcost);

   				$id = $this->session->userdata('user_id');
   				$user = array();
   				$user['user_id'] 			    = 		$id;
   				$user['balance']     			= 		$balance;		
   				$user['updated_on'] 			= 		time();
   				$user_id = $this->user_model->edit_data(TBL_USERS, $user, 'user_id', $id);

                    $response = array('status'=>'success','message' => "Booking added successfully",'dataid' => $bookinfinsertid);

   			}else{
   				$response = array('status'=>'error','message' => $completebookingresult['Message']);
   			}	

   		}else{
   			$response = array('status'=>'error','message' => $result1['Message']);	
   		}

   	} else{

   		$response = array('status'=>'error','message' => 'Something Went Wrong.');
   	}

   	echo json_encode($response);
   	die;
   }




   function get_booking_auto_by_email(){
   	$this->db->select('book_email');
   	$this->db->from(TBL_FLIGHT_BOOK);
   	if($this->session->userdata('user_role') == User_role::FRANCHISE){
   		$this->db->where('franchise_id',$this->session->userdata('user_id'));

   	}
   	if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
   		$this->db->where('staff_id',$this->session->userdata('user_id'));
   	}

   	$this->db->like('book_email', $this->input->post('term'));

   	$query1 = $this->db->get()->result();

   	$skillData1 = array(); 
   	if(!empty($query1)){ 
   		foreach ($query1 as $key => $value1) {
   			$data['email'] = $value1->book_email; 
   			array_push($skillData1, $data); 

   		} 
   	} 

   	echo json_encode(array_unique($skillData1)); 
   	return;
   }

   function get_booking_auto_by_number(){
   	$this->db->select('book_phone');
   	$this->db->from(TBL_FLIGHT_BOOK);

   	if($this->session->userdata('user_role') == User_role::FRANCHISE){
   		$this->db->where('franchise_id',$this->session->userdata('user_id'));
   	}
   	if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
   		$this->db->where('staff_id',$this->session->userdata('user_id'));
   	}



   	$this->db->like('book_phone', $this->input->post('term'));

   	$this->db->group_by('book_phone');

   	$query2 = $this->db->get()->result();

   	$skillData2 = array(); 
   	if(!empty($query2)){ 
   		foreach ($query2 as $key => $value2) {
   			$data['mobile_no'] = $value2->book_phone; 
   			array_push($skillData2, $data); 

   		} 
   	} 

   	echo json_encode($skillData2); 
   	return;
   }

   private function load_view($viewname = 'bookflight_view', $page_title)
   {
   	$this->masterpage->setMasterPage('master_page');
   	$this->masterpage->setPageTitle($page_title);
   	$this->masterpage->addContentPage('franchise/'.$viewname , 'content', $this->content);
   	$this->masterpage->show();
   }



}

