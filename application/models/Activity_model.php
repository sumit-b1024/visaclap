<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

load_entities(array('activity'));

class Activity_model extends MY_Model
{
	
	public function __construct()
	{
			parent::__construct();
	}
	
	public function add(activity_entity $activity)
	{
			if($this->db->insert('activity_log', $activity))
			{
					return $this->db->insert_id();
			}
	}

	public function get_user_activities($user, $module = NULL, $limit = NULL)
	{
			$this->db->select('al.activity_id, al.relative_id, al.module, al.action, al.ip, al.is_device, al.created_on');
			$this->db->from(TBL_ACTIVITY_LOG. ' al');
			$this->db->where(array('al.created_by' => $user));
		
			if(isset($module) && !empty($module))
			{
					$this->db->where(array('al.module' => $module));
			}

			if(isset($limit) && !empty($limit))
			{
				$this->db->limit($limit);
			}
			$this->db->order_by('al.activity_id', 'desc');
		
			return $this->db->get()->result();
	}

	public function get_user_product_activities($user, $module, $limit = NULL)
	{
			$this->db->select('al.activity_id, al.action, al.ip, al.is_device, al.created_on, p.product_id, p.title');
			$this->db->from(TBL_ACTIVITY_LOG. ' al');
			$this->db->join(TBL_PRODUCT. ' p', 'p.product_id = al.relative_id AND al.module = '.$module);
			$this->db->where(array('al.created_by' => $user, 'al.module' => $module));

			if(isset($limit) && !empty($limit))
			{
					$this->db->limit($limit);
			}
			$this->db->order_by('al.activity_id', 'desc');

			return $this->db->get()->result();
	}

	/*public function get_access( $id )
    {
            $this->db->select('main, sub');
            $this->db->from(TBL_USER_ACCESS);
            $this->db->where(array('user_id' => $id, 'is_deleted' => Deleted_status::NOT_DELETED));
            
            return $this->db->get()->row();
    }*/
	
}
/* end of activity model */