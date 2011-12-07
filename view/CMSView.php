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
		return <<<EOD
	menu	
EOD;
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
		return <<<EOD
		<h1>{$this->page['c_subject']}</h1>
		<p>
		{$this->page['c_content']}
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