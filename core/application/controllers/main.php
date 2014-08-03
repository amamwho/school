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
        
        public function eventCalendar($month = NULL) {
            //if(is_null($month))
                //$month = date('Y-m');
            $this->load->model('calendar_model');
            $event = $this->calendar_model->getCalendarByMonth($month);
            if(isset($event) and $event) {
                foreach ($event as $key => $v_event) {
                    $out[$key]['id'] = $v_event['calendar_id'];
                    $out[$key]['title'] = $v_event['title'];
                    
                    if(isset($v_event['link']) and $v_event['link']) {
                        $out[$key]['url'] = $v_event['link'];
                    }
                    
                    list($date, $time) = explode(' ', $v_event['startdate']);
                    list($y, $m, $d) = explode('-', $date);
                    list($h, $i, $s) = explode(':', $time);
                    $startdate = date('Y-m-d H:i:s', mktime($h+1, $i, $s, $m, $d, $y));
                    $out[$key]['start'] = strtotime($startdate) . '000';
                    
                    list($date, $time) = explode(' ', $v_event['enddate']);
                    list($y, $m, $d) = explode('-', $date);
                    list($h, $i, $s) = explode(':', $time);
                    $enddate = date('Y-m-d H:i:s', mktime($h+1, $i, $s, $m, $d, $y));
                    if($enddate > $startdate) {
                        $out[$key]['end'] = strtotime($enddate) .'000';
                    }
                    
                    if($startdate < date('Y-m-d H:i:s') and $enddate < date('Y-m-d H:i:s')) {
                        $out[$key]['class'] = 'event-success';
                    } else if(($startdate >= date('Y-m-d 00:00:01') and $startdate <= date('Y-m-d 23:59:59')) or ($enddate >= date('Y-m-d 00:00:01') and $enddate <= date('Y-m-d 23:59:59'))) {
                        $out[$key]['class'] = 'event-special';
                    } else if(($startdate >= date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d')-1, date('Y'))) and $startdate <= date('Y-m-d 23:59:59', mktime(0, 0, 0, date('m'), date('d')+1, date('Y')))) or ($enddate >= date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d')-1, date('Y'))) and $enddate <= date('Y-m-d 23:59:59', mktime(0, 0, 0, date('m'), date('d')+1, date('Y'))))) {
                        $out[$key]['class'] = 'event-warning';
                    }
                }
                echo json_encode(array('success' => 1, 'result' => $out));
            } else
                echo json_encode(array('success' => 1, 'result' => array()));
            exit;
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

