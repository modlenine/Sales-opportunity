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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['projectlist.html'] = 'main/projectlist_page';
$route['addproject.html'] = 'main/addproject_page';
$route['savedata.html'] = 'main/savedata';
$route['viewfulldata.html/(:any)'] = 'main/viewfulldata/$1';

$route['editproject.html/(:any)/(:any)'] = 'main/editproject/$1/$2';
$route['savedataEdit.html/(:any)/(:any)'] = 'main/savedataEdit/$1/$2';

$route['addnewjob.html/(:any)/(:any)'] = 'main/addnewjob/$1/$2';
$route['savenewjob.html/(:any)/(:any)'] = 'main/savenewjob/$1/$2';

$route['savecomment.html'] = 'main/saveComment';

$route['usersetting.html'] = 'main/usersetting';




// Customer zone
$route['cusvisit_list.html'] = 'main/customerslist';
$route['addcusvisit.html'] = 'main/addcustomervisit';
$route['savedata_cus.html'] = 'main/savedata_customervisit';
$route['cusvisitview.html/(:any)'] = 'main/viewfullCusvisit/$1';
$route['editcusvisit.html/(:any)'] = 'main/editCusvisit/$1';
$route['savedata_cusEdit.html/(:any)'] = 'main/savedata_customervisitEdit/$1';
$route['customer_print.html/(:any)'] = 'main/reportpdf/index/$1';


// Upload
$route['douploadfile.html'] = 'main/douploadfile';



// Report page
$route['report.html'] = 'main/report';
