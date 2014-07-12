<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_user extends Base_cms {
    
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('ผู้ใช้');
        $this->setBreadcrumb(array(array('name' => 'ผู้ใช้', 'link' => site_url('cms/cms_user'))));
        $this->data['menu_active'] = 'ผู้ใช้';
        
        $this->load->model('cms/user_model');
    }

    public function index($offset = 0) {
        $where = NULL;
        $like = NULL;
        if (isset($_POST['user']) and $_POST['user']) {
            foreach ($_POST['user'] as $user_id) {
                $result = $this->user_model->deleteUser($user_id);
            }
        } else if (isset($_GET) and $_GET) {
            if (isset($_GET['username']) and $_GET['username'])
                $this->data['filter']['username'] = $like['username'] = $_GET['username'];
            if (isset($_GET['status']))
                $this->data['filter']['status'] = $where['status'] = $_GET['status'];
        }
        $limit = $this->config->item('pagination_limit');
        $this->data['user_list'] = $this->user_model->getUserAll($where, $like, 'user_id ASC', $limit, $offset);
        $config['base_url'] = base_url() . 'cms/cms_user/index/';
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->user_model->getCountUserAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $this->view('cms/user/_index', $this->data);
    }
    
    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['user_data'] = $_POST;
                $this->view('cms/user/_form', $this->data);
            } else {
                $insert = array(
                    'username' => (isset($_POST['username']) and $_POST['username']) ? $_POST['username'] : '',
                    'password' => (isset($_POST['password']) and $_POST['password']) ? $_POST['password'] : '',
                    'encry_password' => (isset($_POST['password']) and $_POST['password']) ? $this->encrypt->encode($_POST['password']) : '',
                    'email' => (isset($_POST['email']) and $_POST['email']) ? $_POST['email'] : '',
                    'permission' => (isset($_POST['permission']) and $_POST['permission']) ? serialize($_POST['permission']) : '',
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_added' => date('Y-m-d H:i:s'),
                );

                $result = $this->user_model->addUser($insert);
                redirect(site_url('cms/cms_user'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'ผู้ใช้', 'link' => site_url('cms/cms_user')), array('name' => 'เพิ่ม')));
            $this->view('cms/user/_form', $this->data);
        }
    }
    
    public function update($user_id = '') {
        $this->data['user_data'] = $this->user_model->getUserDetail($user_id);

        if (empty($user_id) or !$this->data['user_data'])
            redirect(site_url('cms/cms_user'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation('update');
            if ($this->form_validation->run() == FALSE) {
                $this->view('cms/user/_form', $this->data);
            } else {
                $insert = array(
                    'username' => (isset($_POST['username']) and $_POST['username']) ? $_POST['username'] : '',
                    'email' => (isset($_POST['email']) and $_POST['email']) ? $_POST['email'] : '',
                    'permission' => (isset($_POST['permission']) and $_POST['permission']) ? serialize($_POST['permission']) : '',
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_modified' => date('Y-m-d H:i:s'),
                );
                
                if(isset($_POST['password']) and $_POST['password']) {
                    $insert['password'] = $_POST['password'];
                    $insert['encry_password'] = $this->encrypt->encode($_POST['password']);
                }

                $result = $this->user_model->editUser($user_id, $insert);
                redirect(site_url('cms/cms_user'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'ผู้ใช้', 'link' => site_url('cms/cms_user')), array('name' => 'แก้ไข')));
            $this->view('cms/user/_form', $this->data);
        }
    }
    
    public function myProfile() {
        $this->data['user_data'] = $this->user_model->getUserDetail($user_id);

        if (empty($user_id) or !$this->data['user_data'])
            redirect(site_url('cms/cms_user'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation('update');
            if ($this->form_validation->run() == FALSE) {
                $this->view('cms/user/_form', $this->data);
            } else {
                $insert = array(
                    'username' => (isset($_POST['username']) and $_POST['username']) ? $_POST['username'] : '',
                    'email' => (isset($_POST['email']) and $_POST['email']) ? $_POST['email'] : '',
                    'permission' => (isset($_POST['permission']) and $_POST['permission']) ? serialize($_POST['permission']) : '',
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_modified' => date('Y-m-d H:i:s'),
                );
                
                if(isset($_POST['password']) and $_POST['password']) {
                    $insert['password'] = $_POST['password'];
                    $insert['encry_password'] = $this->encrypt->encode($_POST['password']);
                }

                $result = $this->user_model->editUser($user_id, $insert);
                redirect(site_url('cms/cms_user'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'ผู้ใช้', 'link' => site_url('cms/cms_user')), array('name' => 'แก้ไข')));
            $this->view('cms/user/_form', $this->data);
        }
    }
    
    private function setFormValidation($action = '') {
        if(isset($action) and $action == 'update') {
            if($this->data['user_data']['username'] != $_POST['username'])
                $this->form_validation->set_rules('username', 'username*', 'required|min_length[5]|callback_username_unique');
            if($this->data['user_data']['email'] != $_POST['email'])
                $this->form_validation->set_rules('email', 'email*', 'required|valid_email|callback_email_unique');
            $this->form_validation->set_rules('password', 'password*', 'min_length[6]|matches[c_password]');
            $this->form_validation->set_rules('c_password', 'confirm password*', 'min_length[6]');
        } else {
            $this->form_validation->set_rules('username', 'username*', 'required|min_length[5]|callback_username_unique');
            $this->form_validation->set_rules('email', 'email*', 'required|valid_email|callback_email_unique');
            $this->form_validation->set_rules('password', 'password*', 'required|min_length[6]|matches[c_password]');
            $this->form_validation->set_rules('c_password', 'confirm password*', 'required|min_length[6]');
        }
    }
    
    public function username_unique($str) {
        $result = $this->db->get_where('user', array('username' => $str));
        if ($result->num_rows > 0) {
            $this->form_validation->set_message('username_unique', 'That username* is already used.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function email_unique($str) {
        $result = $this->db->get_where('user', array('email' => $str));
        if ($result->num_rows > 0) {
            $this->form_validation->set_message('email_unique', 'That email* is already used.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}