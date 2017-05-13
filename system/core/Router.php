<?php 
/**
* 
*/
class Router
{	
	private $controllerPath;
	private $controller;
	private $method;
	private $queryParam = array();
	function __construct()
	{
		
	}
	function init($requestUri, $queryStringType) {
		$pos = strpos($requestUri,'index.php/');
		$len = strlen('index.php/');
		$requestUri = substr($requestUri,$pos+$len-1);
		if ($queryStringType === 0) {
			$requestUri = rtrim(preg_replace('/\?[\s\S]*/', '', $requestUri),'/');
			$result = explode('/', $requestUri);
			$len = count($result);
			if ($len < 2) {
				return;
			}
			
			$this->method = array_pop($result);
			$this->originController = array_pop($result);
			$this->controller = $this->originController.'Controller';
			$this->controllerPath = implode(DIRECTORY_SEPARATOR, $result);
			parse_str($_SERVER['QUERY_STRING'],$this->queryParam);
		}
	}
	function router() {
		$controller = APPPATH.DIRECTORY_SEPARATOR.'controller'.$this->controllerPath.DIRECTORY_SEPARATOR.$this->controller.'.php';

		if (file_exists($controller)){
			require($controller);
			if (class_exists($this->controller)) {
				if (!method_exists($this->controller, $this->method)) {
					return;
				}
				$methodInfo = new ReflectionMethod($this->controller, $this->method);
				if ($methodInfo->isPublic() 
					&& !$methodInfo->isStatic() 
					&& !$methodInfo->isConstructor() 
					&& !$methodInfo->isDestructor()
					&& !$methodInfo->isAbstract()
				) {
					$obj = new $this->controller();
					call_user_func_array(array($obj,$this->method),$this->queryParam);
					//$obj->{$this->method}();
				}
			}
		}
	}
}

?>