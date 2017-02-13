<?php

return [
	'routes' => [
		'#^/?$#' => [
			'GET' => 'NoFw\\Controllers\\HomeController@index'
		],
		'#^/usuario/?$#' => [
			'GET' => 'NoFw\\Controllers\\UsuarioController@index',
			'POST' => 'NoFw\\Controllers\\Usuario@post',
		],
		'#^/usuario/(?P<id>[0-9]+)/?$#' => [
			'GET' => 'NoFw\\Controllers\\UsuarioController@get',
			'PUT' => 'NoFw\\Controllers\\UsuarioController@put',
			'DELETE' => 'NoFw\\Controllers\\UsuarioController@delete',
		],

		'#^/usuario/(?P<id>[0-9]+)/perfil/(?P<perfil>[0-9]+)/?$#' => [
			'GET' => 'NoFw\\Controllers\\UsuarioController@getRelated',
		],

	]
];
