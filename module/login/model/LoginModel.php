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
				u_password = '".$password."'");
		$row = $db->fetch();
				$db->query("
		SELECT u_id
		FROM *, (u_user = '36814d00b03a1082720656ea75e6be382b5aac12') AS s");
		print_r($db->fetch());
		echo 'username: '.$username."<br />";
		echo 'password: '.$username."<br />";
		echo 'password: '.sha1($username)." == '36814d00b03a1082720656ea75e6be382b5aac12'<br />";
		echo "equals".($username == '36814d00b03a1082720656ea75e6be382b5aac12' ? "true" : "false")."<br />";
		echo "equals".($username == "36814d00b03a1082720656ea75e6be382b5aac12" ? "true" : "false")."<br />";
		die;
		if(count($row) == 0){
			throw new Exception('Login fail.', 1);
		}
		return $row[0]['u_id'];
	}
}
?>