<?php
require_once('../inc/functions.php');
 require_once('class.user.php');
 $user = new USER();
error_reporting(0);
 $user->login($login_email, $password);
?>