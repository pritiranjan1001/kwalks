<?php ob_start();?>
<?php include 'include/function.php';?>
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
<?php if ($_SESSION['user_type']=='u') {$user_id = true;?>
<section id="team" >
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>Friends</h3>
<br>
</div>
<?php
$my_id=$_SESSION['user_id'];
if($user==$my_id){
$frnd_query=mysql_query("SELECT user_one,user_two FROM frnds WHERE(user_one='$my_id' OR user_two='$my_id')");
}else{
$frnd_query=mysql_query("SELECT user_one,user_two FROM frnds WHERE(user_one='$user' OR user_two='$user')");
}
while ($run_frnd=mysql_fetch_array($frnd_query)) {
$user_one=$run_frnd['user_one'];
$user_two=$run_frnd['user_two'];
if($user_one == $user){
$user1=$user_two;
}else{
$user1=$user_one;
}
$username=getusername($user1);
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (id),(url) FROM pro_pic where user_id=('$user1') ORDER BY id DESC");    
$row=mysql_fetch_array($query);
$pic=$row['url'];  
$query1 = mysql_query(" SELECT (status) FROM status where user_id=('$user1')");                                           
$run=mysql_fetch_array($query1);
$status=$run['status'];
$query3 = mysql_query("SELECT COUNT(*) as num3 FROM frnds where user_one=$user1|| user_two=$user1"); 
$run3=mysql_fetch_array($query3);
$num3=$run3['num3'];				
$query4 = mysql_query("SELECT COUNT(*) as num4 FROM follow where user_one=$user1|| user_two=$user1"); 
$run4=mysql_fetch_array($query4);
$num4=$run4['num4'];                 
?>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="team-wrapper">
<div class="team-inner" style="background-image: url('uploades/user_images/<?php echo $pic;?>')" >
</div>
<div class="description">
<h5> <?php echo "<a href='profile.php?user=$user1' class='box' style='display:block'>$username</a>";?></h5>
<h5> <strong> <?php echo "$num3" ; ?> Follows and  <?php echo "$num4" ; ?> Following </strong></h5>
<h6>
<?php echo $status ?>
</h6>
</div>
</div>
</div>
<?php } ?>
</div>
</section>
<?php }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/slide.over.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
