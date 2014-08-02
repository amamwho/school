<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sidebar_model extends CI_Model {

    private $maintable = 'sidebar';

    function __construct() {
        parent::__construct();
    }

    public function getSideByPosition($position = NULL) {
        if (!is_null($position)) {
            $this->db->select('*');
            $this->db->from($this->maintable);
            $this->db->where('position', $position);
            $this->db->where('status', 1);
            $this->db->order_by('sort_order', 'desc');
            $query = $this->db->get();

            if ($query->num_rows() > 0)
                return $query->result_array();
            else
                return false;
        } else
            return false;
    }

}