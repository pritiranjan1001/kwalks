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
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>.banner{position: absolute;}.row{text-align: center;font-family: Poiret One;letter-spacing: 1px;}</style>
</head><body data-spy="scroll" data-target="#menu-section"><section id="work" >
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6"> 
<?php
include('include/connect.php');
if(!isset($_GET['x'])&& empty($_GET['x'])&&!isset($_GET['i'])&& empty($_GET['i'])&&!isset($_GET['y'])&& empty($_GET['y'])&&!isset($_GET['z'])&& empty($_GET['z'])){
header('Location:index.php');}
$id=$_GET['x'];
$x=$_GET['i'];
$y=$_GET['y'];
$z=$_GET['z'];
$u_id=stripslashes($id);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
$check_login=mysql_query("SELECT ver_code,ver_code1,ver_code2 FROM users WHERE  id=('$u_id')");
$get = mysql_fetch_array($check_login);
$ver=$get['ver_code'];
$ver1=$get['ver_code1'];
$ver2=$get['ver_code2'];
if($x==sha1($ver))
{
if($y==sha1($ver1))
{
if($z==sha1($ver2))
{
mysql_query("UPDATE users SET ver='1'WHERE  id=('$u_id')");
echo"<div class='row'> <h3>Your account has been successfully verified.
</h3>
<h5><a href='index.php'>click here</a> to login </h5>
</div>";	
}}}
else{
echo"  <div class='row'> <h3>Invalid Link or Link has been expaired
</h3>
<h5>*tips: 'Please login again , if your account is not activated a new link will be send to your email account.' </h5>
</div>";
}																
?></div>        
</div>
</section>
</body>
</html>