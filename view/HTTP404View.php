<?php
@define('ROOT','../');
require_once 'BaseView.php';
require_once ROOT.'lib/view/DefaultViewUtil.php';
class HTTP404View extends BaseView {
	private $loggedIn = false;
	private $message = '';
	public function setLoggedIn($status){
		$this->loggedIn = $status;
	}
	//
	public function setMessage($message){
		$this->message = $message;
	}
	public function header(){
		return <<<EOD
	<h1>Header</h1>	
EOD;
	}
	public function menu(){
		return DefaultViewUtil::getMainMenu();
	}
	public function getTitle(){
		return '404';
	}
	public function sidebarLeft(){
		$cmsMenu = DefaultViewUtil::getCMSMenu($this->loggedIn,$this->getURLRoot());
		return <<<EOD
		{$cmsMenu}
EOD;
	}
	public function body(){
		return <<<EOD
		<h1>404</h1>
		<p>
		{$this->message}
		</p>
EOD;
	}
	public function footer(){
		return <<<EOD
			footer	
EOD;
	}
}
?>