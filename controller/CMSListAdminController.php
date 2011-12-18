<?php
@define('ROOT','../');
require_once(ROOT.'controller/SecureBaseController.php');

class CMSListAdminController extends SecureBaseController {
	public function getRedirectBase(){
		return 'cms';
	}
	public function getRedirectPage(){
		return 'alist';
	}
	protected function loadDatabase(){
		return true;
	}
	protected function isForceLogin(){
		return true;
	}
	protected function loadViewClass(){
		return 'CMSListAdminView';
	}
	protected function index(){
		$cmsModel = $this->getModel('CMSModel');
		$data = $cmsModel->listAll('DESC');
		$view = $this->getView();
		$view->setData($data);
		$loginModule = $this->getModule('login');
		$view->setLoggedIn($loginModule->isLoggedIn());
	}
}
?>
