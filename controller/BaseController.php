<?php
@define('ROOT','../');

abstract class BaseController {
	private $db = null;

	protected function __construct(){
		loadDrivers();
	}

	function __autoload($className)
	{
		$len = strlen($className);
		if(substr($className,($len-9)) == 'Controller'){
			require_once ROOT.'controller/'.$className;
		}
	}

	protected abstract function loadDatabase();

	
	
	protected function getDatabase(){
		if(!loadDatabase()){
			throw 'Database driver is not loaded';
		}
		return $this->db;
	}
	
	private function loadDrivers(){
		if(loadDatabase()){
			$this->db = new Database();
		}
	}
}