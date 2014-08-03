<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include(APPPATH."/core/base_front.php");

class Post extends Base_front {

	public function __construct() {
		parent::__construct();
                
                $this->load->model('post_model');
                $this->load->model('gallery_model');
	}
        
        public function detail($id = '') {
                $data['post'] = $this->post_model->getPostfByID($id);
                $data['gallery'] = $this->gallery_model->getGalleryByPostID($id);
            
                if (empty($id) or !$data['post'])
                    redirect(base_url());
                
//                $this->debug($data['post']); exit;
                
                $this->view($this->front.'/post/_detail', $data);
        }
        
}