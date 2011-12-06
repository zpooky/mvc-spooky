<?php
@define('ROOT','../');

/**
 * this should read all form handler classes and get the url from the class for witch the page should be redirected to
 */

/**
 * c: class
 * f: function
 */
if(!isset($_GET['c']) || !isset($_GET['f'])){
	die('fail');
}
$class = str_replace(array('/','\\'), '', $_GET['c']);
$function = $_GET['f'];

require_once ROOT.'form/'.$class.'.php';

$formValidator = new $class;
$formValidator->$function();
?>