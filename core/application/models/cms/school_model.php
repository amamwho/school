<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class School_model extends CI_Model {

    private $maintable = 'school_info';

    function __construct() {
        parent::__construct();
    }

    public function editSchool($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->maintable, $data)) {
            return true;
        } else
            return false;
    }

    public function getSchoolDetail($id = 1) {
        $this->db->select('*');
        $this->db->from($this->maintable);
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
            ;
        } else
            return false;
    }

}