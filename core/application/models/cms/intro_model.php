<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Intro_model extends CI_Model {
	private $maintable = 'intro';
	function __construct() {
		parent::__construct();
	}
	
	public function getIntroAll($where = NULL, $like = NULL, $order_by = NULL, $limit = NULL, $offset = NULL) {
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
        
        public function getCountIntroAll($where = NULL, $like = NULL) {
		$this->db->select('intro_id');
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
        
        public function addIntro($data) {
		if ($this->db->insert($this->maintable, $data)) {
			return $this->db->insert_id();
		} else
			return false;
	}
        
        public function editIntro($id, $data) {
                $this->db->where('intro_id', $id);
		if ($this->db->update($this->maintable, $data)) {
			return true;
		} else
			return false;
	}
        
        public function deleteIntro($id) {
		$this->db->select('image, image_btn, image_bg');
		$this->db->from($this->maintable);
		$this->db->where('intro_id', $id);
		$query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->row_array() : false;

		$this->db->delete($this->maintable, array('intro_id' => $id));

		return $result;
	}
        
        public function getIntroDetail($id) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('intro_id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row_array();;
		} else 
			return false;
	}
        
}