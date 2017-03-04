<?php
 require_once("class.user.php");
 //session_start();
 $user = new USER();
 
 $user->sendmessage($sender_id, $receiver_id, $message);

?>