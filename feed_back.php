<?php ob_start();?>
<?php include 'include/function.php';?>
<?php include 'include/connect.php';?>
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
</head>
<body>
<?php require('include/header.php');?>
<?php include ('include/username.php'); ?>
<?php if ($_SESSION['user_id']) {$user_id = true;?>
<div class="contdoo" >  
<section >
<div class="container">
<div class="row text-center">
<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10"><h6></h6><h1>feedback</h1></div>
</div>
</div>
</section>
<section id="preview"><div class="container">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">               
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="tab-pane active" id="n1"><h6>( feedback form )</h6>
<?php
if (isset($_POST['feed_back'])) {
$feed_back= stripslashes($_POST['feed_back']);
$feed_back=htmlentities($feed_back, ENT_QUOTES, "UTF-8"); 
if (empty($feed_back)) {
echo "please enter the text <br/><br/>";
header("location:feed_back.php");
}else{
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id'];                              
mysql_query("INSERT into feed_back VALUES('','$feed_back','$u_id','$sDate')");
echo"feedback is updated:<br>"; 
}
}
?>
<div class="image-div">
<form method="POST" action="" enctype="multipart/form-data">
</div>
<textarea  class="axiom" placeholder="write your note..." name="feed_back" maxlength="500"></textarea>
<input class="btn button-custom btn-custom-three" id="axion" name="upload-img" type="submit" value="feedback">
</form> 
</div>
</div>
</div>
</div>
</section>
</div>
<?php }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
