<?php
class Login {
	public function getLoginForm($redirectTo){
		$formValidatorURL = ROOT.'form/FormHandler.php?c=LoginFormHandler&f=login&u='.urlencode('login');
		return <<<EOD
<form method="post" action="{$formValidatorURL}">
<input type="text" name="username" id="username" />
<input type="password" name="password" id="password" />
<input type="submit" id="login" />
</form>
EOD;
	}
	public function isLoggedIn(){
		return !isset($_SESSION['LOGGED_IN']) || $_SESSION['LOGGED_IN'] == null || !is_bool($_SESSION['LOGGED_IN']) ? false : $_SESSION['LOGGED_IN'];
	}
	public function getUserId(){
		if(!isset($_SESSION['U_ID']) || $_SESSION['U_ID'] == null || !is_numeric($_SESSION['U_ID'])){
			unset($_SESSION['LOGGED_IN']);
			unset($_SESSION['U_ID']);
			throw new Exception('Not Logged in.', 1);
		}
		return $_SESSION['U_ID'];
	}
	public function logout(){
		session_destroy();
		unset($_SESSION['LOGGED_IN']);
		unset($_SESSION['U_ID']);
		session_start();
		$_SESSION['LOGGED_IN'] = false;
	}
}
?>
