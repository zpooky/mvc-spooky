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
		SELECT *, (u_user = '36814d00b03a1082720656ea75e6be382b5aac12') AS s
		FROM user");
		print_r($db->fetch());
		echo 'username: '.$username."<br />";
		echo 'password: '.$password."<br />";
		echo 'password: '.sha1($password)." == '36814d00b03a1082720656ea75e6be382b5aac12'<br />";
		echo "equals".($password == '36814d00b03a1082720656ea75e6be382b5aac12' ? "true" : "false")."<br />";
		echo "equals".($password == "36814d00b03a1082720656ea75e6be382b5aac12" ? "true" : "false")."<br />";
		echo "equals".($password == utf8_decode('36814d00b03a1082720656ea75e6be382b5aac12') ? "true" : "false")."<br />";
		echo "equals".($password == utf8_encode("36814d00b03a1082720656ea75e6be382b5aac12") ? "true" : "false")."<br />";
		echo "equals".(utf8_decode($password) == utf8_decode('36814d00b03a1082720656ea75e6be382b5aac12') ? "true" : "false")."<br />";
		echo "equals".(utf8_encode($password) == utf8_encode("36814d00b03a1082720656ea75e6be382b5aac12") ? "true" : "false")."<br />";
		echo "equals".(utf8_decode($password) == utf8_decode('36814d00b03a1082720656ea75e6be382b5aac12') ? "true" : "false")."<br />";
		echo "equals".(utf8_decode($password) == utf8_encode("36814d00b03a1082720656ea75e6be382b5aac12") ? "true" : "false")."<br />";
		echo "rows: ".count($row)."<br />";
		die;
		if(count($row) == 0){
			throw new Exception('Login fail.', 1);
		}
		return $row[0]['u_id'];
	}
}
?>