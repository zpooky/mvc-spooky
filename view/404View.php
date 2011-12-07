<?php
require_once 'BaseView.php';
class CMSView extends BaseView {
	public function header(){
		return <<<EOD
	Header	
EOD;
	}
	public function menu(){
		return <<<EOD
	menu	
EOD;
	}
	public function getTitle(){
		return '404';
	}
	public function sidebarLeft(){
		return <<<EOD
		left
EOD;
	}
	public function body(){
		return <<<EOD
		404
EOD;
	}
	public function footer(){
		return <<<EOD
			footer	
EOD;
	}
}
?>