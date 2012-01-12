<?php
@define('ROOT','../');
require_once(ROOT.'controller/BaseController.php');

class HTTP404Controller extends BaseController {
	public function getRedirectBase(){
		return '404';
	}
	public function getRedirectPage(){
		return '';
	}
	protected function loadDatabase(){
		return false;
	}
	protected function loadViewClass(){
		return 'HTTP404View';
	}
	protected function index(){
		$loginModule = $this->getModule('login');
		$view = $this->getView();
		$view->setLoggedIn($loginModule->isLoggedIn());
	}
}//
?>