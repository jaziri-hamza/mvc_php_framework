<?php

class Request{

	private $path;
	private $method;
	private $sessions;
	private $cookies;
	private $getParams;
	private $otherParams; // POST, UPDATE, DELETE, etc...

	public function __construct(){
		$this->path  = $_SERVER["REQUEST_URI"];
		$this->method  = $_SERVER["REQUEST_METHOD"];
		$this->run();
	}

	public function isExist():bool{

	}

	public function getParams():array{}

	private function run(){
		// code here
		throw new Exception("function not learned yet");
	}
}
?>