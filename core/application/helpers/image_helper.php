<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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

if (!function_exists('getSideBannerImage')) {
	function getSideBannerImage($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_upload').$ci->config->item('images_path_banner');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'assets/front/basic/images/sidebanner.png';
	}
}

if (!function_exists('getDirectorThumb')) {
	function getDirectorThumb($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_upload').$ci->config->item('images_path_director');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'assets/front/basic/images/profilethumb.png';
	}
}

if (!function_exists('getDirectorImage')) {
	function getDirectorImage($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_upload').$ci->config->item('images_path_director');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'assets/front/basic/images/profile.png';
	}
}

if (!function_exists('getStaffThumb')) {
	function getStaffThumb($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_upload').$ci->config->item('images_path_staff');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'assets/front/basic/images/profilethumb.png';
	}
}

if (!function_exists('getStaffImage')) {
	function getStaffImage($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_upload').$ci->config->item('images_path_staff');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'assets/front/basic/images/profile.png';
	}
}

if (!function_exists('getPostThumb')) {
	function getPostThumb($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_upload').$ci->config->item('images_path_post');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'assets/front/basic/images/postthumb.png';
	}
}

if (!function_exists('getPostImage')) {
	function getPostImage($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_upload').$ci->config->item('images_path_post');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'assets/front/basic/images/image.png';
	}
}

if (!function_exists('getGalleryThumb')) {
	function getGalleryThumb($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_upload').$ci->config->item('images_path_gallery');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'assets/front/basic/images/postthumb.png';
	}
}

if (!function_exists('getGalleryImage')) {
	function getGalleryImage($file) {
		$ci =& get_instance();
		$path = $ci->config->item('root_upload').$ci->config->item('images_path_gallery');
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return $full_path;
		else
			return 'assets/front/basic/images/image.png';
	}
}