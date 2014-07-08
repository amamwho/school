<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_intro extends Base_cms {
    
    public $images_path_intro;
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('Intro');
        $this->setBreadcrumb(array(array('name' => 'Intro', 'link' => site_url('cms/cms_intro'))));
        $this->data['menu_active'] = 'intro';
        
        $this->load->model('cms/intro_model');
        $this->images_path_intro = $this->config->item('root_upload').$this->config->item('images_path_intro');
        $this->load->library('custom_upload', array('upload_path' => $this->images_path_intro));
    }

    public function index($offset = 0) {
        $where = NULL;
        $like = NULL;
        if (isset($_POST['intro']) and $_POST['intro']) {
            foreach ($_POST['intro'] as $intro_id) {
                $result = $this->intro_model->deleteIntro($intro_id);
                if ($result and $result['image'] and $result['image']) {
                    delete_file($this->images_path_intro . $result['image']);
                }
                if ($result and $result['image_btn'] and $result['image_btn']) {
                    delete_file($this->images_path_intro . $result['image_btn']);
                }
                if ($result and $result['image_bg'] and $result['image_bg']) {
                    delete_file($this->images_path_intro . $result['image_bg']);
                }
            }
        } else if (isset($_GET) and $_GET) {
            if (isset($_GET['title']) and $_GET['title'])
                $this->data['filter']['title'] = $like['title'] = $_GET['title'];
            if (isset($_GET['status']))
                $this->data['filter']['status'] = $where['status'] = $_GET['status'];
        }
        $limit = $this->config->item('pagination_limit');
        $this->data['intro_list'] = $this->intro_model->getIntroAll($where, $like, 'date_added DESC', $limit, $offset);
        $config['base_url'] = base_url() . 'cms/cms_intro/index/';
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->intro_model->getCountIntroAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $this->view('cms/intro/_index', $this->data);
    }
    
    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['intro_data'] = $_POST;
                $this->view('cms/intro/_form', $this->data);
            } else {
                if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
                    $upload_image_data = $this->custom_upload->uploadImage('image', false, uniqid(), false, 332, 251);
                    if(empty($upload_image_data['file_name'])) {
                        echo 'image';
                        $this->debug($upload_image_data[0]); exit;
                    }
                }
                if (isset($_FILES['image_btn']) and $_FILES['image_btn']['error'] == 0) {
                    $upload_image_btn_data = $this->custom_upload->uploadImage('image_btn', false, uniqid(), false, 332, 251);
                    if(empty($upload_image_btn_data['file_name'])) {
                        echo 'image_btn';
                        $this->debug($upload_image_btn_data[0]); exit;
                    }
                }
                if (isset($_FILES['image_bg']) and $_FILES['image_bg']['error'] == 0) {
                    $upload_image_bg_data = $this->custom_upload->uploadImage('image_bg', false, uniqid(), false, 332, 251);
                    if(empty($upload_image_bg_data['file_name'])) {
                        echo 'image_bg';
                        $this->debug($upload_image_bg_data[0]); exit;
                    }
                }

                $insert = array(
                    'title' => $_POST['title'],
                    'description' => (isset($_POST['description']) and $_POST['description']) ? $_POST['description'] : '',
                    'image' => (isset($upload_image_data['orig_name']) and $upload_image_data['orig_name']) ? $upload_image_data['orig_name'] : NULL,
                    'image_btn' => (isset($upload_image_btn_data['orig_name']) and $upload_image_btn_data['orig_name']) ? $upload_image_btn_data['orig_name'] : NULL,
                    'image_bg' => (isset($upload_image_bg_data['orig_name']) and $upload_image_bg_data['orig_name']) ? $upload_image_bg_data['orig_name'] : NULL,
                    'bg_color' => (isset($_POST['bg_color']) and $_POST['bg_color']) ? $_POST['bg_color'] : '',
                    'sort_order' => $_POST['sort_order'],
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_added' => date('Y-m-d H:i:s'),
                );

                $result = $this->intro_model->addIntro($insert);
                redirect(site_url('cms/cms_intro'));
            }
        } else {
            //$this->debug($data['stockstatus_list']);
            $this->setBreadcrumb(array(array('name' => 'Intro', 'link' => site_url('cms/cms_intro')), array('name' => 'เพิ่ม')));
            $this->view('cms/intro/_form', $this->data);
        }
    }
    
    public function update($intro_id = '') {
        $this->data['intro_data'] = $this->intro_model->getIntroDetail($intro_id);

        if (empty($intro_id) or !$this->data['intro_data'])
            redirect(site_url('cms/cms_intro'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['intro_data'] = $_POST;
                $this->data['intro_data']['thumb'] = getImagePath($this->images_path_intro . $this->data['intro_data']['thumb']);
                $this->view('cms/intro/_form', $this->data);
            } else {
                if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
                    $upload_image_data = $this->custom_upload->uploadImage('image', false, uniqid(), false, 332, 251);
                    if(empty($upload_image_data['file_name'])) {
                        $this->debug($upload_image_data[0]); exit;
                    }
                    if (isset($upload_image_data) and $upload_image_data and $this->data['intro_data']['image']) {
                        delete_file($this->images_path_intro . $this->data['intro_data']['image']);
                    }
                } else if (isset($_POST['del_image']) and $_POST['del_image'] == 1 and $this->data['intro_data']['image']) {
                    delete_file($this->images_path_intro . $this->data['intro_data']['image']);
                    $this->data['intro_data']['image'] = NULL;
                }
                if (isset($_FILES['image_btn']) and $_FILES['image_btn']['error'] == 0) {
                    $upload_image_btn_data = $this->custom_upload->uploadImage('image_btn', false, uniqid(), false, 332, 251);
                    if(empty($upload_image_btn_data['file_name'])) {
                        $this->debug($upload_image_btn_data[0]); exit;
                    }
                    if (isset($upload_image_btn_data) and $upload_image_btn_data and $this->data['intro_data']['image_btn']) {
                        delete_file($this->images_path_intro . $this->data['intro_data']['image_btn']);
                    }
                } else if (isset($_POST['del_image_btn']) and $_POST['del_image_btn'] == 1 and $this->data['intro_data']['image_btn']) {
                    delete_file($this->images_path_intro . $this->data['intro_data']['image_btn']);
                    $this->data['intro_data']['image_btn'] = NULL;
                }
                if (isset($_FILES['image_bg']) and $_FILES['image_bg']['error'] == 0) {
                    $upload_image_bg_data = $this->custom_upload->uploadImage('image_bg', false, uniqid(), false, 332, 251);
                    if(empty($upload_image_bg_data['file_name'])) {
                        $this->debug($upload_image_bg_data[0]); exit;
                    }
                    if (isset($upload_image_bg_data) and $upload_image_bg_data and $this->data['intro_data']['image_bg']) {
                        delete_file($this->images_path_intro . $this->data['intro_data']['image_bg']);
                    }
                } else if (isset($_POST['del_image_bg']) and $_POST['del_image_bg'] == 1 and $this->data['intro_data']['image_bg']) {
                    delete_file($this->images_path_intro . $this->data['intro_data']['image_bg']);
                    $this->data['intro_data']['image_bg'] = NULL;
                }

                $insert = array(
                    'title' => $_POST['title'],
                    'description' => (isset($_POST['description']) and $_POST['description']) ? $_POST['description'] : '',
                    'image' => (isset($upload_image_data['orig_name']) and $upload_image_data['orig_name']) ? $upload_image_data['orig_name'] : $this->data['intro_data']['image'],
                    'image_btn' => (isset($upload_image_btn_data['orig_name']) and $upload_image_btn_data['orig_name']) ? $upload_image_btn_data['orig_name'] : $this->data['intro_data']['image_btn'],
                    'image_bg' => (isset($upload_image_bg_data['orig_name']) and $upload_image_bg_data['orig_name']) ? $upload_image_bg_data['orig_name'] : $this->data['intro_data']['image_bg'],
                    'bg_color' => (isset($_POST['bg_color']) and $_POST['bg_color']) ? $_POST['bg_color'] : '',
                    'sort_order' => $_POST['sort_order'],
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_modified' => date('Y-m-d H:i:s'),
                );

                $result = $this->intro_model->editIntro($intro_id, $insert);
                redirect(site_url('cms/cms_intro'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'Intro', 'link' => site_url('cms/cms_intro')), array('name' => 'แก้ไข')));
            $this->view('cms/intro/_form', $this->data);
        }
    }
    
    private function setFormValidation() {
        $this->form_validation->set_rules('title', 'หัวข้อ*', 'required');
        $this->form_validation->set_rules('sort_order', 'ลำดับการแสดง', 'numeric');
    }

}