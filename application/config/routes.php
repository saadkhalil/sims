<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// --Admin Routes--//

$route['admin'] = 'admin/admin';
$route['admin/login'] = 'admin/admin/login';
$route['admin/dashboard'] = 'admin/admin/dashboard';
$route['admin/monthservice'] = 'admin/admin/monthservice';
$route['admin/login_submit'] = 'admin/admin/submit';
$route['admin/logout'] = 'admin/admin/logout';
$route['admin/(:any)'] = 'admin/$1';
$route['admin/customer_vehicles/index/(:any)'] = 'admin/customer_vehicles/index/$1';
$route['admin/(:any)/edit/(:any)'] = 'admin/$1/edit/$2';
$route['admin/(:any)/detail/(:any)'] = 'admin/$1/detail/$2';
// $route['admin/(:any)/view/(:any)'] = 'admin/$1/view/$2';
$route['admin/(:any)/submit'] = 'admin/$1/submitadd';
$route['admin/(:any)/allsubmit'] = 'admin/$1/allsubmit';
$route['admin/(:any)/delete'] = 'admin/$1/submitdel';
$route['admin/(:any)/update'] = 'admin/$1/submitedit';
$route['admin/(:any)/closedetails'] = 'admin/$1/closedetails';
$route['admin/(:any)/closesubmit'] = 'admin/$1/closesubmit';
$route['admin/(:any)/updatecustomer'] = 'admin/$1/submitcustedit';

$route['admin/job_card/search'] = 'admin/job_card/search';
$route['admin/job_card/filter'] = 'admin/job_card/filter';


//--!Admin Routes!--//
