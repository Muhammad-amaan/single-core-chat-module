<?php
 require_once("class.user.php");
 session_start();
 $user = new USER();
 $uid = $_SESSION['uid'];
 $stmt = $user->runSqlQuery("SELECT * FROM users WHERE uid = :uid");
 $stmt->execute(array(":uid" => $uid));

 while($userData = $stmt->fetch(PDO::FETCH_ASSOC)){
   $uid = $userData['uid'];
   $profilepic = $userData['profilepic'];
   $username = $userData['username'];
}
?>