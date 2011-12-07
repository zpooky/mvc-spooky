<?php
@define('ROOT','../../../');
require_once ROOT.'module/InstallSQLInterface.php';

class LoginInstall implements InstallSQLInterface {
	public function dropMysql(){
		return <<<EOD
EOD;
	}
	public function dropSqlite(){
		return <<<EOD
EOD;
	}
	public function installMySQL(){
		return <<<EOD
EOD;
	}
	public function installSqlite(){
		return <<<EOD
EOD;
	}
}

?>