<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'cliente';

$route['formulario_cadastro/(:any)'] = 'chamado/formulario_cadastro';
$route['listagemClientes'] = 'cliente/listagemClientes';
$route['uploadArquivos'] = 'chamado/uploadArquivos';
$route['salvarChamado'] = 'chamado/salvarChamado';
$route['buscarChamadoModal'] = 'chamado/buscarChamadoModal';
$route['enviarEmailChamado'] = 'chamado/enviarEmailChamado';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
