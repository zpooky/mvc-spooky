<?php
@define('ROOT','../');

require_once(ROOT.'site/config/ConfigInstance.php');

abstract class ViewAssembler {//
	
	public $promoted = true;
	public $mSidebarLeft = true;
	public $sidebarRight = true;
	public $bottomLeft = true;
	public $bottomMiddle = true;
	public $bottomRight = true;
	public $footerColumn1 = true;
	public $footerColumn2 = true;
	public $footerColumn3 = true;
	public $footerColumn4 = true;
	
	public function __construct(){
		$this->promoted = true;
		$this->mSidebarLeft = true;
		$this->sidebarRight = true;
		$this->bottomLeft = true;
		$this->bottomMiddle = true;
		$this->bottomRight = true;
		$this->footerColumn1 = true;
		$this->footerColumn2 = true;
		$this->footerColumn3 = true;
		$this->footerColumn4 = true;
	}
	
	public function assemble(){
		$config = ConfigInstance::getInstance();
		$theme = $config->getTheme();
		$theme->setView($this);
		echo $theme->assemble();
	}
}