<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sidebar_model extends CI_Model {
	private $maintable = 'sidebar';
	function __construct() {
		parent::__construct();
	}
	
	public function getSidebarAll($where = NULL, $like = NULL, $order_by = NULL, $limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		if (!is_null($where)) {
			$this->db->where($where);
		}
		if (!is_null($like)) {
			$this->db->or_like($like);
		}
		if (!is_null($order_by)) {
			$this->db->order_by($order_by);
		}
		if (!is_null($limit)) {
			$this->db->limit($limit, $offset);
		}

		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
        
        public function getCountSidebarAll($where = NULL, $like = NULL) {
		$this->db->select('sidebar_id');
		$this->db->from($this->maintable);
		if (!is_null($where)) {
			$this->db->where($where);
		}
		if (!is_null($like)) {
			$this->db->or_like($like);
		}
		$query = $this->db->get();
		return $query->num_rows();
	}
        
        
        public function addSidebar($data) {
		if ($this->db->insert($this->maintable, $data)) {
			return $this->db->insert_id();
		} else
			return false;
	}
        
        public function editSidebar($id, $data) {
                $this->db->where('sidebar_id', $id);
		if ($this->db->update($this->maintable, $data)) {
			return true;
		} else
			return false;
	}
        
        public function deleteSidebar($id) {
                if ($this->db->delete($this->maintable, array('sidebar_id' => $id))) {
                    return true;
                }
                return false;
	}
        
        public function getSidebarDetail($id) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('sidebar_id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row_array();;
		} else 
			return false;
	}
        
}