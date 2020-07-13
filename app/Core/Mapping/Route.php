<?php

namespace App\Core\Mapping;

class Route{

	private $controllerName;
	public function getInstance(){
		return  new $this->controllerName();
	}

	private $methodName;
	public function getMethodName(){
		return $this->methodName;
	}
	
	private $path;
	private function setPath($path){ $this->path = trim($path, "/");}
	public function getPath(){return $this->path;}
	private $name;
	private $method;


	private $regex;
	public function getRegex(){return $this->regex;}

	private $params;

	public function __construct($controllerName, $methodName, $path, $name, $method){
		$this->controllerName = $controllerName;
		$this->methodName = $methodName;
		$this->setPath($path);
		$this->regex = $this->initRegex($this->path);
	}

	private function initParams($function):iterable{
		$fn = new \ReflectionFunction($function);
		foreach($fn->getParameters() as  $value) {
			yield [$value->name=>null];
		}
	}

	private function initParamsValue($url){
		preg_match($this->regex, $url, $matchs);
		array_shift($matchs);
		return $matchs;
	}

	private function initRegex($path):string{
		$regex = preg_replace('#{([\w]+)}#', '(\w+)', $path);
		$regex = str_replace("/", "\/", $regex);
		return "/^".$regex."$/i";
	}
	
	public function run($path){
		\call_user_func_array(array($this->getInstance(), $this->methodName), $this->initParamsValue($path));
	}

}

?>