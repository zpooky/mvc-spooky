<?php
@define('ROOT','');

if(!isset($_GET['p'])){
	$_GET['p'] = 'home';
}
switch($_GET['p']){
	case 'home':
		require_once ROOT.'view/HomeView.php';
		$view = new HomeView();
		$view->assemble();
	break;
	default:
		require_once ROOT.'view/HomeView.php';
		$view = new HomeView();
		$view->assemble();
}
?>
