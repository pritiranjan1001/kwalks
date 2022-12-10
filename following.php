<?php ob_start();?>
<?php include 'include/page-function.php';?>
<?php include 'include/connect.php';?>
<?php include 'include/username.php';?>
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
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include('include/header.php'); ?>
<?php include('include/username.php'); ?>
<?php if ($_SESSION['user_type']=='u') {$user_id = true;?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  <div class="maxio"></div></div>
<section id="team" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>Following</h3><a href="page-page.php"><h6>search<i class="fa fa-search"></i></h6></a><hr />
</div>
</div>
<?php
$my_id=$_SESSION['user_id'];
$frnd_query=mysql_query("SELECT user_two FROM follow where user_one='$user' "); 
while ($run_frnd=mysql_fetch_array($frnd_query)) {
$user_two=$run_frnd['user_two'];
$user1=$user_two;
$query1 = mysql_query("SELECT act,portfolio FROM puser where id=$user1");            
$row1=mysql_fetch_array($query1);
$act=$row1['act'];
$username=$row1['portfolio'];
$u_id=$_SESSION['user_id'];
if ($act=="p") {
$query = mysql_query("SELECT id,url FROM p_impic where user_id=('$user1')AND cat_ry='1' ORDER BY id DESC");            
}else{
$query = mysql_query("SELECT (id),(url) FROM w_profile where user_id=('$user1') ORDER BY id DESC"); 
}		
$row=mysql_fetch_array($query);
$pic=$row['url'];  
?>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="team-wrapper">
<?php if ($act=="p") { ?>
<div class="team-inner" style="background-image: url('uploades/page-profile/<?php echo $pic;?>')" ></div>
<?php	} else{?>
<div class="team-inner" style="background-image: url('uploades/w-profile/<?php echo $pic;?>')" ></div>
<?php }?>
<?php
$query4 = mysql_query("SELECT COUNT(user_one) as num4 FROM follow where  user_two=$user1"); 
$run4=mysql_fetch_array($query4);
$num4=$run4['num4'];  
?>
<div class="description">
<?php if ($act=="p") { ?>
<h5> <?php echo "<a href='photographic_page.php?u_id=$user1' class='box' style='display:block'>$username</a>";?></h5>
<?php	} else{?>
<h5> <?php echo "<a href='wr-profile.php?u_id=$user1' class='box' style='display:block'>$username</a>";?></h5>
<?php }?>
<h5> <strong><?php echo" $num4 Followers ";?></strong></h5>
</div>
</div>
</div>
<?php }   ?>
</div>
</section>
<?php }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
