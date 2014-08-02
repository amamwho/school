<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Intro_model extends CI_Model {

    private $maintable = 'intro';

    function __construct() {
        parent::__construct();
    }

    public function getIntroByID($id) {
        $this->db->select('*');
        $this->db->from($this->maintable);
        $this->db->where('intro_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return false;
    }

    public function getIntro() {
        $this->db->select('*');
        $this->db->from($this->maintable);
        $this->db->where('status', 1);
        $this->db->order_by('sort_order', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return false;
    }

    public function getIntroAll() {
        $this->db->select('*');
        $this->db->from($this->maintable);
        $this->db->where('status', 1);
        $this->db->order_by('sort_order', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return false;
    }

}