<?php 
	/**
	* 
	*/
	class Controller
	{
		private static $instance;

		function __construct()
		{	self::$instance = $this;
			foreach (loadClass() as $className => $obj){	
				//$className = strtolower($className);
				$this->{$className} = $obj;
			}
			//var_dump($this);
		}

		public static function getInstance(){
			return self::$instance;
		}
		
	}
?>