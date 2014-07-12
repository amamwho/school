<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */

// Define Ajax Request
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

/*
  |--------------------------------------------------------------------------
  | CMS Path
  |--------------------------------------------------------------------------
  |
 */
define('CMS_PATH', 'cms');

/*
  |--------------------------------------------------------------------------
  | CMS Permission
  |--------------------------------------------------------------------------
  |
 */
$cms_permission = array(
    CMS_PATH . '/cms_banner' => 'Banner',
    CMS_PATH . '/cms_dashboard' => 'Dashboard',
    CMS_PATH . '/cms_director' => 'Director',
    CMS_PATH . '/cms_document' => 'Document',
    CMS_PATH . '/cms_event' => 'Event',
    CMS_PATH . '/cms_gallery' => 'Gallery',
    CMS_PATH . '/cms_intro' => 'Intro',
    CMS_PATH . '/cms_post' => 'Post',
    CMS_PATH . '/cms_post_category' => 'Post Category',
    CMS_PATH . '/cms_school' => 'School',
    CMS_PATH . '/cms_staff' => 'Staff',
);

define('CMS_PERMISSION', serialize($cms_permission));