<?php
abstract class BaseView {
	protected $promoted = true;
	protected $sidebarLeft = true;
	protected $sidebarRight = true;
	protected $bottomLeft = true;
	protected $bottomMiddle = true;
	protected $bottomRight = true;
	protected $footerColumn1 = true;
	protected $footerColumn2 = true;
	protected $footerColumn3 = true;
	protected $footerColumn4 = true;

	public abstract function body();
	
	public function promoted(){
		$this->promoted = false;
	}
	
	public function sidebarLeft(){
		$this->sidebarLeft = false;
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
	
	public abstract function bottom();
}

?>