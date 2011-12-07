<?php
@define('ROOT','../');
require_once(ROOT.'controller/SecureBaseController.php');

class CMSCreateController extends SecureBaseController {
	protected function loadDatabase(){
		return false;
	}
	protected function isForceLogin(){
		return true;
	}
	protected function loadViewClass(){
		return 'CMSCreateView';
	}
	protected function index(){
	}
}
?>
