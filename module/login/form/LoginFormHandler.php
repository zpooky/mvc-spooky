<?php
@define('ROOT','../../../');
require_once ROOT.'form/BaseFormHandler.php';

class BlogFormHandler extends BaseFormHandler {
	public function validate(){
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
		//header('Location: '.);
	}
}

?>