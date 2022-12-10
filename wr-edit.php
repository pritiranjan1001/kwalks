<?php ob_start();?>
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
require 'include/function.php';
}else{
require 'include/page-function.php';
}
if(($_SESSION['user_type']=='w')|| ($_SESSION['user_type']=='u'&& isset($_GET['u_id'])&& !empty($_GET['u_id'])))      
{		         
?>
<?php include'include/connect.php';?>
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
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href="assets/css/writer.css" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target="#menu-section">
<div class="boxc">
<?php
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
echo(include 'include/header.php');
}else{
$u_id=$_SESSION['user_id'];
echo(include 'include/wr-header.php');
}
?>
<?php include 'include/username.php'; ?>
<?php if ($_SESSION['user_id']) {$user_id = true;?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="maxio"></div></div>
<section id="work" ><div class="container">
<div class="row">
<div class="col-lg-12">
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-2">
<ul class="nav" id="myTab">
<?php 
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
echo" <li><a href='wr-profile.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>HOME</a></li> 
<li><a href='wr-about.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>ABOUT</a></li>
<li><a href='wr-pro.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>PROFILE</a></li>
<li><a href='wr-post-col.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>POSTS</a></li>
<li><a href='wr-collecn.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>COLLECTIONS</a></li>";
}else{
echo "<li><a href='wr-profile.php'  class='btn btn-custom btn-custom-two btn-sm'>HOME</a></li>
<li><a href='wr-about.php'  class='btn btn-custom btn-custom-two btn-sm'>ABOUT</a></li>
<li><a href='wr-pro.php'  class='btn btn-custom btn-custom-two btn-sm'>PROFILE</a></li>
<li><a href='wr-post.php'  class='btn btn-custom btn-custom-two btn-sm'>POSTS</a></li>
<li><a href='wr-note.php' class='btn btn-custom btn-custom-two btn-sm'>NOTES</a></li>
<li><a href='wr-collecn.php'  class='btn btn-custom btn-custom-two btn-sm'>COLLECTIONS</a></li>";
} ?>
</ul>         
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-10">
<div class="work-wrapper">
<div class="tab-pane" id="n5">
<div>
<h3> Edit you status in the about :</h3><hr>
</div>
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">               
<div class="tab-pane active" id="n5">
<h6>( change about picture )</h6>
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
return $destination_url; } if ($_POST)
{ 
if ($_FILES["files6"]["error"] > 0) 
{
$error = "please give a valid  image file";
} else if($_FILES['files6']['size']>3145728){$error = "size must be less than 3MB";}
else if (($_FILES["files6"]["type"] == "image/gif") || ($_FILES["files6"]["type"] == "image/jpeg") || ($_FILES["files6"]["type"] == "image/png") || ($_FILES["files6"]["type"] == "image/pjpeg")) 
{
if (isset($_POST['upload-img12'])) {
$file=$_FILES['files6'];
$file_type=$_FILES['files6']['type'];
$file_size=$_FILES['files6']['size'];
$file_temp=$_FILES['files6']['tmp_name'];
$random_name=rand();
$eimg=sha1($username.$random_name);   
$url = 'uploades/w-cover/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["files6"]['tmp_name'], $url, 70); 
header("Content-Transfer-Encoding: binary");
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/w-cover/'.$eimg.'.jpg');
mysql_query("INSERT INTO w_cover VALUES ('','$eimg.jpg','$u_id') ");
echo"image uploaded <br/><br/>";
header("location:wr-about.php");
} else  { 
$error = "Uploaded image should be jpg or gif or png"; } } 
echo $error."<br/><br/>"; } ?>
<div class="centered">
<input type="file"  class="imgx"  accept="image/*" name="files6"> 
<input class="btn button-custom btn-custom-two" id="axion" name="upload-img12" type="submit" value="save">          
</div><BR>
<h6>( write description ..... )</h6>
<form  method='post' name='about'>
<?php
if (isset($_POST['about'])) {
$about= stripslashes($_POST['about']);
$about=htmlentities($about, ENT_QUOTES, "UTF-8");
if (empty($about)) {
echo "please enter the text <br/><br/>";
}else{
$u_id=$_SESSION['user_id'];
mysql_query("UPDATE wr_about SET about='$about' where user_id=('$u_id')");
echo" updated:<br>";  
header("location:wr-about.php");                    
}
}
?>
<textarea class="axiom" placeholder="write your note..." maxlength="7000" autocomplete="off" name="about"></textarea><BR>
<input class="btn button-custom btn-custom-two" id="axion" name="upload-img" type="submit" value="save"></input>
</form>
<BR>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section><div>
<?php }else{ header('Location:index.php');} }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>              