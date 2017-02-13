<?php

return [
	'routes' => [
		'#^/?$#' => [
			'GET' => 'NoFw\\Controllers\\HomeController@index'
		],
		'#^/funcionario/?$#' => [
			'GET' => 'NoFw\\Controllers\\FuncionarioController@index',
			'POST' => 'NoFw\\Controllers\\FuncionarioController@post',
		],
		'#^/funcionario/editar/(?P<id>[0-9]+)/?$#' => [
			'GET' => 'NoFw\\Controllers\\FuncionarioController@editar',
		],
		'#^/funcionario/delete/(?P<id>[0-9]+)/?$#' => [
			'GET' => 'NoFw\\Controllers\\FuncionarioController@delete',
		],
	],

	'db'=>[
		'driver'=>'mysql',
		'dbname' => 'teste',
		'host'=>'testeconnectparts_db_1',
		'username' => 'root',
		'password' => '1'
	],
	'services' => [
		'dbDriver' => 'NoFw\\Db\\ConnectionFactory'
	]
];
