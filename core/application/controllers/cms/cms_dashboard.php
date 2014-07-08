<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include(APPPATH."/core/base_cms.php");

class Cms_dashboard extends Base_cms {

	public function __construct() {
		parent::__construct();
                $this->setPageTitle('Dashboard');
                $this->setBreadcrumb(array(array('name' => 'Dashboard', 'link' => site_url('cms/cms_dashboard'))));
                $this->data['menu_active'] = 'dashboard';
	}

	public function index() {
            $this->view('cms/dashboard/_dashboard', $this->data);
	}

}
