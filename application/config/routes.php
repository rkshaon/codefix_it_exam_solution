<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['dashboard'] = 'welcome/dashboard';
$route['shop'] = 'welcome/shop';
$route['sale_report'] = 'welcome/sale_report';
$route['customer_info'] = 'welcome/customer_info';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


