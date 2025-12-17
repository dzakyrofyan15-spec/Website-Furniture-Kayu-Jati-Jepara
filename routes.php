<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/config/routes.php

$route['default_controller'] = 'Katalog'; 
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Rute Frontend Katalog (Menggunakan URL bersih)
$route['katalog'] = 'Katalog/index';
$route['detail/(:num)'] = 'Katalog/detail/$1';
$route['tentang-kami'] = 'Katalog/tentang_kami';

// Rute Autentikasi
$route['login'] = 'Auth/login'; // PENTING: Login diarahkan ke Auth/login
$route['logout'] = 'Auth/logout';

// Rute Admin CRUD
$route['administrator'] = 'Administrator/index';
$route['administrator/add'] = 'Administrator/add';
$route['administrator/save'] = 'Administrator/save';
$route['administrator/edit/(:num)'] = 'Administrator/edit/$1';
$route['administrator/update/(:num)'] = 'Administrator/update/$1';
$route['administrator/delete/(:num)'] = 'Administrator/delete/$1';