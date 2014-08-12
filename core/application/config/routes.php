<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "main";
$route['404_override'] = '';

$route['loadFile/(:any)'] = "document/loadFile/$1";

$route['cms'] = "cms/cms_dashboard";
$route['cms/cms_document/download'] = "cms/cms_document/index/D";
$route['cms/cms_document/download/(:num)'] = "cms/cms_document/index/D/$1";
$route['cms/cms_document/inside'] = "cms/cms_document/index/I";
$route['cms/cms_document/inside/(:num)'] = "cms/cms_document/index/I/$1";
$route['cms/cms_document/insertDownload'] = "cms/cms_document/insert/D";
$route['cms/cms_document/insertInside'] = "cms/cms_document/insert/I";
$route['cms/cms_document/updateDownload/(:num)'] = "cms/cms_document/update/D/$1";
$route['cms/cms_document/updateInside/(:num)'] = "cms/cms_document/update/I/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */