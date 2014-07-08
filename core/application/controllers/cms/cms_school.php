<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include(APPPATH."/core/base_cms.php");

class Cms_school extends Base_cms {

	public function __construct() {
            parent::__construct();
            $this->setPageTitle('ข้อมูลโรงเรียน');
            $this->setBreadcrumb(array(array('name' => 'ข้อมูลโรงเรียน', 'link' => site_url('cms/cms_school'))));
            $this->data['menu_active'] = 'school_detail';
            
            $this->load->model('cms/school_model');
	}

	public function index() {
            $this->data['school_data'] = $this->school_model->getSchoolDetail();
            $this->view('cms/school/_index', $this->data);
	}
        
        public function update() {
            if(isset($_POST) and $_POST) {
                if(isset($_POST['establish_date']) and $_POST['establish_date']) {
                    list($d, $m, $y) = explode('-', $this->input->post('establish_date'));
                    $_POST['establish_date'] = $y.'-'.$m.'-'.$d;
                } else {
                    $_POST['establish_date'] = '0000-00-00';
                }
                //$this->debug($_POST);
                $this->school_model->editSchool(1, $_POST);
                redirect(site_url('cms/cms_school'));
            }
            $this->data['do_action'] = 'update';
            $this->data['school_data'] = $this->school_model->getSchoolDetail();
            $this->view('cms/school/_index', $this->data);
	}

}
