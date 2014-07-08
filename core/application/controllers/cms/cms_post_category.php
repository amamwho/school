<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_post_category extends Base_cms {
    
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('โพส');
        $this->setBreadcrumb(array(array('name' => 'ประเภทโพส', 'link' => site_url('cms/cms_staff'))));
        $this->data['menu_active'] = 'post';
        $this->data['sub_menu_active'] = 'post_category';
        
        $this->load->model('cms/post_category_model');
    }

    public function index($offset = 0) {
        $where = NULL;
        $like = NULL;
        if (isset($_POST['post_category']) and $_POST['post_category']) {
            foreach ($_POST['post_category'] as $post_category_id) {
                $result = $this->post_category_model->deletePostCategory($post_category_id);
            }
        } else if (isset($_GET) and $_GET) {
            if (isset($_GET['title']) and $_GET['title'])
                $this->data['filter']['title'] = $like['name'] = $_GET['title'];
        }
        $limit = $this->config->item('pagination_limit');
        $this->data['post_category_list'] = $this->post_category_model->getPostCategoryAll($where, $like, 'name ASC', $limit, $offset);
        $config['base_url'] = base_url() . 'cms/cms_post_category/index/';
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->post_category_model->getCountPostCategoryAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $this->view('cms/post_category/_index', $this->data);
    }
    
    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['post_category_data'] = $_POST;
                $this->view('cms/post_category/_form', $this->data);
            } else {
                $insert = array(
                    'name' => (isset($_POST['name']) and $_POST['name']) ? $_POST['name'] : '',
                );

                $result = $this->post_category_model->addPostCategory($insert);
                redirect(site_url('cms/cms_post_category'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'ประเภทโพส', 'link' => site_url('cms/cms_post_category')), array('name' => 'เพิ่ม')));
            $this->view('cms/post_category/_form', $this->data);
        }
    }
    
    public function update($post_category_id = '') {
        $this->data['post_category_data'] = $this->post_category_model->getPostCategoryDetail($post_category_id);

        if (empty($post_category_id) or !$this->data['post_category_data'])
            redirect(site_url('cms/cms_post_category'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['post_category_data'] = $_POST;
                $this->view('cms/post_category/_form', $this->data);
            } else {
                $insert = array(
                    'name' => (isset($_POST['name']) and $_POST['name']) ? $_POST['name'] : '',
                );

                $result = $this->post_category_model->editPostCategory($post_category_id, $insert);
                redirect(site_url('cms/cms_post_category'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'ประเภทโพส', 'link' => site_url('cms/cms_post_category')), array('name' => 'แก้ไข')));
            $this->view('cms/post_category/_form', $this->data);
        }
    }
    
    private function setFormValidation() {
        $this->form_validation->set_rules('name', 'ชื่อ*', 'required');
    }
    
}