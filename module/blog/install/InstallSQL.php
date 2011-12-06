<?php
@define('ROOT','../../../');
require_once ROOT.'module/InstallSQLInterface.php';

class InstallSQL implements InstallSQLInterface {
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