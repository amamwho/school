<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_model extends CI_Model {

    private $maintable = 'gallery';

    function __construct() {
        parent::__construct();
    }

    public function getGalleryByPostID($id) {
        $this->db->select('*');
        $this->db->from($this->maintable);
        $this->db->where('post_id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return false;
    }

    public function getGalleryByGalleryID($id) {
        $this->db->select('*');
        $this->db->from($this->maintable);
        $this->db->where('gallery_id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return false;
    }

    public function addGallery($data) {
        if ($this->db->insert($this->maintable, $data))
            return $this->db->insert_id();
        else
            return false;
    }

    public function deleteGallery($id) {
        if ($this->db->delete($this->maintable, array('gallery_id' => $id)))
            return true;
        else
            return false;
    }

}