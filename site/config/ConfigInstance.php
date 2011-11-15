<?php
class ConfigInstance {
	private $configInstance = null;
	private function __construct(){
		read();
	}
	public static function getInstance(){
		if($this->configInstance == null){
			$this->configInstance = new ConfigInstance();
		}
		return $this->configInstance;
	}
	
	private function read(){
		
	}
}