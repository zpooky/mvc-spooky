<?php
@define('ROOT','../../');

require_once(ROOT.'theme/ThemeInterface.php');
require_once ROOT.'site/config/ConfigInstance.php';
require_once ROOT.'lib/Util.php';

class Theme implements ThemeInterface {
	//width calculations
	private static $MAX_WIDTH = 24;
	private static $MIN_BODY_WIDTH = 16;
	private static $MIN_SIDEBAR_WIDTH = 4;
	private $contentWidth = 0;
	private $view;
	public function setView($view){
		$this->view = $view;
	}

	public function assemble(){
		$root = ConfigInstance::getInstance()->getURLRoot();
		return <<<EOD
<!DOCTYPE html>
<html lang="en" class="default">
	<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<title>{$this->getTitle()}</title>
		<!-- JavaScript -->
		{$this->getJs()}
		<!-- CSS -->
		{$this->getCSS()}
		<link rel="stylesheet" href="{$root}theme/blueprint/screen.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="{$root}theme/blueprint/print.css" type="text/css" media="print">
		<link rel="stylesheet" href="{$root}theme/default/css/style.css" type="text/css">
		<!--[if lt IE 8]><link rel="stylesheet" href="{$root}theme/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
		{$this->getHead()}
	</head>
	<body>
		<div class="container">
			<!-- HEADER -->
			<div id="ms-header" class="span-24 last">
			{$this->view->header()}
			</div>
			<!-- MENU -->
			<div id="ms-menu-bar" class="span-24 last">
			<ul id="ms-menu">
				{$this->getMenu()}
			</ul>
			</div>
			{$this->getPromoted()}
			{$this->getContentContainer()}
			{$this->getBottomContainer()}
			{$this->getFooterContainer()}
			<!-- BOTTOM -->
			<div id="ms-footer" class="append-bottom"><!-- last? -->
				{$this->view->footer()}
			</div>
		</div>
	</body>
</html>
EOD;
	}
	public function getTitle(){
		return htmlentities($this->view->getTitle());
	}
	public function getJs(){
		$returnJsHtml = "";
		foreach($this->view->getModule() as $module){
			foreach($module->getJavascript() as $js){
				$returnJsHtml .= $js;
			}
		}
		foreach($this->view->getJavascript() as $js){
			$returnJsHtml .= $js;
		}
		return $returnJsHtml;
	}
	public function getCSS(){
		$returnCSSHtml = "";
		foreach($this->view->getModule() as $module){
			foreach($module->getCSS() as $css){
				$returnCSSHtml .= $css;
			}
		}
		return $returnCSSHtml;
	}
	public function getHead(){
		$returnHeadHtml = "";
		foreach($this->view->getModule() as $module){
			$returnHeadHtml .= $module->getHead();
		}
		$returnHeadHtml .= $this->view->head();
		return $returnHeadHtml;
	}
	public function getMenu(){
		require_once ROOT.'site/config/ConfigInstance.php';
		$root = ConfigInstance::getInstance()->getURLRoot();
		$returnMenuHtml = '';
		try {
			foreach($this->view->menu() as $menuItem){
				$returnMenuHtml .= '<li><a href="'.$root.$menuItem['url'].'">'.$menuItem['text'].'</a></li>';
			}
		} catch(Exception $e){
		}
		return $returnMenuHtml;
	}
	public function getPromoted(){
		$html = $this->view->promoted();
		if($this->view->promoted){
			return <<<EOD
			<!-- PROMOTED -->
			<div id="ms-promoted" class="span-24 last">
			{$html}
			</div>
EOD;
		}
		return '';
	}
	
	public function getContentContainer(){
		$sidebarLeftHTML = $this->getSidebarLeft();
		$sidebarRightHTML = $this->getSidebarRight();
		$bodyHTML = $this->getBody(!$this->view->sidebarRight);
		return <<<EOD
			{$sidebarLeftHTML}
			{$bodyHTML}
			{$sidebarRightHTML}	
EOD;
	}
	public function getSidebarLeft(){
		$html = $this->view->sidebarLeft();
		if($this->view->mSidebarLeft){
			$this->contentWidth += self::$MIN_SIDEBAR_WIDTH;
			return <<<EOD
			<!-- SIDEBAR LEFT -->
			<div id="ms-sidebar-left" class="span-4">
			<div style="padding: 2px 2px 2px 2px;">
			{$html}
			</div>
			</div>	
EOD;
		}
		return '';
	}
	public function getBody($last = false){
		$add = $last ? ' last' : '';
		$html = $this->view->body();
		$this->contentWidth += self::$MIN_BODY_WIDTH;
		return <<<EOD
		<div id="ms-body" class="span-{$this->getBodyWidth()}{$add}">
			<div style="padding: 10px 10px 10px 10px;">
			{$html}
			</div>
		</div>
EOD;
	}
	
	private function getBodyWidth(){
		return self::$MIN_BODY_WIDTH+(self::$MAX_WIDTH-$this->contentWidth);
	}
	
	public function getSidebarRight(){
		$html = $this->view->sidebarRight();
		if($this->view->sidebarRight){
			$this->contentWidth += self::$MIN_SIDEBAR_WIDTH;
			return <<<EOD
			<!-- SIDEBAR RIGHT -->
			<div id="ms-sidebar-right" class="span-4 last">
				{$html}
			</div>
EOD;
		}
		return '';
	}
	
	public function getBottomContainer(){
		$right = $this->getBottomRight();
		$middle = $this->getBottomMiddle(!$this->view->bottomRight);
		$left = $this->getBottomLeft((!$this->view->bottomMiddle && !$this->view->bottomRight));
		$returnHtml = <<<EOD
			<!-- BOTTOM CONTAINER -->
			<div class="append-bottom">
				<div class="container">
				{$left}
				{$middle}
				{$right}
				</div>
			</div>	
EOD;
		if($this->view->bottomLeft || $this->view->bottomMiddle || $this->view->bottomRight){
			return $returnHtml;
		}
		return '';
	}
	public function getBottomLeft($last = false){
		$add = $last ? ' last' : '';
		$html = $this->view->bottomLeft();
		if($this->view->bottomLeft){
			return <<<EOD
					<!-- LEFT BOTTOM -->
					<div id="ms-left-bottom" class="span-8"{$add}>
						{$html}
					</div>
EOD;
		}
		return '';
	}
	public function getBottomMiddle($last = false){
		$add = $last ? ' last' : '';
		$html = $this->view->bottomMiddle();
		if($this->view->bottomMiddle){
			return <<<EOD
					<!-- MIDDLE BOTTOM -->
					<div id="ms-middle-bottom" class="span-8"{$add}>
						{$html}
					</div>
EOD;
		}
		return '';
	}
	public function getBottomRight(){
		$html = $this->view->bottomRight();
		if($this->view->bottomRight){
			return <<<EOD
					<!-- RIGHT BOTTOM -->
					<div id="ms-right-bottom" class="span-8 last">
						{$html}
					</div>
EOD;
		}
		return '';
	}
	public function getFooterContainer(){
		$footer4 = $this->getFooterColumn4();
		$footer3 = $this->getFooterColumn3(!$this->view->footerColumn4);
		$footer2 = $this->getFooterColumn2((!$this->view->footerColumn4 || !$this->view->footerColumn3));
		$footer1 = $this->getFooterColumn1((!$this->view->footerColumn4 || !$this->view->footerColumn3 || !$this->view->footerColumn2));
		$returnHtml = <<<EOD
			<!-- FOOTER CONTAINER-->
			<div class="append-bottom">
				<footer class="container">
				{$footer1}
				{$footer2}
				{$footer3}
				{$footer4}
				</footer>
			</div>
EOD;
		if($this->view->footerColumn1 || $this->view->footerColumn2 || $this->view->footerColumn3 || $this->view->footerColumn4){
			return $returnHtml;
		}
		return '';
	}
	public function getFooterColumn1($last = false){
		$add = $last ? ' last' : '';
		$html = $this->view->footerColumn1();
		if($this->view->footerColumn1){
			return <<<EOD
					<!-- FOOTER COLUMN 1 -->
					<div id="ms-footer-column1" class="span-6"{$add}>
						{$html}
					</div>
EOD;
		}
		return '';
	}
	public function getFooterColumn2($last = false){
		$add = $last ? ' last' : '';
		$html = $this->view->footerColumn2();
		if($this->view->footerColumn2){
			return <<<EOD
					<!-- FOOTER COLUMN 2 -->
					<div id="ms-footer-column2" class="span-6"{$add}>
						{$html}
					</div>
EOD;
		}
		return '';
	}
	public function getFooterColumn3($last = false){
		$add = $last ? ' last' : '';
		$html = $this->view->footerColumn3();
		if($this->view->footerColumn3){
			return <<<EOD
					<!-- FOOTER COLUMN 3 -->
					<div id="ms-footer-column3" class="span-6"{$add}>
						{$html}
					</div>
EOD;
		}
		return '';
	}
	public function getFooterColumn4(){
		$html = $this->view->footerColumn4();
		if($this->view->footerColumn4){
			return <<<EOD
					<!-- FOOTER COLUMN 4 -->
					<div id="ms-footer-column4" class="span-6 last">
						{$html}
					</div>
EOD;
		}
		return '';
	}
}

?>