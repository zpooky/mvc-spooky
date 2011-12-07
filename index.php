<?php session_start();
@define('ROOT','');

if(!isset($_GET['p'])){
	$_GET['p'] = 'home';
}

$_SESSION['LOGGED_IN'] = true;

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
	case 'add':
		require_once ROOT.'controller/CMSCreateController.php';
		$controller = new CMSCreateController();
		$controller->controll();
	break;
	default:
		require_once ROOT.'controller/HomeController.php';
		$controller = new HomeController();
		$controller->controll();
}
?>
