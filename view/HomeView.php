<?php
@define('ROOT','../');
require_once 'BaseView.php';
require_once ROOT.'lib/view/DefaultViewUtil.php';
class HomeView extends BaseView {
	private $poster;
	private $loggedIn;
	public function setPoster($poster){
		$this->poster = $poster;
	}
	public function setLoggedIn($status){
		$this->loggedIn = $status;
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
		$cmsMenu = DefaultViewUtil::getCMSMenu($this->loggedIn,$this->getURLRoot());
		return <<<EOD
{$this->poster}
{$cmsMenu}
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