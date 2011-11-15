<?php
abstract class BaseView {
	private $left = true;
	protected function __construct(){
		
	}
	
	public abstract function body();
	
	public function left(){
		$this->left = false;
	}
}

?>