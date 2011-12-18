<?php
@define('ROOT','../../../');
require_once ROOT.'lib/Util.php';
require_once ROOT.'form/BaseFormHandler.php';

class LoginFormHandler extends BaseFormHandler {
	public function login(){
		$loginModel = $this->getModel('LoginModel','module/login/');
		$post = $this->getPOST();
		try{
			$id = $loginModel->login($post['username'],sha1($post['password']));
			$_SESSION['LOGGED_IN'] = true;
			$_SESSION['U_ID'] = $id;
		}catch(Exception $e){
			$_SESSION['LOGGED_IN'] = false;
			unset($_SESSION['U_ID']);
		}
		Util::redirect($this->getURLRoot().'home');
	}
	public function logout(){
		$loginModule = $this->getModule("login");
		$loginModule->logout();
		Util::redirect($this->getURLRoot().'home');
	}
}

?>