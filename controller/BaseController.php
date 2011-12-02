<?php
@define('ROOT','../');

require_once ROOT.'site/config/ConfigInstance.php';

abstract class BaseController {
	private $db = null;
	private $view;
	public function __construct(){
		$this->loadDrivers();
	}

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
	}

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
		if(!loadDatabase()){
			throw 'Database driver is not loaded';
		}
		return $this->db;
	}

	private function loadDrivers(){
		if($this->loadDatabase()){
			$config = ConfigInstance::getInstance();
			$this->db = $config->getDatabace();
		}
		//Load view
		require_once ROOT.'view/'.$this->loadViewClass().'.php';
		$className = $this->loadViewClass();
		$this->view = new $className;
	}
	public function controll(){
		$this->index();
		$this->view->assemble();
	}
}