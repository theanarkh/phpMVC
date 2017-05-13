<?php 
	/**
	* 
	*/
	class testController extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->Loader->Model('test');
		}

		function index ($a,$b) {
			$this->View->assign('name', 'cyb');
			$this->View->assign('list', array(1,2,3));
			$this->View->render('test');
		}
	}
?>