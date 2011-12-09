<?php
@define('ROOT','../../');
require ROOT.'module/ModuleInterface.php';
class Blog implements ModuleInterface {
	public function getJavascript(){
		return array('<script type="text/javascript" src="module/blog/js/nicEdit/nicEdit.js"></script>');
	}
	public function getCSS(){
		return array();
	}
	public function getHead(){
		return <<<EOD
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>	
EOD;
	}
	public function getBlogPoster(){
		$formValidatorURL = ROOT.'form/FormHandler.php?c=BlogFormHandler&f=validate&u='.urlencode('blog');
		return <<<EOD
<form method="post" action="{$formValidatorURL}">
	<input type="text" name="blog_subject" id="blog_subject" style="width: 100%;" />
	<textarea name="blog_post" id="blog_post" style="width: 100%;"></textarea>
	<input type="submit" value="Submit" />
</form>
EOD;
	}
}
?>