<?php
@define('ROOT','../');
require_once(ROOT.'controller/BaseController.php');

class HomeController extends BaseController {
	public function getRedirectBase(){
		return 'home';
	}
	protected function loadDatabase(){
		return true;
	}
	protected function loadViewClass(){
		return 'HomeView';
	}
	protected function index(){
		$blogModule = $this->getModule('Blog');
		$this->getView()->addModule($blogModule);
		$this->getView()->setPoster($blogModule->getBlogPoster());
		$homeModel = $this->getModel('HomeModel');
	}
}
?>