
<?php 
	/**
	* 
	*/
	class View
	{
		private $var = array();
		function render($fileName, $dir) {
			//$this->Router->originController
			$fileName = APPPATH.DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.$fileName.'.php';
			foreach ($this->var as $key => $value) {
				$$key = $value;
			}
			if (file_exists($fileName)) {
				require($fileName);
			}
			else {
				echo 'error';
			}
		}

		function assign($name, $value) {
			$this->var[$name] = $value;
		}

	}
?>