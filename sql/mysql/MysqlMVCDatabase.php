<?php
@define('ROOT','../../');
//
require_once ROOT.'sql/DatabaseInterface.php';
require_once ROOT.'site/config/ConfigInstance.php';

@define('SINGLEQUERY',0);
@define('MULTIQUERY',1);

class MysqlMVCDatabase implements DatabaseInterface {
	private $dbhost;
    private $dbport;
    private $dbname;
    private $dbusername;
    private $dbpassword;
    private $connected;
    
    private $mysql;
    private $query;
    private $flag;
    private $data;
    public 	$timer;
    public 	$id;
    public  $rows;
    
    function __construct()
    {
    	$config = ConfigInstance::getInstance();
        $this->dbhost = 	$config->getDatabaseHost();
        $this->dbport = 	$config->getDatabasePort();
        $this->dbname = 	$config->getDatabaseName();
        $this->dbusername = $config->getDatabaseUsername();
        $this->dbpassword = $config->getDatabasePassword();
        $this->connected = 	false;
    }
    
    function __destruct()
    {
  		$this->disconnect();
    }

    public function connect()
    {
        if(!$this->connected){
            $this->mysql = new mysqli($this->dbhost, $this->dbusername, $this->dbpassword, $this->dbname);
            if(!$this->mysql->connect_error){
                $this->connected = true;
            } else {
                $this->connected = false;
            }
        }
        return $this->connected;
    }
    public function disconnect()
    {
        if($this->connected){
            if($this->mysql->close()){
                $this->connected = false;
                return true;
            } else {
                return false;
            }
        }
    }
	public function query($query)
	{
	   $this->query = $query;
	   $this->flag = SINGLEQUERY;
	}
	public function multiQuery($query){
		$this->query = $query;
		$this->flag = MULTIQUERY;
	}
    public function escape(&$out)
    {
        return $this->mysql->real_escape_string($out);
    }
	public function dump()
	{
		die(nl2br($this->query));
	}
	public function fetch()
	{
		$startTimer = microtime();
		$result = $this->mysql->query($this->query);
		if($result === false){
			die(nl2br($this->query)."<br />".$this->mysql->error);
		}
		$row = array();
		$output = array();
		$i = 0;
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$output[$i++] = $row;
		}
		$endTimer = microtime();
        $this->rows = $result->num_rows;
        $result->close();
		$this->timer = $endTimer-$startTimer;
		return $output;
	}
	public function execute()
	{
	    if($this->flag == SINGLEQUERY){
            $this->mysql->query($this->query);
            $this->id = $this->mysql->insert_id;
        } else
        if($this->flag == MULTIQUERY){
            $this->mysql->multi_query($this->query);
        }
	}
	public function getPrimaryKeyId(){
		return $this->id;
	}
}
?>