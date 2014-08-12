<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_menu extends Base_cms {
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('เมนู');
        $this->setBreadcrumb(array(array('name' => 'เมนู', 'link' => site_url('cms/cms_menu'))));
        $this->data['menu_active'] = 'menu';
        
        $this->load->model('cms/post_model');
    }

    public function index($offset = 0) {
        $where = NULL;
        $like = NULL;
        if (isset($_POST['post']) and $_POST['post']) {
            foreach ($_POST['post'] as $post_id) {
                $result = $this->post_model->editPost($post_id, array('menu' => 0, 'menu_parent' => 0, 'menu_order' => 0));
            }
        }
        $where['menu'] = 1;
        $limit = $this->config->item('pagination_limit');
        $this->data['post_list'] = $this->post_model->getPostAll($where, NULL, 'date_added DESC', $limit, $offset);
        $config['base_url'] = base_url() . 'cms/cms_menu/index/';
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->post_model->getCountPostAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $this->view('cms/menu/_index', $this->data);
    }
    
    public function insert() {
        $this->data['post_list'] = $this->post_model->getPostAll(array('type' => 'page', 'status' => 1, 'menu' => 0), NULL, 'date_added DESC');
        $this->data['parent_list'] = $this->post_model->getPostAll(array('type' => 'page', 'status' => 1, 'menu' => 1, 'menu_parent' => 0), NULL, 'date_added DESC');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['post_data'] = $_POST;
                $this->view('cms/menu/_form', $this->data);
            } else {
                $insert = array(
                    'menu' => 1,
                    'menu_parent' => (isset($_POST['menu_parent']) and $_POST['menu_parent']) ? $_POST['menu_parent'] : 0,
                    'menu_order' => (isset($_POST['menu_order']) and $_POST['menu_order']) ? $_POST['menu_order'] : 0,
                );

                $result = $this->post_model->editPost($_POST['post_id'], $insert);
                redirect(site_url('cms/cms_menu'));
            }
        } else {
            //$this->debug($data['stockstatus_list']);
            $this->setBreadcrumb(array(array('name' => 'เมนู', 'link' => site_url('cms/cms_menu')), array('name' => 'เพิ่ม')));
            $this->view('cms/menu/_form', $this->data);
        }
    }
    
    public function update($post_id = '') {
        $this->data['post_list'] = $this->post_model->getPostAll(array('type' => 'page', 'status' => 1, 'menu' => 0), NULL, 'date_added DESC');
        $this->data['parent_list'] = $this->post_model->getPostAll(array('type' => 'page', 'status' => 1, 'menu' => 1, 'menu_parent' => 0, 'post_id !=' => $post_id), NULL, 'date_added DESC');
        $this->data['post_data'] = $this->post_model->getPostDetail($post_id);
        $this->data['action'] = 'update';
        if (empty($post_id) or !$this->data['post_data'])
            redirect(site_url('cms/cms_menu'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation('update');
            if ($this->form_validation->run() == FALSE) {
                $this->data['post_data'] = $_POST;
                $this->view('cms/menu/_form', $this->data);
            } else {
                $insert = array(
                    'menu_parent' => (isset($_POST['menu_parent']) and $_POST['menu_parent']) ? $_POST['menu_parent'] : 0,
                    'menu_order' => (isset($_POST['menu_order']) and $_POST['menu_order']) ? $_POST['menu_order'] : 0,
                );
                //$this->debug($insert); exit;

                $result = $this->post_model->editPost($post_id, $insert);
                redirect(site_url('cms/cms_menu'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'เมนู', 'link' => site_url('cms/cms_menu')), array('name' => 'แก้ไข')));
            $this->view('cms/menu/_form', $this->data);
        }
    }
    
    private function setFormValidation($action = '') {
        if(isset($action) and $action == 'update') {
            $this->form_validation->set_rules('sort_order', 'ลำดับการแสดง', 'numeric');
        } else {
            $this->form_validation->set_rules('post_id', 'หน้า*', 'required');
            $this->form_validation->set_rules('sort_order', 'ลำดับการแสดง', 'numeric');
        }
    }
}