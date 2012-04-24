<?php


//PDO database wrapper
class database{
	private $connection;
	private $resource;


	//Class constructor
	//ex: $db = new database();
	public function __construct(){
		$this->connection=NULL;
	}


	//Connect to a database using some credentials
	//ex. $db->connect($ROLES["local"]);
	public function connect($info){
		if(($this->connection=new PDO("pgsql:host=".$info['host'].";port=".$info['port'].";dbname=".$info['name'],$info['user'],$info['pass']))){
			return $this->connection;
		}
		$this->connection=null;
		return false;
	}


	//Close database connection
	//ex. $db->close();
	public function close(){
	}


	//Perform a SQL query
	//ex $db->query("SELECT * FROM mytable");
	public function query($sql){
		if($this->connection == NULL){
			return false;
		}
		if($this->resource=$this->connection->query($sql)){
			return true;
		}
		return false;
	}


	//Create a prepared statement
	//ex $db->prepare("my qyery","SELECT * FROM table where value=$1");
	public function prepare($sql){
		if(($this->resource=$this->connection->prepare($sql))){
			return true;
		}
		return false;
	}


	//Execute a prepared statement
	//ex $db->execute(""my query",array("john doe"));
	public function execute($data){
		if($this->resource->execute($data)){
			return true;
		}
		return false;
	}


	//Fetch a single result row as an associative array
	//ex. $db->fetch_row_assoc();
	public function fetch_row_assoc(){
		if($this->resource != NULL){
			return $this->resource->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}


	//Fetch all result rows as an array of associative arrays
	//ex. $db->fetch_rows_assoc();
	public function fetch_rows_assoc(){
		if($this->resource != NULL){
			return $this->resource->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}


	public function count(){
		if($this->resource != NULL){
			return $this->resource->rowCount();
		}
		return 0;
	}


}


?>
