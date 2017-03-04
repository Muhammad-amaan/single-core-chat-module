<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="lib/js/imgareaselect.css">
    <link rel="stylesheet" href="lib/css/style.css">
	 <style type="text/css">
.wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
    position: relative;
    margin: 40px auto;
    margin-bottom: 0;
    border: 1px solid #e0e0e0;
    border-bottom-color: #e0e0e0;
    background: #f7f7f7;
    border-radius: 4px 4px 0px 0px;
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
span.round-tab i.glyphicon{
	line-height: 60px;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #0080d5;
    
}
.wizard li.active span.round-tab i{
        color: #0082d9;
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
    border-bottom-color: #0080d5;
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
        padding-bottom: 50px;
}

.wizard h3 {
    margin-top: 0;
}
.formwizad{
	padding: 0px 65px;
    border: 1px solid #ccc;
    border-top: none;
    border-radius:0px 0px 4px 4px;
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
</head>
<body>
<div class="container" style="    width: 800px;">
  <div class="row">
    <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form" class="formwizad" id="cropimage" method="post" enctype="multipart/form-data" action="upload-profile.php">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Step 1</h3>
                        <div class="row">
                        <div class="col-md-6">
                		<div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						    <div class="col-sm-12">
						      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
						    </div>
						  </div>
						</div>
						<div class="col-md-6">
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
						    <div class="col-sm-12">
						      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
						    </div>
						  </div>   
						  </div>   	
						  </div>
						  <div class="clearfix"></div>	

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Step 2</h3>
                        <p>This is step 2</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-danger prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        

                        <div class="row">
                <div class="col-sm-2"><img class="img-circle" id="avatar-edit-img" height="128" data-src="lib/img/6459666238612098569-id-10987-001.jpg"  data-holder-rendered="true" style="width: 140px; height: 140px;" src="lib/img/6459666238612098569-id-10987-001.jpg"/></div>
                <div class="col-sm-10"><a type="button" class="btn btn-primary" id="change-pic">Change Image</a>
                <div id="changePic" class="" style="display:none">
                   
                        <label>Upload your image</label><input type="file" name="photoimg" id="photoimg" />
                        <input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="1" />
                        <input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
                        <input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
                        <input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
                        <input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
                        <input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
                        <input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
                        <input type="hidden" name="action" value="" id="action" />
                        <input type="hidden" name="image_name" value="" id="image_name" />
                        
                        <div id='preview-avatar-profile'>
                    </div>
                    <div id="thumbs" style="padding:5px; width:600p"></div>
                   
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="btn-crop" class="btn btn-primary">Crop & Save</button>
                </div>
            </div>
        </div>
        
        </div>



                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-danger prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-danger next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane text-center" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
</body>
</html>
<!-- jQuery 2.2.0 -->
<!-- <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script> -->
<!-- Bootstrap 3.3.6 -->
<!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="lib/js/jquery.imgareaselect.js" type="text/javascript"></script>
    <script src="lib/js/jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>

<script type="text/javascript">
        jQuery(document).ready(function(){
        
        jQuery('#change-pic').on('click', function(e){
            jQuery('#changePic').show();
            jQuery('#change-pic').hide();
            
        });
        
        jQuery('#photoimg').on('change', function()   
        { 
            jQuery("#preview-avatar-profile").html('');
            jQuery("#preview-avatar-profile").html('Uploading....');
            jQuery("#cropimage").ajaxForm(
            {
            target: '#preview-avatar-profile',
            success:    function() { 
                    jQuery('img#photo').imgAreaSelect({
                    aspectRatio: '1:1',
                    onSelectEnd: getSizes,
                });
                jQuery('#image_name').val(jQuery('#photo').attr('file-name'));
                }
            }).submit();

        });
        
        jQuery('#btn-crop').on('click', function(e){
        e.preventDefault();
        params = {
                targetUrl: 'upload-profile.php?action=save',
                action: 'save',
                x_axis: jQuery('#hdn-x1-axis').val(),
                y_axis : jQuery('#hdn-y1-axis').val(),
                x2_axis: jQuery('#hdn-x2-axis').val(),
                y2_axis : jQuery('#hdn-y2-axis').val(),
                thumb_width : jQuery('#hdn-thumb-width').val(),
                thumb_height:jQuery('#hdn-thumb-height').val()
            };

            saveCropImage(params);
        });
        
     
        
        function getSizes(img, obj)
        {
            var x_axis = obj.x1;
            var x2_axis = obj.x2;
            var y_axis = obj.y1;
            var y2_axis = obj.y2;
            var thumb_width = obj.width;
            var thumb_height = obj.height;
            if(thumb_width > 0)
                {

                    jQuery('#hdn-x1-axis').val(x_axis);
                    jQuery('#hdn-y1-axis').val(y_axis);
                    jQuery('#hdn-x2-axis').val(x2_axis);
                    jQuery('#hdn-y2-axis').val(y2_axis);
                    jQuery('#hdn-thumb-width').val(thumb_width);
                    jQuery('#hdn-thumb-height').val(thumb_height);
                    
                }
            else
                alert("Please select portion..!");
        }
        
        function saveCropImage(params) {
        jQuery.ajax({
            url: params['targetUrl'],
            cache: false,
            dataType: "html",
            data: {
                action: params['action'],
                id: jQuery('#hdn-profile-id').val(),
                 t: 'ajax',
                                    w1:params['thumb_width'],
                                    x1:params['x_axis'],
                                    h1:params['thumb_height'],
                                    y1:params['y_axis'],
                                    x2:params['x2_axis'],
                                    y2:params['y2_axis'],
                                    image_name :jQuery('#image_name').val()
            },
            type: 'Post',
           // async:false,
            success: function (response) {
                    jQuery('#changePic').hide();
                    jQuery('#change-pic').show();
                    jQuery(".imgareaselect-border1,.imgareaselect-border2,.imgareaselect-border3,.imgareaselect-border4,.imgareaselect-border2,.imgareaselect-outer").css('display', 'none');
                    
                    jQuery("#avatar-edit-img").attr('src', response);
                    jQuery("#preview-avatar-profile").html('');
                    jQuery("#photoimg").val('');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert('status Code:' + xhr.status + 'Error Message :' + thrownError);
            }
        });
        }
        });
    </script>