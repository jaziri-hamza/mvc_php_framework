<?php
namespace App\Bin\tools; 
require_once(dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR."Core".DIRECTORY_SEPARATOR."Autoloader.php");

use App\Bin\tools\File;



class ViewManagement extends File{

	private $className;


	public function __construct($className){
		$this->className = trim($className);
		parent::__construct($this->className."View.php", VIEW);
	}


	public function run(){
		if($this->isExist())
			return false;
		$this->write($this->getContent());
		return true;
	}

	private function getContent(){
		return 
			"<html>".
			"\n\t<head>".
			"\n\t\t<title>".
			$this->className.
			"</title>".
			"\n\t</head>".
			"\n\n\t<body>".
			"\n\n\t<body>".
			"\n</html>"
		;
	}
	

}


?>