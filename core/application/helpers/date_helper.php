<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getDateFromDateTime')) {
	function getDateFromDateTime($datetime) {
		list($date, $time) = explode(' ', $datetime);
                return $date;
	}
}

if (!function_exists('getTimeFromDateTime')) {
	function getTimeFromDateTime($datetime) {
		list($date, $time) = explode(' ', $datetime);
                return $time;
	}
}

if (!function_exists('dateTHFormat')) {
	function dateTHFormat($date, $f = 'full') {
                $month_full = array('01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม');
                $month_short = array('01' => 'ม.ค.', '02' => 'ก.พ.', '03' => 'มี.ค.', '04' => 'เม.ย.', '05' => 'พ.ค.', '06' => 'มิ.ย.', '07' => 'ก.ค.', '08' => 'ส.ค.', '09' => 'ก.ย.', '10' => 'ต.ค.', '11' => 'พ.ย.', '12' => 'ธ.ค.');
		list($y, $m, $d) = explode('-', $date);
                if($f == 'full') {
                    return $d.' '.$month_full[$m].' '.($y + 543);
                } else {
                    return $d.' '.$month_short[$m].' '.($y + 543);
                }
	}
}