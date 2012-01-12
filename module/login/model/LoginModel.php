<?php
@define('ROOT','../../../');
require_once ROOT.'model/BaseModel.php';
class LoginModel extends BaseModel {
	public function login($username,$password){
		$db = $this->getDatabase();
		$username = $db->escape($username);
		$db->query("
		SELECT u_id
		FROM user
		WHERE 	u_user = '".$username."' AND
				u_password = '".$password."'
		LIMIT 1");
		$row = $db->fetch();
		if(count($row) == 0){
			throw new Exception('Login fail.', 1);
		}
		return $row[0]['u_id'];
	}
}
?>