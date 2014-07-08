<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Base_front extends CI_Controller {

	protected $layout_name = 'shopping';
	
	public function __construct() {
		parent::__construct();
                //$this->output->enable_profiler(TRUE);
	}

	protected function view($view, $data = null, $return = false) {
		$layout = 'layout/'.$this->layout_name;
		$loadedData = array();
		$loadedData['content_for_layout'] = $this->load->view($view, $data, true);
		$loadedData['category'] = $this->getCategories(0, false);
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
                return $this->load->view('frontend/' . $this->layout_name . '/header/_header_tag', $data, true);
        }
	
}
