<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_sidebar extends Base_cms {
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('ผู้บริหาร');
        $this->setBreadcrumb(array(array('name' => 'Sidebar', 'link' => site_url('cms/cms_sidebar'))));
        $this->data['menu_active'] = 'sidebar';
        
        $this->load->model('cms/constants_model');
        $this->load->model('cms/sidebar_model');
    }

    public function index($offset = 0) {
        $where = NULL;
        $like = NULL;
        if (isset($_POST['sidebar']) and $_POST['sidebar']) {
            foreach ($_POST['sidebar'] as $sidebar_id) {
                $result = $this->sidebar_model->deleteSidebar($sidebar_id);
            }
        } else if (isset($_GET) and $_GET) {
            if (isset($_GET['name']) and $_GET['name'])
                $this->data['filter']['name'] = $like['name'] = $_GET['name'];
            
            if (isset($_GET['status']))
                $this->data['filter']['status'] = $where['status'] = $_GET['status'];
        }
        $limit = $this->config->item('pagination_limit');
        $this->data['sidebar_list'] = $this->sidebar_model->getSidebarAll($where, $like, 'sidebar_id DESC', $limit, $offset);
        $config['base_url'] = base_url() . 'cms/cms_sidebar/index/';
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->sidebar_model->getCountSidebarAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $this->view('cms/sidebar/_index', $this->data);
    }
    
    public function insert() {
        $this->data['constants_sidebar'] = $this->constants_model->getByType('sidebar');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['sidebar_data'] = $_POST;
                $this->view('cms/sidebar/_form', $this->data);
            } else {
                $insert = array(
                    'name' => (isset($_POST['name']) and $_POST['name']) ? $_POST['name'] : '',
                    'detail' => (isset($_POST['detail']) and $_POST['detail']) ? $_POST['detail'] : '',
                    'position' => (isset($_POST['position']) and $_POST['position']) ? $_POST['position'] : '',
                    'sort_order' => (isset($_POST['sort_order']) and $_POST['sort_order']) ? $_POST['sort_order'] : 0,
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_added' => date('Y-m-d H:i:s'),
                );
                
                //$this->debug($insert); exit;
                $result = $this->sidebar_model->addSidebar($insert);
                redirect(site_url('cms/cms_sidebar'));
            }
        } else {
            $this->setBreadcrumb(array(array('name' => 'Sidebar', 'link' => site_url('cms/cms_sidebar')), array('name' => 'เพิ่ม')));
            $this->view('cms/sidebar/_form', $this->data);
        }
    }
    
    public function update($sidebar_id = '') {
        $this->data['sidebar_data'] = $this->sidebar_model->getSidebarDetail($sidebar_id);
        $this->data['constants_sidebar'] = $this->constants_model->getByType('sidebar');

        if (empty($sidebar_id) or !$this->data['sidebar_data'])
            redirect(site_url('cms/cms_sidebar'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['staff_data'] = $_POST;
                $this->view('cms/sidebar/_form', $this->data);
            } else {
                $insert = array(
                    'name' => (isset($_POST['name']) and $_POST['name']) ? $_POST['name'] : '',
                    'detail' => (isset($_POST['detail']) and $_POST['detail']) ? $_POST['detail'] : '',
                    'position' => (isset($_POST['position']) and $_POST['position']) ? $_POST['position'] : '',
                    'sort_order' => (isset($_POST['sort_order']) and $_POST['sort_order']) ? $_POST['sort_order'] : 0,
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_modified' => date('Y-m-d H:i:s'),
                );
                //$this->debug($insert);

                $result = $this->sidebar_model->editSidebar($sidebar_id, $insert);
                redirect(site_url('cms/cms_sidebar'));
            }
        } else {
            //$this->debug($this->data);
            $this->setBreadcrumb(array(array('name' => 'Sidebar', 'link' => site_url('cms/cms_sidebar')), array('name' => 'แก้ไข')));
            $this->view('cms/sidebar/_form', $this->data);
        }
    }
    
    private function setFormValidation() {
        $this->form_validation->set_rules('name', 'ชื่อหัวข้อ*', 'required');
        $this->form_validation->set_rules('detail', 'รายละเอียด*', 'required');
        $this->form_validation->set_rules('sort_order', 'ลำดับการแสดง', 'numeric');
    }
    
}