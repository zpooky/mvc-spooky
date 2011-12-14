<?php
@define('ROOT','../');

require_once ROOT.'site/config/ConfigInstance.php';

abstract class BaseController {
	private $db = null;
	private $view;
	private $get;
	public function __construct(){
	}
	public function postConstruct(){
		$this->loadDrivers();
	}
/*
	function __autoload($className){
		$len = strlen($className);
		if(stristr($className,'Controller')){
			require_once ROOT.'controller/'.$className;
		} else if(stristr($className,'View')){
			require_once ROOT.'view/'.$className;
		} else if(stristr($className,'Model')){
			require_once ROOT.'model/'.$className;
		} else if(stristr($className,'Handler')){
			require_once ROOT.'controller/form/'.$className;
		} else if(stristr($className,'Module')){//fix
			require_once ROOT.'module/'.substr($className,0,strpos($className,'Module')).'/'.$className;
		}
	}*/
	public abstract function getRedirectBase();
	public abstract function getRedirectPage();
	protected abstract function loadDatabase();
	protected abstract function loadViewClass();
	//required loggin
	//requreid admin
	//...
	protected abstract function index();
	protected function getView(){
		return $this->view;
	}
	protected function getDatabase(){
		if(!$this->loadDatabase()){
			throw new Exception('Database driver is not loaded');
		}
		$this->db->connect();
		return $this->db;
	}
	protected function getModule($moduleClass){//static
		require_once ROOT.'module/'.strtolower($moduleClass).'/'.$moduleClass.'.php';
		return new $moduleClass;
	}
	protected function getModel($modelClass){//static
		require_once ROOT.'model/'.$modelClass.'.php';
		$model = new $modelClass;
		$model->setDatabase($this->getDatabase());
		return $model;
	}
	public function setGET($get){
		$get = $get[0] == '/' ? substr($get,1) : $get;
		$length = strlen($get)-1;
		$get = $get[$length] == '/' ? substr($get,0,$length) : $get;
		$this->get = explode('/',$get);
	}
	protected function getGET(){
		return $this->get;
	}
	protected function get404($message = ''){
		$className = 'HTTP404View';
		require_once ROOT.'view/'.$className.'.php';
		$this->view = new $className;
		$this->view->setMessage($message);
	}
	public function loadDrivers(){
		if($this->loadDatabase()){
			$config = ConfigInstance::getInstance();
			$this->db = $config->getDatabase();
		}
		$this->loadView();
	}
	private function loadView(){
		require_once ROOT.'view/'.$this->loadViewClass().'.php';
		$className = $this->loadViewClass();
		$this->view = new $className;
	}
	public function controll($bypassPostConstruct = false){
		if(!$bypassPostConstruct){
			$this->postConstruct();
		}
		$this->index();
		$this->view->assemble();
	}
}