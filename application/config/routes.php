<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	  = 'Chome';
$route['404_override'] 			  = '';
$route['translate_uri_dashes'] 	  = FALSE;
$route['add-admin'] 			  = 'Caccount/add';
$route['admin/list-admin'] 		  = 'admin/Caccount/index';
$route['admin/edit-admin/(:num)'] = 'admin/Caccount/edit/$1';
// $route['admindangnhap'] 		  = 'admin/login';
// $route['gioithieu']               ='Chome/gioithieu';
$route['trangchu']                = 'Chome';
$route['gioithieu']               ='Chome/gioithieu';
$route['tochuc']                  ='Chome/tochuc';
$route['ontap']                   ='Chome/ontap';
$route['album']                   ='Chome/album';
$route['dvdangcai']               ='Chome/dvdangcai';
$route['danhsach']                ='Chome/danhsach';
$route['dangky']                  ='Cform';
$route['thongbao']                = 'Chome/thongbao';

$route['dangnhap']                = 'Clogin';
$route['admindanhsach']           = 'Clist';
$route['doimatkhau']              = 'Clogin/changepass';
$route['admindangky']             = 'Cform';
$route['login']                   = 'admin/login';
$route['adminbaiviet']            = 'admin/Cbaiviet';
$route['thembaiviet']             = 'admin/Cbaiviet/add';
$route['dsbaiviet']               = 'admin/Cbaiviet/index';
$route['admintrangchu']           = 'Chome/index';
$route['admintainguyen']          = 'admin/Cimg';
$route['admintimeline']           = 'admin/Ctimeline';
$route['edit-timeline/(:num)']           = 'admin/Ctimeline/edit/$1';
$route['themtimeline']           = 'admin/Ctimeline/add';
$route['admintaikhoan']           = 'admin/Caccount';
$route['themtaikhoan']           = 'admin/Caccount/add';
// $route['dstaikhoan']           = 'admin/Caccount/index';
$route['edit/(:num)']              = 'admin/Cbaiviet/edit/$1';
$route['edit-taikhoan/(:num)']      = 'admin/Caccount/edit/$1';
$route['themtainguyen']           = 'admin/Cimg/add';
$route['edit-img/(:num)']           = 'admin/Cimg/edit/$1';

// $route['admintrangchu']        = 'Chome/index';

//$route['baiviet/(:num)'] 		  = 'Cbaiviet/index/$1';
$route['baiviet/(:num)'] 		  = 'Cbaiviet/view/$1';