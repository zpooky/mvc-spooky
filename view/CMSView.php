<?php
require_once 'BaseView.php';
class CMSView extends BaseView {
	private $page;
	public function setPage($page){
		$this->page = $page;
	}
	public function header(){
		return <<<EOD
	Header	
EOD;
	}
	public function menu(){
		return array(
			'home' => array('text'=>'Home', 'url'=>'home'),
		);
	}
	public function getTitle(){
		return $this->page['c_title'];
	}
	public function sidebarLeft(){
		return <<<EOD
		left
EOD;
	}
	public function body(){
		$content = nl2br($this->page['c_content']);
		return <<<EOD
		<h1>{$this->page['c_subject']}</h1>
		<p>
		{$content}
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