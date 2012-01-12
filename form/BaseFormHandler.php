<?php
@define('ROOT','../');
//
require_once ROOT.'site/config/ConfigInstance.php';
abstract class BaseFormHandler {
	private $db = null;
	public function __construct(){
		$config = ConfigInstance::getInstance();
		$this->db = $config->getDatabase();
	}
	protected function getURL(){
		return $_GET;
	}
	protected function getPOST(){
		return $_POST;
	}
	protected function getDatabase(){
		$this->db->connect();
		return $this->db;
	}
	public function getURLRoot(){
		return ConfigInstance::getInstance()->getURLRoot();
	}
	protected function getModel($modelClass,$module = ''){
		require_once ROOT.$module.'model/'.ucwords($modelClass).'.php';
		$model = new $modelClass;
		$model->setDatabase($this->getDatabase());
		return $model;
	}
	protected function getModule($moduleClass){
		require_once ROOT.'module/'.strtolower($moduleClass).'/'.$moduleClass.'.php';
		return new $moduleClass;
	}
}

?>