<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include(APPPATH."/core/base_front.php");

class Staff extends Base_front {

	public function __construct() {
		parent::__construct();
                
                $this->load->model('staff_model');
	}
        
        public function index() {
                $data['staff_category'] = $this->staff_model->getStaffCategory();
                $this->view($this->front.'/staff/_index', $data);
        }
        
        public function category($id = '', $offset = 0) {
                if(isset($id) and is_numeric($id)) {
                        $limit = $this->config->item('pagination_limit_front');
                    
                        $data['staff_category'] = $this->staff_model->getStaffCategoryByID($id);
                        if(!$data['staff_category'])
                            redirect(base_url());
                        
                        $data['staff'] = $this->staff_model->getStaffByCategory($id, $limit, $offset);
                        
                        $config['base_url'] = base_url() . 'staff/category/' . $id;
                        $config['uri_segment'] = 4;
                        $config['num_links'] = $this->config->item('pagination_num_links_front');
                        $config['total_rows'] = $this->staff_model->getCountStaffByCategory($id);
                        $config['per_page'] = $limit;
                        $config['cur_page'] = $offset + 1;
                        $this->pagination->initialize($config);
                        $this->view($this->front.'/staff/_category', $data);
                } else {
                    redirect(base_url());
                }
        }
        
        public function profile($id = '') {
                if(isset($id) and is_numeric($id)) {
                        $data['staff'] = $this->staff_model->getStaffByID($id);
                        if(!$data['staff'])
                            redirect(base_url());
                        
                        $this->view($this->front.'/staff/_profile', $data);
                } else {
                    redirect(base_url());
                }
        }
        
}
