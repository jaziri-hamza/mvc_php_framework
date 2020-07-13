<?php

namespace App\Bin\Tools;


class File{

	protected $fileName;
	protected $path;
	protected $fullPath;

	public function __construct($className, $path){
		$this->fileName = $className;
		$this->path = $path;
		$this->fullPath = $path.$this->fileName;
	}

	public function isExist(){
		return file_exists($this->fullPath);
	}

	public function open(){
		return fopen($this->fullPath, 'w');
	}

	public function close(&$file){
		fclose($file);
	}

	public function write($line){
		$file = $this->open();
		fwrite($file, $line."\n");
		$this->close($file);
	}

}

?>