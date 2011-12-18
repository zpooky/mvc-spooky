<?php
require_once 'BaseView.php';
class HomeView extends BaseView {
	private $poster;
	public function setPoster($poster){
		$this->poster = $poster;
	}
	public function getTitle(){
		return 'Title';
	}
	public function header(){
		return <<<EOD
	<h1>Header</h1>	
EOD;
	}
	public function menu(){
		return array(
			'home' => array('text'=>'Home', 'url'=>'home')
		);
	}
	public function sidebarLeft(){
		return <<<EOD
{$this->poster}
EOD;
	}
	public function body(){
		return <<<EOD
				
EOD;
	}
	public function footer(){
		return <<<EOD
			footer	
EOD;
	}
}