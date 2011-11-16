<?php
@define('ROOT','../../');

require_once ROOT.'site/config.php';

class ConfigInstance {
	private static $configInstance = null;
	private function __construct(){
	}
	public static function getInstance(){
		if(self::configInstance == null){
			self::configInstance = new ConfigInstance();
		}
		return self::configInstance;
	}
	public function getDatabase(){
		if($config['db']['type'] == 'sqlite'){
			require_once ROOT.'sql/mysql/SqliteMVCDatabase.php';
			return new SqliteMVCDatabase();
		} else {
			require_once ROOT.'sql/mysql/MysqlMVCDatabase.php';
			return new MysqlMVCDatabase();
		}
	}
}
?>