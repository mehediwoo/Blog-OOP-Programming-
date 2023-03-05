<?php


define("TITLE", "User Blog Site");
Class Database{
	private $host   = "localhost";
	private $user   = "root";
	private $pass   = "";
	private $dbname = "blogsite";
	
	
	public $link;
	public $error;
	
	public function __construct(){
		$this->connectDB();
	}
	
	private function connectDB(){
	$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
	if(!$this->link){
		$this->error ="Connection fail".$this->link->connect_error;
		return false;
	}
 }
	
	// Select or Read data
	
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}
	
	// Insert data
	public function insert($query){
	$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($insert_row){
		return $insert_row;
	} else {
		return false;
	}
  }
  
    // Update data
  	public function update($query){
	$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($update_row){
		return $update_row;
	} else {
		die("Error :(".$this->link->errno.")".$this->link->error);
	}
  }
  
  // Delete data
   public function delete($query){
	$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($delete_row){
		return $delete_row;
	} else {
		return false;
	}
  }

  	// Insert cate
	public function CateInsert($query){
		$cat_row = $this->link->query($query);
		if ($cat_row) {
			return $cat_row;
		}else{
			return false;
		}
  	}
  	
  	public function login($user,$pass){
		$sql = "SELECT * FROM tbl_user WHERE username='$user' AND password='$pass' ";
		$stmt= $this->link->query($sql);
		if ($stmt->num_rows > 0) {
			return $result = $stmt->fetch_assoc();
		}else{
			return false;
		}
	}
	public function loginRestriction(){
		if (!isset($_SESSION['id'])) {
			header("Location:login.php?plese_login_first");
		}
	}
	public function UserNameCheek($user){
			$sql= "SELECT * FROM tbl_user WHERE username='$user' ";
			$stmt = $this->link->query($sql);
			return $result = $stmt->fetch_assoc();
	}
	public function mailcheck($mail){
		$sql = "SELECT * FROM tbl_user WHERE email='$mail'";
		$stmt= $this->link->query($sql);
		return $result = $stmt->fetch_assoc();
	}

 
 
}


