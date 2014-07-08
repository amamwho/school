<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_file extends Base_cms {
    
    public $images_path_file;
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('เอกสาร');
        $this->setBreadcrumb(array(array('name' => 'เอกสาร', 'link' => site_url('cms/cms_file'))));
//        $this->data['menu_active'] = 'file';
//        
//        $this->load->model('cms/file_model');
//        $this->images_path_file = $this->config->item('root_upload').$this->config->item('images_path_file');
//        $this->load->library('custom_upload', array('upload_path' => $this->images_path_file));
    }

    public function index() {
        $this->view('cms/file/_index', $this->data);
    }
    
    public function folderInsert() {
        
    }
    
}