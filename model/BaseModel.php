<?php
abstract class BaseModel {//
	protected $db;
	public function setDatabase($db){
		$this->db = $db;
	}
	protected function getDatabase(){
		return $this->db;
	}
}
?>