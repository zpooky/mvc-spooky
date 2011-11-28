<?php
@define('ROOT','../');

require_once(ROOT.'site/config/ConfigInstance.php');

abstract class ViewAssembler {
	
	public $promoted = true;
	public $sidebarLeft = true;
	public $sidebarRight = true;
	public $bottomLeft = true;
	public $bottomMiddle = true;
	public $bottomRight = true;
	public $footerColumn1 = true;
	public $footerColumn2 = true;
	public $footerColumn3 = true;
	public $footerColumn4 = true;
	
	public function assemble(){
		$config = ConfigInstance::getInstance();
		$theme = $config->getTheme();
		$theme->setView($this);
		echo $theme->assemble();
	}
}