<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model {
	private $maintable = 'posts';
        private $post_category = 'post_category';
        private $limit = 20;
        private $offset = 0;
        
	function __construct() {
		parent::__construct();
	}
        
        public function getPostCategory() {
                $this->db->select('*');
                $this->db->from($this->post_category);
                $this->db->order_by('sort_order desc, name asc'); 
                $query = $this->db->get();
                if ($query->num_rows() > 0)
                    return $query->result_array();
                else
                    return false;
        }
        
        public function getPostCategoryByID($id) {
                $this->db->select('*');
                $this->db->from($this->post_category);
                $this->db->where('post_category_id', $id);
                $query = $this->db->get();
                if ($query->num_rows() > 0)
                    return $query->row_array();
                else
                    return false;
        }
        
        public function getPostByCategory($id, $limit = NULL, $offset = NULL, $order_by = 'date_added desc') {
                $this->db->select('*');
                $this->db->from($this->maintable);
                $this->db->where('post_category_id', $id);
                $this->db->where('status', 1);
                $this->db->where('type', 'post');
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
        
        public function getCountPostByCategory($id) {
                $this->db->select('post_id');
                $this->db->from($this->maintable);
                $this->db->where('status', 1);
                $this->db->where('type', 'post');
                $query = $this->db->get();
                return $query->num_rows();
        }
        
        public function getPostByID($id) {
                $this->db->select('*');
                $this->db->from($this->maintable);
                $this->db->where('post_id', $id);
                $this->db->where('status', 1);
                $this->db->where('type', 'post');
                $query = $this->db->get();
                if ($query->num_rows() > 0)
                    return $query->row_array();
                else
                    return false;
        }
        
        public function getPageByID($id) {
                $this->db->select('*');
                $this->db->from($this->maintable);
                $this->db->where('post_id', $id);
                $this->db->where('status', 1);
                $this->db->where('type', 'page');
                $query = $this->db->get();
                if ($query->num_rows() > 0)
                    return $query->row_array();
                else
                    return false;
        }
        
        public function getMenu() {
                $this->db->select('*');
                $this->db->from($this->maintable);
                $this->db->where(array('type' => 'page', 'status' => 1, 'menu' => 1, 'menu_parent' => 0));
                $this->db->order_by('menu_order desc, post_id desc');
                $query = $this->db->get();
                if ($query->num_rows() > 0)
                    return $query->result_array();
                else
                    return false;
        }
        
        public function getMenuChild($id) {
                $this->db->select('*');
                $this->db->from($this->maintable);
                $this->db->where(array('type' => 'page', 'status' => 1, 'menu' => 1, 'menu_parent' => $id));
                $this->db->order_by('menu_order desc, post_id desc');
                $query = $this->db->get();
                if ($query->num_rows() > 0)
                    return $query->result_array();
                else
                    return false;
        }

}

?>
