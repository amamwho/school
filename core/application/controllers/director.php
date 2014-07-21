<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include(APPPATH."/core/base_front.php");

class Director extends Base_front {

	public function __construct() {
		parent::__construct();
	}
        
        public function index($offset = 0) {
                $limit = $this->config->item('pagination_limit_front');
                    
                $data['director'] = $this->director_model->getDirectorAll($limit, $offset);

                $config['base_url'] = base_url() . 'director/index/';
                $config['uri_segment'] = 4;
                $config['num_links'] = $this->config->item('pagination_num_links_front');
                $config['total_rows'] = $this->director_model->getCountDirectorAll();
                $config['per_page'] = $limit;
                $config['cur_page'] = $offset + 1;
                $this->pagination->initialize($config);
                $this->view($this->front.'/director/_index', $data);
        }
        
        public function profile($id = '') {
                if(isset($id) and is_numeric($id)) {
                        $data['director'] = $this->director_model->getDirectorByID($id);
                        if(!$data['director'])
                            redirect(base_url());
                        
                        $this->view($this->front.'/director/_profile', $data);
                } else {
                    redirect(base_url());
                }
        }
        
}