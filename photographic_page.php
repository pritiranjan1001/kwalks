<?php ob_start();?>
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
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
<link rel="stylesheet" type="text/css" href="assets/css/forpage.css" />
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body >
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
<?php if ($_SESSION['user_id']) {$user_id = true;?>
<div class="contentx"  style="background-image:url('assets/img/photo2.jpg')">
<ul class="escape">
<?php 
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
echo" <li><a href='page-about.php?u_id=$u_id'><span>About</span>";			        
}else{
echo "<li><a href='page-about.php'><span>About</span>";
} ?>
<span>
<?php 
if($user==$my_id){                  
$query=mysql_query("SELECT portfolio FROM puser WHERE id = ('$u_id')");
$run=mysql_fetch_array($query);
$portfolio=$run['portfolio'];
echo $portfolio;
}else{
echo "hello";    
}
?>
</span></a>
<?php
if($user==$my_id){ 
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$u_id')AND cat_ry='1' ORDER BY id DESC");      
}else{
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$user')AND cat_ry='1' ORDER BY id DESC");            
}
$row=mysql_fetch_array($query);
$pic=$row['url'];                                                        
?>
<img class="coverbox" style="background-image:url('uploades/page-profile/<?php echo $pic;?>')" height="385" width="250" /></li>
<?php 
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
echo" <li><a href='photographic_profile.php?u_id=$u_id'> <span>Profile</span>";             
}else{
echo "<li><a href='photographic_profile.php'> <span>Profile</span>";
} ?>
<span>Updates and histories</span>
</a>
<?php
if($user==$my_id){ 
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$u_id')AND cat_ry='2' ORDER BY id DESC");      
}else{
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$user')AND cat_ry='2' ORDER BY id DESC");            
}
$row=mysql_fetch_array($query);
$pic=$row['url'];                                                        
?>
<img class="coverbox" style="background-image:url('uploades/page-profile/<?php echo $pic;?>')" height="385" width="250" /></li>
<?php 
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
echo" <li><a href='page-note-show.php?u_id=$u_id'> <span>Inbox</span>";             
}else{
echo "<li><a href='page-note.php'> <span>Inbox</span>";
} ?>
<span>Posts and collections</span>
</a>
<?php
if($user==$my_id){ 
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$u_id')AND cat_ry='3' ORDER BY id DESC");      
}else{
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$user')AND cat_ry='3' ORDER BY id DESC");            
}
$row=mysql_fetch_array($query);
$pic=$row['url'];                                                        
?>
<img class="coverbox" style="background-image:url('uploades/page-profile/<?php echo $pic;?>')" height="385" width="250" /></li>
<?php 
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
echo" <li><a href='photographic_page_album.php?u_id=$u_id'> <span>Work</span>";             
}else{
echo "<li><a href='photographic_page_album.php'> <span>Work</span>";
} ?>
<span>Portfolio</span>
</a>
<?php
if($user==$my_id){ 
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$u_id')AND cat_ry='4' ORDER BY id DESC");      
}else{
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$user')AND cat_ry='4' ORDER BY id DESC");            
}
$row=mysql_fetch_array($query);
$pic=$row['url'];                                                        
?>
<img class="coverbox" style="background-image:url('uploades/page-profile/<?php echo $pic;?>')"  height="385" width="250" /></li>
</li>
</ul>
</div>
<div class="navbar navbar-inverse navbar-fixed-bottom scroll-me" id="menu-section" >
<?php
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
}else{
$u_id=$_SESSION['user_id'];
}
echo '<b>'.getuser('username',$u_id).'</b>'; ?>
<?php
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
<?php }else
{
 header('Location:index.php');
}}else
{
header('Location:index.php');
} ?>
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