<?php
	/**
	* 
	*/
	require_once(SYSPATH.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'baseDriver.php');
	class mysqlDriver extends baseDriver
	{
		function __construct($dbConfig){
			parent::__construct($dbConfig);
			$this->connect();
		}


		function connect() {
			$this->con = mysql_connect($this->hostname,$this->username,$this->password); 
			if (!$this->con) 
			{ 
			    die("连接错误: " . mysql_error()); 
			} 
			//mysql_query("set character set gb2312");//读库 
			mysql_query("set names {$this->charset}");//写库 
			mysql_select_db($this->db,$this->con);
		}
		function get($sql) {
			$result = mysql_query($sql);
			$test=mysql_fetch_array($result);
			return $test;
		}
	}
?>