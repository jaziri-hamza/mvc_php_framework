<?php


namespace App\Core\Controller;

class Response{
	

	// par default : application/text
	private $contentType;
	private $content;

	public function __construct($content){
		$this->setContent($content);
		$this->setContentType("application/text");
	}

	public function setContent($content){
		$this->content = $content;
	}


	public function setContentType($contentType){
		$this->contentType = $contentType;
	}

	public function display(){
		header("content-type: $this->contentType");
		echo $this->content;
	}
	


}

?>