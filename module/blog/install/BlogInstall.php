<?php
@define('ROOT','../../../');
require_once ROOT.'module/InstallSQLInterface.php';

class BlogInstall implements InstallSQLInterface {
	public function dropMysql(){
		/*return <<<EOD
DROP TABLE IF EXISTS blog;
EOD;*/
	}
	public function dropSqlite(){
		/*return <<<EOD
DROP TABLE IF EXISTS blog;
EOD;*/
	}
	public function installMySQL(){
		/*return <<<EOD
CREATE TABLE blog (
	b_subject VARCHAR(255) NOT NULL default 'no subject',
	b_post TEXT NOT NULL
);
EOD;*/
	}
	public function installSqlite(){
		/*return <<<EOD
CREATE TABLE blog (
	b_subject VARCHAR(255) NOT NULL default 'no subject',
	b_post TEXT NOT NULL
);
EOD;*/
	}
}

?>