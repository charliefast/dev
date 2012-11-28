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

$route['default_controller'] = "login";
$route['404_override'] = 'errors/page_missing';

$route['register'] = "verifyregistration";
$route['verify'] = "verifyregistration/register";
$route['verifylogin'] = "verifylogin";

$route['confirm/(:any)'] = "verifyregistration/register_confirm/$1";

$route['search'] = "search";
$route['search/(:any)'] = "search/get_items/$1";
//$route['search'] = "search/get_items/$1";
$route['item/search'] = "search/get_items/$1";
$route['item/(:any)/search'] = "search/get_items/$1";
$route['item/(:any)'] = "item/get_items/$1";
$route['item'] = "item/get_items/$1";
$route['logout'] = "login/logout";
$route['(:any)/logout'] = "login/logout";
$route['user/edit/upload/image'] = 'upload';
$route['upload/image'] = 'upload';
$route['user/edit/verify'] = 'user/verify_edit_info';
$route['user/edit'] = 'user/edit_info/$1';
$route['user/edit/(:any)'] = 'user/edit_info/$1';
$route['user/(:any)'] = "user/get_user_info/$1";
$route['user/send_message/(:any)'] = 'user/send_message/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */