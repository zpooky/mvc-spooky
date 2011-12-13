<?php
@define('ROOT','../');
require_once(ROOT.'controller/BaseController.php');

class CMSUpdateController extends BaseController {
	public function getRedirectBase(){
		return 'cms/update';
	}
	protected function loadDatabase(){
		return true;
	}
	protected function loadViewClass(){
		return 'CMSUpdateView';
	}
	protected function index(){
		try{
			$p = $this->getPage();
			$cmsModel = $this->getModel('CMSModel');
			$data = $cmsModel->getPage($p);
			$view = $this->getView();
			$view->setPage($data);
		} catch(Exception $e){
			$this->get404($e->getMessage());
		}
	}
	public function getPage(){
		$get = $this->getGET();
		if(!isset($get['i']) || $get['i'] == null || empty($get['i'])){
			throw new Exception('Page not defined.',2);
		}
		return (int)$get['i'];
	}
}
?>