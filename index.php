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
	case 'homex':
		require_once ROOT.'controller/HomeController.php';
		$controller = new HomeController();
		$controller->controll();
	break;
	default:
		require_once ROOT.'controller/HomeController.php';
		$controller = new HomeController();
		$controller->controll();
}
?>
