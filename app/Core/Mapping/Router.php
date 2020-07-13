<?php

namespace App\Core\Mapping;
use App\Core\Mapping\Route;
use App\Core\Mapping\Annotation;
use App\Core\Mapping\ExceptionRoute\ExceptionRouteNotFound;


class Router{
	

	private $path;
	private $method;
	private $routes;


	public function __construct($path, $method){
		$this->path = trim($path, '/');
		$this->method = $method;
		$this->routes = $this->initRoutes();
	}

	
	public function initRoutes(){
		$annotation = new Annotation();
		return $annotation->getRoutes();
	}

	private function getAction(){
		$path = $this->path;
		return array_filter($this->routes, function($value) use ($path) {
			return preg_match($value->getRegex(), $path)? true: false;
		}) ?? [];
	}

	public function run(){
		$route = $this->getAction();
		if(empty($route))
			throw new ExceptionRouteNotFound("This page was not found");
		
		foreach ($route as  $value) {
			$value->run($this->path);
			break;
		}
	}


}

?>