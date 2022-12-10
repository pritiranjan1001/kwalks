<?php ob_start();?>
<?php include 'include/connect.php' ?>
<?php include 'include/page-function.php' ?>
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
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include('include/header.php');?>
<?php include('include/username.php');?>
<?php if ($_SESSION['user_id']) {$user_id = true;?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="maxio"></div></div>
<section id="team" ><div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>( PAGES FOR WRITER )</h3><hr />
</div>
</div>
<?php
function getuser1($user_id,$field){
$query=mysql_query("SELECT $field FROM puser WHERE id='$user_id'");
$run=mysql_fetch_array($query);
return $run[$field];
}
?>
<?php
$met_query=mysql_query("SELECT id,portfolio FROM puser where act='w'");
while ($run_met=mysql_fetch_array($met_query)) {
$user_id=$run_met['id'];
$username=$run_met['portfolio'];
?>
<?php
$my_id=$_SESSION['user_id'];
if($user==$my_id){ 
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (url) FROM w_profile where user_id=('$user_id')  ORDER BY id DESC");            
$row=mysql_fetch_array($query);
$pic=$row['url'];  
$query3 = mysql_query("SELECT COUNT(id) as num3 FROM follow where user_two=$user_id"); 
$run3=mysql_fetch_array($query3);
$num3=$run3['num3'];
?>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="team-wrapper">
<div class="team-inner" style="background-image: url('uploades/w-profile/<?php echo $pic;?>')" >
</div>
<div class="description">
<h5><?php echo "<a href='wr-profile.php?u_id=$user_id' class='work-wrapper'> $username </a>";?></h5>
<h6> <strong> <?php echo$num3 ?>&nbsp; Followers  </strong></h6>
</div>
</div>
</div>
<?php } } ?>
</div>
</section>
<?php }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
