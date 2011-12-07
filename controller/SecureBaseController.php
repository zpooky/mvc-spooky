<?php
@define('ROOT','../');
require_once(ROOT.'controller/BaseController.php');
abstract class SecureBaseController extends BaseController {
	public function __construct(){
		BaseController::__construct();
		$this->loadSecurity();
	}
	protected abstract function isForceLogin();
	public function loadSecurity(){
		$loginModule = $this->getModule('login');
		if(!$loginModule->isLoggedIn()){
			$this->get404('Access denied!');
		}
	}
}
?>