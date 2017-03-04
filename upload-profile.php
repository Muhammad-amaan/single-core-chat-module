<?php
/*********************************************************************
     Purpose            : update image.
     Parameters         : null
     Returns            : integer
     ***********************************************************************/


require('function.php');
 $host = "localhost";
 $dbname = "ab58891_testappp";
 $dbUser = "ab58891_testapp1";
 $dbPass = "ab58891_testapp1";
 $conn;
 try{
     $db = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $dbUser, $dbPass);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $ex){
    echo "Connection error : ".$ex->getMessage();
  }

	 $post = isset($_POST) ? $_POST: array();
	 //print_R($post);die;
	 switch($post['action']) {
	  case 'save' :
		saveAvatarTmp();
	  break;
	  default:
		changeAvatar();
		
	 }
	
	 function changeAvatar() {
         session_start();
        $post = isset($_POST) ? $_POST: array();
        $max_width = "500"; 
        $userId = isset($post['hdn-profile-id']) ? intval($post['hdn-profile-id']) : 0;
        $path = 'live/';

        $valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
        $name = $_FILES['photoimg']['name'];
        $size = $_FILES['photoimg']['size'];
        if(strlen($name))
        {
        list($txt, $ext) = explode(".", $name);
        if(in_array($ext,$valid_formats))
        {
        if($size<(1024*1024)) // Image size max 1 MB
        {
           $actual_image_name =  'avatar'.time().$_SESSION['uid'].'.'.$ext;
        //$actual_image_name = 'avatar' .'_'.$userId .'.'.$ext;

        $filePath = $path .'/'.$actual_image_name;
        $tmp = $_FILES['photoimg']['tmp_name'];
        
        if(move_uploaded_file($tmp, $filePath))
        {
        $width = getWidth($filePath);
            $height = getHeight($filePath);
            //Scale the image if it is greater than the width set above
            if ($width > $max_width){
                $scale = $max_width/$width;
                $uploaded = resizeImage($filePath,$width,$height,$scale);
            }else{
                $scale = 1;
                $uploaded = resizeImage($filePath,$width,$height,$scale);
            }
        /*$res = saveAvatar(array(
                        'userId' => isset($userId) ? intval($userId) : 0,
                                                'avatar' => isset($actual_image_name) ? $actual_image_name : '',
                        ));*/
        $orig_filepath = str_replace('../../../', '', $filePath);
       
        $session_id = $_SESSION['uid']; 
        global $db;               
        $stmt = $db->query("UPDATE users SET profilepic='$path$actual_image_name' WHERE uid='$session_id'");
        echo "<img id='photo' file-name='".$actual_image_name."' class='' src='".$orig_filepath.'?'.time()."' class='preview'/>";
        }
        else
        echo "failed";
        }
        else
        echo "Image file size max 1 MB"; 
        }
        else
        echo "Invalid file format.."; 
        }
        else
        echo "Please select image..!";
        exit;
        
        
    }
    /*********************************************************************
     Purpose            : update image.
     Parameters         : null
     Returns            : integer
     ***********************************************************************/
     function saveAvatarTmp() {
        $post = isset($_POST) ? $_POST: array();
        $userId = isset($post['id']) ? intval($post['id']) : 0;
        $path ='\\images\uploads\tmp';
        $t_width = 300; // Maximum thumbnail width
        $t_height = 300;    // Maximum thumbnail height
		
    if(isset($_POST['t']) and $_POST['t'] == "ajax")
    {
        extract($_POST);
        $filePath = "../../../live/";
        $orig_filepath = str_replace('../../../', '', $filePath);
        //$img = get_user_meta($userId, 'user_avatar', true);
        $imagePath = $orig_filepath.$_POST['image_name'];
        $ratio = ($t_width/$w1); 
        $nw = ceil($w1 * $ratio);
        $nh = ceil($h1 * $ratio);
        $nimg = imagecreatetruecolor($nw,$nh);
        $im_src = imagecreatefromjpeg($imagePath);
        imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
        imagejpeg($nimg,$imagePath,90);
        
    }
    echo $imagePath.'?'.time();;
    exit(0);    
    }
    
    /*********************************************************************
     Purpose            : resize image.
     Parameters         : null
     Returns            : image
     ***********************************************************************/
    function resizeImage($image,$width,$height,$scale) {
    $newImageWidth = ceil($width * $scale);
    $newImageHeight = ceil($height * $scale);
    $newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
    $source = imagecreatefromjpeg($image);
    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
    imagejpeg($newImage,$image,90);
    chmod($image, 0777);
    return $image;
}
/*********************************************************************
     Purpose            : get image height.
     Parameters         : null
     Returns            : height
     ***********************************************************************/
function getHeight($image) {
    $sizes = getimagesize($image);
    $height = $sizes[1];
    return $height;
}
/*********************************************************************
     Purpose            : get image width.
     Parameters         : null
     Returns            : width
     ***********************************************************************/
function getWidth($image) {
    $sizes = getimagesize($image);
    $width = $sizes[0];
    return $width;
}
?>