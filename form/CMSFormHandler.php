<?php
@define('ROOT','../');
require_once ROOT.'form/BaseFormHandler.php';
require_once ROOT.'lib/Util.php';
class CMSFormHandler extends BaseFormHandler {
	public function create(){
		$model = $this->getModel('CMSModel');
		$post = $this->getPOST();
		$title = $post['title'];
		$subject = $post['subject'];
		$content = $post['post'];
		$loginModule = $this->getModule('login');
		$user_id = $loginModule->getUserId();
		$model->create($title,$subject,$content,$user_id);
		//Util::redirect('');
	}
}