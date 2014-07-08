<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model {
	private $maintable = 'posts';
	function __construct() {
		parent::__construct();
	}
        
        public function getPostAll($where = NULL, $like = NULL, $order_by = NULL, $limit = NULL, $offset = NULL) {
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
        
        public function getCountPostAll($where = NULL, $like = NULL) {
		$this->db->select('post_id');
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
        
        public function addPost($data) {
		if ($this->db->insert($this->maintable, $data)) {
			return $this->db->insert_id();
		} else
			return false;
	}
        
        public function editPost($id, $data) {
                $this->db->where('post_id', $id);
		if ($this->db->update($this->maintable, $data)) {
			return true;
		} else
			return false;
	}
        
        public function deletePost($id) {
		$this->db->select('thumb, image, vdo_type, vdo');
		$this->db->from($this->maintable);
		$this->db->where('post_id', $id);
		$query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->row_array() : false;

		$this->db->delete($this->maintable, array('post_id' => $id));

		return $result;
	}
        
        public function getPostDetail($id) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('post_id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row_array();;
		} else 
			return false;
	}
        
}

?>
