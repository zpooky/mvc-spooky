<?php
@define('ROOT','../');
require_once(ROOT.'controller/BaseController.php');

class CMSController extends BaseController {
	protected function loadDatabase(){
		return true;
	}
	protected function loadViewClass(){
		return 'CMSView';
	}
	protected function index(){
		try{
			$p = $this->getPage();
			$cmsModel = $this->getModel('CMSModel');
			$data = $cmsModel->getPage($p);
			$view = $this->getView();
			$view->setPage($data);
		} catch(Exception $e){
			$this->get404();
		}
	}
	public function getPage(){
		$get = $this->getGET();
		if(!isset($get['p']) || $get['p'] == null || empty($get['p'])){
			throw new Exception();
		}
		return (int)$get['p'];
	}
}
?>