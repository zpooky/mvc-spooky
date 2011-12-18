<?php
require_once 'BaseView.php';
class CMSCreateView extends BaseView {
	private $page;
	public function setPage($page){
		$this->page = $page;
	}
	public function getJavaScript(){
		return array('<script type="text/javascript" src="'.$this->getURLRoot().'js/nicEdit/nicEdit.js"></script>');
	}
	public function head(){
		return <<<EOD
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>		
EOD;
	}
	public function header(){
		return <<<EOD
	Header	
EOD;
	}
	public function menu(){
		return  array(
			'home' => array('text'=>'Home', 'url'=>'home'),
		);
	}
	public function getTitle(){
		return 'Title';
	}
	public function sidebarLeft(){
		return <<<EOD
		left
EOD;
	}
	public function body(){
		$formValidatorURL = $this->getURLRoot().'form/FormHandler.php?c=CMSFormHandler&f=create';
		return <<<EOD
<form method="post" action="{$formValidatorURL}">
	<input type="text" name="title" id="title" style="width: 100%;" />
	<input type="text" name="subject" id="subject" style="width: 100%;" />
	<textarea name="post" id="post" style="width: 100%;"></textarea>
	<input type="submit" value="Submit" />
</form>
EOD;
	}
	public function footer(){
		return <<<EOD
			footer	
EOD;
	}
}