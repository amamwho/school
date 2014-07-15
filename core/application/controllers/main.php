<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include(APPPATH."/core/base_front.php");

class Main extends Base_front {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
                $data['header'] = $this->getHeaderTag();
                //$this->debug($data);
		$this->view($this->front.'/main/_index', $data);
	}
        
        public function post() {
                $data['header'] = $this->getHeaderTag();
                //$this->debug($data);
		$this->view($this->front.'/main/_post', $data);
	}

}

