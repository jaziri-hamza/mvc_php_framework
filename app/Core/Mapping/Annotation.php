<?php

namespace App\Core\Mapping;
use App\Core\Mapping\Route;

define("CONTROLLER_FILE", APP."Controller".DIRECTORY_SEPARATOR."*Controller.php");
define("CONTROLLER_NAMESPACE", "App\Controller\\");

class Annotation{

	private $routes = [];
	public function getRoutes(){
		return $this->routes;
	}
	public function __construct(){
		$this->initControllers();
	}

	
	

	private function initControllers(){
		foreach (glob(CONTROLLER_FILE) as $controller){
			$className =  CONTROLLER_NAMESPACE.basename($controller, ".php");
			$methods = (new \ReflectionClass($className))->getMethods();;
			foreach ($methods as $method) {
				if($this->isRouteMethod($method)){
					$params = $this->parserDocComment($method);
					$route = new Route($className, $method->getName(), $params["path"], $params["name"], $params["method"]);
					//public function __construct($controllerName, $methodName, $path, $name, $method)
					$this->routes[] = $route;
				}
			}
		}
	}

	private function isRouteMethod($method){
		return !empty($method->getDocComment());
	}

	private function parserDocComment($method){
		$comment = $method->getDocComment();
		preg_match('/(\*)(\s*)(@Route\()(\s*)("\S+")(\s*)(,)(\s*)("\S+")(\s*)(\))/', $comment, $pathRoute);
		$path = $pathRoute[5];
		$name = $pathRoute[9];
		preg_match('/(\*)(\s*)(@Method\()(\s*)("\S+")(\s*)(\))/', $comment, $methodRoute);
		if(empty($methodRoute))	$requestMethod = "GET";
			else $requestMethod = $methodRoute[5];

		return ["path" => trim($path, "\""), "name" => trim($name, "\""), "method" => trim($requestMethod, "\"")];
	}


}

?>