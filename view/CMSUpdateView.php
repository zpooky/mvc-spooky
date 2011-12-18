<?php
@define('ROOT','../');
require_once 'BaseView.php';
require_once ROOT.'lib/view/DefaultViewUtil.php';
class CMSUpdateView extends BaseView {
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
<h1>Header</h1>	
EOD;
	}
	public function menu(){
		return DefaultViewUtil::getMainMenu();
	}
	public function getTitle(){
		return 'Update - '.$this->page['c_title'];;
	}
	public function sidebarLeft(){
		$cmsMenu = DefaultViewUtil::getCMSMenu(true,$this->getURLRoot());
		return <<<EOD
		{$cmsMenu}
EOD;
	}
	public function body(){
		$formValidatorURL = $this->getURLRoot().'form/FormHandler.php?c=CMSFormHandler&f=update';
		return <<<EOD
<form method="post" action="{$formValidatorURL}">
	<input type="hidden" name="id" value="{$this->page['c_id']}" />
	<input type="text" name="title" id="title" value="{$this->page['c_title']}" style="width: 100%;" />
	<input type="text" name="subject" id="subject" value="{$this->page['c_subject']}" style="width: 100%;" />
	<textarea name="post" id="post" style="width: 100%;">{$this->page['c_content']}</textarea>
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