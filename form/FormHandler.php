<?php
@define('ROOT','../');

/**
 * this should read all form handler classes and get the url from the class for witch the page should be redirected to
 */

/**
 * c: class
 * f: function
 * u: URL
 */
if(!isset($_GET['c']) || !isset($_GET['f'])){
	die('fail');
}

//crappy crap crap
$url = $_GET['u'] == null || !isset($_GET['u']) ? ROOT.'form/' : ROOT.urldecode($_GET['u']);
$class = str_replace(array('/','\\'), '', $_GET['c']);
$function = $_GET['f'];
require_once $url.$class.'.php';

$formValidator = new $class;
$formValidator->$function();
?>