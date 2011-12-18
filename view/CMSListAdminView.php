<?php
@define('ROOT','../');
require_once 'BaseView.php';
require_once ROOT.'lib/view/DefaultViewUtil.php';
class CMSListAdminView extends BaseView {
	private $data;
	public function setData(&$data){
		$this->data = $data;
	}
	public function header(){
		return <<<EOD
	Header	
EOD;
	}
	public function menu(){
		return array(
			'home' => array('text'=>'Home', 'url'=>'home'),
		);
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
<tr><td>Subject</td><td style="width:100px;">By</td><td style="width:100px;">Manage</td></tr>
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