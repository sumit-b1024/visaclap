<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		// $this->page = ($this->uri->segment(5) != '') ? $this->uri->segment(5) : 1;
		// $this->per_page = NULL;
	}

	function index()
	{
		if($this->session->userdata('user_id'))
		{
			/** page level css & js * */
	        $this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','sweet-alert/sweetalert.min','sweet-alert');
	        $this->content->extra_css = array();

			$title = 'Supplier';
			$this->content->breadcrumb = array(
				'Dashboard' => 'dashboard',
				$title      => null
			);

			$this->content->title   = 	$title;
			$this->content->action  = 	'';
			$this->content->info   	= 	'';
		
			$this->load->model(array('supplier_model'));

			// echo User_role::SUPPLIER;
			$supplier = $this->supplier_model->get_list(User_role::SUPPLIER, $order = NULL);

			// echo $this->db->last_query();
		
		/*	foreach ($supplier as $key => $val) :
				$last = $this->booking_model->get_last_update($val->supplier_id);
				$supplier[$key]->last_uo = $last;
			endforeach;
		*/
			$this->content->_list = $supplier;
			// echo '<pre>';
			// print_r($supplier);
			// return;

			$this->load_view('supplier_view', $title);
		}
	}

	function add_supplier()
	{
		if($this->session->userdata('user_id'))
		{
		$this->load->model('supplier_model');

			/** page level css & js * */
	        $this->content->extra_js  = array('select2.full.min', 'select2');
	        $this->content->extra_css = array('custom');

			$title = 'Add Supplier';
			$this->content->breadcrumb = array(
				'Supplier' => 'supplier',
				$title      => null
			);

			$this->content->title 	= $title;
			$this->content->country_array 	= $this->supplier_model->get_all_country();
			// $this->content->_state 	= State_code::getvalue();
			$this->content->_state 	= '';

			$this->load_view('add_edit_supplier_view', $title);
		}
	}
	
	function edit_supplier()
	{
		$this->load->model(array('supplier_model', 'setting_model'));
	     $this->content->extra_js  = array('select2.full.min', 'select2');

		$supplier_id = $this->uri->segment(3);
		if(!$supplier_id) {
			redirect('supplier', 'refresh');
		}
			$title = 'Edit Supplier';

		$this->content->breadcrumb = array(
				'Supplier' => 'supplier',
				$title      => null
			);

		$page_title = 'Edit Supplier';
		$this->content->country_array 	= $this->supplier_model->get_all_country();


		// $this->load->model('supplier_model');
		// $this->content->_state 	 = State_code::getvalue();
		$this->content->supplier = $this->supplier_model->get_details($supplier_id);
		// $this->content->get_states = $this->supplier_model->getch_all_state_by_id($this->content->supplier->country);
		$this->content->get_city = $this->setting_model->get_all_cities_by_country($this->content->supplier->country);

		// $this->content->admin 	 = $this->supplier_model->get_contact_person($supplier_id, Contact_type::ADMIN);
		// $this->content->account  = $this->supplier_model->get_contact_person($supplier_id, Contact_type::ACCOUNT);
		// $this->content->operator = $this->supplier_model->get_contact_person($supplier_id, Contact_type::OPERATOR);
		// $this->content->_contact = $this->supplier_model->get_supplier_contact($supplier_id, 'yes');
		// $this->content->_bank	 = $this->supplier_model->get_supplier_bank($supplier_id);
		$this->content->title 	 = $page_title;

		$this->load_view('add_edit_supplier_view', $page_title);
	}
	
	function ajax_add_supplier() {

		if($this->input->is_ajax_request()) {
			$post = $this->input->post();
			// xdebug($post);
			$this->load->model(array('account_model', 'supplier_model'));
			if(!empty($post['supplier_id']) && isset($post['supplier_id'])) {
				$supplier['firm_name'] 		= encode($post['firm_name']);
				$supplier['alter_email'] 	= encode($post['alter_email']);
				$supplier['retrieve_email']	= encode($post['retrieve_email']);
				$supplier['contact_number'] = encode($post['contact_number']);
				$supplier['website'] 		= encode($post['website']);
				$supplier['gst_no'] 		= strtoupper($post['gst_no']);
				$supplier['pan_no'] 		= strtoupper($post['pan_no']);
				$supplier['address'] 		= encode($post['address']);
				$supplier['country'] 		= $post['country'];
				$supplier['state'] 			= $post['state'];
				$supplier['city'] 			= encode($post['city']);
				$supplier['postal_code'] 	= $post['postal_code'];
				$supplier['note'] 			= encode($post['note']);
				$supplier['updated_by'] 	= $this->session->userdata('user_id');
				$supplier['updated_on'] 	= time();
				$supplier['supplier_id'] 	= $post['supplier_id'];
				
				$supplier_id = $this->supplier_model->edit($supplier);

				// add contact person details
				if(isset($post['cp_first']) && !empty($post['cp_first'])) {
					$contact_person = array_filter($post['cp_first']);
					foreach($contact_person as $key=>$value):
						$cp_data['supplier_id'] = $supplier_id;
						$cp_data['contact_id']	= (!empty($post['contact_id'][$key]) ? $post['contact_id'][$key] : '');
						$cp_data['first_name']	= $post['cp_first'][$key];
						$cp_data['last_name']	= $post['cp_last'][$key];
						$cp_data['contact']		= $post['cp_contact'][$key];
						$cp_data['email']		= $post['cp_email'][$key];
						$cp_data['is_contact']	= $post['is_contact'][$key];
						$cp_data['updated_by'] 	= $this->session->userdata('user_id');
						$cp_data['updated_on'] 	= time();
						$this->supplier_model->add_edit_contact($cp_data);
					endforeach;
				}

				// contact no
				if(isset($post['contacts']) && !empty($post['contacts'])) {
					$_contact = array_filter($post['contacts']);
					foreach($_contact as $con) :
						if(isset($con['contact_id']) && !empty($con['contact_id'])) {
							$contact['contact_id']  = $con['contact_id'];
							$contact['supplier_id'] = $post['supplier_id'];
							$contact['contact']		= $con['contact'];
							$contact['updated_by'] 	= $this->session->userdata('user_id');
							$contact['updated_on'] 	= time();
							$this->supplier_model->add_edit_contact($contact);
						} else {
							$add_contact['supplier_id'] = $post['supplier_id'];
							$add_contact['contact']		= $con['contact'];
							$add_contact['created_by'] 	= $this->session->userdata('user_id');
							$add_contact['created_on'] 	= time();
							$this->supplier_model->add_edit_contact($add_contact);
						}
					endforeach;
				}
				
				/*$banks = array_filter($post['bank_name']);
				foreach($banks as $key=>$value):
					$bank['supplier_id']= $supplier_id;
					$bank['bank_id']	= (!empty($post['bank_id'][$key]) ? $post['bank_id'][$key] : '');
					$bank['bank_name']	= $post['bank_name'][$key];
					$bank['account_no']	= $post['account_no'][$key];
					$bank['ifsc_code']	= $post['ifsc_code'][$key];
					$bank['branch']		= $post['branch'][$key];
					$bank['updated_by'] = $this->session->userdata('user_id');
					$bank['updated_on'] = time();
					$bank_id = $this->supplier_model->add_edit_bank($bank);
				endforeach;*/
				
				$message = 'Supplier updated successfully';
			} else {
				// add user
				$user['first_name'] = encode($post['cp_first'][0]);
				$user['last_name'] 	= encode($post['cp_last'][0]);
				$user['email'] 		= encode($post['cp_email'][0]);
				$user['password'] 	= $this->hash_password('123456');
				$user['role'] 		= User_role::SUPPLIER;
				$user['user_status']= User_status::INACTIVE;
				$user['created_on'] = time();
				$user_id = $this->account_model->add_user($user);
				// Generate code
				$code  = generate_code('S', $post['firm_name'], $post['state'], $post['city']);
				$exits = $this->supplier_model->check_code_exits($code);
				if(isset($exits) && $exits > 0) {
					$vcode  = generate_code('S', $post['firm_name'], $post['state'], $post['city'], 'yes');
				} else {
					$vcode  = $code;
				}

				$supplier['code'] 			= $vcode;
				$supplier['user_id'] 		= $user_id;
				$supplier['firm_name'] 		= encode($post['firm_name']);
				$supplier['email'] 			= encode($post['cp_email'][0]);
				$supplier['alter_email'] 	= encode($post['alter_email']);
				$supplier['retrieve_email']	= encode($post['retrieve_email']);
				$supplier['website'] 		= encode($post['website']);
				$supplier['gst_no'] 		= strtoupper($post['gst_no']);
				$supplier['pan_no'] 		= strtoupper($post['pan_no']);
				$supplier['address'] 		= encode($post['address']);
				$supplier['country'] 		= $post['country'];
				$supplier['state'] 			= $post['state'];
				$supplier['city'] 			= encode($post['city']);
				$supplier['postal_code'] 	= $post['postal_code'];
				$supplier['note'] 			= encode($post['note']);
				$supplier['created_by'] 	= $this->session->userdata('user_id');
				$supplier['created_on'] 	= time();
	
				$supplier_id = $this->supplier_model->add($supplier);

				// add contact person details
				if(isset($post['cp_first']) && !empty($post['cp_first'])) {
					$contact_person = array_filter($post['cp_first']);
					foreach($contact_person as $key=>$value):
						$cp_data['supplier_id'] = $supplier_id;
						$cp_data['first_name']	= $post['cp_first'][$key];
						$cp_data['last_name']	= $post['cp_last'][$key];
						$cp_data['contact']		= $post['cp_contact'][$key];
						$cp_data['email']		= $post['cp_email'][$key];
						$cp_data['is_contact']	= $post['is_contact'][$key];
						$cp_data['created_by'] 	= $this->session->userdata('user_id');
						$cp_data['created_on'] 	= time();
						$this->supplier_model->add_edit_contact($cp_data);
					endforeach;
				}
				// add contact no
				if(isset($post['contacts']) && !empty($post['contacts'])) {
				$contacts = array_filter($post['contacts']);
					foreach($contacts as $con) :
						if(isset($con['contact']) && !empty($con['contact'])) {
							$contact['supplier_id'] = $supplier_id;
							$contact['contact']		= $con['contact'];
							$contact['created_by'] 	= $this->session->userdata('user_id');
							$contact['created_on'] 	= time();
							$this->supplier_model->add_edit_contact($contact);
						}
					endforeach;
				}
				// add bank
				if(isset($post['banks']) && !empty($post['banks'])) {
				$banks = array_filter($post['banks']);
					foreach($banks as $value) :
						$bank['supplier_id']= $supplier_id;
						$bank['account_no']	= $value['account_no'];
						$bank['ifsc_code']	= strtoupper($value['ifsc_code']);
						$bank['bank_name']	= strtolower($value['bank_name']);
						$bank['branch']		= strtolower($value['branch']);
						$bank['created_by'] = $this->session->userdata('user_id');
						$bank['created_on'] = time();
						$this->supplier_model->add_edit_bank($bank);
					endforeach;
				}
				
				$message = 'Supplier added successfully';
			}
			
			if(!empty($supplier_id) && isset($supplier_id) && $supplier_id > 0) {
				echo json_encode(array('status'=> 'success', 'message'=> $message));
			} else {
				echo json_encode(array('status'=> 'failed'));
			}
		} else {
			show_400();
		}
	}
	
	function ajax_change_setting() {
		if($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$this->load->model('supplier_model');
			if(!empty($post['supplier_id']) && isset($post['supplier_id'])) {
				if(isset($post['is_corporate']) && !empty($post['is_corporate'])) {
					$supplier['is_corporate'] = $post['is_corporate'];
				}
				if(isset($post['is_fix_departure']) && !empty($post['is_fix_departure'])) {
					$supplier['is_fix_departure'] = $post['is_fix_departure'];
				}
				if(isset($post['is_contracted_hotel']) && !empty($post['is_contracted_hotel'])) {
					$supplier['is_contracted_hotel']= $post['is_contracted_hotel'];
				}
				if(isset($post['is_visa_services']) && !empty($post['is_visa_services'])) {
					$supplier['is_visa_services'] = $post['is_visa_services'];
				}
				if(isset($post['is_onflits']) && !empty($post['is_onflits'])) { 
					$supplier['is_onflits'] = $post['is_onflits'];
				}
				$supplier['updated_by'] = $this->session->userdata('user_id');
				$supplier['updated_on'] = time();
				$supplier['supplier_id']= $post['supplier_id'];
				
				$supplier_id = $this->supplier_model->edit($supplier);
				
				$message = 'Supplier setting updated successfully';
			} 
			
			if(!empty($supplier_id) && isset($supplier_id) && $supplier_id > 0) {
				echo json_encode(array('status'=> 'success', 'message'=> $message));
			} else {
				echo json_encode(array('status'=> 'failed'));
			}
		} else {
			show_400();
		}
	}
	
	function delete() {
		$supplier_id = $this->input->post('supplier_id');
		if(!$supplier_id) {
			redirect('supplier', 'refresh');
		}
		$this->load->model('supplier_model');
		$supplier = array();
		$supplier['supplier_id']= $supplier_id;
		$supplier['updated_by']	= $this->session->userdata['user_id'];
		$supplier['updated_on']	= time();
		$supplier['is_deleted'] 	= Deleted::DELETED;
		if($this->supplier_model->edit($supplier)) {
			//$this->load->library('Notify_service');
			//$options = $this->notify_service->notify_success('Media Delete Successfully !');
			echo "success";
		}
	}
	
	function profile() {
		$supplier_id = $this->uri->segment(4);
		if(!$supplier_id) {
			redirect('supplier', 'refresh');
		}
		$this->load->model('supplier_model');
		$this->content->supplier = $this->supplier_model->get_details($supplier_id);
		$this->content->_contact = $this->supplier_model->get_supplier_contact($supplier_id);
		$this->content->_contacts= $this->supplier_model->get_supplier_contact($supplier_id, 'yes');
		$this->content->_bank 	 = $this->supplier_model->get_supplier_bank($supplier_id);
		$title = $title = toPropercase($this->content->supplier->firm_name);
		$this->content->breadcrumb = array(
			'Dashboard' => 'console/dashboard',
			'Supplier' 	=> 'console/supplier',
			$title      => null
		);
		$this->load_view('profile_view', 'Supplier Profile');
	}

	function ajax_supplier_inactive() {
		if($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$this->load->model('account_model');
			$user = array();
			$user['user_id']     = $post['user'];
			$user['user_status'] = $post['active'];
			$user['updated_by']  = $this->session->userdata('user_id');
			$user['updated_on']  = time();
			
			$user_id = $this->account_model->edit_profile($user);
			$message = 'Supplier action successfully';
			
			if(!empty($user_id) || isset($user_id) || count($user_id) > 0) {

				// get user details
				$user_detail = $this->account_model->get_user_details($post['user']);
				
				// send message
				if(isset($user_detail->mobile) && !empty($user_detail->mobile) && !empty($post['active']) && $post['active'] == User_status::ACTIVE) {
					$name = $user_detail->first_name.' '.$user_detail->last_name;
					$this->smsservices->_send_active_user_sms(strtolower($name), $user_detail->mobile);
				}

				echo json_encode(array('status'=> 'success', 'message'=> $message));
			} else {
				echo json_encode(array('status'=> 'failed'));
			}
		} else {
			show_400();
		}
	}

	function add_bulk_supplier() {
		if($this->session->userdata('user_id')) {
			
			$post = $this->input->post();
			$this->load->library('excel');
			$this->load->model(array('booking_model', 'supplier_model', 'settings_model'));
				
			if(isset($_FILES['file']['name']) && !empty(isset($_FILES['file']['name']))) {
				$path = $_FILES['file']['tmp_name'];
				PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
				$object = PHPExcel_IOFactory::load($path);
				foreach($object->getWorksheetIterator() as $worksheet) {
					$sheetname 	= $worksheet->getTitle();
					$highestRow = $worksheet->getHighestRow();
					$highestColumn = $worksheet->getHighestColumn();
					
					if(isset($sheetname) && $sheetname == 'supplier') {
						for($row=2; $row<=$highestRow; $row++) {
							$cell = $worksheet->getCellByColumnAndRow($column,$row);
							if (!empty($cell->getValue())) {
									$code			= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
									$firm_name		= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
									$email			= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
									$alter_email	= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
									$retrieve_email	= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
									$website 		= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
									$gst_no			= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
									$pan_no			= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
									$address	 	= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
									$note 			= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
									

									$data[] = array(
										'user_id'        => $user_id,
										'code'           => $code,
										'firm_name'      => $firm_name,
										'email'          => $email,
										'alter_email'    => $alter_email,
										'retrieve_email' => $retrieve_email,
										'website'        => $website,
										'gst_no'         => $gst_no,
										'pan_no'         => $pan_no,
										'address'        => $address,
										'note'           => $note,
										'is_active'      => User_status::DEACTIVATED,
										'created_by'     => $this->session->userdata('user_id')
									);
							}
						}
						if($this->booking_model->add_multi($booking_data)) {
							redirect('console/supplier', 'refresh');
						}
					}
				}
			}
			$page_title = 'Add Supplier';
			$this->content->title = $page_title;
			$this->load_view('add_bulk_supplier_view', $page_title);
		}
	}

	public function get_all_states(){
		if($this->input->post()){
		$this->load->model('setting_model');
			$country_id = $this->input->post('countryid');
			$state_array = $this->setting_model->get_all_cities_by_country($country_id);
			echo json_encode($state_array);
			return;
		}else{

		}
	}
	public function get_all_cities(){
		if($this->input->post()){
		$this->load->model('supplier_model');
			$stateid = $this->input->post('stateid');
			$city_array = $this->supplier_model->getch_all_cities_by_id($stateid);
			echo json_encode($city_array);
			return;
		}else{

		}
	}
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
			$this->masterpage->setMasterPage('master_page');
			$this->masterpage->setPageTitle($page_title);
			$this->masterpage->addContentPage('console/supplier/'.$viewname , 'content', $this->content);
        	$this->masterpage->show();
	}

	
}
/* end of supplier */