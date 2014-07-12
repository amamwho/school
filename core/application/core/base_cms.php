<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Base_cms extends CI_Controller {

    protected $ci;
    protected $data;

    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('cms/_cms_layout');
        $this->ci = & get_instance();
        $this->data['authen'] = $this->session->userdata('authen');
        if(!isset($this->data['authen']) or !$this->data['authen']) {
            redirect('cms/cms_authen');
        }
        if(isset($this->data['authen']['permission']) and $this->data['authen']['permission'] != 'admin') {
            $permission_authen = unserialize($this->data['authen']['permission']);
            if(!in_array(CMS_PATH . '/' . $this->router->fetch_class(), $permission_authen)) {
                redirect('cms/cms_authen/logout');
            }
        }
        //print_r($this->router->fetch_class()); exit;
        //$this->showProfiler();
    }

    protected function view($view, $data = null, $return = false) {
        $layout = 'cms/_cms_layout';
        $loadedData = array();
        $loadedData['content_for_layout'] = $this->load->view($view, $data, true);

        if ($return) {
            $output = $this->load->view($layout, $loadedData, true);
            return $output;
        } else {
            $this->load->view($layout, $loadedData, false);
        }
    }
    
    protected function setPageTitle($name = '') {
        $this->data['page_title'] = $name;
    }
    
    protected function setBreadcrumb($array = array()) {
        $this->data['breadcrumb'] = $array;
    }

    protected function debug($data = '') {
        if (isset($data) and $data) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            exit;
        } else {
            echo 'No data.';
            exit;
        }
    }

    protected function showProfiler() {
        $this->output->enable_profiler(TRUE);
    }

    protected function setAttributes($data, $array = '') {
        if (isset($data) and $data) {
            foreach ($data as $key => $items) {
                $attributes[$key] = $items;
            }
            if (isset($array) and $array) {
                foreach ($array as $key => $items) {
                    $attributes[$key] = $items;
                }
            }
            return $attributes;
        } else
            return false;
    }

}
