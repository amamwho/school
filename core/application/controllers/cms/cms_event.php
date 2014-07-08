<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include(APPPATH . "/core/base_cms.php");

class Cms_event extends Base_cms {
    
    public function __construct() {
        parent::__construct();
        $this->setPageTitle('กิจกรรม');
        $this->setBreadcrumb(array(array('name' => 'กิจกรรม', 'link' => site_url('cms/cms_event'))));
        $this->data['menu_active'] = 'event';
        
        $this->load->model('cms/calendar_model');
    }
    
    public function index() {
        $this->view('cms/event/_index', $this->data);
    }
    
    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['startdate']) and $_POST['startdate']) {
                list($date, $time) = explode(" ", $_POST['startdate']);
                list($d, $m, $y) = explode("-", $date);
                $startdate = $y.'-'.$m.'-'.$d.' '.$time.':00';
            } else 
                $startdate = '0000-00-00 00:00:00';
            
            if(isset($_POST['enddate']) and $_POST['enddate']) {
                list($date, $time) = explode(" ", $_POST['enddate']);
                list($d, $m, $y) = explode("-", $date);
                $enddate = $y.'-'.$m.'-'.$d.' '.$time.':00';
            } else 
                $enddate = '0000-00-00 00:00:00';
            $insert = array(
                'title' => $_POST['title'],
                'link' => (isset($_POST['url']) and $_POST['url']) ? (substr($_POST['url'], 0, 4) == 'http') ? $_POST['url'] : 'http://'.$_POST['url'] : '',
                'startdate' => $startdate,
                'enddate' => $enddate,
                'date_added' => date('Y-m-d H:i:s'),
            );

            if($this->calendar_model->addCalendar($insert))
                $response['success'] = 'true';
            else
                $response['success'] = 'false';
        } else
            $response['success'] = 'false';
        
        echo json_encode((object)$response);
    } 
    
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['id']) and $_POST['id']) {
            if($this->calendar_model->deleteCalendar($_POST['id']))
                $response['success'] = 'true';
            else
                $response['success'] = 'false';
        } else
            $response['success'] = 'false';
        
        echo json_encode((object)$response);
    }
    
    public function genEvent() {
        $event = $this->calendar_model->getCalendarAll();
        $json = array();
        if(isset($event) and $event) {
            foreach ($event as $value) {
                $arr['id'] = $value['calendar_id'];
                if(isset($value['title']) and $value['title'])
                    $arr['title'] = $value['title'];
                if(isset($value['link']) and $value['link'])
                    $arr['url'] = $value['link'];
                if(isset($value['startdate']) and $value['startdate'] != '0000-00-00 00:00:00')
                    $arr['start'] = $value['startdate'];
                if(isset($value['enddate']) and $value['enddate'] != '0000-00-00 00:00:00')
                    $arr['end'] = $value['enddate'];
                $arr['allDay'] = false;
                
                $json[] = $arr;
                $arr = array();
            }
        }
        
        echo json_encode($json);
    }
    
}