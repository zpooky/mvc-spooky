<?php
@define('ROOT','../');
require_once 'BaseView.php';
require_once ROOT.'lib/view/DefaultViewUtil.php';
class CMSListAdminView extends BaseView {
	private $data;
	private $loggedIn;
	private $message = '';
	public function setLoggedIn($status){
		$this->loggedIn = $status;
	}
	public function setData(&$data){
		$this->data = $data;
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
		return 'CMS Admin list';
	}
	public function sidebarLeft(){
		$cmsMenu = DefaultViewUtil::getCMSMenu(true,$this->getURLRoot());
		return <<<EOD
		{$cmsMenu}
EOD;
	}
	public function body(){
		$updateURL = $this->getURLRoot().'cms/update/';
		$viewURL = $this->getURLRoot().'cms/home/';
		$returnHTML = <<<EOD
<table>
<tr><th>Subject</th><th style="width:100px;">By</th><th style="width:100px;">Manage</th></tr>
EOD;
		foreach($this->data as $row){
			$returnHTML .= '<tr><td><a href="'.$viewURL.$row['c_id'].'">'.$row['c_subject'].'</a></td><td>'.$row['u_user'].'</td><td><a href="'.$updateURL.$row['c_id'].'">Edit</a></td></tr>';
		}
		$returnHTML .= '</table>';
		return $returnHTML;
	}
	public function footer(){
		return <<<EOD
			footer	
EOD;
	}
}
?>