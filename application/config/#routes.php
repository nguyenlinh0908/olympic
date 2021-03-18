<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	  = 'Chome';
$route['404_override'] 			  = '';
$route['translate_uri_dashes'] 	  = FALSE;
$route['add-admin'] 			  = 'Caccount/add';
$route['admin/list-admin'] 		  = 'admin/Caccount/index';
$route['admin/edit-admin/(:num)'] = 'admin/Caccount/edit/$1';
$route['admindangnhap'] 		  = 'admin/login';


$route['baiviet/(:num)'] 		  = 'Cbaiviet/index/$1';