<?php
require_once 'BaseView.php';
class CMSUpdateView extends BaseView {
	public function getJavaScript(){
		return array('<script type="text/javascript" src="js/nicEdit/nicEdit.js"></script>');
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
		return <<<EOD
	menu	
EOD;
	}
	public function getTitle(){
		return 'Update - '.$this->page['c_title'];;
	}
	public function sidebarLeft(){
		return <<<EOD
		left
EOD;
	}
	public function body(){
		$formValidatorURL = ROOT.'form/FormHandler.php?c=CMSFormHandler&f=update';
		return <<<EOD
<form method="post" action="{$formValidatorURL}">
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