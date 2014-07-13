<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/controllers/cms/cms_user.php");

class Cms_profile extends Cms_user {
    
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('ผู้ใช้');
        $this->setBreadcrumb(array(array('name' => 'ผู้ใช้', 'link' => site_url('cms/cms_profile'))));
        $this->data['menu_active'] = 'ผู้ใช้';
        
        $this->load->model('cms/user_model');
    }
    
    public function index() {
        $user_id = $this->data['authen']['user_id'];
        $this->data['user_data'] = $this->user_model->getUserDetail($user_id);

        if (empty($user_id) or !$this->data['user_data'])
            redirect(site_url('cms/cms_user'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation('update');
            if ($this->form_validation->run() == FALSE) {
                $this->view('cms/profile/_form', $this->data);
            } else {
                $insert = array(
                    'username' => (isset($_POST['username']) and $_POST['username']) ? $_POST['username'] : '',
                    'email' => (isset($_POST['email']) and $_POST['email']) ? $_POST['email'] : '',
                    'date_modified' => date('Y-m-d H:i:s'),
                );
                
                if(isset($_POST['password']) and $_POST['password']) {
                    $insert['password'] = $_POST['password'];
                    $insert['encry_password'] = $this->encrypt->encode($_POST['password']);
                }

                $result = $this->user_model->editUser($user_id, $insert);
                redirect(site_url('cms/cms_dashboard'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'ผู้ใช้', 'link' => site_url('cms/cms_user')), array('name' => 'แก้ไข')));
            $this->view('cms/profile/_form', $this->data);
        }
    }
    
}