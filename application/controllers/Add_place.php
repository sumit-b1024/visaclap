<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Add_place extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_model', 'setting_model','supplier_model'));
	}

	function index(){
		/** page level css & js * */
		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','select2.full.min', 'select2');
		$this->content->extra_css = array('custom');
		$title = 'View Places';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		$this->content->_view 		= 	$this->setting_model->get_all_place_data();
		
		$this->load_view('index', $title);
	}

	function get_place_tbl_records(){
		$post = $this->input->post();
		$title = 'View Places';
		$data['_view'] =  $this->setting_model->get_country_place_record($post['destination']);
		
		$this->load->view('place/place_tbl_view', $data);

	}


	function add(){
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array('custom');

		$title = 'Add City';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Place'      => 	'add_place',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();

		$this->load_view('add_edit_place', $data);
	}

	function add_city(){
		$post = $this->input->post();
		if($post){
			
			$state = isset($_POST['state']) ? $post['state'] : "0";
			$country = isset($_POST['country']) ? $post['country'] : "0";

			$array = array(
				'name' => ucfirst($post['city']),
				'state_id' => $state,
				'country_id' => $country,
			);
			if($post['record_id']){

				$column_id = "id";
				$update_city_name = $this->setting_model->update_method(TBL_CITIES_SUPPLIER,$array,$post['record_id'],$column_id);
				$response = array(
					'status' => 'success',
					'message' => 'City Updated Successfully.',
				);

			}else{
				if($this->db->insert(TBL_CITIES_SUPPLIER,$array)){
					$response = array(
						'status' => 'success',
						'message' => 'City Added Successfully.',
					);
				}else{
					$response = array(
						'status' => 'failed',
						'message' => 'Something Went Wrong.',
					);
				}
			}
		}else{
			$response = array(
				'status' => 'failed',
				'message' => 'Something Went Wrong.',
			);

		}
		echo json_encode($response);
		die;
	}

	function edit_place(){

		$id = $this->uri->segment(3);
		if( !$id )
		{
			redirect('add_place', 'refresh');
		}
		/** page level css & js * */
		$this->content->extra_js  = array('select2.full.min', 'select2');
		$this->content->extra_css = array('custom');

		$title = 'Add Place';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			'Place'      => 	'Add City',
			$title         	=> 	NULL
		);

		$this->content->title   = 	$title;
		$this->content->action  = 	'';
		$this->content->info   	= 	'';
		$this->content->get_all_country   = 	$this->supplier_model->get_all_country();
		$this->content->_view   = 	$this->setting_model->get_all_place_record($id);

		if($this->content->_view->state_id == 0){

			$object = new stdClass();
			$object->country =  $this->content->_view->country_id;

			$this->content->get_country_by_state = $object;
			$this->content->get_state_data   = 	array();
		}else{
			$this->content->get_country_by_state   = 	$this->setting_model->get_country_by_state($this->content->_view->state_id);
			$this->content->get_state_data   = 	$this->setting_model->get_all_states_by_cid($this->content->get_country_by_state->country);
		}
		$this->load_view('add_edit_place', $title);

	}

	function delete_country_city(){
		if($this->input->post('id')){
			$column_id = "id";
			$array = array('is_delete'=>1);
			$this->db->where('id',$this->input->post('id'));
			$this->db->delete(TBL_CITIES_SUPPLIER); 

			$response = array(
				'status' => 'success',
				'message' => 'City Removed Successfully.',
			);
		}else{

			$response = array(
				'status' => 'failed',
				'message' => 'Something Went Wrong.',
			);
		}
		echo json_encode($response);
		return;

	}

	

	private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('place/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}


}

?>