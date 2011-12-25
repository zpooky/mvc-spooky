<?php
class DefaultViewUtil {
	public static function getCMSMenu($loggedIn = true,$root){
		if(!$loggedIn){
			return '';
		}
		$createCMSURL = '<a href="'.$root.'cms/create">Create</a>';
		$listCMSURL = '<a href="'.$root.'cms/alist">List</a>';
		return <<<EOD
<div id="menu">
	<p style="background-color: #b5b5aa;padding-bottom: 0px;margin-bottom:0px;">CMS Menu</p>
	<ul style="padding-left: 0px;padding-top: 0px;margin-top:0px;">
	<li style="display: block;">{$createCMSURL}</li>
	<li style="display: block;">{$listCMSURL}</li>
	</ul>
	</p>
</div>
EOD;
	}
	public static function getMainMenu(){
		return array(
			'home' => array('text'=>'Home', 'url'=>'home'),
		);
	}
}

?>