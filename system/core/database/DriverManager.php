<?php
	/**
	* 
	*/

	class DriverManager
	{	
		private $_dirver;
		private $conId;
		private static $connectPool = array();
		function __construct($config){
			
		}

		function load($config) {
			$this->connect(isset($config) ? $config : getConfig('database'));
			return $this->conId;
		}

		function connect($config) {
			$conId = md5(serialize($config));
			if (isset(self::$connectPool[$conId])) {
				$this->_dirver = self::$connectPool[$conId];
			}
			$driver = $config['driver'];
			$driverPath = SYSPATH.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.$driver.'Driver.php';	
			$driverClass = $driver.'Driver';
			if (file_exists($driverPath)) {
				require_once($driverPath);
				$this->_dirver = new $driverClass($config);
				self::$connectPool[$conId] = $this->_dirver;
				$this->conId = $conId;
			}
		}
		function get($sql) {
			return $this->_dirver->get($sql);
		}
	}
?>