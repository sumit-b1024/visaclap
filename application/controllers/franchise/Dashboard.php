<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{ 
		/** page level css & js * */
		$this->content->extra_js  = array();
		$this->content->extra_css = array();

		$title = 'Dashboard';
		$this->content->breadcrumb = array(
			'Home'         	=> 	'',
			$title         	=> 	NULL
		);

		$this->load_view('dashboard_view', $title);
	}
	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('franchise/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

	public function getPlace()
	{
		/** page level css & js * */
		$this->content->extra_js  = array();
		$this->content->extra_css = array();

		$title = 'Google Places';
		$this->content->breadcrumb = array(
			'Home'         	=> 	'',
			$title         	=> 	NULL
		);

		$this->load_view('googlePlaces', $title);
			// $ch = curl_init();
			// $curlConfig = array(
			//     CURLOPT_URL            => "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=19.0759837,72.8776559&radius=1500&key=AIzaSyAXJQGl6TomlsjP_YVPFaLgtpLwilaVNM8",
			//     CURLOPT_POST           => true,
			//     CURLOPT_RETURNTRANSFER => true,
			// );
			// curl_setopt_array($ch, $curlConfig);
			// $result = curl_exec($ch);
			// curl_close($ch);

			// echo '<pre>';
			// print_r(json_decode($result));

			// var_dump(json_decode($result));
	}

	function getPlaceList()
	{
		$lat 	= $this->input->post('lat');
		$long 	= $this->input->post('long');

		$ch = curl_init();
		$curlConfig = array(
			CURLOPT_URL            => "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$lat.",".$long."&radius=2000&keyword=things_to_do_in&type=tourist_attraction&key=AIzaSyAXJQGl6TomlsjP_YVPFaLgtpLwilaVNM8",
			CURLOPT_POST           => true,
			CURLOPT_RETURNTRANSFER => true,
		);

		curl_setopt_array($ch, $curlConfig);
		$result = curl_exec($ch);
		curl_close($ch);

		$result = json_decode($result);

		if(isset($result->status) && $result->status == 'OK')
		{
			if(isset($result->results) && !empty($result->results))
			{
				$key = 1;
				foreach($result->results as $places)
				{
					$url = "https://maps.googleapis.com/maps/api/place/details/json?fields=name,rating,formatted_phone_number,photo,rating,formatted_address&place_id=".$places->place_id."&key=AIzaSyAXJQGl6TomlsjP_YVPFaLgtpLwilaVNM8";

					$curl = curl_init($url);
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

							//for debug only!
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

					$resp = curl_exec($curl);
					curl_close($curl);

					$resp = json_decode($resp);
					$resp = $resp->result;
					$photo = $resp->photos[0]->photo_reference;

					echo '<div class="card" style="width: 18rem;">
					<img style="max-height:250px;max-width:300px;" class="card-img-top" src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=800&photo_reference='.$photo.'&key=AIzaSyAXJQGl6TomlsjP_YVPFaLgtpLwilaVNM8" alt="">
					<div class=card-body">
					<h5 class="card-title"> '. $resp->name .' </h5>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<p class="card-text"> '. $resp->formatted_address .' </p>
					</div>
					</div>';

					/*}*/

					$key++;

				}	
			}		
		}		
	}
	
}
/* end of dashboard */