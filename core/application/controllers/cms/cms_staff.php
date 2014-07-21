<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_staff extends Base_cms {
    
    public $images_path_staff;
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('บุคลากร');
        $this->setBreadcrumb(array(array('name' => 'กลุ่มสาระ / หมวด', 'link' => site_url('cms/cms_staff'))));
        $this->data['menu_active'] = 'human';
        $this->data['sub_menu_active'] = 'staff';
        
        $this->load->model('cms/constants_model');
        $this->load->model('cms/staff_model');
        $this->images_path_staff = $this->config->item('root_upload').$this->config->item('images_path_staff');
        $this->load->library('custom_upload', array('upload_path' => $this->images_path_staff));
    }

    public function index($offset = 0) {
        $where = NULL;
        $like = NULL;
        if (isset($_POST['staff_category']) and $_POST['staff_category']) {
            foreach ($_POST['staff_category'] as $staff_category_id) {
                $result = $this->staff_model->deleteStaffCategory($staff_category_id);
            }
        } else if (isset($_GET) and $_GET) {
            if (isset($_GET['title']) and $_GET['title'])
                $this->data['filter']['title'] = $like['name'] = $_GET['title'];
        }
        $limit = $this->config->item('pagination_limit');
        $this->data['staff_category_list'] = $this->staff_model->getStaffCategory($where, $like, 'name ASC', $limit, $offset);
        $config['base_url'] = base_url() . 'cms/cms_staff/index/';
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->staff_model->getCountStaffCategoryAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $this->view('cms/staff/_index', $this->data);
    }
    
    public function staffCategoryInsert() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setStaffCategoryFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['staff_category_data'] = $_POST;
                $this->view('cms/staff/_staff_category_form', $this->data);
            } else {
                $insert = array(
                    'name' => (isset($_POST['name']) and $_POST['name']) ? $_POST['name'] : '',
                );

                $result = $this->staff_model->addStaffCategory($insert);
                redirect(site_url('cms/cms_staff'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'กลุ่มสาระ / หมวด', 'link' => site_url('cms/cms_staff')), array('name' => 'เพิ่ม')));
            $this->view('cms/staff/_staff_category_form', $this->data);
        }
    }
    
    public function staffCategoryUpdate($staff_category_id = '') {
        $this->data['staff_category_data'] = $this->staff_model->getStaffCategoryDetail($staff_category_id);

        if (empty($staff_category_id) or !$this->data['staff_category_data'])
            redirect(site_url('cms/cms_staff'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setStaffCategoryFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['staff_category_data'] = $_POST;
                $this->view('cms/banner/_form', $this->data);
            } else {
                $insert = array(
                    'name' => (isset($_POST['name']) and $_POST['name']) ? $_POST['name'] : '',
                );

                $result = $this->staff_model->editStaffCategory($staff_category_id, $insert);
                redirect(site_url('cms/cms_staff'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'กลุ่มสาระ / หมวด', 'link' => site_url('cms/cms_staff')), array('name' => 'แก้ไข')));
            $this->view('cms/staff/_staff_category_form', $this->data);
        }
    }
    
    public function staffList($staff_category_id = '', $offset = 0) {
        if(empty($staff_category_id))
            redirect(site_url('cms/cms_staff'));
        
        $this->data['staff_category_id'] = $staff_category_id;
        $this->data['constants_position'] = $this->constants_model->getByType('position');
        $where['staff_category_id'] = $staff_category_id;
        $like = NULL;
        if (isset($_POST['staff']) and $_POST['staff']) {
            foreach ($_POST['staff'] as $staff_id) {
                $result = $this->staff_model->deleteStaff($staff_id);
                if ($result and $result['thumb'] and $result['thumb']) {
                    delete_file($this->images_path_staff . $result['thumb']);
                    delete_file($this->images_path_staff . $result['image']);
                }
            }
        } else if (isset($_GET) and $_GET) {
            if (isset($_GET['firstname']) and $_GET['firstname'])
                $this->data['filter']['firstname'] = $like['firstname'] = $_GET['firstname'];
            if (isset($_GET['lastname']) and $_GET['lastname'])
                $this->data['filter']['lastname'] = $like['lastname'] = $_GET['lastname'];
                
            if (isset($_GET['status']))
                $this->data['filter']['status'] = $where['status'] = $_GET['status'];
            if (isset($_GET['position']))
                $this->data['filter']['position'] = $where['position'] = $_GET['position'];
        }
        $limit = $this->config->item('pagination_limit');
        $this->data['staff_list'] = $this->staff_model->getStaffAll($where, $like, 'staff_id DESC', $limit, $offset);
        $config['base_url'] = base_url() . 'cms/cms_staff/staffList/';
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->staff_model->getCountStaffAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $staff_category = $this->staff_model->getStaffCategoryDetail($staff_category_id);
        $this->setBreadcrumb(array(array('name' => 'กลุ่มสาระ / หมวด', 'link' => site_url('cms/cms_staff')), array('name' => $staff_category['name'])));
        $this->view('cms/staff/_staffList', $this->data);
    }
    
    public function insert($staff_category_id = '') {
        if(empty($staff_category_id))
            redirect(site_url('cms/cms_staff'));
        
        $this->data['staff_category_id'] = $staff_category_id;
        $this->data['constants_position'] = $this->constants_model->getByType('position');
        $this->data['constants_stafftype'] = $this->constants_model->getByType('stafftype');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setStaffFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['staff_data'] = $_POST;
                $this->view('cms/staff/_form', $this->data);
            } else {
                if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
                    $upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 332, 251);
                    if(empty($upload_data['file_name'])) {
                        echo 'img : ';
                        $this->debug($upload_data[0]); exit;
                    }
                }
                if(isset($_POST['position']) and isset($this->data['constants_position']) and in_array(array('key' => $_POST['position'], 'value' => 'อื่นๆ'), $this->data['constants_position'])) 
                    $position_oth = (isset($_POST['position_oth']) and $_POST['position_oth']) ? $_POST['position_oth'] : '';
                else
                    $position_oth = '';
                if(isset($_POST['class']) and isset($this->data['constants_stafftype']) and in_array(array('key' => $_POST['class'], 'value' => 'อื่นๆ'), $this->data['constants_stafftype'])) 
                    $class_oth = (isset($_POST['class_oth']) and $_POST['class_oth']) ? $_POST['class_oth'] : '';
                else
                    $class_oth = '';
                if(isset($_POST['birthday']) and $_POST['birthday']) {
                    list($d, $m, $y) = explode('-', $_POST['birthday']);
                    $birthday = $y.'-'.$m.'-'.$d;
                } else 
                    $birthday = '0000-00-00';
                $insert = array(
                    'staff_category_id' => $staff_category_id,
                    'firstname' => (isset($_POST['firstname']) and $_POST['firstname']) ? $_POST['firstname'] : '',
                    'lastname' => (isset($_POST['lastname']) and $_POST['lastname']) ? $_POST['lastname'] : '',
                    'gender' => (isset($_POST['gender']) and $_POST['gender']) ? $_POST['gender'] : NULL,
                    'position' => (isset($_POST['position']) and $_POST['position']) ? $_POST['position'] : '',
                    'position_oth' => $position_oth,
                    'qualification' => (isset($_POST['qualification']) and $_POST['qualification']) ? $_POST['qualification'] : '',
                    'major' => (isset($_POST['major']) and $_POST['major']) ? $_POST['major'] : '',
                    'class' => (isset($_POST['class']) and $_POST['class']) ? $_POST['class'] : '',
                    'class_oth' => $class_oth,
                    'description' => (isset($_POST['description']) and $_POST['description']) ? $_POST['description'] : '',
                    'birthday' => $birthday,
                    'address' => (isset($_POST['address']) and $_POST['address']) ? $_POST['address'] : '',
                    'mobile' => (isset($_POST['mobile']) and $_POST['mobile']) ? $_POST['mobile'] : '',
                    'email' => (isset($_POST['email']) and $_POST['email']) ? $_POST['email'] : '',
                    'thumb' => (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : NULL,
                    'image' => (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL,
                    'sort_order' => (isset($_POST['sort_order']) and $_POST['sort_order']) ? $_POST['sort_order'] : 0,
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_added' => date('Y-m-d H:i:s'),
                );
                
                //$this->debug($insert); exit;
                $result = $this->staff_model->addStaff($insert);
                redirect(site_url('cms/cms_staff/staffList/'.$staff_category_id));
            }
        } else {
            //$this->debug($data['stockstatus_list']);
            $staff_category = $this->staff_model->getStaffCategoryDetail($staff_category_id);
            $this->setBreadcrumb(array(array('name' => 'กลุ่มสาระ / หมวด', 'link' => site_url('cms/cms_staff')), array('name' => $staff_category['name'], 'link' => site_url('cms/cms_staff/staffList/'.$staff_category['staff_category_id'])), array('name' => 'เพิ่ม')));
            $this->data['staff_category'] = $this->staff_model->getStaffCategory();
            $this->view('cms/staff/_form', $this->data);
        }
    }
    
    public function update($staff_id = '') {
        $this->data['staff_data'] = $this->staff_model->getStaffDetail($staff_id);
        $this->data['constants_position'] = $this->constants_model->getByType('position');
        $this->data['constants_stafftype'] = $this->constants_model->getByType('stafftype');

        if (empty($staff_id) or !$this->data['staff_data'])
            redirect(site_url('cms/cms_staff'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setStaffFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['staff_data'] = $_POST;
                $this->data['staff_data']['thumb'] = getImagePath($this->images_path_staff . $this->data['staff_data']['thumb']);
                $this->view('cms/staff/_form', $this->data);
            } else {
                if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
                    $upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 332, 251);
                    if(empty($upload_data['file_name'])) {
                        $this->debug($upload_data[0]); exit;
                    }
                    if (isset($upload_data) and $upload_data and $this->data['staff_data']['thumb'] and $this->data['staff_data']['image']) {
                        delete_file($this->images_path_staff . $this->data['staff_data']['thumb']);
                        delete_file($this->images_path_staff . $this->data['staff_data']['image']);
                    }
                } else if (isset($_POST['del']) and $_POST['del'] == 1 and $this->data['staff_data']['thumb'] and $this->data['staff_data']['image']) {
                    delete_file($this->images_path_staff . $this->data['staff_data']['thumb']);
                    delete_file($this->images_path_staff . $this->data['staff_data']['image']);
                    $this->data['staff_data']['thumb'] = NULL;
                    $this->data['staff_data']['image'] = NULL;
                }
                if(isset($_POST['position']) and isset($this->data['constants_position']) and in_array(array('key' => $_POST['position'], 'value' => 'อื่นๆ'), $this->data['constants_position'])) 
                    $position_oth = (isset($_POST['position_oth']) and $_POST['position_oth']) ? $_POST['position_oth'] : '';
                else
                    $position_oth = '';
                if(isset($_POST['class']) and isset($this->data['constants_stafftype']) and in_array(array('key' => $_POST['class'], 'value' => 'อื่นๆ'), $this->data['constants_stafftype'])) 
                    $class_oth = (isset($_POST['class_oth']) and $_POST['class_oth']) ? $_POST['class_oth'] : '';
                else
                    $class_oth = '';
                if(isset($_POST['birthday']) and $_POST['birthday']) {
                    list($d, $m, $y) = explode('-', $_POST['birthday']);
                    $birthday = $y.'-'.$m.'-'.$d;
                } else 
                    $birthday = '0000-00-00';
                $insert = array(
                    'staff_category_id' => (isset($_POST['staff_category_id']) and $_POST['staff_category_id']) ? $_POST['staff_category_id'] : '',
                    'firstname' => (isset($_POST['firstname']) and $_POST['firstname']) ? $_POST['firstname'] : '',
                    'lastname' => (isset($_POST['lastname']) and $_POST['lastname']) ? $_POST['lastname'] : '',
                    'gender' => (isset($_POST['gender']) and $_POST['gender']) ? $_POST['gender'] : NULL,
                    'position' => (isset($_POST['position']) and $_POST['position']) ? $_POST['position'] : '',
                    'position_oth' => $position_oth,
                    'qualification' => (isset($_POST['qualification']) and $_POST['qualification']) ? $_POST['qualification'] : '',
                    'major' => (isset($_POST['major']) and $_POST['major']) ? $_POST['major'] : '',
                    'class' => (isset($_POST['class']) and $_POST['class']) ? $_POST['class'] : '',
                    'class_oth' => $class_oth,
                    'description' => (isset($_POST['description']) and $_POST['description']) ? $_POST['description'] : '',
                    'birthday' => $birthday,
                    'address' => (isset($_POST['address']) and $_POST['address']) ? $_POST['address'] : '',
                    'mobile' => (isset($_POST['mobile']) and $_POST['mobile']) ? $_POST['mobile'] : '',
                    'email' => (isset($_POST['email']) and $_POST['email']) ? $_POST['email'] : '',
                    'thumb' => (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : $this->data['staff_data']['thumb'],
                    'image' => (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : $this->data['staff_data']['image'],
                    'sort_order' => (isset($_POST['sort_order']) and $_POST['sort_order']) ? $_POST['sort_order'] : 0,
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_modified' => date('Y-m-d H:i:s'),
                );
                //$this->debug($insert);

                $result = $this->staff_model->editStaff($staff_id, $insert);
                redirect(site_url('cms/cms_staff/staffList/'.$_POST['staff_category_id']));
            }
        } else {
            //$this->debug($this->data);
            $staff_category = $this->staff_model->getStaffCategoryDetail($this->data['staff_data']['staff_category_id']);
            $this->setBreadcrumb(array(array('name' => 'กลุ่มสาระ / หมวด', 'link' => site_url('cms/cms_staff')), array('name' => $staff_category['name'], 'link' => site_url('cms/cms_staff/staffList/'.$staff_category['staff_category_id'])), array('name' => 'แก้ไข')));
            $this->data['staff_category'] = $this->staff_model->getStaffCategory();
            $this->view('cms/staff/_form', $this->data);
        }
    }
    
    private function setStaffCategoryFormValidation() {
        $this->form_validation->set_rules('name', 'ชื่อ*', 'required');
    }
    
    private function setStaffFormValidation() {
        $this->form_validation->set_rules('firstname', 'ชื่อ*', 'required');
        $this->form_validation->set_rules('lastname', 'นามสกุล*', 'required');
    }
    
}