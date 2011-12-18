<?php
@define('ROOT','../');
require_once 'BaseView.php';
require_once ROOT.'lib/view/DefaultViewUtil.php';
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
<h1>Header</h1>
EOD;
	}
	public function menu(){
		return DefaultViewUtil::getMainMenu();
	}
	public function getTitle(){
		return 'Title';
	}
	public function sidebarLeft(){
		$cmsMenu = DefaultViewUtil::getCMSMenu(true,$this->getURLRoot());
		return <<<EOD
		{$cmsMenu}
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
}