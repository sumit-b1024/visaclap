<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bookingprofit extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->tbl_booking_profit 	= 	TBL_BOOKING_PROFIT;
		$this->load->model(array('setting_model'));
	}

	function index()
	{ 

		$this->content->extra_js  = array('');
		$this->content->extra_css = array('custom');
		$title = 'Add Booking Profit';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->view      	= 	$this->setting_model->get_booking_profit();	
		$this->load_view('add_booking_profit', $title);
		
	}

	function save_profit_data(){

		if($this->input->post()){
		$post = $this->input->post();
			
			$domain_array = array(
				'domestic_flight_profit' => $this->input->post('domestic_flight_profit'),
				'international_flight_profit' => $this->input->post('international_flight_profit'),
				'domestic_flight_profit_fix' => $this->input->post('domestic_flight_profit_fix'),
				'international_flight_profit_fix' => $this->input->post('international_flight_profit_fix'),
			);
			if($this->input->post('profit_id')){
				$this->setting_model->update_profit_data($domain_array,$this->input->post('profit_id'));
				$response = array('status'=>'success','message' => 'Profit Updated Successfully.');
			}
		}else{
			$response = array('status'=>'error','message' => 'Something Went Wrong.');
		}
		echo json_encode($response);
		die;
	}


	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/settings/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}
/* end of settings */ 