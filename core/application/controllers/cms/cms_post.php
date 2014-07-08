<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_post extends Base_cms {
    
    public $images_path_post;
    public $vdo_path;
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('โพส');
        $this->setBreadcrumb(array(array('name' => 'โพส', 'link' => site_url('cms/cms_post'))));
        $this->data['menu_active'] = 'post';
        
        $this->load->model('cms/post_model');
        $this->load->model('cms/post_category_model');
        $this->images_path_post = $this->config->item('root_upload').$this->config->item('images_path_post');
        $this->vdo_path = $this->config->item('root_upload').$this->config->item('vdo_path');
        $this->load->library('custom_upload', array('upload_path' => $this->images_path_post));
    }

    public function index($offset = 0) {
        $where = NULL;
        $like = NULL;
        if (isset($_POST['post']) and $_POST['post']) {
            foreach ($_POST['post'] as $post_id) {
                $result = $this->post_model->deletePost($post_id);
                if ($result and $result['thumb'] and $result['image']) {
                    delete_file($this->images_path_post . $result['thumb']);
                    delete_file($this->images_path_post . $result['image']);
                }
                if ($result and $result['vdo_type'] == 'F' and $result['vdo']) {
                    delete_file($this->vdo_path . $result['vdo']);
                }
            }
        } else if (isset($_GET) and $_GET) {
            if (isset($_GET['title']) and $_GET['title'])
                $this->data['filter']['title'] = $like['title'] = $_GET['title'];
            if (isset($_GET['status']))
                $this->data['filter']['status'] = $where['status'] = $_GET['status'];
        }
        $limit = $this->config->item('pagination_limit');
        $this->data['post_list'] = $this->post_model->getPostAll($where, $like, 'date_added DESC', $limit, $offset);
        $config['base_url'] = base_url() . 'cms/cms_post/index/';
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->post_model->getCountPostAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $this->data['sub_menu_active'] = 'post';
        $this->view('cms/post/_index', $this->data);
    }
    
    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['post_data'] = $_POST;
                $this->view('cms/post/_form', $this->data);
            } else {
                if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
                    $upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 332, 251);
                    if(empty($upload_data['file_name'])) {
                        echo 'img : ';
                        $this->debug($upload_data[0]); exit;
                    }
                }
                if (isset($_FILES['vdo']) and $_FILES['vdo']['error'] == 0) {
                    $this->custom_upload->setConfig(array('upload_path' => $this->vdo_path));
                    $uploadvdo_data = $this->custom_upload->uploadVDO('vdo', uniqid());
                    if(empty($uploadvdo_data['file_name'])) {
                        echo 'vdo : ';
                        $this->debug($uploadvdo_data[0]); exit;
                    }
                    $uploadvdo_data = $uploadvdo_data['orig_name'];
                } else {
                    $uploadvdo_data = (isset($_POST['vdo']) and $_POST['vdo']) ? $_POST['vdo'] : '';
                }
                if(isset($_POST['type']) and $_POST['type'] == 'post') 
                    $post_category_id = (isset($_POST['post_category_id']) and $_POST['post_category_id']) ? $_POST['post_category_id'] : '';
                else
                    $post_category_id = 0;
                $insert = array(
                    'title' => $_POST['title'],
                    'content' => (isset($_POST['content']) and $_POST['content']) ? $_POST['content'] : '',
                    'thumb' => (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : NULL,
                    'image' => (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL,
                    'meta_title' => (isset($_POST['meta_title']) and $_POST['meta_title']) ? $_POST['meta_title'] : '',
                    'meta_desc' => (isset($_POST['meta_desc']) and $_POST['meta_desc']) ? $_POST['meta_desc'] : '',
                    'vdo_type' => (isset($_POST['vdo_type']) and $_POST['vdo_type']) ? $_POST['vdo_type'] : '',
                    'vdo' => (isset($uploadvdo_data) and $uploadvdo_data) ? $uploadvdo_data : '',
                    'sort_order' => $_POST['sort_order'],
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'type' => (isset($_POST['type']) and $_POST['type']) ? $_POST['type'] : 'posts',
                    'post_category_id' => $post_category_id,
                    'date_added' => date('Y-m-d H:i:s'),
                );

                $result = $this->post_model->addPost($insert);
                redirect(site_url('cms/cms_post'));
            }
        } else {
            //$this->debug($data['stockstatus_list']);
            $this->setBreadcrumb(array(array('name' => 'โพส', 'link' => site_url('cms/cms_post')), array('name' => 'เพิ่ม')));
            $this->data['sub_menu_active'] = 'post';
            $this->data['post_category'] = $this->post_category_model->getPostCategoryAll();
            $this->view('cms/post/_form', $this->data);
        }
    }
    
    public function update($post_id = '') {
        $this->data['post_data'] = $this->post_model->getPostDetail($post_id);

        if (empty($post_id) or !$this->data['post_data'])
            redirect(site_url('cms/cms_post'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['post_data'] = $_POST;
                $this->data['post_data']['thumb'] = getImagePath($this->images_path_post . $this->data['post_data']['thumb']);
                $this->view('cms/post/_form', $this->data);
            } else {
                /*----------------------------------------- start edit img -------------------------------------------*/
                if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
                    $upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 332, 251);
                    if(empty($upload_data['file_name'])) {
                        $this->debug($upload_data[0]); exit;
                    }
                    if (isset($upload_data) and $upload_data and $this->data['post_data']['thumb'] and $this->data['post_data']['image']) {
                        delete_file($this->images_path_post . $this->data['post_data']['thumb']);
                        delete_file($this->images_path_post . $this->data['post_data']['image']);
                    }
                } else if (isset($_POST['del']) and $_POST['del'] == 1 and $this->data['post_data']['thumb'] and $this->data['post_data']['image']) {
                    delete_file($this->images_path_post . $this->data['post_data']['thumb']);
                    delete_file($this->images_path_post . $this->data['post_data']['image']);
                    $this->data['post_data']['thumb'] = NULL;
                    $this->data['post_data']['image'] = NULL;
                }
                /*----------------------------------------- end edit img ---------------------------------------------*/
                
                /*----------------------------------------- start edit vdo -------------------------------------------*/
                if(empty($_POST['vdo_type'])) {
                    $vdo_type = '';
                } else {
                    $vdo_type = $_POST['vdo_type'];
                    if (isset($_FILES['vdo']) and $_FILES['vdo']['error'] == 0) {
                        $this->custom_upload->setConfig(array('upload_path' => $this->vdo_path));
                        $uploadvdo_data = $this->custom_upload->uploadVDO('vdo', uniqid());
                        if(empty($uploadvdo_data['file_name'])) {
                            $this->debug($uploadvdo_data[0]); exit;
                        }
                        if (isset($uploadvdo_data) and $uploadvdo_data and $this->data['post_data']['vdo']) {
                            delete_file($this->vdo_path . $this->data['post_data']['vdo']);
                        }
                        $uploadvdo_data = $uploadvdo_data['orig_name'];
                        $vdo_type = 'F';
                    } else if (isset($_POST['del_vdo']) and $_POST['del_vdo'] == 1 and $this->data['post_data']['vdo']) {
                        delete_file($this->vdo_path . $this->data['post_data']['vdo']);
                        $this->data['post_data']['vdo'] = '';
                        $vdo_type = '';
                    }
                    if (isset($_POST['vdo']) and $_POST['vdo']) {
                        if (isset($this->data['post_data']['vdo']) and $this->data['post_data']['vdo']) {
                            delete_file($this->vdo_path . $this->data['post_data']['vdo']);
                        }
                        $uploadvdo_data = (isset($_POST['vdo']) and $_POST['vdo']) ? $_POST['vdo'] : '';
                        $vdo_type = 'E';
                    }
                }
                /*----------------------------------------- end edit vdo ---------------------------------------------*/
                    
                if(isset($_POST['type']) and $_POST['type'] == 'post') 
                    $post_category_id = (isset($_POST['post_category_id']) and $_POST['post_category_id']) ? $_POST['post_category_id'] : '';
                else
                    $post_category_id = 0;
                $insert = array(
                    'title' => $_POST['title'],
                    'content' => (isset($_POST['content']) and $_POST['content']) ? $_POST['content'] : '',
                    'thumb' => (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : $this->data['post_data']['thumb'],
                    'image' => (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : $this->data['post_data']['image'],
                    'meta_title' => (isset($_POST['meta_title']) and $_POST['meta_title']) ? $_POST['meta_title'] : '',
                    'meta_desc' => (isset($_POST['meta_desc']) and $_POST['meta_desc']) ? $_POST['meta_desc'] : '',
                    'vdo_type' => $vdo_type,
                    'vdo' => (isset($uploadvdo_data) and $uploadvdo_data) ? $uploadvdo_data : $this->data['post_data']['vdo'],
                    'sort_order' => $_POST['sort_order'],
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'type' => (isset($_POST['type']) and $_POST['type']) ? $_POST['type'] : 'posts',
                    'post_category_id' => $post_category_id,
                    'date_added' => date('Y-m-d H:i:s'),
                );
                //$this->debug($insert); exit;

                $result = $this->post_model->editPost($post_id, $insert);
                redirect(site_url('cms/cms_post'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'โพส', 'link' => site_url('cms/cms_post')), array('name' => 'แก้ไข')));
            $this->data['sub_menu_active'] = 'post';
            $this->data['post_category'] = $this->post_category_model->getPostCategoryAll();
            $this->view('cms/post/_form', $this->data);
        }
    }
    
    private function setFormValidation() {
        $this->form_validation->set_rules('title', 'หัวข้อ*', 'required');
        $this->form_validation->set_rules('content', 'เนื้อหา*', 'required');
        $this->form_validation->set_rules('sort_order', 'ลำดับการแสดง', 'numeric');
    }
    
}