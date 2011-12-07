<?php
@define('ROOT','../');
require_once ROOT.'site/config/ConfigInstance.php';
$rootDir = ROOT.'module/';
if ($handle = opendir($rootDir)) {
	$db = ConfigInstance::getInstance()->getDatabase();
	$db->connect();
	
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            if(is_dir($rootDir.$file)){
            	try{
            		$class = strtolower($file).'Install';
	            	include_once $rootDir.$file.'/install/'.$class.'.php';
	            	$install = new $class();
	            	$installFunction = 'install'.ConfigInstance::getInstance()->getDatabaseType();
	            	$dropFunction = 'drop'.ConfigInstance::getInstance()->getDatabaseType();
	            	$db->query($install->$dropFunction());
	            	$db->execute();
	            	$db->query($install->$installFunction());
	            	$db->execute();
	            	echo 'module <i><b>'.$file.'</b></i> installed!<br/>';
            	} catch(Exception $e){
          			echo 'module <i><b>'.$file.'</b></i> is not a valid module!<br/>';
            	}
            }
        }
    }
    closedir($handle);
}
?>