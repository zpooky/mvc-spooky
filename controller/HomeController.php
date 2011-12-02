<?php
@define('ROOT','../');

require_once(ROOT.'controller/BaseController.php');

class HomeController extends BaseController {
	protected function loadDatabase(){
		return false;
	}
	
}
?>