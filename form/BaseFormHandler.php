<?php
@define('ROOT','../');

require_once ROOT.'site/config/ConfigInstance.php';
abstract class BaseFormHandler {
	private $db = null;
	private $urlArguments;
	public function __construct(){
		$this->urlArguments = $_GET;
		$config = ConfigInstance::getInstance();
		$this->db = $config->getDatabase();
	}
	protected function getURL(){
		return $this->urlArguments;
	}
	protected function getDatabase(){
		$this->db->connect();
		return $this->db;
	}
	protected function getModel($modelClass){
		require_once ROOT.'module/blog/model/'.$modelClass.'.php';
		$model = new $modelClass;
		$model->setDatabase($this->getDatabase());
		return $model;
	}
}

?>