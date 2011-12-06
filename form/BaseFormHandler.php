<?php
abstract class BaseFormHandler {
	private $urlArguments;
	public function __construct(){
		$this->urlArguments = $_GET;
	}
	protected function getURLArguments(){
		return $this->urlArguments;
	}
}

?>