<?php

namespace App\Core\ORM\Query;



/*

->Selct("tablenMAE")
	->getField("feildname")
	->getField("fielsqdfname")
	->where("id","hamza")
	->orderby("id", "asc");

*/

class Select{


	private function varToString(){

	}

	private $table;
	private function tableToString(){
		return "`".$this->table."`";
	}

	private $fields =[];
	private function fieldsToString(){
		$res = "";
		foreach ($this->fields as  $field) {
			$res.= "`".$field."`, ";
		}
		return trim(trim($res), ",");
	}

	private $where = [];
	private function whereToString(){
		$res = "";
		foreach ($this->where as $field => $value) {
			$res.= "`".$field."` = ";
			$res.= $value;	
		}
		return trim($res, ",");
	}

	private $orderBy = [];


	public function selectTable($table){
		$this->table = $table;
		return $this;
	}

	public function get($field){
		$this->fields[] = $field;
		return $this; 
	}

	public function where($fieldName, $fieldValue){
		$this->where[$fieldName] = $fieldValue;
		return $this;
	}

	public function orderBy($field, $orderMethod="ASC"){
		$this->orderBy[] = $field;
		$this->orderBy[] = $orderMethod;
		return $this;
	}

	private function creatQuery(){
		$query = "SELECT ".trim(implode($this->fields, ","),",")." WHERE ";
		foreach ($where as $key => $value) {
			$query.= "";
		}

	}


}



?>