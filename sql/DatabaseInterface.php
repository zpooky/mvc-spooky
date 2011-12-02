<?php
interface DatabaseInterface {
	public function connect();
	public function disconnect();
	public function query();
	public function escape($out);
	public function dump();
	public function fetch();
	public function execute();
	public function getPrimaryKeyId();
}

?>