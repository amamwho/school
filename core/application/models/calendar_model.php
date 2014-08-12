<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_model extends CI_Model {
	private $maintable = 'calendar';
        private $limit = 20;
        private $offset = 0;
        
	function __construct() {
		parent::__construct();
	}
	
	public function getCalendarAll($where = NULL, $like = NULL, $order_by = NULL, $limit = NULL, $offset = NULL) {
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
		if (!is_null($limit) and !is_null($offset)) {
                    $this->db->limit($limit, $offset);
                } else {
                    $this->db->limit($this->limit, $this->offset);
                }

		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
        
        public function getCalendarByMonth($month = NULL, $limit = NULL) {
		$this->db->select('*');
		$this->db->from($this->maintable);
                if (!is_null($month)) {
                    $this->db->like('startdate', $month, 'after'); 
                }
                $this->db->order_by('startdate', 'desc');
		if (!is_null($limit)) {
			$this->db->limit($limit, $offset);
		}

		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
        
        public function getCalendarDetail($id) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('calendar_id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row_array();;
		} else 
			return false;
	}
        
}