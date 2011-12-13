<?php
@define('ROOT','../');
class Rewrite {
	public static function getQuery($redirectURL){
		require_once ROOT.'site/config/ConfigInstance.php';
		$root = ConfigInstance::getInstance()->getRoot();
		return substr($redirectURL, strlen($root));
	}
	public static function controll($query){
		foreach(self::getControllers() as $controllerString){
			require_once ROOT.'controller/'.$controllerString;
			$controllerClass = substr($controllerString,0,strlen($controllerString)-4);
			$controller = new $controllerClass(false);
			$redirectQuery = $controller->getRedirectBase();
			if(substr($redirectQuery, 0,strlen($query)) == $query){
				//echo substr($query, 0,strlen($redirectQuery))." == ".$redirectQuery.'<br>';
				$controller->loadDrivers();
				$controller->controll();
				exit();
			}
		}
	}
	private static function getControllers(){
		$rootDir = ROOT.'controller/';
		$controllers = array();
		if ($handle = opendir($rootDir)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
		    		if(!preg_match('/BaseController.php$/', $file) && preg_match('/Controller.php$/', $file)){
		    			$controllers[] = $file;
		    		}
				}
			}
		}
		return $controllers;
	}
}
?>