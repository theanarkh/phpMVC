<?php
	define('APPPATH', realpath('application'));
	define('SYSPATH', realpath('system'));
	require(SYSPATH.'/core/common.php');
	require(APPPATH.'/config/config.php');

	set_error_handler('_error_handler');
	set_exception_handler('_exception_handler');
	register_shutdown_function('_shutdown_handler');
	$router = loadClass('Router', 'core');
	loadClass('Loader', 'core');
	loadClass('Model', 'core');
	loadClass('View', 'core');
	$router->init($_SERVER['REQUEST_URI'],$queryStringType);
	$router->router();	
	//2
?>