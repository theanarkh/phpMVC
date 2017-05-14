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
			var_dump($this->testModel->getInfo('select * from js_user'));
			// $this->View->assign('name', 'cyb');
			// $this->View->assign('list', array(1,2,3));
			// $this->View->render('test');
		}

		function x() {
			$mysqli=new mysqli("localhost","root","","onlyjs");
			if(mysqli_connect_errno()){
			    echo "连接数据库失败：".mysqli_connect_error();
			    $mysqli=null;
			    exit;
			}
			$sql="select * from js_article";
			//执行sql语句
			$result=$mysqli->query($sql);
				if($mysqli->affected_rows>0){
			    while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
				{
				  var_dump($myrow);
				}
			}
			$mysqli->close();
		}
	}
?>