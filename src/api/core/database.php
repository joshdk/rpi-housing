<?php


//PostgreSQL database wrapper
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
		$host=$info["host"];
		$port=$info["port"];
		$user=$info["user"];
		$pass=$info["pass"];
		$name=$info["name"];
		if($this->connection=pg_connect("host=$host port=$port user=$user password=$pass dbname=$name")){
			return true;
		}
		return false;
	}


	//Close database connection
	//ex. $db->close();
	public function close(){
		return pg_close($this->connection);
	}


	//Perform a SQL query
	//ex $db->query("SELECT * FROM mytable");
	public function query($sql){
		if($this->connection == NULL){
			echo "connection is NULL";
		}
		if($this->resource=pg_query($this->connection,$sql)){
			return true;
		}
		return false;
	}


	//Fetch a single result row as an associative array
	//ex. $db->fetch_row_assoc();
	public function fetch_row_assoc(){
		if($this->resource != NULL){
			return pg_fetch_assoc($this->resource);
		}
		return false;
	}


	//Fetch all result rows as an array of associative arrays
	//ex. $db->fetch_rows_assoc();
	public function fetch_rows_assoc(){
		$rows=array();
		while($row=$this->fetch_row_assoc()){
			array_push($rows,$row);
		}
		return $rows;
	}


	//Fetch a single result row as a plain array
	//ex. $db->fetch_row_array();
	public function fetch_row_array(){
		if($this->resource != NULL){
			return pg_fetch_array($this->resource,NULL,PGSQL_NUM);
		}
		return false;
	}


	//Fetch all result rows as an array of plain arrays
	//ex. $db->fetch_rows_array();
	public function fetch_rows_array(){
		$rows=array();
		while($row=$this->fetch_row_array()){
			array_push($rows,$row);
		}
		return $rows;
	}


}


?>
