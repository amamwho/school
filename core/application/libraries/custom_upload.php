<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class custom_upload {

    var $obj;
    var $config;

    function Custom_Upload($array = array()) {
        $this->obj = & get_instance();
        $this->config['upload_path'] = (array_key_exists('upload_path', $array)) ? $array['upload_path'] : './uploads/';
        $this->config['allowed_types'] = (array_key_exists('allowed_types', $array)) ? $array['allowed_types'] : 'gif|jpg|png';
        $this->config['max_size'] = (array_key_exists('max_size', $array)) ? $array['max_size'] : '3000';
        $this->config['max_width'] = (array_key_exists('max_width', $array)) ? $array['max_width'] : '1024';
        $this->config['max_height'] = (array_key_exists('max_height', $array)) ? $array['max_height'] : '1024';
        $this->config['thumb_width'] = (array_key_exists('thumb_width', $array)) ? $array['thumb_width'] : '200';
        $this->config['thumb_height'] = (array_key_exists('thumb_height', $array)) ? $array['thumb_height'] : '150';
    }
    
    function setConfig($array = array()) {
        if(isset($array) and $array) {
            foreach ($array as $key => $value) {
                $this->config[$key] = $value;
            }
        }
    }

    function uploadFile($input, $new_filename = '') {
        if ($new_filename)
            $this->config['file_name'] = $new_filename;
        $this->config['allowed_types'] = 'doc|docx|dot|dotx|xls|xlsx|pdf|ppt|rar|zip';
        $this->config['max_size'] = '500000';
        $this->obj->load->library('upload');
        $this->obj->upload->initialize($this->config);
        if (!$this->obj->upload->do_upload($input)) {
            return array($this->obj->upload->display_errors());
        } else {
            $data = $this->obj->upload->data();
            return $data;
        }
    }
    
    function uploadVDO($input, $new_filename = '') {
        if ($new_filename)
            $this->config['file_name'] = $new_filename;
        $this->config['allowed_types'] = 'mp4|flv|mp3|wmv';
        $this->config['max_size'] = '100000';
        $this->obj->load->library('upload');
        $this->obj->upload->initialize($this->config);
        if (!$this->obj->upload->do_upload($input)) {
            return array($this->obj->upload->display_errors());
        } else {
            $data = $this->obj->upload->data();
            return $data;
        }
    }

    function uploadImage($input, $thumb = false, $new_filename = '', $dimension = false, $canvasW = 150, $canvasH = 150) {
        if ($new_filename)
            $this->config['file_name'] = $new_filename;
        $this->obj->load->library('upload');
        $this->obj->upload->initialize($this->config);
        if (!$this->obj->upload->do_upload($input)) {
            return array($this->obj->upload->display_errors());
        } else {
            $data = $this->obj->upload->data();
            if ($dimension) {
                $thumb_name = 'thumb/' . $data['raw_name'] . '_thumb';
                $data['thumb_name'] = $this->uploadImageResize($this->config['upload_path'] . $data['orig_name'], $this->config['upload_path'], $canvasW, $canvasH, $thumb_name);
            } else {
                if ($thumb) {
                    $thumb_name = 'thumb/' . $data['raw_name'] . '_thumb' . $data['file_ext'];
                    $config['source_image'] = $this->config['upload_path'] . $data['orig_name'];
                    $config['new_image'] = $this->config['upload_path'] . $thumb_name;
                    $config['width'] = $this->config['thumb_width'];
                    $config['height'] = $this->config['thumb_height'];
                    $this->obj->load->library('image_lib', $config);
                    $this->obj->image_lib->resize();
                    $data['thumb_name'] = $thumb_name;
                }
            }
            return $data;
        }
    }

    function uploadImageResize($source_image, $path, $canvasW = 150, $canvasH = 150, $set_name = NULL) {
        if (isset($source_image)) {
            list($name, $extension) = explode('.', $source_image);
            $extension = strtolower($extension);
            if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
                echo ' Unknown Image extension ';
                $errors = 1;
            } else {

                $size = filesize($source_image);

                //if ($size > MAX_SIZE*1024){
                //echo "You have exceeded the size limit";
                //$errors=1;
                //}

                if ($extension == "jpg" || $extension == "jpeg") {
                    $uploadedfile = $source_image;
                    $src = imagecreatefromjpeg($uploadedfile);
                } else if ($extension == "png") {
                    $uploadedfile = $source_image;
                    $src = imagecreatefrompng($uploadedfile);
                } else {
                    $uploadedfile = $source_image;
                    $src = imagecreatefromgif($uploadedfile);
                }

                list($width, $height) = getimagesize($uploadedfile);

                $newwidth = $canvasW;
                $newheight = ($height / $width) * $newwidth;

                // IF THE PROPOTIONS ARE WRONG

                if ($newheight > $canvasH) {

                    $newheight = $canvasH;
                    $newwidth = ($width / $height) * $newheight;
                }

                $offsetX = intval(($canvasW - $newwidth) / 2);
                $offsetY = intval(($canvasH - $newheight) / 2);

                $tmp = imagecreatetruecolor($canvasW, $canvasH);

                $white = imagecolorallocate($tmp, 255, 255, 255);
                imagefilledrectangle($tmp, 0, 0, $canvasW, $canvasH, $white);

                // imagecopyresampled ( resource $dst_image , resource $src_image , 
                // int $dst_x , int $dst_y , 
                // int $src_x , int $src_y , 
                // int $dst_w , int $dst_h , int $src_w , int $src_h )

                imagecopyresampled($tmp, $src, $offsetX, $offsetY, 0, 0, $newwidth, $newheight, $width, $height);

                if (!is_null($set_name))
                    $name = $set_name . '.' . $extension;
                else
                    $name = $name . '.' . $extension;

                $imgPath = $path . $name;

                imagejpeg($tmp, $imgPath, 100);

                imagedestroy($src);
                imagedestroy($tmp);

                return $name;
            } // END if $extention
        } else
            return false; // END LOGO
    }

}
