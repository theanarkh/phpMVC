<?php 
	/**
	* 
	*/
	require_once(SYSPATH.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'DriverManager.php');
	class Model
	{
		private static $instance;
		protected $db;
		function __construct()
		{	
			//$dbConfig = getConfig('database');
			$this->db = new DriverManager();
		}
	}
?>