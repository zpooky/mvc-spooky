<?php session_start();
@define('ROOT','');
require_once ROOT.'lib/Rewrite.php';

if(!isset($_GET['p'])){
	$_GET['p'] = 'home';
}
$rewrite = new Rewrite();
$query = Rewrite::getQuery($_SERVER['REDIRECT_URL']);
$rewrite->controll($query);
echo "fuck";


/*
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
}*/
?>
