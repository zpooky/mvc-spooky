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
			if(self::compareRedirect($query,$controller->getRedirectBase(),$controller->getRedirectPage())){
				$controller->setGET(self::getArgument($query,$controller->getRedirectBase(),$controller->getRedirectPage()));
				$controller->loadDrivers();
				$controller->controll();
				exit();
			}
		}
	}
	private static function compareRedirect($query,$controllerBase,$controllerPage){
		$chunks = explode('/', $query);
		$chunks[0] = isset($chunks[0]) ? $chunks[0] : '';
		$chunks[1] = isset($chunks[1]) ? $chunks[1] : '';
		$return = false;
		if(is_array($controllerBase)){
				for($i=0;$i<count($controllerBase)&&!$return;++$i){
					$return = ($controllerBase[$i] == $chunks[0] && $controllerPage == $chunks[1]);
				}
		} else {
			$return = ($controllerBase == $chunks[0] && $controllerPage == $chunks[1]);
		}
		return $return;
	}
	private static function getArgument($query,$controllerBase,$controllerPage){
		$start = self::getBaseLength($query,$controllerBase)+strlen($controllerPage)+1;
		return substr($query, $start);
	}
	private static function getBaseLength($query,$controllerBase){
		$length = 0;
		if(is_array($controllerBase)){
			$continue = true;
			$chunks = explode('/', $query);
			$chunks[0] = isset($chunks[0]) ? $chunks[0] : '';
			for($i=0;$i<count($controllerBase)&&$continue;++$i){
				if($controllerBase[$i] == $chunks[0]){
					$length = strlen($controllerBase[$i]);
					$continue = false;
				}
			}
		} else {
			$length = strlen($controllerBase);
		}
		return $length;
		
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