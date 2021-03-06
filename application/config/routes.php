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
$route['activate_user'] = "verifyregistration/send_email_activation_key";

$route['confirm/(:any)'] = "verifyregistration/register_confirm/$1";

$route['search'] = "search";
$route['search/(:num)'] = "search/get_items/$1";
//$route['search'] = "search/get_items/$1";
$route['item/publish'] = 'item/publish_item';
$route['item/upload'] = 'item/create_item';
$route['item/upload/(:num)'] = 'upload/upload_item_view/$1';
$route['item/message/(:num)'] = 'message/load_form/$1';
$route['item/send_message/(:num)'] = 'message/send_message_to_item/$1';
$route['item/new'] = 'item/new_item_view/$1';
$route['item/new/(:num)'] = 'item/new_item_view/$1';
//$route['item/edit/(:num)'] = 'item/edit/$1';
$route['item/upload/verify_upload/upload'] = 'upload/add_image_to_item';
$route['item/upload/verify_upload'] = 'upload/add_image_to_item';
$route['item/upload/verify_upload/(:num)'] = 'upload/add_image_to_item/$1';
$route['item/verify_upload/(:num)'] = 'upload/add_image_to_item/$1';
$route['item/verify_new'] = 'item/verify_new_item';
$route['item/edit/(:num)'] = 'item/edit_item_form/$1';
$route['item/edit_item'] = 'item/edit_published_item';
$route['item/delete/(:num)'] = 'item/delete_item/$1';
$route['item_list/batch_edit'] = 'item/batch_edit';
$route['item/search'] = "search/get_items/$1";
$route['item/search/load'] = "search/load_page";
$route['item/category/(:num)/page'] = "item/item/get_items/$1/$2";
$route['item/(:any)/search'] = "search/get_items/$1";
$route['item/(:num)/(:num)'] = "item/show_item_by_id/$1/$2";
$route['item/(:num)'] = "item/show_item_by_id/$1/$2";
$route['item/(:any)/(:num)/(:num)'] = "item/get_items/$1/$2/$3";
$route['item/(:any)'] = "item/get_items/$1";
$route['item'] = "item/index";
$route['logout'] = "login/logout";
$route['(:any)/logout'] = "login/logout";
$route['user/edit/upload/image'] = 'upload';
$route['upload/image'] = 'upload';
$route['upload/item/(:num)'] = 'upload/upload_item_view/$1';
$route['user/edit/verify'] = 'user/verify_edit_info';
$route['user/verify_upload'] = 'upload/upload_pic';
$route['user/edit/verify_upload/pic'] = 'upload/upload_pic';
$route['user/edit/pic'] = 'upload/upload_user_view';
$route['user/edit/all'] = 'user/edit_profile';
$route['user/send_message/(:any)'] = 'message/send_message_to_user/$1/$2';
$route['user/(:num)/items'] = 'item/show_user_items/$1';
$route['user/(:num)/likes'] = 'like/show_user_likes/$1';
$route['user/list'] = 'lists/get_all_list_items';
$route['user/(:num)'] = "user/get_user_info/$1";
$route['message/(:any)'] = 'message/view_message/$1/$2';
$route['starred/(:num)/(:num)'] = 'login/get_starred_items/$1/$2';
$route['starred'] = 'login/get_starred_items';
$route['like/(:num)'] = 'like/like_item/$1';
$route['user/like/(:num)'] = 'like/get_likes/$1';
$route['message/delete/(:num)'] = 'message/message_delete_by_id/$1';
 



/* End of file routes.php */
/* Location: ./application/config/routes.php */