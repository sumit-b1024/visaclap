<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hotelbooking extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
			// tables
		$this->tbl_users   		= 		TBL_USERS;
		$this->tbl_profile 		= 		TBL_PROFILE;
		
		$this->tbl_cities 		= 		TBL_CITIES;
		$this->tbl_activity 	= 		TBL_ACTIVITY;
		$this->load->model(array('user_model', 'setting_model','supplier_model'));
		$this->load->helper('theme_helper');
	}

	
	function index(){


		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','date-picker/date-picker','date-picker/jquery-ui','input-mask/jquery.maskedinput','sweet-alert/sweetalert.min','sweet-alert','time-picker/jquery.timepicker','time-picker/toggles.min','daterangepicker/moment.min','daterangepicker/daterangepicker','custom_for_all');
		$this->content->extra_css = array('custom','daterangepicker');
		$title = 'Hotel Booking';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';

		
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		
		$this->load_view('hotelbook_view', $title);
	}
	function gethoteldata(){

		 $post = $this->input->post();		
 		

		
        $flightarray = array();
		 

		 $flightarray['CheckInDate']	= "27-06-2023";
		 $flightarray['NoOfNights']	= 1;
		 $flightarray['CountryCode']	= "IN";
		 $flightarray['CityId']	= "6743";
		 $flightarray['GuestNationality']	= "IN";
		 $flightarray['NoOfRooms']	= 1;
		 
		 $flightarray['RoomGuests']=array();
		 $Segments['NoOfAdults']= 2;
		 $Segments['NoOfChild']= 2;
		 $Segments['ChildAge']= ["4","10"];
		
		 array_push($flightarray['RoomGuests'],$Segments);
		 
		 
        $url = 'http://test.services.travelomatix.com/webservices/index.php/hotel_v3/service/Search';
   
        $ch = curl_init($url);
   
        $data1 = json_encode($flightarray);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
            
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  'x-Password: test@286',
		  'x-DomainKey: TMX1532861671109996',
		  'Content-Type: application/json',
		  'x-Username: test286376',
		  'x-system: test',
		));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
      	
      	$result1 = json_decode($result,true); 
       
        $data['hotel_data'] = $result1['Search']['HotelSearchResult']['HotelResults']; 
        
        $data['status'] = $result1['Status']; 
        $data['message'] = $result1['Message']; 
        
        $scountryname =  $this->setting_model->get_code_by_country_name($post['origin']);
        $ecountryname =  $this->setting_model->get_code_by_country_name($post['destination']);

         if($scountryname->country == 'India' && $ecountryname->country == 'India'){
            $data['bookingprofit']   = 	$this->setting_model->get_booking_profit_domestic();
         }else{
            $data['bookingprofit']   = 	$this->setting_model->get_booking_profit_international();
         }
        

		$this->load->view('hotel/hotel_tbl_record', $data);


	}
	private function load_view($viewname = 'hotelbook_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('hotel/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}



}

