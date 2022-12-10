<?php ob_start();?>
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
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
}else{
$u_id=$_SESSION['user_id'];
}
echo '<b>'.getuser('username',$u_id).'</b>';
?>
<?php 
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
echo" <li class='active'><a href='wr-profile.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>HOME</a></li> 
<li><a href='wr-about.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>ABOUT</a></li>
<li><a href='wr-pro.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>PROFILE</a></li>
<li><a href='wr-post-col.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>POSTS</a></li>
<li><a href='wr-collecn.php?u_id=$u_id'  class='btn btn-custom btn-custom-two btn-sm'>COLLECTIONS</a></li>";
}else{
echo "<li><a href='wr-profile.php'  class='btn btn-custom btn-custom-two btn-sm'>HOME</a></li>
<li><a href='wr-about.php'  class='btn btn-custom btn-custom-two btn-sm'>ABOUT</a></li>
<li><a href='wr-pro.php'  class='btn btn-custom btn-custom-two btn-sm'>PROFILE</a></li>
<li><a href='wr-post.php'  class='btn btn-custom btn-custom-two btn-sm'>POSTS</a></li>
<li><a href='wr-note.php' class='btn btn-custom btn-custom-two btn-sm'>NOTES</a></li>
<li><a href='wr-collecn.php'  class='btn btn-custom btn-custom-two btn-sm'>COLLECTIONS</a></li>";
} ?>
</ul>         
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-10">
<div class="work-wrapper">
<div class="tab-content">
<div class="tab-pane active" id="n1">
<div class="centered">
<h3>Home</h3><hr>
</div>
<div class="light-pricing">
<img src="assets/img/s.png" class="img-responsive"><hr><BR>
<h6>And as imagination bodies forthThe forms of things unknown, the poet’s penTurns them to shapes and gives to airy nothingA local habitation and a name.<BR>
<h6 id="write">– William Shakespeare (from A Midsummer Night’s Dream)</h6></h6>
</div>
</div>
<?php   $query1 = mysql_query("SELECT (username) FROM puser where id=('$u_id')");            
$row1=mysql_fetch_array($query1);
$uname=$row1['username'];
if ($u_id !=$_SESSION['user_id']) {
$check=mysql_query("SELECT id FROM follow WHERE user_one='$my_id' AND user_two='$u_id'");
if(mysql_num_rows($check)==1){
echo "<input onclick='change66(this,$u_id)' type='button' class='btn button-custom btn-custom-one' value='unfollow'></input>";
}else{
echo "<input onclick='change66(this,$u_id)' type='button' class='btn button-custom btn-custom-one'  value='follow'></input>";
}
}
?>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<?php }else{ header('Location:index.php');} }else{header('Location:index.php');}?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript"> function change66(e,i)
{ var dataString="id="+i;

 
    if(e.value=="follow")
	{   dataString=dataString+"&action=follow";
		e.value="unfollow";
		$.ajax({
			type:"POST",
			url:"include/page-action.php",
			data:dataString,
			success:function(response)
			{}
		});
	}	
    else if(e.value=="unfollow")
	{   dataString=dataString+"&action=unfollow";
		e.value="follow";
				$.ajax({
			type:"POST",
			url:"include/page-action.php",
			data:dataString,
			success:function(response)
			{}
		});
	}		
}
</script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>