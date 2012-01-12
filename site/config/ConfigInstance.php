<?php
@define('ROOT','../../');
//
require_once ROOT.'site/config/config.php';

class ConfigInstance {
	public $config;
	private static $configInstance = null;
	private function __construct(){
		
	}
	public static function getInstance(){
		if(self::$configInstance == null){
			$className = __CLASS__;
            self::$configInstance = new $className;
		}
		return self::$configInstance;
	}
	public function getDatabase(){
		if(!isset($this->config['db']['type']) || $this->config['db']['type'] == null || $this->config['db']['type'] == 'sqlite'){
			require_once ROOT.'sql/sqlite/SqliteMVCDatabase.php';
			return new SqliteMVCDatabase();
		} else {
			require_once ROOT.'sql/mysql/MysqlMVCDatabase.php';
			return new MysqlMVCDatabase();
		}
	}	
	public function getDatabaseType(){
		return $this->config['db']['type'];
	}
	public function getTheme(){
		if(!isset($this->config['theme']['theme']) || $this->config['theme']['theme'] == null){
			throw new Exception('Theme is not set');
		}
		require_once ROOT.'theme/'.$this->config['theme']['theme'].'/Theme.php';
		return new Theme();
	}
	
	public function getDatabaseHost(){
		if(!isset($this->config['db']['host']) || $this->config['db']['host'] == null){
			throw new Exception('Database host is not set');
		}
		return $this->config['db']['host'];
	}
	public function getDatabasePort(){
		if(!isset($this->config['db']['port']) || $this->config['db']['port'] == null){
			throw new Exception('Database port is not set');
		}
		return $this->config['db']['port'];
	}
	public function getDatabaseName(){
		if(!isset($this->config['db']['database']) || $this->config['db']['database'] == null){
			throw new Exception('Database name is not set');
		}
		return $this->config['db']['database'];
	}
	public function getDatabaseUsername(){
		if(!isset($this->config['db']['usr']) || $this->config['db']['usr'] == null){
			throw new Exception('Database username is not set');
		}
		return $this->config['db']['usr'];
	}
	public function getDatabasePassword(){
		if(!isset($this->config['db']['root']) || $this->config['db']['root'] == null){
			$this->config['db']['root'] = '';
		}
		return $this->config['db']['root'];
	}
	public function getRoot(){
		if($this->config['site']['root'][0] != '/'){
			$this->config['site']['root'] = '/'.$this->config['site']['root'];
		}
		if($this->config['site']['root'][strlen($this->config['site']['root'])-1] != '/'){
			$this->config['site']['root'] = $this->config['site']['root'].'/';
		}
		return $this->config['site']['root'];
	}
	public function getURLRoot(){
		if($this->config['site']['url'][strlen($this->config['site']['url'])-1] != '/'){
			$this->config['site']['url'] = $this->config['site']['url'].'/';
		}
		return $this->config['site']['url'];
	}
}
?>