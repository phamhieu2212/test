<?php
include_once('database.php');
class user extends database{
	
	protected $userid;
	protected $username;
	protected $password;
	protected $fullname;
	protected $email;
	
	public function __construct(){
		
		$this->connect();
	}
	// Userid
	public function setUserid($userid){
	
		$this->userid = $userid;
	}
	public function getUserid(){
		
		return $this->userid;
	}
	// Username
	public function setUsername($username){
	
		$this->username = $username;
	}
	public function getUsername(){
		
		return $this->username;
	}
	// Password
	public function setPassword($password){
	
		$this->password = $password;
	}
	public function getPassword(){
		
		return $this->password;
	}
	// Fullname
	public function setFullname($fullname){
	
		$this->fullname = $fullname;
	}
	public function getFullname(){
		
		return $this->fullname;
	}
	// Email
	public function setEmail($email){
	
		$this->email = $email;
	}
	public function getEmail(){
		
		return $this->email;
	}
	
	public function login(){
			
		$sql = "SELECT * FROM users WHERE username = '".$this->username."' AND password = '".$this->password."'";
		$this->query($sql);
		if($this->numRows() > 0){
			
			$_SESSION['user'] = $this->username;
			$_SESSION['pass'] = $this->password;
			return 'account valid';	
		}
		else{
			return 'account not valid';
		}
	}
	
	public function add($user){
		
		$sql = "SELECT * FROM users WHERE username = '".$user."'";
		$this->query($sql);
		if($this->numRows() > 0){
			return 'user exist';
		}
		else{
			$sql = "INSERT INTO users(username, password, fullname, email) VALUES('".$this->username."', 
																			  '".$this->password."', 
																			  '".$this->fullname."', 
																			  '".$this->email."')";
			$this->query($sql);
		}		
	}
	
	public function del($userid){
		
		$sql = "DELETE FROM users WHERE userid = ".$userid."";
		$this->query($sql);
	}
	
	public function edit($username, $userid){
		
		$sql = "SELECT * FROM users WHERE username = '".$username."' AND userid != ".$userid;
		$this->query($sql);
		if($this->numRows() > 0){
			return 'user exits';
		}
		else{
			$sql = "UPDATE users SET username = '".$this->username."', 
								 password = '".$this->password."',
								 fullname  = '".$this->fullname."',
								 email = '".$this->email."'
					WHERE userid = ".$userid;
			$this->query($sql);	
		}							 
	}
	
	
}

















?>