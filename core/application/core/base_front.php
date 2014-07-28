<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Base_front extends CI_Controller {

	protected $layout_name = 'basic';
        protected $front = 'front/';
        
	public function __construct() {
		parent::__construct();
                $this->front .= $this->layout_name;
                //$this->output->enable_profiler(TRUE);
                
                $this->load->model('banner_model');
                $this->load->model('director_model');
                
                $this->images_path_banner = $this->config->item('root_upload').$this->config->item('images_path_banner');
                $this->images_path_director = $this->config->item('root_upload').$this->config->item('images_path_director');
                $this->images_path_staff = $this->config->item('root_upload').$this->config->item('images_path_staff');
                $this->images_path_post = $this->config->item('root_upload').$this->config->item('images_path_post');
                $this->vdo_path = $this->config->item('root_upload').$this->config->item('vdo_path');
	}

	protected function view($view, $data = null, $return = false) {
		$layout = 'layout/'.$this->layout_name;
		$loadedData = array();
                $loadedData['header'] = $this->load->view('front/' . $this->layout_name . '/header/_header_tag', $data, true);
                $loadedData['main_banner'] = $this->banner_model->getBannerByCategory(1);
                $loadedData['left_banner'] = $this->banner_model->getBannerByCategory(2);
                $loadedData['latest_director'] = $this->director_model->getLatestDirector();
		$loadedData['content_for_layout'] = $this->load->view($view, $data, true);
		if ($return) {
			$output = $this->load->view($layout, $loadedData, true);
			return $output;
		} else {
			$this->load->view($layout, $loadedData, false);
		}
	}

	protected function debug($data = '') {
		if (isset($data) and $data) {
			echo '<pre>';
			print_r($data);
			echo '</pre>';
		} else {
			echo 'No data.';
		}
		$this->output->enable_profiler(TRUE);
		exit;
	}

	protected function setPagination($url, $total, $limit, $offset) {
		if ((isset($url) and $url) and (isset($total) and $total) and (isset($limit) and $limit) and (isset($offset) and $offset)) {
			$config['base_url'] = $url;
			$config['uri_segment'] = 3;
			$config['total_rows'] = $total;
			$config['per_page'] = $limit;
			$config['cur_page'] = $offset;
			$this->pagination->initialize($config);
		}
	}
	
        protected function getHeaderTag($data = '') {
                return $this->load->view('front/' . $this->layout_name . '/header/_header_tag', $data, true);
        }
	
}
