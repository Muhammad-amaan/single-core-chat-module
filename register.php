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

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
.loginsuccess{
  color: #0F9400;
  display: none;
}
.loginfailed{
      color: #E40000;
      display: none;
}
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="fullname" id="fullname">
        <span class="glyphicon glyphicon-user form-control-feedback is-error"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name"email" id="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback is-error"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback is-error" name="password" id="password"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="cnfrmpassword" id="cnfrmpassword">
        <span class="glyphicon glyphicon-log-in form-control-feedback is-error"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" class="btn btn-primary btn-block btn-flat registerbtn">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center loginsuccess">
     
    </div>

    <div class="social-auth-links text-center loginfailed">
      Login failed
    </div>

    <a href="login.html" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="lib/js/notify.js"></script>
<script src="lib/js/notify.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script type="text/javascript">
 $(document).ready(function(e){
    $('.loginsuccess').show();
  $(".registerbtn").click(function(e){
     
     var $fullname = $("#fullname");
     var $email = $("#email");
     var $password = $("#password");
     var $cnfrmpassword = $("#cnfrmpassword");

     var fullname = $("#fullname").val();
     var email = $("#email").val();
     var password = $("#password").val();
     var cnfrmpassword = $("#cnfrmpassword").val();

     var userdata = { fullname: fullname, email: email, password: cnfrmpassword }

    if(fullname == ""){
    $fullname.parent().find(".is-error").notify(
      "Please enter your fullname", 
      { position:"right" }
    );
    return false;
  }

   else if(email == ""){
    $email.parent().find(".is-error").notify(
      "Please enter an email address", 
      { position:"right" }
    );
    return false;
  }


     else if(password == ""){
    $password.parent().find(".is-error").notify(
      "Please enter password", 
      { position:"right" }
    );
     return false;
  }

     else if(cnfrmpassword == ""){
    $cnfrmpassword.parent().find(".is-error").notify(
      "Please enter password", 
      { position:"right" }
    );
     return false;
  }

       else if(cnfrmpassword != password){
    $cnfrmpassword.parent().find(".is-error").notify(
      "Password does'nt matched", 
      { position:"right" }
    );
     //return false;
  }

  else{
    //$('.loginsuccess').show();
    $.ajax({
         type: "POST",
         url: "services/register.php",
         data: userdata,
         cache: false,
         beforeSend: function(){$('.loginfailed').show(); $('.loginfailed').text("waiting...");},
         success: function(response){
          var response = JSON.parse(response);
          if(response.success){
            $('.loginfailed').text("");
            $('.loginfailed').hide();
            $('.loginsuccess').show();
            $('.loginsuccess').text(response.success);
          }
         }
    });
  }
return false;
  });
 });
</script>
</body>
</html>
