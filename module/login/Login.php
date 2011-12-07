<?php
class Login {
	public function getLoginForm(){
		return <<<EOD
		
EOD;
	}
	public function isLoggedIn(){
		return !isset($_SESSION['LOGGED_IN']) || $_SESSION['LOGGED_IN'] == null || !is_bool($_SESSION['LOGGED_IN']) ? false : $_SESSION['LOGGED_IN'];
	}
	public function getUserId(){
		
	}
}
?>
