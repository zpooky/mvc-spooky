<?php
@define('ROOT','');

if(!isset($_GET['p'])){
	$_GET['p'] = 'home';
}

switch($_GET['p']){
	case 'home':
		require_once ROOT.'controller/HomeController.php';
		$controller = new HomeController();
		$controller->controll();
	break;
	case 'cms':
		require_once ROOT.'controller/CMSController.php';
		$controller = new CMSController();
		$controller->controll();
	break;
	default:
		require_once ROOT.'controller/HomeController.php';
		$controller = new HomeController();
		$controller->controll();
}
?>
