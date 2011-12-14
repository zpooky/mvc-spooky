<?php
@define('ROOT','../');
require_once(ROOT.'controller/BaseController.php');

class HomeController extends BaseController {
	public function getRedirectBase(){
		return 'home';
	}
	public function getRedirectPage(){
		return '';
	}
	protected function loadDatabase(){
		return true;
	}
	protected function loadViewClass(){
		return 'HomeView';
	}
	protected function index(){
		$loginModule = $this->getModule('login');
		$view = $this->getView();
		$view->setPoster($loginModule->getLoginForm(''));
	}
}
?>