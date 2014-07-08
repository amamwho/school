<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Constants_model extends CI_Model {
    private $maintable = 'constants';
    function __construct() {
        parent::__construct();
    }

    public function getByType($type = '') {
        if($type == '') 
            return false;
        
        $this->db->select('key, value');
        $this->db->from($this->maintable);
        $this->db->where('type', $type);
        $this->db->order_by('key ASC');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result_array();;
        } else 
            return false;
    }
}