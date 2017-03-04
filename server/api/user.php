<?php
require_once('../inc/functions.php');
 require_once('class.user.php');
 $user = new USER();
error_reporting(0);
 $user->signup($firstname, $lastname, $uemail, $re_email, $username, $password, $gender, $profilepic);



?>