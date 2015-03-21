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

$route['default_controller'] = "home";
$route['404_override'] = '';

// Ajax
$route['chat/chat_login/(:any)'] = 'chat/chat_login/$1';
$route['chat/chat_logout/(:any)'] = 'chat/chat_logout/$1';


$route['admin'] = 'admin';
$route['home/do_search'] = 'home/do_search';
// $route['main'] = 'room/main/$1';
$route['(:any)/shows'] = 'room/shows/$1';
$route['(:any)/upload'] = 'room/upload/$1';
$route['(:any)/upload_view'] = 'room/upload_view/$1';
$route['(:any)/host'] = 'room/host/$1';
$route['(:any)/master'] = 'room/master/$1';
$route['(:any)/new'] = 'create/make_room/$1';
$route['(:any)/start'] = 'create/start/$1';
$route['(:any)/login'] = 'login/admin/$1';
$route['(:any)/logout'] = 'login/logout/$1';
$route['(:any)/verifylogin'] = 'login/verifylogin/$1';

$route['(:any)/(:any)'] = 'home/not_found';
$route['(:any)'] = 'room/view/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */