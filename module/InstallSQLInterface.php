<?php
interface InstallSQLInterface {//
	public function dropMysql();
	public function dropSqlite();
	public function installMySQL();
	public function installSqlite();
}

?>