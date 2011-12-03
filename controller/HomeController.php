<?php
@define('ROOT','../');
require_once(ROOT.'controller/BaseController.php');

class HomeController extends BaseController {
	protected function loadDatabase(){
		return false;
	}
	protected function loadViewClass(){
		return 'HomeView';
	}
	protected function index(){
		$blogModule = $this->getModule('Blog');
		$this->getView()->addModule($blogModule);
		$this->getView()->setPoster($blogModule->getBlogPoster());
	}
}
?>