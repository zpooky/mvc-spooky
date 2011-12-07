<?php
require_once 'BaseView.php';
class HTTP404View extends BaseView {
	private $message;
	public function setMessage($message){
		$this->message = $message;
	}
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