<?php require_once("server/api/userdata.php");?>

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
    <link rel="stylesheet" href="lib/css/style.css">
     <link rel="stylesheet" href="lib/css/chatbox.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->





  <style type="text/css">
.wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
  </style>

  <style>
            @media only screen and (max-width : 540px)
            {
                .chat-sidebar
                {
                    display: none !important;
                }
               
                .chat-popup
                {
                    display: none !important;
                }
            }
           
            body
            {
                background-color: #e9eaed;
            }
           
            .chat-sidebar
            {
                width: 200px;
                position: fixed;
                height: 100%;
                right: 0px;
                top: 0px;
                padding-top: 10px;
                padding-bottom: 10px;
                border: 1px solid rgba(29, 49, 91, .3);
            }
           
            .sidebar-name
            {
                padding-left: 10px;
                padding-right: 10px;
                margin-bottom: 4px;
                font-size: 12px;
            }
           
            .sidebar-name span
            {
                padding-left: 5px;
            }
           
            .sidebar-name a
            {
                display: block;
                height: 100%;
                text-decoration: none;
                color: inherit;
            }
           
            .sidebar-name:hover
            {
                background-color:#e1e2e5;
            }
           
            .sidebar-name img
            {
                width: 32px;
                height: 32px;
                vertical-align:middle;
            }
           
            .popup-box
            {
                display: none;
                position: fixed;
                bottom: 0px;
                right: 220px;
                height: 285px;
                background-color: rgb(237, 239, 244);
                width: 300px;
                border: 1px solid rgba(29, 49, 91, .3);
                z-index: 999999999999999;
            }
           
            .popup-box .popup-head
            {
                background-color: #6d84b4;
                padding: 5px;
                color: white;
                font-weight: bold;
                font-size: 14px;
                clear: both;
            }
           
            .popup-box .popup-head .popup-head-left
            {
                float: left;
            }
           
            .popup-box .popup-head .popup-head-right
            {
                float: right;
                opacity: 0.5;
            }
           
            .popup-box .popup-head .popup-head-right a
            {
                text-decoration: none;
                color: inherit;
            }
           
            .popup-box .popup-messages
            {
                height: 100%;
                overflow-y: scroll;
            }
           


        </style>
</head>
<body class="skin-blue sidebar-mini hold-transition register-page">

<header class="main-header">
    <!-- Logo -->
    <!--<a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices 
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>-->
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <!--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>-->
      <div style="font-size: 18px; float: left; margin-top: 13px;">Chat app</div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $profilepic; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $username; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $profilepic; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $username; ?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              
              
<!--              <li class="user-body">-->
<!--                <div class="row">-->
<!--                  <div class="col-xs-4 text-center">-->
<!--                    <a href="#">Followers</a>-->
<!--                  </div>-->
<!--                  <div class="col-xs-4 text-center">-->
<!--                    <a href="#">Sales</a>-->
<!--                  </div>-->
<!--                  <div class="col-xs-4 text-center">-->
<!--                    <a href="#">Friends</a>-->
<!--                  </div>-->
<!--                </div>-->
<!--               -->
<!--              </li>-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-comment"></i>
              <span class="label label-danger" id="countuser"></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <input type="hidden" value="<?php echo $uid; ?>" id="uid" name="uid"/>
  </header>

<!-- wrapper -->
<div class="wrapper" style="padding-top: 70px;">
 <div class="container">

<?php
// require('lib/php/Pusher.php');

//   $options = array(
//     'encrypted' => true
//   );
//   $pusher = new Pusher(
//     '58bfd3799c27ae38b3dd',
//     '6919d581ea79c4a66366',
//     '224541',
//     $options
//   );

//   $data['message'] = 'hello world';
//   $pusher->trigger('test_channel', 'my_event', $data);
?>

          <div class="row" style="display: none;">
          
           <div class="col-md-3">
           
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $profilepic; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $username; ?></h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
                    <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-left">Groups</h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  Group one <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  Group two <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                   Group three <a class="pull-right">1,322</a>
                </li>
                 <li class="list-group-item" style="float:left;width:100%;">
                  <a href="javascript:void(0);" class="pull-left" data-toggle="modal" data-target="#createGroup">Create Group</a>  <a class="pull-right">1,322</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
          
        </div>
        
        
        <div class="col-md-6">
         
         <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Update Status</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Add Photos/Videos</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                  Add Files <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1">
                <b>How to use:</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                A wonderful serenity has taken possession of my entire soul,
                like these sweet mornings of spring which I enjoy with my whole heart.
                I am alone, and feel the charm of existence in this spot,
                which was created for the bliss of souls like mine. I am so happy,
                my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                that I neglect my talents. I should be incapable of drawing a single stroke
                at the present moment; and yet I feel that I never was a greater artist than now.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
        




            






















        
          <div class="postcontent">


            <?php
            require_once("server/api/class.user.php");
                $stmt = $user->runSqlQuery("SELECT p.*, c.*, u.username FROM posts p LEFT JOIN comments c ON c.postid = p.postid LEFT JOIN users u ON u.uid = p.uid GROUP BY p.postid");
                $stmt->execute();
                while($posts = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
           

            <div class="box-body" style="padding:0px;">
              
              <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#"><?php echo $posts['username'];?></a></span>
                <span class="description">Shared publicly - 7:30 PM Today</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
              <img class="img-responsive pad" src="dist/img/photo2.png" alt="Photo">

              <p><?php echo $posts['content'];?></p>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
              <span class="pull-right text-muted">127 likes - 3 comments</span>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments" style="display: block;">
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="dist/img/user3-128x128.jpg" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        <?php echo $posts['username'];?>
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  <?php echo $posts['comments'];?>
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="dist/img/user4-128x128.jpg" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Luna Stark
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer" style="display: block;">
              <form action="#" method="post">
                <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
              
            </div>
            <!-- /.box-body -->

            <?php } ?>
          </div>
          <!-- /.box -->

        </div>
        
        
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-user-plus"></i>

              <h3 class="box-title">Find Friends</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                 require_once("server/api/class.user.php");
                 //session_start();
                 $user = new USER();
                 $uid = $_SESSION['uid'];
                 $stmt = $user->runSqlQuery("SELECT * FROM users WHERE uid != :uid ORDER BY datetime LIMIT 5");
                 $stmt->execute(array(":uid" => $uid));

                 while($userData = $stmt->fetch(PDO::FETCH_ASSOC)){
                   $uid = $userData['uid'];
                   $profilepic = $userData['profilepic'];
                   $username = $userData['username'];
                 ?>

              <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo $profilepic; ?>" alt="User Image">
                        <span class="username">
                          <a href="#"><?php echo $username; ?></a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Lives in Karachi</span>
                    <div class="btn-group description">
                      <button type="button" class="button button-md button-positive">Add friend</button>
                    </div>
                  </div>
                 <?php } ?>
                  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
          </div>
          
          
 </div>
 </div>

<!-- /.wrapper -->


<!-- Modal -->
<div class="modal fade" id="createGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
         
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Create</button>
      </div>
      </form>
      
    </div>
  </div>
</div>



 <?php require_once("chatsidebar.php"); ?>


<!-- jQuery 2.2.0 -->
<script src="lib/js/jquery-1.11.3-jquery.min.js"></script>

<script src="https://js.pusher.com/3.1/pusher.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="dist/js/app.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script> -->
<script src="lib/js/notification.js"></script>
<script src="lib/js/firechat.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<script>
// Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    // var pusher = new Pusher('58bfd3799c27ae38b3dd', {
    //   encrypted: true
    // });

    // var channel = pusher.subscribe('test_channel');
    // channel.bind('my_event', function(data) {
    //   alert(data.message);
    // });
        </script>

</body>
</html>
