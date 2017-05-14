<?php
	/**
	* 
	*/	
	require_once(SYSPATH.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'baseDriver.php');

	class mysqliDriver extends baseDriver
	{
		
		function __construct($dbConfig){
			parent::__construct($dbConfig);
			$this->connect();
		}

		function connect() {
			$this->con = new mysqli("localhost","root","","onlyjs");
			if(mysqli_connect_errno()){
			    //echo "连接数据库失败：".mysqli_connect_error();
			    exit;
			}
		}
		function get($sql) {
			$result = $mysqli->query($sql);
			$ret = array();
			if($mysqli->affected_rows>0){
			    while ($myrow = $result->fetch_array(MYSQLI_ASSOC)){
				   $ret[] = $myrow;
				}
			}
			return $ret;
		}
	}
?>