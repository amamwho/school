-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `school`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `banner`
-- 

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL auto_increment,
  `banner_category_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumb` varchar(255) default NULL,
  `image` varchar(255) default NULL,
  `link` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL default '0',
  `status` smallint(1) NOT NULL default '0',
  `date_added` datetime NOT NULL default '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- dump ตาราง `banner`
-- 

INSERT INTO `banner` VALUES (1, 2, 'Banner2', 'Desc2', 'Desc2', 'thumb/53929dcbacd34_thumb.jpg', '53929dcbacd34.jpg', 'link2', 1, 1, '2014-06-01 04:47:15', '2014-06-07 13:06:19');
INSERT INTO `banner` VALUES (2, 1, 'Banner1', 'Desc1', 'Desc1', 'thumb/538ab821767bc_thumb.jpg', '538ab821767bc.jpg', 'link1', 2, 0, '2014-06-01 13:20:33', '0000-00-00 00:00:00');
INSERT INTO `banner` VALUES (3, 3, 'Banner3', 'Desc3', 'Desc3', 'thumb/538ab87e2a4c0_thumb.jpg', '538ab87e2a4c0.jpg', 'link3', 3, 0, '2014-06-01 13:22:06', '0000-00-00 00:00:00');
INSERT INTO `banner` VALUES (6, 4, 'Banner4', 'Desc4', 'Desc4', 'thumb/53929dfbe8a25_thumb.jpg', '53929dfbe8a25.jpg', 'link4', 0, 0, '2014-06-07 13:07:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `banner_category`
-- 

CREATE TABLE `banner_category` (
  `banner_category_id` int(11) NOT NULL auto_increment,
  `cate_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`banner_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `banner_category`
-- 

INSERT INTO `banner_category` VALUES (1, 'Banner ด้านซ้าย');
INSERT INTO `banner_category` VALUES (2, 'Banner ด้านขวา');
INSERT INTO `banner_category` VALUES (3, 'Banner ด้านบน');
INSERT INTO `banner_category` VALUES (4, 'Banner ด้านล่าง');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `director`
-- 

CREATE TABLE `director` (
  `director_id` int(10) NOT NULL auto_increment,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `begindate` date NOT NULL default '0000-00-00',
  `enddate` date NOT NULL default '0000-00-00',
  `birthday` date NOT NULL default '0000-00-00',
  `address` text NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `udate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`director_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `director`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `gallery`
-- 

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL auto_increment,
  `post_id` int(11) NOT NULL default '0',
  `thumb` varchar(255) default NULL,
  `image` varchar(255) default NULL,
  PRIMARY KEY  (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- dump ตาราง `gallery`
-- 

INSERT INTO `gallery` VALUES (4, 7, 'thumb/5399c5cfac787_thumb.jpg', '5399c5cfac787.jpg');
INSERT INTO `gallery` VALUES (5, 7, 'thumb/5399c5cfb0115_thumb.jpg', '5399c5cfb0115.jpg');
INSERT INTO `gallery` VALUES (6, 7, 'thumb/5399c5cfb751f_thumb.jpg', '5399c5cfb751f.jpg');
INSERT INTO `gallery` VALUES (7, 7, 'thumb/5399c5cfcc43f_thumb.jpg', '5399c5cfcc43f.jpg');
INSERT INTO `gallery` VALUES (8, 7, 'thumb/5399c5cfd147e_thumb.jpg', '5399c5cfd147e.jpg');
INSERT INTO `gallery` VALUES (10, 7, 'thumb/5399da2608a95_thumb.jpg', '5399da2608a95.jpg');
INSERT INTO `gallery` VALUES (11, 7, 'thumb/5399da260ac85_thumb.jpg', '5399da260ac85.jpg');
INSERT INTO `gallery` VALUES (12, 7, 'thumb/5399da260f450_thumb.jpg', '5399da260f450.jpg');
INSERT INTO `gallery` VALUES (13, 7, 'thumb/5399db81eeea5_thumb.jpg', '5399db81eeea5.jpg');
INSERT INTO `gallery` VALUES (14, 7, 'thumb/5399db81f0542_thumb.jpg', '5399db81f0542.jpg');
INSERT INTO `gallery` VALUES (15, 7, 'thumb/5399db81f2eb9_thumb.jpg', '5399db81f2eb9.jpg');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `posts`
-- 

CREATE TABLE `posts` (
  `post_id` bigint(20) unsigned NOT NULL auto_increment,
  `author` bigint(20) unsigned NOT NULL default '0',
  `title` text NOT NULL,
  `meta_title` text NOT NULL,
  `content` longtext NOT NULL,
  `meta_desc` text NOT NULL,
  `thumb` varchar(255) default NULL,
  `image` varchar(255) default NULL,
  `vdo` text NOT NULL,
  `vdo_type` enum('F','E') NOT NULL COMMENT 'F=File, E=Embed',
  `excerpt` text NOT NULL,
  `post_category_id` int(11) NOT NULL default '0',
  `sort_order` int(11) NOT NULL default '0',
  `status` smallint(1) NOT NULL default '0',
  `menu_order` int(11) NOT NULL default '0',
  `type` varchar(20) NOT NULL default 'post',
  `post_parent` bigint(20) unsigned NOT NULL default '0',
  `date_added` datetime NOT NULL default '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `comment_status` smallint(1) NOT NULL default '0',
  `comment_count` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`post_id`),
  KEY `post_parent` (`post_parent`),
  KEY `author` (`author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- dump ตาราง `posts`
-- 

INSERT INTO `posts` VALUES (7, 0, 'Post4', '', '<p>Post4</p>\r\n', '', 'thumb/5393feb5c395a_thumb.png', '5393feb5c395a.png', '<iframe width="560" height="315" src="//www.youtube.com/embed/3ZNmY_Dzjkc" frameborder="0" allowfullscreen></iframe>', 'E', '', 0, 0, 0, 0, 'post', 0, '2014-06-08 14:28:49', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `posts` VALUES (2, 0, 'Post2', '', '<p>Post2</p>\r\n', '', NULL, NULL, '<iframe width="560" height="315" src="//www.youtube.com/embed/3ZNmY_Dzjkc" frameborder="0" allowfullscreen></iframe>', 'E', '', 0, 0, 0, 0, 'post', 0, '2014-06-08 11:55:01', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `posts` VALUES (5, 0, 'Post1', '', '<p>Post1</p>\r\n', '', 'thumb/5393faf4134fb_thumb.png', '5393faf4134fb.png', '', '', '', 0, 0, 0, 0, 'posts', 0, '2014-06-08 13:56:04', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `posts` VALUES (6, 0, 'Post3', '', '<p>Post3</p>\r\n', '', NULL, NULL, '5393fb0cb8504.flv', 'F', '', 0, 0, 0, 0, 'posts', 0, '2014-06-08 13:56:28', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `school_info`
-- 

CREATE TABLE `school_info` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(25) NOT NULL,
  `name_th` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `be_under` varchar(255) NOT NULL,
  `area_no` mediumint(2) NOT NULL default '0',
  `level` varchar(255) NOT NULL,
  `establish_date` date NOT NULL default '0000-00-00',
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(10) NOT NULL,
  `postcode` varchar(5) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `director_teacher` varchar(255) NOT NULL,
  `director_phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `meta_title` text NOT NULL,
  `desc` text NOT NULL,
  `meta_desc` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `school_info`
-- 

INSERT INTO `school_info` VALUES (1, '123456', 'peng peng', 'peng peng', '', 0, '', '2014-06-07', '', '', 'จอมทอง', 'กรุงเทพมหา', '10150', '66831391397', '', '', '66831391397', 'peng_rb_116@hotmail.com', '', '', '', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `staff`
-- 

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL auto_increment,
  `staff_category_id` int(11) NOT NULL default '0',
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` enum('M','F') default NULL,
  PRIMARY KEY  (`staff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `staff`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `staff_catygory`
-- 

CREATE TABLE `staff_catygory` (
  `staff_catygory_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`staff_catygory_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `staff_catygory`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `user`
-- 

CREATE TABLE `user` (
  `id` int(10) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `encry_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL default '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `user`
-- 

