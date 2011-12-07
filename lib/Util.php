<?php
class Util {
	public static function redirect($location){
		header('Location '.$location);
		exit();
	}
}