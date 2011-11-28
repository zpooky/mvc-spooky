<?php
@define('ROOT','../../');

require_once ROOT.'site/config/config.php';

class ConfigInstance {
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
		if(!isset($config['db']['type']) || $config['db']['type'] == null || $config['db']['type'] == 'sqlite'){
			require_once ROOT.'sql/mysql/SqliteMVCDatabase.php';
			return new SqliteMVCDatabase();
		} else {
			require_once ROOT.'sql/mysql/MysqlMVCDatabase.php';
			return new MysqlMVCDatabase();
		}
	}
	public function getTheme(){
		if(!isset($config['theme']['theme']) || $config['theme']['theme'] == null){
			$config['theme']['theme'] = 'default';
		}
		require_once ROOT.'theme/'.$config['theme']['theme'].'/Theme.php';
		return new Theme();
	}
}
?>