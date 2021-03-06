<?php 
session_start();
require_once('server/inc/functions.php');
require_once('server/api/class.user.php');
//echo getBaseUrl();
$userlogin = new USER();
if($userlogin->isLoggedIn() != ""){
  $userlogin->redirect("home.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="lib/css/animate.css"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <style type="text/css">
.header-sticky{
    width: 100%;
    position: fixed;
    top: 0px;
    bsackground: #003980;
    background: #292929;
    padding: 0px 15px;
    color: #fff;
    max-height: 50px;
    line-height: 50px;
        z-index: 444444444444;
        background: #0083dc;
    text-shadow: 0 -1px 0 rgba(0,0,0,.3);
    background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(2, 112, 183, 0.68));
    box-shadow: 0 1px 0 0 rgba(0,0,0,.25), 0 2px 0px 0 rgba(0,0,0,0.15), 0 0 0 1px rgba(0, 83, 138, .6), inset 0 0 0px 1px rgba(255,255,255,.15);
}
.loginform{
	    float: right;
    width: 62%;
    text-align: right;
}
.loginform .formgroup{
	display: inline-block;
	padding: 0px 2px;

}
.loginform .formgroup input[type="text"],
.loginform .formgroup input[type="password"]{
    border-radius: 3px;
    outline: none;
    background: #e6e6e6;
    padding: 0px 10px;
    height: 26px;
    width: 150px;
    line-height: 26px;
}
.loginform .formgroup input[type="text"]:focus,
.loginform .formgroup input[type="password"]:focus{
    background: #fff
}
.loginform .formgroup .btn.btn-default{
    background: none;
    color: #fff;
    border-color: #fff;
    height: 27px;
    font-size: 14px;
    line-height: 1;
    border-width: 1px;
}
.loginbody{
	background: #fff;
}
.log-wrapper{
	float: left;
    width: 100%;
    position: relative;
    padding-top: 50px;
}
.maincontent{
        background: #f3f3f3;
}
.button{
  display: inline-block;
}
.button-md{
    outline: none;
    border: none;
    border-radius: 2px;
    padding: 6px 15px;
}
.button-lg{
    outline: none;
    border: none;
    border-radius: 2px;
    padding: 10px 18px;
    font-size: 20px;
}
.button-sm{
    outline: none;
    border: none;
    border-radius: 2px;
    padding: 2px 12px;
}
.button-positive{
       background: #0083dc;
    text-shadow: 0 -1px 0 rgba(0,0,0,.3);
    background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(2, 112, 183, 0.68));
    box-shadow: 0 1px 0 0 rgba(0,0,0,.25), 0 2px 0px 0 rgba(0,0,0,0.15), 0 0 0 1px rgba(0, 83, 138, .6), inset 0 0 0px 1px rgba(255,255,255,.15);
}

.button-positive:hover{
background: #0083dc;
    text-shadow: 0 -1px 0 rgba(0,0,0,.3);
    background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 135, 222, 0.68));
    box-shadow: 0 1px 0 0 rgba(0,0,0,.25), 0 2px 0px 0 rgba(0,0,0,0.15), 0 0 0 1px rgba(0, 83, 138, .6), inset 0 0 0px 1px rgba(255,255,255,.15);
}
.signup-box h2.main-title{
  margin-bottom: 0px;
}
.signup-box{
      padding: 15px 0px;
}
.signup-box h4.sub-title{
  margin-top: 0px;
}
.signupform .formgroup{
  margin-bottom: 10px;
}
.signupform .formgroup input[type="text"],
.signupform .formgroup input[type="email"],
.signupform .formgroup input[type="date"],
.signupform .formgroup input[type="url"],
.signupform .formgroup input[type="password"],
.signupform .formgroup select{
border-radius: 3px;
    outline: none;
    background: #fff;
    padding: 0px 10px;
    height: 40px;
    width: 100%;
    line-height: 40px;
    box-shadow: inset 0px 1px 1px #e2e2e2;
    font-size: 20px;
}
.signupform .formgroup select{
    font-size: 16px;
}
.signupform .button{
  color: #fff;
}
.signupform .field-col{
  display: inline-block;
}
.signupform .col-50{
  display: inline-block;
 width: 49.33333%;
}
.maincontent .maincover{
  max-width: 100%;
  float: left;
  width: 100%;
}
.maincontent .maincover img{
  max-width: 100%;
}
.pagecontent{
  padding: 15px 0px;
}
.fullwidth{
  float: left;
  width: 100%;

}
  </style>
</head>
<body class="loginbody">


 

 <div class="header-sticky">
   <div class="container">
    <div class="row">
   	 <div class="col-md-3">Logo</div>
   	 <div class="col-md-9">
      <form class="loginform" id="login" method="post" action="">
         <div class="formgroup">
         	  <input type="text" class="form-control input-sm" name="email" id="email" placeholder="Username" />
         </div>
         <div class="formgroup">
         	  <input type="password" class="form-control input-sm" name="password" id="login_password" placeholder="Password"  />
         </div>
         <div class="formgroup">
         	  <input type="submit" class="btn btn-sm btn-default input-sm" value="Sign in"/>
         </div>
      </form>
   	 </div>
    </div>
   </div>
 </div>

 <div class="log-wrapper">
  <div class="row maincontent">
   <div class="container">
    <div class="row">
   	 <div class="col-md-8">
      <div class="pagecontent">
   	 	 <h3>Welcome to our software, join now to make new friends, create groups, create pages, add your projects and much more</h3>
       <div class="maincover">
        <img src="lib/img/banner.png" />
       </div>
     </div>
   	 </div>
   	 <div class="col-md-4">
      <div class="signup-box">
   	 	 <h2 class="main-title">Create an account</h2>
       <h4 class="sub-title">Its free and always will be.</h4>
         <form class="signupform" method="post" action="" id="createaccount" enctype="multipart/form-data" >
          <div class="col-50">
         <div class="formgroup">
            <input type="text" name="firstname" id="firstname" class="form-control input-sm" placeholder="First Name" />
         </div>
       </div>
       <div class="col-50">
         <div class="formgroup">
            <input type="text" name="lastname" id="lastname" class="form-control input-sm" placeholder="Last Name"  />
         </div>
       </div>
         <div class="formgroup">
            <input type="text" name="uemail" id="uemail" class="form-control input-sm" placeholder="Email"  />
         </div>
         <div class="formgroup">
            <input type="text" name="re_email" id="re_email" class="form-control input-sm" placeholder="Re-enter Email"  />
         </div>
          <div class="formgroup">
            <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username"  />
         </div>
          <div class="formgroup">
            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password"  />
         </div>
         <div class="formgroup">
           <label class="fullwidth">Date of birth</label>
           <div class="field-col">
            <select class="form-control">
              <option>Day</option>
               <option>1</option>
                <option>1</option>
                 <option>1</option>
            </select>
          </div>
          <div class="field-col">
            <select class="form-control">
              <option>Month</option>
               <option>1</option>
                <option>1</option>
                 <option>1</option>
            </select>
          </div>
          <div class="field-col">
            <select class="form-control">
              <option>Year</option>
               <option>1</option>
                <option>1</option>
                 <option>1</option>
            </select>
          </div>
          <div class="fullwidth" style="padding: 10px 0px;">
          <div class="field-col">
            <label><input type="radio" name="gender" id="gender" value="Male" /> Male </label>
          </div>

          <div class="field-col">
            <label><input type="radio" name="gender" id="gender" value="Female" /> Female </label>
          </div>
        </div>
         </div>
         <div class="fullwidth">
           <p>By clicking create an account, you agree to our <a href="#">terms</a></p>
         </div>
         <div class="formgroup">
             <input type="submit" class="button button-lg button-positive create" name="submit" value="Create an account"/>
         </div>
      </form>
      
     </div>
   	 </div>
   </div>
  </div>
  </div>
 </div>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="lib/js/jquery.noty.packaged.js"></script>
    <script type="text/javascript" src="lib/js/notification_html.js"></script>


<script type="text/javascript">
  $(document).ready(function(e){
    $('#login').on('submit', function(e){
       e.preventDefault();
       
      var email = $("#email").val();
      var password = $("#login_password").val();
      //var defaultpic = $("#defaultpic").val();
   $.ajax({
         url: 'server/api/login.php/login',
         data: {email: email, password: password},
         type: 'POST',
         cache:false,
         success: function(data) {
console.log(data);
              var response = JSON.parse(data);
              if(response.success){
             function generate(type, text) {

                  var n = noty({
                      text        : response.message,
                      type        : type,
                      dismissQueue: true,
                      layout      : 'bottomRight',
                      closeWith   : ['click'],
                      theme       : 'relax',
                      maxVisible  : 10,
                      animation   : {
                          open  : 'animated flipInX',
                          close : 'animated flipOutX',
                          easing: 'swing',
                          speed : 500
                      }
                  });
                  console.log('html: ' + n.options.id);
              }

        function generateAll() {
            generate('success', notification_html[3]);
        }
        setTimeout(function(){window.location.href='home.php'} , 5000);
              }
              else{
                function generate(type, text) {

                  var n = noty({
                      text        : response.error,
                      type        : type,
                      dismissQueue: true,
                      layout      : 'bottomRight',
                      closeWith   : ['click'],
                      theme       : 'relax',
                      maxVisible  : 10,
                      animation   : {
                          open  : 'animated flipInX',
                          close : 'animated flipOutX',
                          easing: 'swing',
                          speed : 500
                      }
                  });
                  console.log('html: ' + n.options.id);
              }

        function generateAll() {
            generate('error', notification_html[3]);
        }
              }
              generateAll();
         }
    });
  return false;
 });
  });
</script>




<script type="text/javascript">
  $(document).ready(function(e){
    $('#createaccount').on('submit', function(e){
       e.preventDefault();
      var firstname = $("#firstname").val();
      var lastname = $("#lastname").val();
      var uemail = $("#uemail").val();
      var re_email = $("#re_email").val();
      var username = $("#username").val();
      var password = $("#password").val();
      var gender = $("#gender").val();
      //var defaultpic = $("#defaultpic").val();
   $.ajax({
         url: 'server/api/user.php/signup',
         data: {firstname: firstname, lastname: lastname, uemail: uemail, re_email: re_email, username: username, password: password, gender: gender},
         type: 'POST',
         cache:false,
         success: function(data) {
              var response = JSON.parse(data);
              if(response.success){
             function generate(type, text) {

                  var n = noty({
                      text        : response.message,
                      type        : type,
                      dismissQueue: true,
                      layout      : 'bottomRight',
                      closeWith   : ['click'],
                      theme       : 'relax',
                      maxVisible  : 10,
                      animation   : {
                          open  : 'animated flipInX',
                          close : 'animated flipOutX',
                          easing: 'swing',
                          speed : 500
                      }
                  });
                  console.log('html: ' + n.options.id);
              }

        function generateAll() {
            generate('success', notification_html[3]);
        }
        setTimeout(function(){window.location.href=response.redirect} , 5000);
              }
              else{
                function generate(type, text) {

                  var n = noty({
                      text        : response.error,
                      type        : type,
                      dismissQueue: true,
                      layout      : 'bottomRight',
                      closeWith   : ['click'],
                      theme       : 'relax',
                      maxVisible  : 10,
                      animation   : {
                          open  : 'animated flipInX',
                          close : 'animated flipOutX',
                          easing: 'swing',
                          speed : 500
                      }
                  });
                  console.log('html: ' + n.options.id);
              }

        function generateAll() {
            generate('error', notification_html[3]);
        }
              }
              generateAll();
         }
    });
  return false;
 });
  });
</script>




</body>
</html>