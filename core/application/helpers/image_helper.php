<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getProductImage')) {
	function getProductImage($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_images').$ci->config->item('images_path_product');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'asset/front/shopping/images/mainimg.png';
	}
}

if (!function_exists('getCategoryImage')) {
	function getCategoryImage($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_images').$ci->config->item('images_path_category');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'asset/front/shopping/images/mainimg.png';
	}
}

if (!function_exists('getGalleryImage')) {
	function getGalleryImage($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_images').$ci->config->item('images_path_product_gallery');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'asset/front/shopping/images/mainimg.png';
	}
}

if (!function_exists('getBannerImage')) {
	function getBannerImage($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_images').$ci->config->item('images_path_banner');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'asset/front/shopping/images/mainimg.png';
	}
}
	
if (!function_exists('getImagePath')) {
	function getImagePath($file) {
		if (isset($file) and is_file($file))
			return $file;
		else
			return 'asset/front/shopping/images/mainimg.png';
	}
}

if (!function_exists('delete_file')) {
	function delete_file($file) {
		if (isset($file) and file_exists($file) and is_file($file)) {
			if (unlink($file))
				return true;
			else
				return false;
		} else
			return false;
	}
}
