<?php
@define('ROOT','../../');

require_once ROOT.'site/config.php';

class ConfigInstance {
	private $configInstance = null;
	private function __construct(){
	}
	public static function getInstance(){
		if($this->configInstance == null){
			$this->configInstance = new ConfigInstance();
		}
		return $this->configInstance;
	}
	private function getDatabase(){
		if($config['db']['type'] == 'sqlite'){
			
		} else {
			
		}
	}
}