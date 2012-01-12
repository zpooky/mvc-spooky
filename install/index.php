<!DOCTYPE html>
<html lang="en" class="default">
	<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<title>Install</title>
	</head>
	<body>
<?php
@define('ROOT','../');//
require_once ROOT.'site/config/ConfigInstance.php';
$rootDir = ROOT.'module/';
echo '<h1>Installing <i><b>'.ConfigInstance::getInstance()->getDatabaseType().'</b></i></h1>';
if ($handle = opendir($rootDir)) {
	$db = ConfigInstance::getInstance()->getDatabase();
	$db->connect();
	
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            if(is_dir($rootDir.$file)){
            	try{
            		$class = strtolower($file).'Install';
	            	include_once $rootDir.$file.'/install/'.ucwords($class).'.php';
	            	$install = new $class();
	            	$installFunction = 'install'.ConfigInstance::getInstance()->getDatabaseType();
	            	$dropFunction = 'drop'.ConfigInstance::getInstance()->getDatabaseType();
	            	$dropQuery = $install->$dropFunction();
	            	if(!empty($dropQuery)){
	            		$db->query($dropQuery);
	            		$db->execute();
	            	}
	            	$installQuery = $install->$installFunction();
	            	if(!empty($installQuery)){
	            		$db->query($installQuery);
	            		$db->execute();
	            	}
	            	echo 'Module <i><b>'.$file.'</b></i> installed!<br/>';
            	} catch(Exception $e){
          			echo 'Module <i><b>'.$file.'</b></i> is not a valid module!<br/>';
            	}
            }
        }
    }
    closedir($handle);
    $arr = file(ROOT.'sql/'.ConfigInstance::getInstance()->getDatabaseType().'/install/structure.sql');
    $installQuery = implode('', $arr);
	if(!empty($installQuery)){
		$db->multiQuery($installQuery);
		$db->execute();
	}
	echo 'Base installed.';
}
?>
</body>