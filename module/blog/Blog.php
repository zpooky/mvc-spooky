<?php
@define('ROOT','../../');
require ROOT.'module/ModuleInterface.php';
class Blog implements ModuleInterface {
	private function getJavascript(){
		return array('<script type="text/javascript" src="../nicEdit.js"></script>');
	}
	private function getCSS(){
		return array();
	}
	private function getHead(){
		return <<<EOD
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>	
EOD;
	}
	private function getBlogPoster(){
		return <<<EOD
<form method="post" action="">
	<input type="text" name="blog_title" id="blog_title" />
	<textarea name="blog_text id="blog_text"></textarea>
	<input type="submit" value="Submit" />
</form>
EOD;
	}
}
?>