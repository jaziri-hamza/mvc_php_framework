<?php

namespace App\Core\Controller;
use App\Core\Mapping\ExceptionRoute\ExceptionRouteNotFound;

abstract class Controller{

	protected function renderView($fileName, $params=[]){
		$pathFile = VIEW.$fileName;
		if(!file_exists($pathFile))
			throw new ExceptionRouteNotFound("Render error: file is not exist ");
		$data = $params;
		include($pathFile);
	}

	protected function redirectTo($path){
		header("Location: ".$path);
	}

	

}

?>