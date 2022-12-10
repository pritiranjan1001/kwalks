<!DOCTYPE html>
<html lang="en">
<?php ob_start();?>
<?php include 'include/page-function.php';?>
<?php include 'include/connect.php';?> 
<?php if($_SESSION['user_type']=='p' || $_SESSION['user_type']=='w') 
{ ?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>kwalks</title>
<link href="assets/img/logo6.png" rel="shortcut icon" />
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="settings/css/sb-admin.css" rel="stylesheet">
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">    
<link href="settings/css/style.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<?php if($_SESSION['user_type']=='p'){
include('include/page-header.php'); } else { include('wr-header.php');}
?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
<li class="active">
<a href="include/setting-account.php"><i class="fa fa-fw fa-dashboard"></i> Account Settings</a>
</li>
<li>
<?php if($_SESSION['user_type']=='p'){
echo"<a href='page-feedback.php'><i class='fa fa-fw fa-bar-chart-o'></i> feedback</a>";} else { 
echo"<a href='wr-feedback.php'><i class='fa fa-fw fa-bar-chart-o'></i> feedback</a>";}
?>
</li>
</ul>
</div>
</nav><div id="page-wrapper">
<div class="container-fluid">
<form method="post" action="" enctype="multipart/form-data">
<?php
if (isset($_POST['submit'])) {
$id=$_SESSION['user_id'];
$password=$_POST['password'];
$pwd=stripslashes(sha1($password)&$password);
$pwd=htmlentities($pwd, ENT_QUOTES, "UTF-8");
if (empty($password)) {
$message="please enter your current password";
} else {
$check_login=mysql_query("SELECT id FROM puser WHERE password='$pwd' and id='$id'");
if (mysql_num_rows($check_login)==1) {
header('location:page-chan-pass.php'); 
}else{
$message = "password is incorrect ";
}
}  
echo "<div class='box'>$message</div>";
}
?>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 class="page-header">Account Settings:</h4>
<ol class="breadcrumb">
<div class="input-group">
<div class="panel-heading">
<h4 class="panel-title">
<label for="login-uname">PASSWORD:</label>
<a data-toggle="collapse" href="#collapse3">edit</a>
</h4>
</div>
<div id="collapse3" class="panel-collapse collapse">
<input type="password" placeholder=" &nbsp; current password"  name="password">
<input class="btn button-custom btn-custom-two" type="submit" name="submit" value="change" id="currentPassword">
<h6>change password for your website </h6>
</div>
</div>  
</ol>
</form>
</div>
</div>
</div>
</div>
<?php }else{
header('Location:index.php');
} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
