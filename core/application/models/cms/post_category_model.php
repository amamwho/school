<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_category_model extends CI_Model {
	private $maintable = 'post_category';
        private $post = 'posts';
	function __construct() {
		parent::__construct();
	}
	
	public function getPostCategoryAll($where = NULL, $like = NULL, $order_by = NULL, $limit = NULL, $offset = NULL) {
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
        
        public function getCountPostCategoryAll($where = NULL, $like = NULL) {
		$this->db->select('post_category_id');
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
        
        public function addPostCategory($data) {
		if ($this->db->insert($this->maintable, $data)) {
			return $this->db->insert_id();
		} else
			return false;
	}
        
        public function editPostCategory($id, $data) {
                $this->db->where('post_category_id', $id);
		if ($this->db->update($this->maintable, $data)) {
			return true;
		} else
			return false;
	}
        
        public function deletePostCategory($id) {
		$this->db->where('post_category_id', $id);
                $this->db->update($this->post, array('post_category_id' => 0));

                if ($this->db->delete($this->maintable, array('post_category_id' => $id))) {
                    return true;
                }
                return false;
	}
        
        public function getPostCategoryDetail($id) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('post_category_id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row_array();;
		} else 
			return false;
	}
        
}