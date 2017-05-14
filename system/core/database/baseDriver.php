<?php
	/**
	* 
	*/

	class baseDriver
	{	
		protected $con;
		protected $hostname;
		protected $port;
		protected $username;
		protected $password;
		protected $db;
		protected $table;
		protected $charset;
		protected $isPersistent;
		protected $driver;
		function __construct($dbConfig){
			$this->set($dbConfig);
		}

		function set($dbConfig) {
			$this->hostname = $dbConfig['hostname'];
			$this->port = $dbConfig['port'];
			$this->username = $dbConfig['username'];
			$this->password = $dbConfig['password'];
			$this->db = $dbConfig['db'];
			$this->table = $dbConfig['table'];
			$this->charset = $dbConfig['charset'];
			$this->isPersistent = $dbConfig['isPersistent'];
			$this->driver = $dbConfig['driver'];
		}
	}
?>