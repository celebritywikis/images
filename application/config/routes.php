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
$route['default_controller'] = 'front';

$route['sitemap\.xml'] = 'Sitemap/index';
$route['sitemap/articleslist\.xml'] = 'Sitemap/articleslist';
$route['sitemap/imageslist\.xml'] = 'Sitemap/imageslist';
$route['sitemap/articles\.xml'] = 'Sitemap/articles';
$route['sitemap/images\.xml'] = 'Sitemap/images';


$route['logout'] = 'Snmy/logout';
$route['Snmy/user_login'] = 'Snmy/user_login';
$route['Snmy/logout'] = 'Snmy/logout';
$route['Snmy/(:any)/(:any)'] = '/$1/$2';

$route['Userscheck/(:any)'] = 'Userscheck/$1';
$route['Userscheck/(:any)/(:any)'] = 'Userscheck/$1/$2';

$route['Dashboard/(:any)'] = 'Dashboard/$1';

$route['Subcategory/(:any)'] = 'Subcategory/$1';
$route['Subcategory/(:any)/(:any)'] = 'Subcategory/$1/$2';

$route['Adscheck/(:any)'] = 'Adscheck/$1';
$route['Adscheck/(:any)/(:any)'] = 'Adscheck/$1/$2';

$route['Categories/(:any)'] = 'Categories/$1';
$route['Categories/(:any)/(:any)'] = 'Categories/$1/$2';


$route['Articlecheck/(:any)'] = 'Articlecheck/$1';
$route['Articlecheck/(:any)/(:any)'] = 'Articlecheck/$1/$2';

$route['(:any)/(:any)'] = 'front/celebrities/$1/$2';
$route['(:any)/(:any)/(:any)'] = 'front/photos/$1/$2/$3';

$route['aboutus'] = 'front/aboutus';
$route['policy'] = 'front/policy';
$route['disclaimer'] = 'front/disclaimer';
$route['contactus'] = 'front/contactus';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
