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
		return <<<EOD
<form method="post" action="">
	<input type="text" name="blog_title" id="blog_title" style="width: 100%;" />
	<textarea name="blog_text id="blog_text" style="width: 100%;"></textarea>
	<input type="submit" value="Submit" />
</form>
EOD;
	}
}
?>