﻿<?php
@define('ROOT','../');
require_once 'BaseView.php';
require_once ROOT.'lib/view/DefaultViewUtil.php';
class CMSView extends BaseView {//
	private $page;
	public function setPage($page){
		$this->page = $page;
	}
	public function header(){
		return <<<EOD
<h1>Header</h1>	
EOD;
	}
	public function head(){
		return $this->page['c_meta'];
	}
	public function menu(){
		return DefaultViewUtil::getMainMenu();
	}
	public function getTitle(){
		return utf8_decode($this->page['c_title']);
	}
	public function sidebarLeft(){
		$cmsMenu = DefaultViewUtil::getCMSMenu(true,$this->getURLRoot());
		return <<<EOD
		{$cmsMenu}
EOD;
	}
	public function body(){
		$content = html_entity_decode(nl2br($this->page['c_content']));

		$subject = htmlentities(utf8_decode($this->page['c_subject']));
		return <<<EOD
		<h1>{$subject}</h1>
		<p>
		{$content}
		</p>
		<p>
		By {$this->page['u_user']}
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