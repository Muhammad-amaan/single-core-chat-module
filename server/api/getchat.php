<?php
 require_once("class.user.php");
 //session_start();
 $user = new USER();
 error_reporting(0);
 $user->getchat($sender_id, $receiver_id);

?>