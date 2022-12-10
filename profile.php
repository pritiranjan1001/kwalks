<?php ob_start();?>
<?php include 'include/function.php';?>
<?php include 'include/connect.php'; ?>
<?php include 'include/username.php';?>
<?php if($_SESSION['user_type']=='u'){?>
<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="Kwalks, the way you are" />
<meta name="author" content="kwalks.com" />
<title>kwalks</title>
<link href="assets/img/logo6.png" rel="shortcut icon" />
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/slideUp.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/profile-style.css" />
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<?php require 'include/header.php';?>
<?php require 'include/connect.php';?>
<body data-spy="scroll" data-target="#menu-section">
<?php if ($_SESSION['user_id']) {
$user_id = true;
$sDate = date("Y-m-d H:i:s");
$query7 = mysql_query("SELECT COUNT(id) as num4 FROM users where id=('$user')"); 
$run4=mysql_fetch_array($query7);
$num7=$run4['num4']; 
if($num7!=0)
{
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  <div class="maxio"></div></div>
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="panel-body"> 
<form name='status'  method='post'>  
<?php
if (isset($_POST['status'])) {
$status= stripslashes($_POST['status']);
$status=htmlentities($status, ENT_QUOTES, "UTF-8"); 
if (empty($status)) {
echo "please enter the text <br/><br/>";
}else{
$u_id=$_SESSION['user_id'];
mysql_query("UPDATE status SET status='$status' where user_id=('$u_id')");
echo"status is updated:<br>"; 
header("location:profile.php"); 
ob_end_flush();
}
}
?>
<br>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span></button>
<br>
<h6>change your status: &#9997;</h6>
<h6 class="pull-right" id="counter">160 characters remaining</h6>
<textarea class="form-control counted" name="status" placeholder="Type your message"></textarea>
<button class="btn btn-info" type="submit" name="statustext"><i class="fa fa-fw fa-edit"></i> </button> 
</form> 
<br>
<hr>
<h6>CHANGE COVER PIC:</h6>
<form name="upload-img1" enctype='multipart/form-data' action="" method='post'>
<?php
$name = '';
$type = '';
$size = ''; 
$error = '';
function compress_image($source_url, $destination_url, $quality)
{
$info = getimagesize($source_url); if ($info['mime'] == 'image/jpeg') 
$image = imagecreatefromjpeg($source_url); elseif ($info['mime'] == 'image/gif') 
$image = imagecreatefromgif($source_url); elseif ($info['mime'] == 'image/png')
$image = imagecreatefrompng($source_url); imagejpeg($image, $destination_url, $quality); 
return $destination_url; } 
if (isset($_POST['upload-img12'])) {
if ($_FILES["files6"]["error"] > 0) 
{
$error = "please input an image";
}else if($_FILES['files6']['size']>3145728){$error = "size must be less than 3MB";} 
else if (($_FILES["files6"]["type"] == "image/gif") || ($_FILES["files6"]["type"] == "image/jpeg") || ($_FILES["files6"]["type"] == "image/png") || ($_FILES["files6"]["type"] == "image/pjpeg")) 
{
$random_name=rand();   
$eimg=sha1($username.$random_name);
$file=$_FILES['files6'];
$file_type=$_FILES['files6']['type'];
$file_size=$_FILES['files6']['size'];
$url = 'uploades/cover/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["files6"]['tmp_name'], $url, 40); 
header("Content-Transfer-Encoding: binary");
if($_FILES['files6']['size'] == 0)
{
echo "please input an image :<br/>";
}
else{
echo "LOADING........ :<br/>";
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/cover/'.$eimg.'.jpg');
mysql_query("INSERT INTO cover VALUES ('','$eimg.jpg','$u_id') ");
mysql_query("INSERT INTO postt VALUES ('','','cover pic is updated','$eimg.jpg','c','$u_id','$sDate') ");
echo"image uploaded <br/><br/>";
}
} else  { 
$error = "Uploaded image should be jpg or gif or png"; } 
}                          
?>
<h6> <input type="file" class="imgx"  accept="image/*" name="files6">  </input> </h6> 
<input class="btn button-custom btn-custom-three" name="upload-img12" type="submit" value="upload">
</form>
<br><br><br>
</div>
</div>
</div>
</div>
<?php
if($user==$my_id){   
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (id),(url) FROM cover where user_id=('$u_id') ORDER BY id DESC");    
}else{
$query = mysql_query(" SELECT (id),(url) FROM cover where  user_id=('$user') ORDER BY id DESC");   
}
$row=mysql_fetch_array($query);
$pic=$row['url'];                                                     
?>
<div class="margin"></div>
<section id="yes" style="background-image:url('uploades/cover/<?php echo $pic;?>')">
<div class="overlay">
<div class="row text-center">
<div class="col-lg-11 col-md-10">
<div class="stalock">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="main-div">
<?php
if (isset($_POST['upload-img1'])) {
if ($_FILES["file"]["error"] > 0) 
{
$error = "please input an image";
}else if($_FILES['files6']['size']>2097152){$error = "size less 2MB";}  
else if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) 
{
$file=$_FILES['file'];
$file_type=$_FILES['file']['type'];
$file_size=$_FILES['file']['size'];
$random_name=rand();
$eimg=sha1($username.$random_name);
$url='uploades/user_images/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES['file']['tmp_name'], $url, 40); 
if($_FILES['file']['size'] == 0)
{
echo "please input an image :<br/>";
}
else{
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/user_images/'.$eimg.'.jpg');
mysql_query("INSERT INTO pro_pic VALUES ('','$eimg.jpg','$u_id') ");
mysql_query("INSERT INTO postt VALUES ('','','profile pic is updated','$eimg.jpg','k','$u_id','$sDate') ");  
}
} else { 
$error = "Uploaded image should be jpg or gif or png"; } 
}
?>
<?php
if($user==$my_id){   
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (id),(url) FROM pro_pic where user_id=('$u_id') ORDER BY id DESC");    
}else{
$query = mysql_query(" SELECT (id),(url) FROM pro_pic where  user_id=('$user') ORDER BY id DESC");   
}
$row=mysql_fetch_array($query);
$pic=$row['url'];      
$query3 = mysql_query("SELECT COUNT(*) as num3 FROM frnds where user_one=$user|| user_two=$user"); 
$run3=mysql_fetch_array($query3);
$num3=$run3['num3'];				
$query4 = mysql_query("SELECT COUNT(*) as num4 FROM follow where user_one=$user"); 
$run4=mysql_fetch_array($query4);
$num4=$run4['num4'];   
?>
<div class="image-div">
<img src="uploades/user_images/<?php echo $pic;?>"/>
<form method="POST" action="" enctype="multipart/form-data" id="ppic">
<?php
if($user ==$my_id) {   ?>
<label for="file" class="upload-btn">CHANGE IMAGE</label>
<input type="file" name="file" id="file" /> 
<div class="saveim"  >
<input onclick='change33(this)'class="btn button-custom btn-custom-two" name="upload-img1" type="submit" value="SAVE" id="save" style="display:none">
<div class="progress" style="display:none">
<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" >
<span class="sr-only"></span>
</div>
</div>    
</div>
<?php   } ?>
</form>
</div>
<?php $name=getusername($user);?>
<div class="content-div">
<h5><?php echo $name;?></h5>
<?php 
if($user==$my_id){
echo" <h6><a href='followers.php'>link with ( $num3) </a> &nbsp; || &nbsp;&nbsp; 
<a href='following.php'>Following ( $num4) </a> &nbsp;&nbsp; ||&nbsp;&nbsp; <a href='pro-img.php'> <i class='fa fa-camera'></i></a></h6>";
}else{
echo" <h6><a href='followers.php?user=$user'>link with ( $num3) </a> &nbsp; || &nbsp;&nbsp; 
<a href='following.php?user=$user'>Following ( $num4) </a> </h6>" ;  
} ?>          
</div>
</div>
</div> 
<?php
if($user==$my_id){    
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (status) FROM status where user_id=('$u_id')");                                           
while ($run=mysql_fetch_array($query)) {
$status=$run['status'];                               
} 
}else{
$query = mysql_query(" SELECT (status) FROM status where user_id=('$user')");                                           
while ($run=mysql_fetch_array($query)) {
$status=$run['status'];
}}?>
<span class="text-yes"><h5><?php echo $status ?></h5></span>
</div>            
</div>
</div>
</section> 
<div class="panel">  
<div class="panel-body">
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-10">  
<div class="status">                        
<?php
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (status) FROM status where user_id=('$u_id')");                                           
while ($run=mysql_fetch_array($query)) {
$status=$run['status'];                               
} 
?>
<h6><?php //echo $status ?></h6>  
</div>                   
</div>                       
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
<div id="home" >    
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<?php
if($user !==$my_id){
$check_friend_query=mysql_query("SELECT id FROM frnds WHERE (user_one = $my_id AND user_two='$user') OR (user_one = '$user' AND user_two = '$my_id') ");
if (mysql_num_rows($check_friend_query) == 1) {
echo "<input onclick='change55(this,$user)' type='button'  class='btn button-custom btn-custom-three' value='unfriend'></input>";
} else {
$from_query = mysql_query("SELECT id FROM frnd_req  WHERE (from_me = $user AND to_frnd = '$my_id')");
$to_query = mysql_query("SELECT id FROM frnd_req  WHERE (from_me = $my_id AND to_frnd = '$user')");
if (mysql_num_rows($from_query) == 1) {
echo "<input onclick='change55(this,$user)' type='button' class='btn button-custom btn-custom-three' value='ignore' id='ignore' ></input>  <input onclick='change55(this,$user)' type='button' class='btn button-custom btn-custom-three' value='accept' id='accept'></input>";
} else if (mysql_num_rows($to_query) == 1) {
echo "<input onclick='change55(this,$user)' type='button'   class='btn button-custom btn-custom-three' value='cancel request'> </input>";
} else {
echo "<input onclick='change55(this,$user)' type='button'   class='btn button-custom btn-custom-three' value='send a request'> </input>";
}
}
echo "<a class='btn button-custom btn-custom-two' href='quotebox.php'>quote box</a>"; 
echo "<a class='btn button-custom btn-custom-two' href='about.php?user=$user'>About</a>"; 
echo "<a class='btn button-custom btn-custom-two' href='album.php?user=$user'>Album</a>";
echo "<a class='btn button-custom btn-custom-two' href='following.php?user=$user'>Following</a>";
}else{
echo "<a class='btn button-custom btn-custom-two' href='quotebox.php'>quote box</a>"; 
echo "<a class='btn button-custom btn-custom-two' href='about.php'>About</a>"; 
echo "<a class='btn button-custom btn-custom-two' href='album.php'>Album</a>";
echo "<a class='btn button-custom btn-custom-two' href='noteshow.php'>Notes</a>";
echo "<a class='btn button-custom btn-custom-two' href='page-page.php'>Pages</a>";
echo "<button type='button' class='btn button-custom btn-custom-three' data-toggle='modal' data-target='#myModal'>status<i class='fa fa-fw fa-edit'></i>
</button> ";
}
?>
</div> </div>
</div>
</div>
</div>
<section id="work" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>My Posts</h3><hr />
</div>
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" >
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-bottom">
<div class="caegories">
<a href="#" data-filter="*" class="active btn btn-custom btn-custom-two btn-sm">RECENT</a>
<a href="#" data-filter=".recent" class="btn btn-custom btn-custom-two btn-sm">POSTS</a>           
<a href="#" data-filter=".favourite" class="btn btn-custom btn-custom-two btn-sm" >IMAGES</a>
</div>
</div>
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
<?php $check_friend_query=mysql_query("SELECT id FROM frnds WHERE (user_one = $my_id AND user_two='$user') OR (user_one = '$user' AND user_two = '$my_id') ");if (mysql_num_rows($check_friend_query) == 1||$user==$my_id) {include "include/update2.php";} ?>
</div>
</div>
</section>
<?php }else{
 header('Location:index.php');
} }
else{header('Location:index.php');
}  }else
{
header('Location:index.php');
} 
?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript"> function change55(e,i)
{ var dataString="id="+i;
 
    if(e.value=="send a request")
	{    dataString=dataString+"&action=send"
		e.value="cancel request";
		$.ajax({
			type:"POST",
			url:"include/action.php",
			data:dataString,
			success:function(response)
			{}
		});
	}
    else if(e.value=="cancel request")
	{
		dataString=dataString+"&action=cancel"
		e.value="send a request";
		$.ajax({
			type:"POST",
			url:"include/action.php",
			data:dataString,
			success:function(response)
			{}
		});
	}	
     	else if(e.value=="unfriend")
	{
		dataString=dataString+"&action=unfrnd"
		e.value="send a request";
		$.ajax({
			type:"POST",
			url:"include/action.php",
			data:dataString,
			success:function(response)
			{}
		});
	}		
    else if(e.value=="accept")
	{
		dataString=dataString+"&action=accept"
		e.value="unfriend";
		
		$("#ignore").hide();
		$.ajax({
			type:"POST",
			url:"include/action.php",
			data:dataString,
			success:function(response)
			{}
		});
	}
 	else if(e.value=="ignore")
	{
		dataString=dataString+"&action=ignore"
		e.value="send a request";
		
		  $("#accept").hide();
		$.ajax({
			type:"POST",
			url:"include/action.php",
			data:dataString,
			success:function(response)
			{}
		});
	}		
}
</script>
<script type="text/javascript"> function change33()
{  $("#save").hide();
 
}
</script>
<script src="js1/imgche.js"></script>
<script src="js1/index.js"></script>
<script>
$(document).on('change', '#file', function () {
var progressBar = $('.progress'), bar = $('.progress .progress-bar'), percent = $('.progress .sr-only'),save = $('.saveim');
 $("#save").hide();
$('#ppic').ajaxForm({
    beforeSend: function() {
		progressBar.show();
		progressBar.fadeIn();
        var percentVal = '0%';
		 
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function() {				
			var percentVal = '100%';
			bar.width(percentVal)
			percent.html(percentVal);
		
		progressBar.hide();			
	}	
}).submit();		
$("#save").show();
});
</script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/slide.over.js"></script>
<script src="assets/js/custom-solid.js"></script>
<script src="assets/js/jquery.form.js"></script>
</body>
</html>
