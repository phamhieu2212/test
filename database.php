<?php
class database{
	
	protected $dbHost = 'localhost';
	protected $dbUser = 'root';
	protected $dbPass = '';
	protected $dbName = 'users_manager';
	
	protected $conn = NULL;
	protected $result = NULL;
	
	public function connect(){
		
		$this->conn = @mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
		if($this->conn){
			
			$dbSelect = @mysql_select_db($this->dbName, $this->conn);
			if(!$dbSelect){
				echo 'Not find Database!';
			}
			else{
				$dbLang = @mysql_query("SET NAMES 'utf8'");	
			}
		}
		else{
			echo 'Can not connect to Database!';	
		}
	}
	
	public function query($sql){
		$this->freeQuery();
		$this->result = @mysql_query($sql);
	}
	
	public function freeQuery(){
		if($this->result){
			@mysql_free_result($this->result);
		}
	}
	
	public function numRows(){
		if($this->result){
			$rows = @mysql_num_rows($this->result);
			return $rows;
		}
	}
	
	public function fetch(){
		if($this->result){
			$row = @mysql_fetch_array($this->result);
			return $row;
		}
	}
	
	public function disconnect(){
		if($this->conn){
			@mysql_close($this->conn);
		}
	}	
	
}
?>