<?php
@define('ROOT','../../');
require_once ROOT.'site/config/ConfigInstance.php';
class Login {
	public function getLoginForm($redirectTo){
		$url = ConfigInstance::getInstance()->getURLRoot();
		if($this->isLoggedIn()){
			$formValidatorURL = $url.'form/FormHandler.php?c=LoginFormHandler&amp;f=logout&amp;u='.urlencode('login');
			return <<<EOD
<a href="{$formValidatorURL}">Logout</a>
EOD;
		}
		$formValidatorURL = $url.'form/FormHandler.php?c=LoginFormHandler&amp;f=login&amp;u='.urlencode('login');
		return <<<EOD
<form method="post" action="{$formValidatorURL}">
	<label for="username">Username: </label><input type="text" name="username" id="username" /><br />
	<label for="password">Password: </label><input type="password" name="password" id="password" /><br />
	<input type="submit" id="login" value="Submit" /><br />
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
		unset($_SESSION);
		session_start();
		$_SESSION['LOGGED_IN'] = false;
	}
}
?>
