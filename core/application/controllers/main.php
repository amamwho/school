<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include(APPPATH."/core/base_front.php");

class Main extends Base_front {

	public function __construct() {
		parent::__construct();
                
                $this->load->model('post_model');
	}

	public function index() {
                $data['post_category'] = $this->post_model->getPostCategory();
                if(isset($data['post_category']) and $data['post_category']) {
                    foreach ($data['post_category'] as $v_post_category) {
                        $data['post'][$v_post_category['post_category_id']] = $this->post_model->getPostByCategory($v_post_category['post_category_id'], 3, 0);
                    }
                }
		$this->view($this->front.'/main/_index', $data);
	}
        
        public function post() {
                $data = array();
		$this->view($this->front.'/main/_post', $data);
	}
        
        public function detail() {
                $data = array();
		$this->view($this->front.'/main/_detail', $data);
	}
        
        public function test() {
                echo $this->encrypt->encode('password');
	}

}

