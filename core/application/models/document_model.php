<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Document_model extends CI_Model {
	private $maintable = 'document';
	function __construct() {
		parent::__construct();
	}
	
	public function getDocumentByType($type = 'D', $limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('type', $type);
                $this->db->where('category', '');
                $this->db->where('status', 1);
                $this->db->order_by('category asc, document_id desc');
                if (!is_null($limit) and !is_null($offset)) {
                    $this->db->limit($limit, $offset);
                }
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
        
        public function getCountDocumentByType($type) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('type', $type);
		$query = $this->db->get();
		return $query->num_rows();
	}
        
        public function getDocumentByCategory($category = NULL, $limit = NULL, $offset = NULL) {
            if (!is_null($category)) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('category', $category);
                $this->db->where('status', 1);
                $this->db->order_by('document_id desc');
                if (!is_null($limit) and !is_null($offset)) {
                    $this->db->limit($limit, $offset);
                }
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
            } else
                return false;
	}
        
        public function getDocumentDetail($id) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('document_id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row_array();;
		} else 
			return false;
	}
        
        public function getDocumentDetailByRaw($raw) {
		$this->db->select('*');
		$this->db->from($this->maintable);
		$this->db->where('raw', $raw);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row_array();;
		} else 
			return false;
	}
        
}