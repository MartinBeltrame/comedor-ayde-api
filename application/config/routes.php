<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Emails';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['emails']['POST'] = 'emails';

$route['users/(:any)']['GET'] = 'users/confirm/$1';
$route['users']['POST'] = 'users/register';
$route['users']['GET'] = 'users';
