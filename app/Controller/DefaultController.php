<?php


namespace App\Controller;
use App\Core\Controller\Controller;
use App\Core\Component\Response;
use App\Core\Component\Request;
use App\Core\Mapping\ExceptionRoute\ExceptionRouteNotFound;

class DefaultController extends Controller{

	/**
	*@Route("/home/", "default_page")
	*/
	public function get(){
		$this->renderView("DefaultView.php");
	}


	/**
	 * @Route("/home/{first_name}/{last_name}", "route_name")
	 */
	public function router_with_parameter($firstName, $lastName){
		try{
			$this->renderView("anotherView.php", [ 
				"firstName" => $firstName, 
				"lastName" => $lastName
				]);
		}catch(ExceptionRouteNotFound $notfound){
			echo $notfound;
		}
	}





}

?>