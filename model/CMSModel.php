<?php
@define('ROOT','../');

require_once ROOT.'/model/BaseModel.php';

class CMSModel extends BaseModel {
	public function getPage($p){
		$db = $this->getDatabase();
		$db->query('
		SELECT * 
		FROM cms 
		WHERE c_id = '.(int)$p.'
		LIMIT 1');
		$row = $db->fetch();
		if(count($row) == 0){
			throw new Exception('Page not found.',1);
		}
		return $row[0];
	}
	public function create(&$title,&$subject,&$content,&$user_id){
		$db = $this->getDatabase();
		$title = $db->escape($title);
		$subject = $db->escape($subject);
		$content = $db->escape($content);
		$user_id = (int)$user_id;
		$db->query("
		INSERT INTO cms
		(c_title,c_subject,c_content,c_u_id)
		VALUES('".$title."','".$subject."','".$content."',".$user_id.")");
		$db->execute();
	}
	public function update(&$id,&$title,&$subject,&$content){
		$db = $this->getDatabase();
		$id = (int)$id;
		$title = $db->escape($title);
		$subject = $db->escape($subject);
		$content = $db->escape($content);
		$db->query("
		UPDATE cms
		SET c_title = '".$title."',c_subject = '".$subject."',c_content = '".$content."
		WHERE c_id = ".$id."
		LIMIT 1");
		$db->execute();
	}
}

?>