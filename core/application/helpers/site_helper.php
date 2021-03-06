<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('multiArraySearch')) {
    function multi_array_search($array, $search) {
        // Create the result array
        $result = array();
        // Iterate over each array element
        foreach ($array as $key => $value) {
            // Iterate over each search condition
            foreach ($search as $k => $v) {
                // If the array element does not meet the search condition then continue to the next element
                if (!isset($value[$k]) || $value[$k] != $v) {
                    continue 2;
                }
            }
            // Add the array element's key to the result array
            $result = $array[$key];
        }
        // Return the result array
        return $result;
    }

}

if (!function_exists('addhttp')) {
    function addhttp($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }
}

if (!function_exists('cutCaption')) {
    function cutCaption($str, $leng = 200) {
        if(strlen($str) > $leng)
            return mb_substr($str, 0, $leng, 'UTF-8') . '...';
        else
            return $str;
    }
}

if (!function_exists('stripHTMLTags')) {
    function stripHTMLTags($html) {
        return strip_tags($html);
    }
}
