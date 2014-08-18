<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_model extends CI_Model {

    private $maintable = 'staff';
    private $staff_category = 'staff_category';
    private $constants = 'constants';
    private $limit = 20;
    private $offset = 0;

    function __construct() {
        parent::__construct();
    }

    public function getStaffCategory() {
        $this->db->select('*');
        $this->db->from($this->staff_category);
        $this->db->order_by('sort_order desc, name asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return false;
    }
    
    public function getStaffCategoryByID($id) {
        $this->db->select('*');
        $this->db->from($this->staff_category);
        $this->db->where('staff_category_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return false;
    }
    
    public function getStaffByCategory($id, $limit = NULL, $offset = NULL, $order_by = 'firstname asc, lastname asc') {
        $this->db->select('*');
        $this->db->from($this->maintable . ' m');
        $this->db->join($this->constants . ' c', 'c.key = m.position AND c.type = "position"');
        $this->db->where('staff_category_id', $id);
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
    
    public function getCountStaffByCategory($id) {
        $this->db->select('staff_id');
        $this->db->from($this->maintable);
        $this->db->where('staff_category_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function getStaffByID($id) {
        $this->db->select('*');
        $this->db->from($this->maintable . ' m');
        $this->db->join($this->constants . ' c', 'c.key = m.position AND c.type = "position"');
        $this->db->join($this->staff_category . ' sc', 'sc.staff_category_id = m.staff_category_id');
        $this->db->where('staff_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return false;
    }
    
}