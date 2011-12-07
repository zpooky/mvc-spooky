<?php
require_once 'BaseView.php';
class CMSCreateView extends BaseView {
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
		return 'Title';
	}
	public function sidebarLeft(){
		return <<<EOD
		left
EOD;
	}
	public function body(){
		return <<<EOD
<form method="post" action="">

</form>
EOD;
	}
	public function footer(){
		return <<<EOD
			footer	
EOD;
	}
}