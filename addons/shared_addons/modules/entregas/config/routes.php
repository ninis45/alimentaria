<?php  defined('BASEPATH') or exit('No direct script access allowed');

//$route['entregas/admin/servicios(/:any)?'] = 'admin_servicios$1';
$route['entregas/admin/(:num)?']		= 'admin/load/$1';
?>