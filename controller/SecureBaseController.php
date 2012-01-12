<?php
@define('ROOT','../');
require_once(ROOT.'controller/BaseController.php');
abstract class SecureBaseController extends BaseController {
	public function __construct(){
	}
	public function postConstruct(){
		parent::postConstruct();
		$this->loadSecurity();
	}
	protected abstract function isForceLogin();
	public function loadSecurity(){
		$loginModule = $this->getModule('login');
		if(!$loginModule->isLoggedIn()){
			$this->accessDenied();
		}
	}
	private function accessDenied(){
		$this->get404('Access denied!');
		$this->assemble();
		exit();
	}//
}
?>