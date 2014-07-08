<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_model extends CI_Model {

    private $maintable = 'staff';
    private $staff_category = 'staff_category';

    function __construct() {
        parent::__construct();
    }

    public function getStaffAll($where = NULL, $like = NULL, $order_by = NULL, $limit = NULL, $offset = NULL) {
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

    public function getCountStaffAll($where = NULL, $like = NULL) {
        $this->db->select('staff_id');
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

    public function getStaffCategory($where = NULL, $like = NULL, $order_by = NULL, $limit = NULL, $offset = NULL) {
        $this->db->select('*');
        $this->db->from($this->staff_category);
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
    
    public function getCountStaffCategoryAll($where = NULL, $like = NULL) {
        $this->db->select('staff_category_id');
        $this->db->from($this->staff_category);
        if (!is_null($where)) {
            $this->db->where($where);
        }
        if (!is_null($like)) {
            $this->db->or_like($like);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function addStaff($data) {
        if ($this->db->insert($this->maintable, $data)) {
            return $this->db->insert_id();
        } else
            return false;
    }

    public function editStaff($id, $data) {
        $this->db->where('staff_id', $id);
        if ($this->db->update($this->maintable, $data)) {
            return true;
        } else
            return false;
    }

    public function deleteStaff($id) {
        $this->db->select('thumb, image');
        $this->db->from($this->maintable);
        $this->db->where('staff_id', $id);
        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->row_array() : false;

        $this->db->delete($this->maintable, array('staff_id' => $id));

        return $result;
    }

    public function addStaffCategory($data) {
        if ($this->db->insert($this->staff_category, $data)) {
            return $this->db->insert_id();
        } else
            return false;
    }

    public function editStaffCategory($id, $data) {
        $this->db->where('staff_category_id', $id);
        if ($this->db->update($this->staff_category, $data)) {
            return true;
        } else
            return false;
    }

    public function deleteStaffCategory($id) {
        $this->db->where('staff_category_id', $id);
        $this->db->update($this->maintable, array('staff_category_id' => 0));

        if ($this->db->delete($this->staff_category, array('staff_category_id' => $id))) {
            return true;
        }
        return false;
    }

    public function getStaffDetail($id) {
        $this->db->select('*');
        $this->db->from($this->maintable);
        $this->db->where('staff_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
            ;
        } else
            return false;
    }
    
    public function getStaffCategoryDetail($id) {
        $this->db->select('*');
        $this->db->from($this->staff_category);
        $this->db->where('staff_category_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
            ;
        } else
            return false;
    }

}