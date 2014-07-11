<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_document extends Base_cms {
    
    public $document_path_file;
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('เอกสาร');
        $this->setBreadcrumb(array(array('name' => 'เอกสาร', 'link' => site_url('cms/cms_document'))));
        $this->data['menu_active'] = 'document';
        
        $this->load->model('cms/document_model');
//        $this->images_path_file = $this->config->item('root_upload').$this->config->item('images_path_file');
//        $this->load->library('custom_upload', array('upload_path' => $this->images_path_file));
    }

    public function index($type = '', $offset = 0) {
        if(empty($type))
            redirect(site_url('cms/cms_dashboard'));
        
        $this->setDataByType($type);
        $where = NULL;
        $like = NULL;
        if (isset($_POST['document']) and $_POST['document']) {
            foreach ($_POST['document'] as $document_id) {
                $result = $this->document_model->deleteIntro($document_id);
                if ($result and $result['file'] and $result['file']) {
                    delete_file($this->document_path_file . $result['file']);
                }
            }
        } else if (isset($_GET) and $_GET) {
            if (isset($_GET['name']) and $_GET['name'])
                $this->data['filter']['name'] = $like['name'] = $_GET['name'];
            if (isset($_GET['status']))
                $this->data['filter']['status'] = $where['status'] = $_GET['status'];
        }
        $limit = $this->config->item('pagination_limit');
        $this->data['document_list'] = $this->document_model->getDocumentAll($where, $like, 'date_added DESC', $limit, $offset);
        $config['base_url'] = base_url() . $this->data['page_index'];
        $config['uri_segment'] = 4;
        $config['num_links'] = $this->config->item('pagination_num_links');
        $config['total_rows'] = $this->document_model->getCountDocumentAll($where, $like);
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset + 1;
        $this->pagination->initialize($config);
        $this->view('cms/document/_index', $this->data);
    }
    
    public function insert($type = '') {
        if(empty($type))
            redirect(site_url('cms/cms_dashboard'));
        
        $this->setDataByType($type);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setFormValidation();
            if ($this->form_validation->run() == FALSE) {
                $this->data['document_data'] = $_POST;
                $this->view('cms/document/_form', $this->data);
            } else {
                if (isset($_FILES['file']) and $_FILES['file']['error'] == 0) {
                    $this->custom_upload->setConfig(array('upload_path' => $this->document_path_file));
                    $uploafile_data = $this->custom_upload->uploadFile('file', uniqid());
                    if(empty($uploafile_data['file_name'])) {
                        echo 'file : ';
                        $this->debug($uploafile_data[0]); exit;
                    }
                    $uploafile_data = $uploafile_data['orig_name'];
                } else {
                    $uploafile_data = (isset($_POST['file']) and $_POST['file']) ? $_POST['file'] : '';
                }

                $insert = array(
                    'name' => $_POST['name'],
                    'file' => (isset($uploafile_data) and $uploafile_data) ? $uploafile_data : '',
                    'original_filename' => (isset($_POST['original_filename']) and $_POST['original_filename']) ? $_POST['original_filename'] : '',
                    'password' => (isset($_POST['password']) and $_POST['password']) ? $_POST['password'] : '',
                    'type' => $type,
                    'link' => (isset($_POST['link']) and $_POST['link']) ? $_POST['link'] : '',
                    'category' => (isset($_POST['category']) and $_POST['category']) ? $_POST['category'] : '',
                    'status' => (isset($_POST['status']) and $_POST['status']) ? $_POST['status'] : 0,
                    'date_added' => date('Y-m-d H:i:s'),
                    'date_modified' => date('Y-m-d H:i:s'),
                );

                $result = $this->document_model->addBanner($insert);
                redirect(site_url($this->data['page_index']));
            }
        } else {
            $this->view('cms/document/_form', $this->data);
        }
    }
    
    private function setDataByType($type, $action = '') {
        switch ($type) {
            case 'D':
                $this->setPageTitle('เอกสารดาวน์โหลด');
                if(isset($action) and $action == 'insert')
                    $this->setBreadcrumb(array(array('name' => 'เอกสารดาวน์โหลด', 'link' => site_url('cms/cms_document/download')), array('name' => 'เพิ่ม')));
                else if(isset($action) and $action == 'edit')
                    $this->setBreadcrumb(array(array('name' => 'เอกสารดาวน์โหลด', 'link' => site_url('cms/cms_document/download')), array('name' => 'แก้ไข')));
                else 
                    $this->setBreadcrumb(array(array('name' => 'เอกสารดาวน์โหลด', 'link' => site_url('cms/cms_document/download'))));
                $this->data['page_index'] = 'cms/cms_document/download';
                $this->data['page_name'] = 'เอกสารดาวน์โหลด';
                $this->data['sub_menu_active'] = 'download';
            break;
        
            case 'I':
                $this->setPageTitle('เอกสารภายใน');
                if(isset($action) and $action == 'insert')
                    $this->setBreadcrumb(array(array('name' => 'เอกสารภายใน', 'link' => site_url('cms/cms_document/inside')), array('name' => 'เพิ่ม')));
                else if(isset($action) and $action == 'edit')
                    $this->setBreadcrumb(array(array('name' => 'เอกสารภายใน', 'link' => site_url('cms/cms_document/inside')), array('name' => 'แก้ไข')));
                else
                    $this->setBreadcrumb(array(array('name' => 'เอกสารภายใน', 'link' => site_url('cms/cms_document/inside'))));
                $this->data['page_index'] = 'cms/cms_document/inside';
                $this->data['page_name'] = 'เอกสารภายใน';
                $this->data['sub_menu_active'] = 'inside';
            break;

            default:
            break;
        }
    }
    
}