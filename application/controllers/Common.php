<?php defined('BASEPATH') OR exit('No direct script access allowed');

###### This controller contains some common Ajax functions required globally ######
class Common extends MY_Controller
{
	
	function __construct()
	{
			parent::__construct();
			if( ! $this->input->is_ajax_request())
			{
					show_400();
					exit;
			}
	}

	function index($action)
	{
			if(empty($action)) {
					redirect('/');
			}
	}

	function ajax_check_user_exist($logged_in_status = "not_logged_in")
	{
			$post = $this->input->post();
		
			if(isset($post['email']))
			{
					$where = array('email' => $post['email'], 'user_deleted' => Deleted_status::NOT_DELETED);
			}
			
			if(isset($post['mobile']))
			{
					$where = array('mobile' => $post['mobile'], 'user_deleted' => Deleted_status::NOT_DELETED);
			}
			
			if($logged_in_status == "logged_in")
			{
					$userdata = $this->session->userdata();
					if($userdata)
					{
							$where['user_id !='] = $userdata['user_id'];
					}
			}
		
			$this->load->model('user_model');
			$user_data = $this->user_model->get_table_data_row('user_master',$where);
			if( ! $user_data)
			{
					echo json_encode(array('user_exist' => FALSE));
			}
			else
			{
					echo json_encode(array('user_exist' => TRUE, 'user_role' => $user_data->role, 'email_verified' => $user_data->email_verified, 'mobile_verified' => $user_data->mobile_verified,  'status' => $user_data->user_status));
			}
	}

	function delete()
	{
			$id     = $this->input->post('id');
			$row    = $this->input->post('row');
			$table  = $this->input->post('table');
			$module = $this->input->post('module');
			$file   = $this->input->post('file');

	        if (!$id && !$row && !$table)
	        {
	            	redirect('dashboard', 'refresh');
	        }

	        $this->load->model('user_model');

	        $deleted 	= ( $table == TBL_USERS ? 'user_deleted' : 'is_deleted' );
			
			$data       = array();
			$data[$row] = $id;
			$data['updated_by'] 	= 	$this->session->userdata['user_id'];
			$data['updated_on'] 	= 	time();
			$data[$deleted] 		= 	Deleted_status::DELETED;
	        $affected_id = $this->user_model->edit_data($table, $data, $row, $id);

	        if (isset($affected_id) && !empty($affected_id))
	        {
		            if ( isset($file) && !empty($file) )
		            {
		                @unlink($file);
		            }
		            
		            // add activity log
		            // $this->_activity_log($affected_id, Action::DELETE, $module);

		            echo 'success';
	        }
    }
     function getform_visafield(){
        $url = API_URL.'getform_visa';
        $ch = curl_init($url);
        $data1 = array('gid'=>$this->input->post('gid'),'visaid'=>$this->input->post('visaid'),'visatype'=>$this->input->post('visatype'),'origincountry'=>$this->input->post('origincountry'),'destinationcountry'=>$this->input->post('destinationcountry'));

        curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, VISA_API);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        
        echo $result;
        curl_close($ch);


    }
    
    function delete_supplier(){

    	    $id     = $this->input->post('id');
			$row    = $this->input->post('row');
			$table  = $this->input->post('table');
			$module = $this->input->post('module');
			$file   = $this->input->post('file');

	        if (!$id && !$row && !$table)
	        {
	            	redirect('dashboard', 'refresh');
	        }

	        $this->load->model('user_model');

	        $deleted 	= ( $table == TBL_USERS ? 'user_deleted' : 'is_deleted' );
	        			
			$data       = array();
			$data[$row] = $id;
			$data['updated_by'] 	= 	$this->session->userdata['user_id'];
			$data['updated_on'] 	= 	time();
			$data[$deleted] 		= 	Deleted_status::DELETED;
	        $affected_id = $this->user_model->delete_supplier($table, $data, $row, $id);

	        if (isset($affected_id) && !empty($affected_id))
	        {

	        }
		            echo 'success';
	        return;

    }

	function media_delete()
	{
			$this->load->model('setting_model');
			$table 	= $this->input->post('table');
			$pk 	= $this->input->post('pk');
			$id 	= $this->input->post('id');
			if(!$pk) {
				redirect('settings', 'refresh');
			}
			$data 				= array();
			$data[$id]			= $pk;
			$data['updated_by']	= $this->session->userdata['user_id'];
			$data['updated_on']	= time();
			if(isset($table) && $table == 'user_master') {
				$data['user_deleted'] = Deleted_status::DELETED;
			}
			else
			{
				if(isset($table) && $table == 'media') {
					$image = $this->input->post('image');
					unlink($image);
				}
				$data['is_deleted'] = Deleted_status::DELETED;
			}

			if($this->setting_model->edit_data($table, $data, $id, $pk)) {
				echo 'success';
			}
	}

    function ajax_change_status()
    {
            $id     = $this->input->post('id');
            $row    = $this->input->post('row');
            $table  = $this->input->post('table');
            $status = $this->input->post('status');

            if (!$id && !$table && !$column)
            {
                    redirect('dashboard', 'refresh');
            }

            $this->load->model('user_model');

            $data       = array();
            $data[$row] = $id;
            $data['updated_by']  	= 	$this->session->userdata['user_id'];
            $data['updated_on']  	= 	time();
            $data['user_status'] 	= 	$status;
            $affected_id = $this->user_model->edit_data($table, $data, $row, $id);
            
            if (isset($affected_id) && !empty($affected_id))
            {
                    // add activity log
                    // $this->_activity_log($affected_id, Action::DELETE, $this->ml_users);
                    echo 'success';
            }
    }

    /** 
	* Start
	* Get city
	**/
	function ajaxGC()
	{
		if($this->input->is_ajax_request())
		{
			if($post = $this->input->post())
			{
				$this->load->model(array('setting_model'));
				if(!empty($post['country']) && isset($post['country']))
				{
					$where 	= 'country_id = ' . $post['country'];
					$cities = $this->setting_model->get_table_data(TBL_CITIES, $where, 'id, name');

                    $data[] = array('id' => '', 'text' => '');

					foreach($cities as $val):
						$data[] = array(
                            'id'   => $val->id,
                            'text' => toPropercase($val->name)
						);
					endforeach;

					if(isset($data) && !empty($data))
					{
						echo json_encode(array('status' => 'success', 'city' => $data, 'message' => 'City listing successfully.'));
					} else {
						echo json_encode(array('status' => 'failed', 'message' => 'Cities not available.'));
					}
				}
			}
		} else {
			show_400();
		}
	}
	/** 
	* End
	**/

}
/* end Common */