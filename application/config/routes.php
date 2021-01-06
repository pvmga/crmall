<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'cliente';

$route['formulario_cadastro/(:any)'] = 'cliente/formulario_cadastro';
$route['listagemClientes'] = 'cliente/listagemClientes';
$route['salvarCliente'] = 'cliente/salvarCliente';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
