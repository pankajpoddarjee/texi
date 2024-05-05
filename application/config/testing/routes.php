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
//$route['default_controller'] = 'Auth';
$route['default_controller'] = 'Frontend';
$route['booking'] = 'Frontend/booking';
$route['thankyou'] = 'Frontend/thankyou';
/*
$route['about-us'] = 'Frontend/about_us';
$route['members'] = 'Frontend/members';
$route['projects'] = 'Frontend/projects';
$route['expeditions'] = 'Frontend/expeditions';
$route['competitions'] = 'Frontend/competitions';
$route['social-media-sharing'] = 'Frontend/content/social-media-sharing';
$route['terms-conditions'] = 'Frontend/content/terms-conditions';
$route['privacy-statement'] = 'Frontend/content/privacy-statement';
$route['policy-regulations'] = 'Frontend/content/policy-regulations';
$route['page/(:any)'] = 'Frontend/content/$1';
$route['project-details/(:any)'] = 'Frontend/project_details/$1';
$route['expeditions-details/(:any)'] = 'Frontend/expeditions_details/$1';
$route['competitions-details/(:any)'] = 'Frontend/competitions_details/$1';
$route['registration'] = 'Frontend/registration';
$route['login'] = 'Frontend/login';
$route['logout'] = 'Frontend/logout';
$route['redirect_url/(:any)'] = 'Frontend/redirect_url/$1';
$route['opportunities'] = 'Frontend/opportunities';
$route['contact-us'] = 'Frontend/contactus';
$route['user-dashboard'] = 'Frontend/user_dashboard';
$route['journal-details/(:any)'] = 'Frontend/journal_details/$1';
$route['news-portal-listing'] = 'Frontend/news_portal_listing';
$route['news-details/(:any)'] = 'Frontend/news_details/$1';
$route['member-dashboard'] = 'Frontend/member_dashboard';
$route['sumen-journal'] = 'Frontend/sumen_journal';
$route['member-personal-details'] = 'Frontend/member_personal_details';
$route['member-settings'] = 'Frontend/member_personal_settings';
$route['user-personal-details'] = 'Frontend/user_personal_details';
$route['user-settings'] = 'Frontend/user_setting_details';
*/
$route['admin'] = 'Auth';
$route['dashboard'] = 'Auth/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
