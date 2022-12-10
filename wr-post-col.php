<?php ob_start();?>
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
require 'include/function.php';
}else{
require 'include/page-function.php';
}
if(($_SESSION['user_type']=='w')|| ($_SESSION['user_type']=='u'&& isset($_GET['u_id'])&& !empty($_GET['u_id']))){?>
<?php include 'include/connect.php';?>
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
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target="#menu-section">
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
<?php include 'include/username.php';?>
<?php if ($_SESSION['user_id']){$user_id = true;?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="maxio"></div></div>
<section id="work" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>posts</h3><h3>
<?php 
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
}else{
echo "<a href='wr-profile.php'><i class='fa fa-home'></i></a>";} ?>
</h3><hr />
</div>
</div>
<div class="row  animate-in" data-anim-type="fade-in-up" id="work-div">
<?php               
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$query = mysql_query(" SELECT id,postt,upload_date FROM postt where user_id=('$u_id') ");
}else{
$query = mysql_query(" SELECT id,postt,upload_date FROM postt where user_id=('$user') ");  
}                                           
while ($run=mysql_fetch_array($query)) {
$postt=$run['postt']; 
$sDate=$run['upload_date']; 
$post_id=$run['id'];
$query1 = mysql_query("SELECT COUNT(*) as num FROM p_comment where post_id=$post_id  "); 
$run1=mysql_fetch_array($query1);
$num=$run1['num'];
$query2 = mysql_query("SELECT COUNT(*) as num2 FROM likes where post_id=$post_id  "); 
$run2=mysql_fetch_array($query2);
$num2=$run2['num2'];
?>		                               	
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 code">
<div class="work-wrapper">
<div class="tab-pane active" id="n1">
<div class="centered">
<h4>  <?php //echo $name; ?>
</h4>
</div>
<div class="work-wrapper"   ><p>
<h5><?php echo nl2br("$postt"); ?></h5></p>
<h6><a href="#" class='' data-toggle="modal" data-target="#likes" id="like"> <?php echo $num2;?> </a>  : people like this</h6>
<a href="page-comment.php?id=<?php echo $post_id;?>" class="active btn btn-custom btn-custom-two btn-sm"><?php echo $num ;?>  comments</a>
<h6> <?php echo date("d-m-Y", strtotime($sDate));?>  </h6>
<?php if($user_id ==$my_id){?>
<h6><a href="w-postdel.php?id=<?php echo $post_id;?>" name= "delete" class="">delete</a></h6>
<?php }?>
</div>
</div>
</div>
</div>
<?php  }	?>
</div>
</section>
<?php }else{header('Location:index.php');} }else{header('Location:index.php');}?>	
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>