<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner_model extends CI_Model {

    private $maintable = 'banner';
    private $banner_category = 'banner_category';

    function __construct() {
        parent::__construct();
    }

    public function getBannerByCategory($category_id = NULL) {
        if (!is_null($category_id)) {
            $this->db->select('*');
            $this->db->from($this->maintable . ' m');
            $this->db->join($this->banner_category . ' bc', 'bc.banner_category_id = m.banner_category_id');
            $this->db->where('m.banner_category_id', $category_id);
            $this->db->where('m.status', 1);
            $this->db->order_by('m.sort_order', 'desc');
            $query = $this->db->get();

            if ($query->num_rows() > 0)
                return $query->result_array();
            else
                return false;
        } else
            return false;
    }

}