<?php
@define('ROOT','../');

require_once ROOT.'/model/BaseModel.php';

class BlogModel extends BaseModel {
	public function insertBlog($subject,$post){
		$subject = $db->escape($subject);
		$post = $db->escape($post);
		$db = $this->getDatabase();
		$db->query("INSERT INTO blog (b_subject,b_post) VALUES(".$subject.",".$post."')");
		$db->execute();
	}
}
?>