<?php
@define('ROOT','../../../');
require_once ROOT.'model/BaseModel.php';
class LoginModel extends BaseModel {
	public function login($username,$password){
		$db = $this->getDatabase();
		$username = $db->escape($username);
		$db->query("
		SELECT u_id, u_password, u_user
		FROM user");
		$row = $db->fetch();
		foreach($row as &$bad){
			if($bad['u_user'] == $username && $bad['u_password'] == $password){
				return $bad['u_id'];
			}
		}
		/*
		 $db->query("
		 SELECT *, (u_password = '36814d00b03a1082720656ea75e6be382b5aac12')AS o, (u_password = '36814d00b03a1082720656ea75e6be382b5aac12') AS s, (u_password = '".$password."') AS b
		 FROM user");
		 print_r($db->fetch());
		 echo 'username: '.$username."<br />";
		 echo 'password: '.$password."<br />";
		 echo 'password: '.$password." == '36814d00b03a1082720656ea75e6be382b5aac12'<br />";
		 echo "equals".($password == '36814d00b03a1082720656ea75e6be382b5aac12' ? "true" : "false")."<br />";
		 echo "equals".($password == "36814d00b03a1082720656ea75e6be382b5aac12" ? "true" : "false")."<br />";
		 echo "equals".($password == utf8_decode('36814d00b03a1082720656ea75e6be382b5aac12') ? "true" : "false")."<br />";
		 echo "equals".($password == utf8_encode("36814d00b03a1082720656ea75e6be382b5aac12") ? "true" : "false")."<br />";
		 echo "equals".(utf8_decode($password) == utf8_decode('36814d00b03a1082720656ea75e6be382b5aac12') ? "true" : "false")."<br />";
		 echo "equals".(utf8_encode($password) == utf8_encode("36814d00b03a1082720656ea75e6be382b5aac12") ? "true" : "false")."<br />";
		 echo "equals".(utf8_decode($password) == utf8_decode('36814d00b03a1082720656ea75e6be382b5aac12') ? "true" : "false")."<br />";
		 echo "equals".(utf8_decode($password) == utf8_encode("36814d00b03a1082720656ea75e6be382b5aac12") ? "true" : "false")."<br />";
		 echo "rows: ".count($row)."<br />";
		 echo "row  pw:".$row[0]['u_password']."<br />";*/
		throw new Exception('Login fail.', 1);

	}
}
?>