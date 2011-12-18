<?php
require_once 'BaseView.php';
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
		return <<<EOD
{$this->poster}
{$this->getMenu()}
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
	private function getMenu(){
		if(!$this->loggedIn){
			return '';
		}
		$createCMSURL = '<a href="'.$this->getURLRoot().'cms/create">Create</a>';
		$listCMSURL = '<a href="'.$this->getURLRoot().'cms/list">List</a>';
		return <<<EOD
<div id="menu">
	<p style="background-color: #b5b5aa;padding-bottom: 0px;margin-bottom:0px;">CMS Menu</p>
	<ul style="padding-left: 0px;padding-top: 0px;margin-top:0px;">
	<li style="display: block;">{$createCMSURL}</li>
	<li style="display: block;">{$listCMSURL}</li>
	</p>
</div>
EOD;
	}
}