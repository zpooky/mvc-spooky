<?php
require_once 'BaseView.php';
class HomeView extends BaseView {
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
		return "Title";
	}
	public function body(){
		return <<<EOD
			body	
EOD;
	}
	public function footer(){
		return <<<EOD
			footer	
EOD;
	}
}