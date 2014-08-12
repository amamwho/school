<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include(APPPATH."/core/base_front.php");

class Post extends Base_front {

	public function __construct() {
		parent::__construct();
                
                $this->load->model('post_model');
                $this->load->model('gallery_model');
                
                $this->vdo_path = $this->config->item('root_upload').$this->config->item('vdo_path');
	}
        
        public function detail($id = '') {
                $data['post'] = $this->post_model->getPostByID($id);
                $data['gallery'] = $this->gallery_model->getGalleryByPostID($id);
            
                if (empty($id) or !$data['post'])
                    redirect(base_url());
                
                $data['title'] = $data['post']['meta_title'];
                $data['description'] = $data['post']['meta_desc'];
                
                $this->view($this->front.'/post/_detail', $data);
        }
        
        public function page($id = '') {
                $data['post'] = $this->post_model->getPageByID($id);
                $data['gallery'] = $this->gallery_model->getGalleryByPostID($id);
            
                if (empty($id) or !$data['post'])
                    redirect(base_url());
                
                $data['title'] = $data['post']['meta_title'];
                $data['description'] = $data['post']['meta_desc'];
                
                $this->view($this->front.'/post/_detail', $data);
        }
        
        public function category($id = '', $offset = 0) {
                if(isset($id) and is_numeric($id)) {
                        $limit = $this->config->item('pagination_limit_front');
                    
                        $data['post_category'] = $this->post_model->getPostCategoryByID($id);
                        if(!$data['post_category'])
                            redirect(base_url());
                        
                        $data['post'] = $this->post_model->getPostByCategory($id, $limit, $offset);
                        
                        $config['base_url'] = base_url() . 'post/category/' . $id;
                        $config['uri_segment'] = 4;
                        $config['num_links'] = $this->config->item('pagination_num_links_front');
                        $config['total_rows'] = $this->post_model->getCountPostByCategory($id);
                        $config['per_page'] = $limit;
                        $config['cur_page'] = $offset + 1;
                        $this->pagination->initialize($config);
                        $this->view($this->front.'/post/_category', $data);
                } else {
                    redirect(base_url());
                }
        }
        
}