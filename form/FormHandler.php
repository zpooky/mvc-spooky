<?php session_start();
@define('ROOT','../');
/**
 * c: class
 * f: function
 * u: URL
 */
if(!isset($_GET['c']) || !isset($_GET['f'])){
	die('fail');
}

//crappy crap crap
$url = !isset($_GET['u']) || $_GET['u'] == null ? ROOT.'form/' : ROOT.'module/'.urldecode($_GET['u']).'/form/';
$class = str_replace(array('/','\\'), '', $_GET['c']);
$function = $_GET['f'];
require_once $url.$class.'.php';

$formValidator = new $class;
$formValidator->$function();
?>