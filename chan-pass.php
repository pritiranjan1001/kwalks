<!DOCTYPE html>
<html lang="en">
<?php ob_start();?>
<?php include 'include/function.php'; ?>
<?php include 'include/connect.php';?>
<?php include 'include/username.php';?>
<?php if ($_SESSION['user_type']=='u') {$user_id = true;?>
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
<?php include 'include/setting-header.php';?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
<?php include 'include/dropdown.php';?>
</div>
</nav>
<div id="page-wrapper">
<div class="container-fluid">
<?php
if (isset($_POST['submit'])) {
$_SESSION['user_id']=$user_id;
$password=stripslashes($_POST['password']);
$cpassword=stripslashes($_POST['cpass']);
$pwd=stripslashes(sha1($password)&$password);
$pwd=htmlentities($pwd, ENT_QUOTES, "UTF-8");
if (empty($password)) {
$message="please enter the fields";
}
else  if( strlen($password) < 8 ) {
$message= "Password too short! ";
}
else if($password!=$cpassword) {
$message= "Passwords Don't Match recheck it";
}
else {
$date=date("Y-m-d h:i:s");
mysql_query("UPDATE  users set password='$pwd' WHERE id=('$user') ");
header("location:index.php");
}           
echo "<div class='box'>$message</div>";
}
?>
<form method="POST" action="" enctype="multipart/form-data">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 class="page-header">Account Settings:</h4>
<ol class="breadcrumb">
<div class="input-group">
<div class="panel-heading">NEW PASSWORD : <input type="password" class="login-field" value=""  name="password" placeholder="password" id="password"></div>
</div>  
</ol>
<ol class="breadcrumb">
<div class="input-group">
<div class="panel-heading"> CONFIRM PASSWORD : <input type="password" class="login-field" name="cpass" value="" placeholder="password" id="cpass"></div>
</div>  
</ol>
<ol class="breadcrumb">
<div class="input-group">
<div class="panel-heading">
<input type="submit" class="btn button-custom btn-custom-two" name="submit" ><br>
</div>
</form>
</div>  
</ol>
</div>
</div>
</div>
</div>
<?php }else{header('Location:index.php');}?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/animations.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
