<?php
@define('ROOT','../../');

require_once(ROOT.'theme/default/ThemeInterface.php');

class Theme implements ThemeInterface {
	private $view;
	public function setView($view){
		$this->view = $view;
	}
	
	public function assembly(){
		
	}
}

?>