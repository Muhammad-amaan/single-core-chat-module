<?php
class Database{

 private $host = "localhost";
 private $dbname = "ab58891_testappp";
 private $dbUser = "ab58891_testapp1";
 private $dbPass = "ab58891_testapp1";
 public $conn;

 public function connection(){

  $this->conn = null;

  try{
     $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->dbUser, $this->dbPass);
     $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $ex){
  	echo "Connection error : ".$ex->getMessage();
  }

  return $this->conn;

}

}
$con = new Database();
$con->connection();
?>