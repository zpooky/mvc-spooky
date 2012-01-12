<?php
class Util {//
	public static function redirect($location){
		header('Location: '.$location);
		exit();
	}
	public static function prepareURL($location){
		return str_replace($location, '&amp;',array('&amp;','&'));
	}
}