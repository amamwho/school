<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_banner extends Base_cms {
    
    public $images_path_banner;
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('Banner');
        $this->setBreadcrumb(array(array('name' => 'Banner', 'link' => site_url('cms/cms_banner'))));
        $this->data['menu_active'] = 'banner';
        
        $this->load->model('cms/banner_model');
        $this->images_path_banner = $this->config->item('root_upload').$this->config->item('images_path_banner');
        $this->load->library('custom_upload', array('upload_path' => $this->images_path_banner, 'max_width' => '3000', 'max_height' => '1500'));
    }

    public function index($offset = 0) {
        $where = NULL;
        $like = NULL;
        if (isset($_POST['banner']) and $_POST['banner']) {
            foreach ($_POST['banner'] as $banner_id) {
                $result = $this->banner_model->deleteBanner($banner_id);
                if ($result and $result['thumb'] and $result['thumb']) {
                    delete_file($this->images_path_banner . $result['thumb']);
                    delete_file($this->images_path_banner . $result['image']);
                }
            }
        } else if (isset($_GET) and $_GET) {
            if (isset($_GET['title']) and $_GET['title'])
                $this->data['filter']['title'] = $like['title'] = $_GET['title'];
            if (isset($_GET['status']))
                $this->data['filter']['status'] = $where['status'] = $_GET['status'];
        }
        $limit = $this->config->item('pagination_limit');
        $this->data['banner_list'] = $this->banner_model->getBannerAll($where, $like, 'date_added DESC', $limit, $offset);
        $config['base_url'] = base_url() . 'cms/cms_banner/index/';
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->banner_model->getCountBannerAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $this->view('cms/banner/_index', $this->data);
    }

    public function insert() {
        $this->data['banner_category'] = $this->banner_model->getBannerCategory();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['banner_data'] = $_POST;
                $this->view('cms/banner/_form', $this->data);
            } else {
                if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
                    $upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 198, 150);
                    if(empty($upload_data['file_name'])) {
                        $this->debug($upload_data[0]); exit;
                    }
                }

                $insert = array(
                    'banner_category_id' => (isset($_POST['banner_category_id']) and $_POST['banner_category_id']) ? $_POST['banner_category_id'] : 0,
                    'thumb' => (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : NULL,
                    'image' => (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL,
                    'title' => $_POST['title'],
                    'short_description' => (isset($_POST['short_description']) and $_POST['short_description']) ? $_POST['short_description'] : '',
                    'description' => (isset($_POST['description']) and $_POST['description']) ? $_POST['description'] : '',
                    'link' => (isset($_POST['link']) and $_POST['link']) ? $_POST['link'] : '',
                    'sort_order' => $_POST['sort_order'],
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_added' => date('Y-m-d H:i:s'),
                );

                $result = $this->banner_model->addBanner($insert);
                redirect(site_url('cms/cms_banner'));
            }
        } else {
            //$this->debug($data['stockstatus_list']);
            $this->setBreadcrumb(array(array('name' => 'Banner', 'link' => site_url('cms/cms_banner')), array('name' => 'เพิ่ม')));
            $this->view('cms/banner/_form', $this->data);
        }
    }

    public function update($banner_id = '') {
        $this->data['banner_data'] = $this->banner_model->getBannerDetail($banner_id);
        $this->data['banner_category'] = $this->banner_model->getBannerCategory();

        if (empty($banner_id) or !$this->data['banner_data'])
            redirect(site_url('cms/cms_banner'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['banner_data'] = $_POST;
                $this->data['banner_data']['thumb'] = getImagePath($this->images_path_banner . $this->data['banner_data']['thumb']);
                $this->view('cms/banner/_form', $this->data);
            } else {
                if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
                    $upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 198, 150);
                    if(empty($upload_data['file_name'])) {
                        $this->debug($upload_data[0]); exit;
                    }
                    if (isset($upload_data) and $upload_data and $this->data['banner_data']['thumb'] and $this->data['banner_data']['image']) {
                        delete_file($this->images_path_banner . $this->data['banner_data']['thumb']);
                        delete_file($this->images_path_banner . $this->data['banner_data']['image']);
                    }
                } else if (isset($_POST['del']) and $_POST['del'] == 1 and $this->data['banner_data']['thumb'] and $this->data['banner_data']['image']) {
                    delete_file($this->images_path_banner . $this->data['banner_data']['thumb']);
                    delete_file($this->images_path_banner . $this->data['banner_data']['image']);
                    $this->data['banner_data']['thumb'] = NULL;
                    $this->data['banner_data']['image'] = NULL;
                }

                $insert = array(
                    'banner_category_id' => (isset($_POST['banner_category_id']) and $_POST['banner_category_id']) ? $_POST['banner_category_id'] : 0,
                    'thumb' => (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : $this->data['banner_data']['thumb'],
                    'image' => (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : $this->data['banner_data']['image'],
                    'title' => $_POST['title'],
                    'short_description' => (isset($_POST['short_description']) and $_POST['short_description']) ? $_POST['short_description'] : '',
                    'description' => (isset($_POST['description']) and $_POST['description']) ? $_POST['description'] : '',
                    'link' => (isset($_POST['link']) and $_POST['link']) ? $_POST['link'] : '',
                    'sort_order' => $_POST['sort_order'],
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_modified' => date('Y-m-d H:i:s'),
                );
                //$this->debug($insert);

                $result = $this->banner_model->editBanner($banner_id, $insert);
                redirect(site_url('cms/cms_banner'));
            }
        } else {
            //$this->debug($this->data);
            //$this->data['banner_data']['thumb'] = getImagePath($this->images_path_banner.$this->data['banner_data']['thumb']);
            $this->setBreadcrumb(array(array('name' => 'Banner', 'link' => site_url('cms/cms_banner')), array('name' => 'แก้ไข')));
            $this->view('cms/banner/_form', $this->data);
        }
    }

    private function setFormValidation() {
        $this->form_validation->set_rules('title', 'หัวข้อ*', 'required');
        $this->form_validation->set_rules('banner_category_id', 'หมวดหมู่*', 'required');
        $this->form_validation->set_rules('sort_order', 'ลำดับการแสดง', 'numeric');
    }

}
