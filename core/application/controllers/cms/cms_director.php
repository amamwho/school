<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_director extends Base_cms {
    
    public $images_path_post;
    public $vdo_path;
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('ผู้บริหาร');
        $this->setBreadcrumb(array(array('name' => 'ผู้บริหาร', 'link' => site_url('cms/cms_director'))));
        $this->data['menu_active'] = 'human';
        $this->data['sub_menu_active'] = 'director';
        
        $this->load->model('cms/constants_model');
        $this->load->model('cms/director_model');
        $this->images_path_director = $this->config->item('root_upload').$this->config->item('images_path_director');
        $this->load->library('custom_upload', array('upload_path' => $this->images_path_director));
    }

    public function index($offset = 0) {
        $where = NULL;
        $like = NULL;
        if (isset($_POST['director']) and $_POST['director']) {
            foreach ($_POST['director'] as $director_id) {
                $result = $this->director_model->deleteDirector($director_id);
                if ($result and $result['thumb'] and $result['thumb']) {
                    delete_file($this->images_path_director . $result['thumb']);
                    delete_file($this->images_path_director . $result['image']);
                }
            }
        } else if (isset($_GET) and $_GET) {
            if (isset($_GET['firstname']) and $_GET['firstname'])
                $this->data['filter']['firstname'] = $like['firstname'] = $_GET['firstname'];
            if (isset($_GET['lastname']) and $_GET['lastname'])
                $this->data['filter']['lastname'] = $like['lastname'] = $_GET['lastname'];
            
            if (isset($_GET['status']))
                $this->data['filter']['status'] = $where['status'] = $_GET['status'];
        }
        $limit = $this->config->item('pagination_limit');
        $this->data['director_list'] = $this->director_model->getDirectorAll($where, $like, 'director_id DESC', $limit, $offset);
        $config['base_url'] = base_url() . 'cms/cms_director/index/';
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->director_model->getCountDirectorAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $this->view('cms/director/_index', $this->data);
    }
    
    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['director_data'] = $_POST;
                $this->view('cms/director/_form', $this->data);
            } else {
                if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
                    $upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 332, 251);
                    if(empty($upload_data['file_name'])) {
                        echo 'img : ';
                        $this->debug($upload_data[0]); exit;
                    }
                }
                if(isset($_POST['begindate']) and $_POST['begindate']) {
                    list($d, $m, $y) = explode('-', $_POST['begindate']);
                    $begindate = $y.'-'.$m.'-'.$d;
                } else 
                    $begindate = '0000-00-00';
                if(isset($_POST['enddate']) and $_POST['enddate']) {
                    list($d, $m, $y) = explode('-', $_POST['enddate']);
                    $enddate = $y.'-'.$m.'-'.$d;
                } else 
                    $enddate = '0000-00-00';
                if(isset($_POST['birthday']) and $_POST['birthday']) {
                    list($d, $m, $y) = explode('-', $_POST['birthday']);
                    $birthday = $y.'-'.$m.'-'.$d;
                } else 
                    $birthday = '0000-00-00';
                $insert = array(
                    'firstname' => (isset($_POST['firstname']) and $_POST['firstname']) ? $_POST['firstname'] : '',
                    'lastname' => (isset($_POST['lastname']) and $_POST['lastname']) ? $_POST['lastname'] : '',
                    'begindate' => $begindate,
                    'enddate' => $enddate,
                    'birthday' => $birthday,
                    'address' => (isset($_POST['address']) and $_POST['address']) ? $_POST['address'] : '',
                    'mobile' => (isset($_POST['mobile']) and $_POST['mobile']) ? $_POST['mobile'] : '',
                    'email' => (isset($_POST['email']) and $_POST['email']) ? $_POST['email'] : '',
                    'thumb' => (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : NULL,
                    'image' => (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL,
                    'description' => (isset($_POST['description']) and $_POST['description']) ? $_POST['description'] : '',
                    'sort_order' => (isset($_POST['sort_order']) and $_POST['sort_order']) ? $_POST['sort_order'] : 0,
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_added' => date('Y-m-d H:i:s'),
                );
                
                //$this->debug($insert); exit;
                $result = $this->director_model->addDirector($insert);
                redirect(site_url('cms/cms_director'));
            }
        } else {
            //$this->debug($data['stockstatus_list']);
            $this->setBreadcrumb(array(array('name' => 'ผู้บริหาร', 'link' => site_url('cms/cms_director')), array('name' => 'เพิ่ม')));
            $this->view('cms/director/_form', $this->data);
        }
    }
    
    public function update($director_id = '') {
        $this->data['director_data'] = $this->director_model->getDirectorDetail($director_id);

        if (empty($director_id) or !$this->data['director_data'])
            redirect(site_url('cms/cms_director'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['staff_data'] = $_POST;
                $this->data['staff_data']['thumb'] = getImagePath($this->images_path_director . $this->data['director_data']['thumb']);
                $this->view('cms/director/_form', $this->data);
            } else {
                if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
                    $upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 332, 251);
                    if(empty($upload_data['file_name'])) {
                        $this->debug($upload_data[0]); exit;
                    }
                    if (isset($upload_data) and $upload_data and $this->data['director_data']['thumb'] and $this->data['director_data']['image']) {
                        delete_file($this->images_path_director . $this->data['director_data']['thumb']);
                        delete_file($this->images_path_director . $this->data['director_data']['image']);
                    }
                } else if (isset($_POST['del']) and $_POST['del'] == 1 and $this->data['director_data']['thumb'] and $this->data['director_data']['image']) {
                    delete_file($this->images_path_director . $this->data['director_data']['thumb']);
                    delete_file($this->images_path_director . $this->data['director_data']['image']);
                    $this->data['director_data']['thumb'] = NULL;
                    $this->data['director_data']['image'] = NULL;
                }
                if(isset($_POST['begindate']) and $_POST['begindate']) {
                    list($d, $m, $y) = explode('-', $_POST['begindate']);
                    $begindate = $y.'-'.$m.'-'.$d;
                } else 
                    $begindate = '0000-00-00';
                if(isset($_POST['enddate']) and $_POST['enddate']) {
                    list($d, $m, $y) = explode('-', $_POST['enddate']);
                    $enddate = $y.'-'.$m.'-'.$d;
                } else 
                    $enddate = '0000-00-00';
                if(isset($_POST['birthday']) and $_POST['birthday']) {
                    list($d, $m, $y) = explode('-', $_POST['birthday']);
                    $birthday = $y.'-'.$m.'-'.$d;
                } else 
                    $birthday = '0000-00-00';
                $insert = array(
                    'firstname' => (isset($_POST['firstname']) and $_POST['firstname']) ? $_POST['firstname'] : '',
                    'lastname' => (isset($_POST['lastname']) and $_POST['lastname']) ? $_POST['lastname'] : '',
                    'begindate' => $begindate,
                    'enddate' => $enddate,
                    'birthday' => $birthday,
                    'address' => (isset($_POST['address']) and $_POST['address']) ? $_POST['address'] : '',
                    'mobile' => (isset($_POST['mobile']) and $_POST['mobile']) ? $_POST['mobile'] : '',
                    'email' => (isset($_POST['email']) and $_POST['email']) ? $_POST['email'] : '',
                    'thumb' => (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : $this->data['director_data']['thumb'],
                    'image' => (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : $this->data['director_data']['image'],
                    'description' => (isset($_POST['description']) and $_POST['description']) ? $_POST['description'] : '',
                    'sort_order' => (isset($_POST['sort_order']) and $_POST['sort_order']) ? $_POST['sort_order'] : 0,
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_modified' => date('Y-m-d H:i:s'),
                );
                //$this->debug($insert);

                $result = $this->director_model->editDirector($director_id, $insert);
                redirect(site_url('cms/cms_director'));
            }
        } else {
            //$this->debug($this->data);
            $this->setBreadcrumb(array(array('name' => 'ผู้บริหาร', 'link' => site_url('cms/cms_director')), array('name' => 'แก้ไข')));
            $this->view('cms/director/_form', $this->data);
        }
    }
    
    private function setFormValidation() {
        $this->form_validation->set_rules('firstname', 'ชื่อ*', 'required');
        $this->form_validation->set_rules('lastname', 'นามสกุล*', 'required');
    }
    
}