<?php
@define('ROOT','../../');

require_once ROOT.'sql/DatabaseInterface.php';
require_once ROOT.'site/config/ConfigInstance.php';

class SqliteMVCDatabase implements DatabaseInterface {//
	private $sqlite = null;
	private $query;
	public 	$timer;
	public 	$id;
	public  $rows;
	private $query_type;
	public function __construct(){

	}
	function __destruct(){
		$this->disconnect();
	}
	public function connect(){
		$this->sqlite = new SQLiteDatabase(ROOT.'sql/sqlite/db/database.sqlite');
	}
	public function disconnect(){
		//$this->sqlite->close();
	}
	public function query($query){
		$this->query = $query;
	}
	public function multiQuery($query){
		$this->query = $query;
	}
	public function escape(&$out){
		return sqlite_escape_string($out);
	}
	public function dump(){
		die(nl2br($this->query));
	}
	public function fetch(){
		$startTimer = microtime();
		$result = $this->sqlite->arrayQuery($this->query, SQLITE_ASSOC);
		if($result === false){
			die(nl2br($this->query)."<br />".sqlite_error_string(sqlite_last_error($this->sqlite)));
		}
		$endTimer = microtime();
		$this->timer = $endTimer-$startTimer;
		return self::fixThisShit($result);
	}
	public function execute(){
		$this->sqlite->queryExec($this->query);
		$this->id = $this->sqlite->lastInsertRowid();//??
	}
	public function getPrimaryKeyId(){
		return $this->id;
	}
	private static function fixThisShit($result){
		foreach($result as &$row){
			foreach($row as $key => &$value){
				if(stripos($key,'.') !== false){
					$chunks = explode('.', $key);
					$row[$chunks[1]] = $value;
					unset($row[$key]);
				}
			}
		}
		return $result;
	}
}
?>