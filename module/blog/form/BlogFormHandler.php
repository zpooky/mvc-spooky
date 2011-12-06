<?php
@define('ROOT','../../../');
require_once ROOT.'form/BaseFormHandler.php';

class BlogFormHandler extends BaseFormHandler {
	public function validate(){
		$blogModel = $this->getModel('BlogModel');
		$url = $this->getURL();
		$blogModel->insertBlog($url['blog_subject'],$url['blog_post']);
		//header('Location: '.);
	}
}

?>