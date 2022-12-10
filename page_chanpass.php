<!DOCTYPE html>
<html lang="en">
<?php include 'include/connect.php' ?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content=""><title>kwalks</title>
<link href="assets/img/logo6.png" rel="shortcut icon" />
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="settings/css/sb-admin.css" rel="stylesheet">
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
<link href="settings/css/style.css" rel="stylesheet">
</head>
<body>
<?php
if(!isset($_GET['x'])&& empty($_GET['x'])&&!isset($_GET['i'])&& empty($_GET['i'])&&!isset($_GET['y'])&& empty($_GET['y'])&&!isset($_GET['z'])&& empty($_GET['z'])){
header('Location:index.php');}
$id=$_GET['x'];
$x=$_GET['i'];
$y=$_GET['y'];
$z=$_GET['z'];
$u_id=stripslashes($id);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
$check_login=mysql_query("SELECT ver_code,ver_code1,ver_code2 FROM puser WHERE  id=$u_id");
$get=mysql_fetch_array($check_login);
$ver=$get['ver_code'];
$ver1=$get['ver_code1'];
$ver2=$get['ver_code2'];
if(($x==sha1($ver))&&($y==sha1($ver1))&&($z==sha1($ver2))){ ?>
</nav>
<div id="page-wrapper">
<div class="container-fluid">
<?php
if (isset($_POST['submit'])){
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
mysql_query("UPDATE  puser set password='$pwd' WHERE id=$u_id ");
header("location:index.php");
}           
echo "<div class='box'>$message</div>";
}     
?>
<form method="POST" action="" enctype="multipart/form-data">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 class="page-header">CHANGE PASSWORD</h4>
<ol class="breadcrumb">
<div class="input-group">
<div class="panel-heading">NEW PASSWORD : <input type="password" class="login-field" value=""  name="password" placeholder="password" id="password"></div></div>  
</ol>
<ol class="breadcrumb">
<div class="input-group">
<div class="panel-heading">CONFIRM PASSWORD : <input type="password" class="login-field" name="cpass" value="" placeholder="password" id="cpass"></div>
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
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
<?php }else
  { header('Location:index.php');
} ?>
</html>
