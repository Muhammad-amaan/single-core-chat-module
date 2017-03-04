<?php

require_once('dbconfig.php');

class User{

	private $conn;

  public function __construct(){
  	$database = new Database();
  	$db = $database->connection();
  	$this->conn = $db;
  }

  public function runSqlQuery($sql){

    $stmt = $this->conn->prepare($sql);
    return $stmt;

  }

  public function signup($firstname, $lastname, $uemail, $re_email, $username, $password, $gender, $profilepic){
  
    //header("Content-Type:multipart/form-data");



    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $uemail = $_POST['uemail'];
  	$re_email = $_POST['re_email'];
  	$username = $_POST['username'];
  	$password = $_POST['password'];
    $gender = $_POST['gender'];


    $baseUrl = getBaseUrl();

    $defaultPic = $baseUrl."lib/img/6459666238612098569-id-10987-001.jpg";

    $profilepic = $defaultPic;
    $defaultimage = str_replace("server/api/user.php/", "", $profilepic);

    if($firstname == ""){
      $response = array("error" => "Provide firstname!");
      echo json_encode($response);
     }
    else if($lastname == ""){
      $response = array("error" => "Provide lastname!");
      echo json_encode($response);
     }
     else if($uemail == ""){
      $response = array("error" => "Provide email");
      echo json_encode($response);
     }
     else if(!filter_var($uemail, FILTER_VALIDATE_EMAIL))  {
      $response = array("error" => "Please enter a valid email address !");
      echo json_encode($response);
    }


     else if($re_email != $uemail){
      $response = array("error" => "Email does'nt matched!");
      echo json_encode($response);
     }

     else if($username == ""){
     	$response = array("error" => "Provide username!");
      echo json_encode($response);
     }
     else if($password == ""){
        $response = array("error" => "Provide password!");
      echo json_encode($response);
     }

     else{


      $stmt = $this->conn->query("SELECT email from users WHERE email = '$re_email'");
           $findemail = $stmt->fetch(PDO::FETCH_ASSOC);
           $count  = $stmt->rowCount();
          if($count > 0){
            $response = array("error" => "this email is already exist!");
      echo json_encode($response);
          } 
       else{
     	 try{

             //Print it out for example purposes.
            // $options = [
               //  'salt' =>  mcrypt_create_iv(22, MCRYPT_DEV_URANDOM), //write your own code to generate a suitable salt
               //  'cost' => 12 // the default cost is 10
            // ];

             //$hash_password = password_hash($password, PASSWORD_DEFAULT, $options);
$password = $password;

function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}
function verify($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}
$password = generateHash($password);

          $stmt = $this->conn->prepare("INSERT INTO users (firstname, lastname, username, email, password, gender, profilepic) VALUES (:firstname, :lastname, :username, :uemail, :password, :gender, :profilepic)");
           $stmt->bindParam(":firstname", $firstname);
           $stmt->bindParam(":lastname", $lastname);
           $stmt->bindParam(":username", $username);
           $stmt->bindParam(":uemail", $re_email);
           $stmt->bindParam(":password", generateHash($password));
           $stmt->bindParam(":gender", $gender);
           $stmt->bindParam(":profilepic", $defaultimage);

           $stmt->execute();

           $stmt = $this->conn->query("SELECT * FROM users WHERE email = '$re_email'");

           $row = $stmt->fetch(PDO::FETCH_ASSOC);
           $uid = $row['uid'];
           $count  = $stmt->rowCount();
          if($count == 1){
            session_start();

             //if($row['password'] == $password){
              //if (password_verify($password, $row['password'])) {
              //if (hash_equals($row->password, crypt($password, $row->password))) {
if(verify($password, $row['password']))
{
               $_SESSION['uid'] = $uid;
             $response = array("success" => true,  "message" => "User account has been successfully created!", "redirect" => "account-registration.php?sid=$uid");
             echo json_encode($response);
             //return true;
            }
          }

           return $stmt;
       }
       catch(PDOException $ex){
        echo $ex->getMessage();
       }
     }
     }

  }


  public function login($login_email, $password)
  {

    $login_email = $_POST['email'];
    $password = $_POST['password'];

    if($login_email == ""){
      $response = array("error" => "Provide email address!");
      echo json_encode($response);
     }
     else if(!filter_var($login_email, FILTER_VALIDATE_EMAIL))  {
      $response = array("error" => "Please enter a valid email address !");
      echo json_encode($response);
  }
    else if($password == ""){
      $response = array("error" => "Provide password!");
      echo json_encode($response);
     }
       else{
       try{

$password = $password;

function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}
function verify($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}
$password = generateHash($password);

           $stmt = $this->conn->query("SELECT * FROM users WHERE email = '$login_email'");

           $row = $stmt->fetch(PDO::FETCH_ASSOC);
           $uid = $row['uid'];
           $count  = $stmt->rowCount();
          if($count == 1){
            session_start();
            
             //if($row['password'] == $password){
              //if (password_verify($password, $row['password'])) {
if(verify($password, $row['password']))
{

               $_SESSION['uid'] = $uid;
             $response = array("success" => true,  "message" => "Login successfull redirecting....", "redirect" => "home.php");
             echo json_encode($response);
             //return true;
            }
          } 

           return $stmt;
       }
       catch(PDOException $ex){
        echo $ex->getMessage();
       }
     }
  }

  public function onlineusers($uid){
     session_start();
    $session = session_id();
    //global $session;
    $time = time();
    $time_check = $time-300;

    $uid = $_POST['uid'];

    $stmt = $this->conn->query("SELECT * FROM onlineusers WHERE session = '$session'");

    $count = $stmt->rowCount();
    if($count == 0){
      $stmt = $this->conn->query("INSERT INTO onlineusers (uid, session, time) VALUES ('$uid', '$session', '$time')");

    }
    else{
      $time = time();
      $stmt = $this->conn->query("UPDATE onlineusers SET uid = '$uid', time='$time' WHERE session='$session'");

    }

    $stmt = $this->conn->query("SELECT DISTINCT * FROM users INNER JOIN onlineusers on users.uid = onlineusers.uid && onlineusers.uid != '".$_SESSION['uid']."'");
     //$data = array();

    
    // require('../../lib/php/Pusher.php');

    //         $pusher = new Pusher('58bfd3799c27ae38b3dd','6919d581ea79c4a66366','224541');

           
    //           $data['uid'] = $_POST['uid'];
           

            
    //         $pusher->trigger('test_channel_onlineusers', 'my_onlineusers_event', $data);


    //         // Return the received message
    //       if($pusher->trigger('test_channel_onlineusers', 'my_onlineusers_event', $data)) {       
    //         echo 'success';     
    //       } else {    
    //         echo 'error'; 
    //       }
          
     $countUsersOnline = $stmt->rowCount();
     
      $data = array();
      if($session){
     while($userrec = $stmt->fetch(PDO::FETCH_ASSOC)){
      $data[] = $userrec;
     }
   }
     echo json_encode($data);

     $stmt = $this->conn->query("DELETE FROM onlineusers WHERE time < '$time_check'");
       

    //   $username = $userrec['username'];
    //   $res = array( "count" => $countUsersOnline, "username" => $username);
    // echo json_encode($res);



  }

  public function sendmessage($sender_id, $receiver_id, $message)
  {

    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $msg = $_POST['msg'];
    $sender_class = $_POST['sender_class'];
    $receiver_class = $_POST['receiver_class'];


   


    try{
      $stmt = $this->conn->prepare("INSERT INTO chat (sender_id, receiver_id, message) VALUES (:sender_id, :receiver_id, :message)");
           $stmt->bindParam(":sender_id", $sender_id);
           $stmt->bindParam(":receiver_id", $receiver_id);
           $stmt->bindParam(":message", $msg);

           $stmt->execute();


           require('../../lib/php/Pusher.php');

            $pusher = new Pusher('58bfd3799c27ae38b3dd','6919d581ea79c4a66366','224541');

           
              $data['msg'] = $_POST['msg'];
           

            
            $pusher->trigger('msg_channel', 'my_event', $data);


            // Return the received message
          if($pusher->trigger('test_channel', 'my_event', $data)) {       
            echo 'success';     
          } else {    
            echo 'error'; 
          }

    }
    catch(PDOException $ex)
    {
     echo $ex->getMessage();
    }
  }

  public function getchat()
  {
    $sender_id = $_GET['sender_id'];
    $receiver_id = $_GET['receiver_id'];

    //$stmt = $this->conn->query("SELECT * FROM users WHERE uid = '$sender_id'");
    //$stmt = $this->conn->query("SELECT DISTINCT * FROM chat WHERE sender_id IN ($receiver_id, $sender_id) AND receiver_id IN ($sender_id, $receiver_id) OR sender_id IN ($sender_id, $receiver_id) AND receiver_id IN ($receiver_id, $sender_id) ORDER BY sender_id DESC");
      
    $stmt = $this->conn->query("SELECT users.*, chat.* FROM chat INNER JOIN users ON (chat.sender_id = users.uid) WHERE sender_id IN($sender_id, $receiver_id) AND receiver_id IN ($receiver_id, $sender_id)");

    $data = array();
    while($getchat = $stmt->fetch(PDO::FETCH_ASSOC)){
      $data[] = $getchat;
     }
     echo json_encode($data);
  }

    public function PushMessages($sender_id)
  {
    try
    {
    $sender_id = $_POST['sender_id'];
      
   
             $stmt = $this->conn->query("SELECT users.*, chat.* FROM chat INNER JOIN users ON (chat.sender_id = users.uid) ORDER BY chatid DESC LIMIT 1");
             
             
             
            
             
             
             $data = array();
             
             
    
             
        while($getchat = $stmt->fetch(PDO::FETCH_ASSOC)){
          $data[] = $getchat;
          
         }
         $count = $stmt->rowCount();
                     // $data[] = $count;
          //$data[] = array("sccess" => true, "count" => $count);
         echo json_encode($data);
    
    

}
    
     catch(PDOException $ex)
     {
      echo $ex->getmessage();
     }
  }



  public function isLoggedIn(){
    //session_start();
    if(isset($_SESSION['uid'])){
      return true;
    }
  }

  public function redirect($url)
  {
    header("Location: $url");
  }

  public function logout()
  {
     return $_SESSION['uid'];
      
      //header("Location: $url");
  }

}

?>