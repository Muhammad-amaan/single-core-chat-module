<?php

define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'socialmedia');
define('DB_USER', 'root');
define('DB_PASS', '');

 try{
   $db = new PDO(DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
  }
  catch(PDOException $ex){
    echo $ex->getMessage();
    echo $ex->getLine();
  }

  $res = array("success" => "Login successfull...redirecting...");
  echo json_encode($res);