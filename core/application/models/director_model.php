<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Director_model extends CI_Model {
	private $maintable = 'director';
	function __construct() {
		parent::__construct();
	}
	
        public function getLatestDirector() {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('status', 1);
                $this->db->order_by('sort_order', 'DESC');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row_array();;
		} else 
			return false;
	}
        
        public function getDirectorAll($limit = NULL, $offset = NULL, $order_by = 'begindate desc') {
                $this->db->select('*');
                $this->db->from($this->maintable);
                $this->db->where('status', 1);
                $this->db->order_by($order_by);
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
        
        public function getCountDirectorAll() {
                $this->db->select('director_id');
                $this->db->from($this->maintable);
                $this->db->where('status', 1);
                $query = $this->db->get();
                return $query->num_rows();
        }
        
        public function getDirectorByID($id) {
        $this->db->select('*');
        $this->db->from($this->maintable);
        $this->db->where('director_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return false;
    }
        
}