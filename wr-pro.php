<?php ob_start();?>
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
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
$u_id=$_GET['u_id'];
echo(include 'include/header.php');
}else{
$u_id=$_SESSION['user_id'];
echo(include 'include/wr-header.php');
}
?>
<?php include 'include/username.php';?>
<?php if ($_SESSION['user_id']) {$user_id = true;?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="maxio"></div></div>
<section id="work" >
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-2">
<ul class="nav" id="myTab">
<?php 
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
echo" <li><a href='wr-profile.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>HOME</a></li> 
<li><a href='wr-about.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>ABOUT</a></li>
<li><a href='wr-pro.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>PROFILE</a></li>
<li><a href='wr-post-col.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>POSTS</a></li>
<li><a href='wr-collecn.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>COLLECTIONS</a></li>";
}else{
echo " <li><a href='wr-profile.php'  class='btn btn-custom btn-custom-two btn-sm'>HOME</a></li>
<li><a href='wr-about.php'  class='btn btn-custom btn-custom-two btn-sm'>ABOUT</a></li>
<li><a href='wr-pro.php'  class='btn btn-custom btn-custom-two btn-sm'>PROFILE</a></li>
<li><a href='wr-post.php'  class='btn btn-custom btn-custom-two btn-sm'>POSTS</a></li>
<li><a href='wr-note.php' class='btn btn-custom btn-custom-two btn-sm'>NOTES</a></li>
<li><a href='wr-collecn.php'  class='btn btn-custom btn-custom-two btn-sm'>COLLECTIONS</a></li>";
} ?>
</ul>         
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-3">
<div class="work-wrapper">
<div class="tab-pane" id="n2">
<div >
<?php 
if($user==$my_id){                  
$query=mysql_query("SELECT username FROM puser WHERE id = ('$u_id')");
$run=mysql_fetch_array($query);
$uname=$run['username'];
echo $uname;
}else{
}
?>
<?php 
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
}else{
echo"<h3> <a href='wr-e.php' id='picchn' class='btn btn-custom btn-custom-two btn-sm'>EDIT</a></h3></h3>"; 
}?><hr>
</div>
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$query = mysql_query(" SELECT (id),(url) FROM w_profile where user_id=('$u_id') ORDER BY id DESC");    
}else{
$query = mysql_query(" SELECT (id),(url) FROM w_profile where  user_id=('$user') ORDER BY id DESC");   
}
$row=mysql_fetch_array($query);
$pic=$row['url'];                                                     
?>
<?php 
if(empty($pic)){ ?>
<section id='zwpic' style="background-image:url('uploades/w-profile/<?php echo $pic;?>')" >
</section>
<?php
}else{
?>
<section id="zwpic" style="background-image:url('uploades/w-profile/<?php echo $pic;?>')">
</section>
<?php } ?>
<?php   if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$query4 = mysql_query("SELECT COUNT(user_one) as num4 FROM follow where  user_two=$u_id");     
}else{
$query4 = mysql_query("SELECT COUNT(user_one) as num4 FROM follow where  user_two=$user");   
}
$run4=mysql_fetch_array($query4);
$num4=$run4['num4'];  
?>
<div class="light-pricing">
<h5>followers :</h5>
<h3><?php echo $num4?> followers</h3>
</div>
</div>
</div>
</div>
</div>
</div>
</section></div>
 <?php }else{header('Location:index.php');} }else{header('Location:index.php');}?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>              