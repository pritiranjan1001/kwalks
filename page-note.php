<?php ob_start();?>
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
require 'include/function.php';
}else{
require 'include/page-function.php';
}
if(($_SESSION['user_type']=='p')|| ($_SESSION['user_type']=='u'&& isset($_GET['u_id'])&& !empty($_GET['u_id'])))      
{		                    
?>
<?php include'include/connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>kwalks</title>
<link href="assets/img/logo6.png" rel="shortcut icon" />
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" /> 
<link rel="stylesheet" href="assets/css/profile-style.css" />
<link href="assets/css/re-note.css" rel="stylesheet" />
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
echo(include 'include/header.php');
}else{
$u_id=$_SESSION['user_id'];
echo(include 'include/page-header.php');
}
?>
<?php include ('include/username.php'); ?>
<?php if ($_SESSION['user_id']) {
$user_id = true;
?>
<div class="contdoo" >  
<section>
<div class="container">
<div class="row text-center">
<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10">
<h6></h6>
<h1> write a note <a href="page-note-show.php"> <i class="fa fa-heart-o"></i></a></h1>
</div>
</div>
</div>
</section>
<section id="preview">
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">               
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="tab-pane active" id="n1">
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
if (isset($_POST['upload-img'])) {
$name= stripslashes($_POST['name']);
$name=htmlentities($name, ENT_QUOTES, "UTF-8");
$descptn=stripslashes($_POST['descptn']);
$descptn=htmlentities($descptn, ENT_QUOTES, "UTF-8");
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id'];
if ($_FILES['file']['size']!=0) {
if ($_FILES["file"]["error"] > 0) 
{
$error = "please give a valid  image file";
}else if($_FILES['file']['size']>4194304){$error = "size must be less than 4MB";}
else if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) 
{ 
$file=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];
$file_size=$_FILES['file']['size'];
$file_temp=$_FILES['file']['tmp_name'];
$random_name=rand(); 
$eimg=sha1($username.$random_name);     
$file=$_FILES['file'];
$file_type=$_FILES['file']['type'];
$file_size=$_FILES['file']['size'];
$url = 'uploades/p-notes/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["file"]['tmp_name'], $url, 30); 
header("Content-Transfer-Encoding: binary");
if(!empty($descptn)&&$file_size!=0 && $_FILES['file']['error']==0)
{
move_uploaded_file($file_temp, 'uploades/p-notes/'.$eimg.'.jpg');
mysql_query("INSERT INTO p_notes VALUES ('',' $name','$descptn','$eimg.jpg','$u_id','$sDate') ");
mysql_query("INSERT INTO postt VALUES ('',' $name','$descptn','$eimg.jpg','u','$u_id','$sDate') ");
header('Location:page-note-show.php');
}
else{echo"please fill description <br/><br/>";}
} }else if(!empty($descptn)&&$_FILES['file']['size']==0) { 
mysql_query("INSERT INTO p_notes VALUES ('','$name','$descptn','nothing','$u_id','$sDate') ");
mysql_query("INSERT INTO postt VALUES ('',' $name','$descptn','','q','$u_id','$sDate') ");
header('Location:page-note-show.php');
echo"your note is saved.... <br/><br/>";
}
else{echo"please fill description <br/><br/>";}
echo $error."<br/><br/>";
}
?>
<h6>( you can write your posts without adding images also.... )</h6>
<form method="post" action="" enctype="multipart/form-data">
<div class="centered">
<textarea  class="axiomm" autocomplete="off" maxlength="500" placeholder="write the headings..." name="name" ></textarea>                       
</div>
<div class="image-div">
<?php
if(empty($pic)){
echo "<img src='assets/img/201.jpg'/>";
}else{
?>
<?php  } ?>
<form method="POST" action="" enctype="multipart/form-data">
<?php
if($user ==$my_id) {   ?>
<label for="file" class="upload-btn">ADD AN IMAGE</label>
<input type="file" name="file" id="file" /> 
<?php   }   ?>
</div>
<textarea  class="axiom" placeholder="write your post..." maxlength="7500" autocomplete="off"  name="descptn" ></textarea>
<input class="btn button-custom btn-custom-three" id="axion" name="upload-img" type="submit" value="save">
</form> 
</div>
</div>
</div>
</div>
</section>
</div>
<?php }else{header('Location:index.php');} }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="js1/imgche.js"></script>
<script src="js1/notimg.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>