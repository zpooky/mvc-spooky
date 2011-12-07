<?php
@define('ROOT','../');
require_once ROOT.'view/ViewAssembler.php';
abstract class BaseView extends ViewAssembler {
	protected $module = array();
	public function addModule($module){
		$this->module[] = $module;
	}
	public function getModule(){
		return $this->module;
	}
	public function getJavaScript(){
		return array();
	}
	public function head(){
		
	}
	
	public abstract function header();
	//Array of menu items
	public abstract function menu();
	
	public abstract function getTitle();
	public abstract function body();
	
	public function promoted(){
		$this->promoted = false;
	}
	
	public function sidebarLeft(){
		$this->mSidebarLeft = false;
	}
	
	public function sidebarRight(){
		$this->sidebarRight = false;
	}
	
	public function bottomLeft(){
		$this->bottomLeft = false;
	}
	
	public function bottomMiddle(){
		$this->bottomMiddle = false;
	}
	
	public function bottomRight(){
		$this->bottomRight = false;
	}
	
	public function footerColumn1(){
		$this->footerColumn1 = false;
	}
	
	public function footerColumn2(){
		$this->footerColumn2 = false;
	}
	
	public function footerColumn3(){
		$this->footerColumn3 = false;
	}
	
	public function footerColumn4(){
		$this->footerColumn4 = false;
	}
	
	public abstract function footer();
}

?>