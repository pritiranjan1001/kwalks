<?php ob_start();?>
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
require 'include/function.php';
}else{
require 'include/page-function.php';
}
if(($_SESSION['user_type']=='p')|| ($_SESSION['user_type']=='u'&& isset($_GET['u_id'])&& !empty($_GET['u_id'])))      
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
<link href="assets/css/pageabout.css" rel="stylesheet" />
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
echo(include 'include/header.php');
}else{
 $u_id=$_SESSION['user_id'];
echo(include 'include/page-header.php');
}
?>
<?php include ('include/username.php'); ?>
<?php if ($_SESSION['user_id']) { $user_id = true;?>
<section id="yes">
<div class="overlay">
<div class="container">
<div class="row text-center">
<div class="col-lg-12 col-md-12">
<div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1 ">
<?php     
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
echo"<h2></h2><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>  <div class='maxio'></div></div>";          
}else{echo"<span><a href='photographic_page.php'><i class='fa fa-home'></i></a></span><BR>";
}?>
<span>ABOUT</span><hr><BR>
<span class="ax-yes">
<?php
if($user==$my_id){
$query = mysql_query(" SELECT about FROM p_about where user_id=('$u_id')"); 
}else{
$query = mysql_query(" SELECT about FROM p_about where user_id=('$user')");  
}                                          
while ($run=mysql_fetch_array($query)) {
$about=$run['about'];
?>
<h5><?php echo nl2br("$about") ; ?></h5> 
<?php  }  ?> 
<h6></h6>
</span>&nbsp;&nbsp;
<?php     
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
}else{
echo"<a href='page-about-edit.php'>Edit</a>";
} ?>
</div></div>
</div>
</div>
</div>
</section>
<?php }else
{
header('Location:index.php');
} }else
{
header('Location:index.php');
} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
