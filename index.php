<?php
session_start();
@define('ROOT','');
require_once ROOT.'lib/Rewrite.php';

if(!isset($_GET['p'])){
	$_GET['p'] = 'home';
}
$rewrite = new Rewrite();
$query = Rewrite::getQuery($_SERVER['REDIRECT_URL']);
$rewrite->controll($query);
//display 404
?>