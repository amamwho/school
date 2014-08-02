<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include(APPPATH."/core/base_front.php");

class Intro extends Base_front {

	public function __construct() {
		parent::__construct();
                
                $this->load->model('intro_model');
                $this->images_path_intro = $this->config->item('root_upload').$this->config->item('images_path_intro');
	}
        
        public function detail($id = '') {
                $data['intro'] = $this->intro_model->getIntroByID($id);
            
                if (empty($id) or !$data['intro'])
                    exit;
                
//                $this->debug($data['post']); exit;
                
                echo $this->load->view($this->front.'/intro/_detail', $data, true);
                exit;
        }
        
}