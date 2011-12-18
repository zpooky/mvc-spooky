<?php
require_once 'BaseView.php';
class CMSCreateView extends BaseView {
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
		{$this->getMenu()}
EOD;
	}
	public function body(){
		$formValidatorURL = $this->getURLRoot().'form/FormHandler.php?c=CMSFormHandler&f=create';
		return <<<EOD
<form method="post" action="{$formValidatorURL}">
	<label for="title">HTML Title: </label>
	<input type="text" name="title" id="title" style="width: 100%;" />
	<label for="subject">Subject: </label>
	<input type="text" name="subject" id="subject" style="width: 100%;" />
	<label for="post">Content: </label>
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
	private function getMenu(){
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