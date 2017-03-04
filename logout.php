<?php 
session_start();
require_once('server/inc/functions.php');
require_once('server/api/class.user.php');
//echo getBaseUrl();
$userlogin = new USER();
if($userlogin->logout() != "")
 {
        session_destroy();
        $userlogin->redirect("index.php");
 }

?>