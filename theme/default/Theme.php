<?php
@define('ROOT','../../');

require_once(ROOT.'theme/ThemeInterface.php');

class Theme implements ThemeInterface {
	private $view;
	public function setView($view){
		$this->view = $view;
	}

	public function assemble(){
		return <<<EOD
<!DOCTYPE html>
<html lang="en" class="default">
	<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<title>{$this->view->getTitle()}</title>
		<!-- CSS -->
		<link rel="stylesheet" href="theme/blueprint/screen.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="theme/blueprint/print.css" type="text/css" media="print">
		<link rel="stylesheet" href="theme/default/css/style.css" type="text/css">
		<!--[if lt IE 8]><link rel="stylesheet" href="../blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
	</head>
	<body>
		<div class="container">
			<!-- HEADER -->
			<div id="ms-header">
			{$this->view->header()}
			</div>
			<!-- MENU -->
			<div id="ms-menu-bar">
				<nav id="ms-menu">
				{$this->getMenu()}
				</nav>
			</div>
			{$this->getPromoted()}
			{$this->getSidebarLeft()}
			<!-- BODY -->
			<div id="ms-body" class="span-16">
				{$this->view->body()}
			</div>
			{$this->getSidebarRight()}
			<!-- BOTTOM -->
			<div class="prepend-top append-bottom">
				<div class="container">
				{$this->getBottomLeft()}
				{$this->getBottomMiddle()}
				{$this->getBottomRight()}
				</div>
			</div>
			<!-- FOOTER -->
			<div class="prepend-top">
				<footer class="container">
				{$this->getFooterColumn1()}
				{$this->getFooterColumn2()}
				{$this->getFooterColumn3()}
				{$this->getFooterColumn4()}
				</footer>
			</div>
			<!-- BOTTOM -->
			<div id="ms-footer">
				{$this->view->footer()}
			</div>
		</div>
	</body>
</html>
EOD;
	}
	public function getMenu(){

	}
	public function getPromoted(){
		if($this->view->promoted){
			return <<<EOD
			<!-- PROMOTED -->
			<div id="ms-promoted" class="span-24 last">
			{$this->view->promoted()}
			</div>	
EOD;
		}
		return '';
	}
	public function getSidebarLeft(){
		if($this->view->sidebarLeft){
			return <<<EOD
			<!-- SIDEBAR LEFT -->
			<div id="ms-sidebar-left" class="span-4">
				{$this->view->sidebarLeft()}
			</div>	
EOD;
		}
		return '';
	}
	public function getSidebarRight(){
		if($this->view->sidebarLeft){
			return <<<EOD
			<!-- SIDEBAR RIGHT -->
			<div id="ms-sidebar-right" class="span-4 last">
				{$this->view->sidebarRight()}
			</div>
EOD;
		}
		return '';
	}
	public function getBottomLeft(){
		if($this->view->bottomLeft){
			return <<<EOD
					<!-- LEFT BOTTOM -->
					<div id="ms-left-bottom" class="span-7">
						{$this->view->bottomLeft()}
					</div>
EOD;
		}
		return '';
	}
	public function getBottomMiddle(){
		if($this->view->bottomMiddle){
			return <<<EOD
					<!-- MIDDLE BOTTOM -->
					<div id="ms-middle-bottom" class="span-8">
						{$this->view->bottomMiddle()}
					</div>
EOD;
		}
		return '';
	}
	public function getBottomRight(){
		if($this->view->bottomRight){
			return <<<EOD
					<!-- RIGHT BOTTOM -->
					<div id="ms-right-bottom" class="span-8 last">
						{$this->view->bottomRight()}
					</div>
EOD;
		}
		return '';
	}
	public function getFooterColumn1(){
		if($this->view->footerColumn1){
			return <<<EOD
					<!-- FOOTER COLUMN 1 -->
					<div id="ms-footer-column1" class="span-6">
						{$this->view->footerColumn1()}
					</div>
EOD;
		}
		return '';
	}
	public function getFooterColumn2(){
		if($this->view->footerColumn2){
			return <<<EOD
					<!-- FOOTER COLUMN 2 -->
					<div id="ms-footer-column2" class="span-6">
						{$this->view->footerColumn2()}
					</div>
EOD;
		}
		return '';
	}
	public function getFooterColumn3(){
		if($this->view->footerColumn3){
			return <<<EOD
					<!-- FOOTER COLUMN 3 -->
					<div id="ms-footer-column3" class="span-6">
						{$this->view->footerColumn3()}
					</div>
EOD;
		}
		return '';
	}
	public function getFooterColumn4(){
		if($this->view->footerColumn4){
			return <<<EOD
					<!-- FOOTER COLUMN 4 -->
					<div id="ms-footer-column4" class="span-6 last">
						{$this->view->footerColumn4()}
					</div>
EOD;
		}
		return '';
	}
}

?>