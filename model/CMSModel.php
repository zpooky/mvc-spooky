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
}

?>