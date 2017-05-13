<?php 
	/**
	* 
	*/
	class Loader 
	{
		private $classCache = array();
		private $config = array();
		function __construct()
		{	$globalConfig = getConfig();
			$this->config['Model'] = trim($globalConfig['modelPath'],'/\\');
			$this->config['View'] = trim($globalConfig['viewPath'],'/\\');
			$this->config['Service'] = trim($globalConfig['servicePath'],'/\\');
		}
		function __call($method, $argument) {
			if (count($argument) < 1) {
				return;
			}

			$baseController = getInstance();
			switch($method) {
				case 'Model': 
					if (isset($baseController->Model->{$argument[0]})) {
						return;
					}
					$Model = $this->loadClass($argument, 'Model', $this->config['Model']);
					if (isset($Model)) {
						$baseController->Model->{$argument[0]} = $Model;
					}
			}
		}

		private function loadClass($argument, $subfix = '', $defaultPath = '') {
			$className = $argument[0];
			$baseDir = DIRECTORY_SEPARATOR;
			if (count($argument) > 1) {
				$baseDir = DIRECTORY_SEPARATOR.trim($argument[1], '/\\').DIRECTORY_SEPARATOR;
			}
			$path = APPPATH.DIRECTORY_SEPARATOR.$defaultPath.$baseDir;
			if (is_dir($path)) {
				$realName = $className.$subfix;
				$fileName = $realName.".php";
				if (file_exists($path.$fileName)) {
					require($path.$fileName);
					$realName = $className.$subfix;
					if (class_exists($realName)) {
						return new $realName();
					}
				}
			}
			
			return false;
		}
	}

?>