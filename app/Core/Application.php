<?php


namespace App\Core;

require_once("Autoloader.php");
use App\Core\Mapping\Router;
use App\Core\Mapping\ExceptionRoute\ExceptionRouteNotFound;
use App\Core\Mapping\Annotation;

class Application{



	public function __construct(){
		$router = new Router($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
		try{
			$router->run();
		}catch(ExceptionRouteNotFound $e){
			header("HTTP/1.0 404 Not Found");
			echo 
				"<html>".
				"<head><title>Page Not Found</title></head>".
				"<body><div><h1>404</h1><h2>page not found</h2></div></body>".
			"</html>";
		}

		/*$request = new Request();
		$router = new Router();
		$router->init();

		$router = new Router($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
		$router->get("/koukou/{name}/{id}",  function($name, $id){echo "<h1>Hello world</h1> <h1>$id</h1><h1>$name</h1>";});
		$router->run();*/
	}

	




}

?>