<?php
namespace App\Bin\tools; 
require_once(dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR."Core".DIRECTORY_SEPARATOR."Autoloader.php");

use App\Bin\tools\File;



class ControllerManagement extends File{

	private $className;


	public function __construct($className){
		$this->className = trim($className);
		parent::__construct($this->className."Controller.php", CONTROLLER);
	}


	public function run(){
		if($this->isExist())
			return false;
		$this->write($this->getContent());
		return true;
	}

	private function getContent(){
		return 
			"<?php".
			"\n\nnamespace App\Controller;\n".
			"use App\Core\Controller\Controller;".
			"\n\nclass ".$this->className."Controller extends Controller{".
			"\n\t/**".
			"\n\t*".
			"\n\t*@Route(\"/".trim($this->className, "Controller")."/\", \"".trim($this->className, "Controller")."\")".
			"\n\t*".
			"\n\t*/".
			"\n\tpublic function index(){".
			"\n\t\t// Write Code here ... ".
			"\n\t}".
			"\n\n}".
			"\n\n?>"
		;
	}
	

}


?>