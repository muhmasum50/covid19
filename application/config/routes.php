<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['www/auth/login'] = 'auth/login';
$route['www/auth/register'] = 'auth/register';
$route['www/auth/logout'] = 'auth/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['www/dashboard'] = 'dashboard';
$route['www/dashboard/(:any)'] = 'dashboard/index/$1';

$route['www/datadiri'] = 'datadiri';
$route['www/datadiri/edit'] = 'datadiri/edit';
$route['www/datadiri/add'] = 'datadiri/tambah';
$route['www/pengajuan'] = 'pengajuan';
$route['www/bantuanmu'] = 'pengajuan/tambah';

$route['www/verifikasidata'] = 'verifikasi';
$route['www/verifikasidata/edit/(:any)'] = 'verifikasi/edit/$1';

// web serive

$route['www/api/service/cobaapi'] = 'service/example/users';
