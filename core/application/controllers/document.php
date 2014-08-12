<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include(APPPATH."/core/base_front.php");

class Document extends Base_front {

	public function __construct() {
		parent::__construct();
                
                $this->load->model('document_model');
	}
        
        public function general() {
                $data['type'] = 'เอกสารดาวน์โหลด';
                $data['document_by_type'] = $this->document_model->getDocumentByType('D');
                $this->view($this->front.'/document/_list', $data);
        }

	public function inside() {
                $data['type'] = 'เอกสารภายใน';
                $data['document_by_type'] = $this->document_model->getDocumentByType('I');
                $this->load->model('cms/constants_model');
                $data['document_category'] = $this->constants_model->getByType('insidedoc');
                if(isset($data['document_category']) and $data['document_category']) {
                    foreach ($data['document_category'] as $k_document_category => $v_document_category) {
                        $data['document_by_cate'][$v_document_category['key']] = $this->document_model->getDocumentByCategory($v_document_category['key']);
                    }
                }
		$this->view($this->front.'/document/_list', $data);
	}
        
        public function loadFile($raw = '') {
                $this->load->helper('download');
                $document_path_file = $this->config->item('root_upload').$this->config->item('document_path_file');
                $data['document'] = $this->document_model->getDocumentDetailByRaw($raw);
                if(isset($data['document']) and $data['document']) {
                    if(isset($data['document']['password']) and $data['document']['password']) {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if(isset($_POST['password']) and $_POST['password']) {
                                if($this->encrypt->decode($data['document']['password']) == $_POST['password']) {
                                    $file = file_get_contents($document_path_file.$data['document']['file']);
                                    force_download($data['document']['original_filename'], $file);
                                } else {
                                    $data['error'] = 2;//พาสเวิสผิด
                                    $this->view($this->front.'/document/_inputpass', $data);
                                }
                            } else {
                                $data['error'] = 1;//ไม่มีพาสเวิส
                                $this->view($this->front.'/document/_inputpass', $data);
                            }
                        } else {
                            $this->view($this->front.'/document/_inputpass', $data);
                        }
                    } else {
                        $file = file_get_contents($document_path_file.$data['document']['file']);
                        force_download($data['document']['original_filename'], $file);
                    }
                } else
                    redirect(base_url());
        }
        
}