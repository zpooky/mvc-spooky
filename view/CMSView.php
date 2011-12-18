<?php
@define('ROOT','../');
require_once 'BaseView.php';
require_once ROOT.'lib/view/DefaultViewUtil.php';
class CMSView extends BaseView {
	private $page;
	public function setPage($page){
		$this->page = $page;
	}
	public function header(){
		return <<<EOD
<h1>Header</h1>	
EOD;
	}
	public function menu(){
		return array(
			'home' => array('text'=>'Home', 'url'=>'home'),
		);
	}
	public function getTitle(){
		return $this->page['c_title'];
	}
	public function sidebarLeft(){
		$cmsMenu = DefaultViewUtil::getCMSMenu(true,$this->getURLRoot());
		return <<<EOD
		{$cmsMenu}
EOD;
	}
	public function body(){
		$content = nl2br($this->page['c_content']);
		return <<<EOD
		<h1>{$this->page['c_subject']}</h1>
		<p>
		{$content}
		</p>
		<p>
		By {$this->page['u_user']}
		</p>
EOD;
	}
	public function footer(){
		return <<<EOD
			footer	
EOD;
	}
}
?>