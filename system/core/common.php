<?php

function loadClass($className, $dir) {
	static $classCache = array();
	if (isset($classCache[$className])) {
		return $classCache[$className];
	}
	if (empty($className) || empty($dir)) {
		return $classCache;
	}

	$dir = trim($dir, '/\\');
	foreach (array(SYSPATH, APPPATH) as $root) {
		$path = $root.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR;
		if (is_dir($path)) {
			if (file_exists($path.$className.'.php')) {
				require($path.$className.'.php');
				if (class_exists($className)) {
					$classCache[$className] = new $className();
					return $classCache[$className];
				}
			}
		}
	}
	
	return false;
}

require_once SYSPATH.'\core\Controller.php';

function getInstance(){
	return Controller::getInstance();
}

function getConfig($name) {
	static $_config;
	if (!isset($_config)) {
		require(APPPATH.DIRECTORY_SEPARATOR.'config/config.php');
		$_config = get_defined_vars();
	}
	if (isset($name)) {
		return $_config[$name];
	}
	return $_config;
}

function _error_handler() {
//exit(0);
}
function _exception_handler() {}
function _shutdown_handler() {}
?>