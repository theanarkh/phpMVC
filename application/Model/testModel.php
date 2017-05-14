<?php 
	/**
	* 
	*/
	class testModel extends Model
	{
		function __construct()
		{	
			parent::__construct();
			$conId = $this->db->load();
			echo $conId;
		}
		function getInfo($sql) {
			return $this->db->get($sql);
		}
	}
?>