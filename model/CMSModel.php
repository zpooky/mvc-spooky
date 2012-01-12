<?php
@define('ROOT','../');

require_once ROOT.'model/BaseModel.php';
//
class CMSModel extends BaseModel {
	public function getPage($p){
		$db = $this->getDatabase();
		$db->query('
		SELECT c.*, u.u_user
		FROM cms AS c
		LEFT JOIN user AS u
			ON(c.c_u_id = u.u_id)
		WHERE c.c_id = '.(int)$p.'
		LIMIT 1');
		$row = $db->fetch();
		if(count($row) == 0){
			throw new Exception('Page not found.',1);
		}
		return $row[0];
	}
	public function create(&$meta,&$title,&$subject,&$content,&$user_id){
		$db = $this->getDatabase();
		$meta = $db->escape($meta);
		$title = $db->escape($title);
		$subject = $db->escape($subject);
		$content = $db->escape($content);
		$user_id = (int)$user_id;
		$db->query("
		INSERT INTO cms
		(c_meta,c_title,c_subject,c_content,c_u_id)
		VALUES('".$meta."','".$title."','".$subject."','".$content."',".$user_id.")");
		$db->execute();
		return $db->getPrimaryKeyId();
	}
	public function update(&$meta,&$id,&$title,&$subject,&$content){
		$db = $this->getDatabase();
		$id = (int)$id;
		$meta = $db->escape($meta);
		$title = $db->escape($title);
		$subject = $db->escape($subject);
		$content = $db->escape($content);
		$db->query("
		UPDATE cms
		SET c_meta = '".$meta."',c_title = '".$title."',c_subject = '".$subject."',c_content = '".$content."'
		WHERE c_id = ".$id);
		$db->execute();
	}
	public function listAll($order = 'ASC'){
		$db = $this->getDatabase();
		$db->query("
		SELECT c.*, u.u_user
		FROM cms AS c
		LEFT JOIN user AS u 
			ON(c.c_u_id = u.u_id)
		ORDER BY c.c_id ".$order);
		return $db->fetch();
	}
}

?>