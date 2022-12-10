<?php ob_start();?>
<?php include'include/connect.php'; 
if(!isset($_GET['id'])&& empty($_GET['id'])){
header('Location:photographic_page_album.php');}?>
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
require 'include/function.php';
}else{
require 'include/page-function.php';
}
?>
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
<link href="assets/css/pop-up.css" rel="stylesheet" />
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
if(($_SESSION['user_type']=='p')|| ($_SESSION['user_type']=='u'&& isset($_GET['u_id'])&& !empty($_GET['u_id'])))      
{		           
?>
<?php include ('include/username.php'); ?>
<?php if ($_SESSION['user_id']) {
$user_id = true;
?>
<section id="work" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>Albums name</h3><hr />
</div>
</div>
<div class="row">
<div class="col-lg-12">
<h3>Thumbnail Gallery</h3> <br>      
</div>
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
<?php
$album_id = $_GET['id'];
$u_id=$_SESSION['user_id'];
$qry=mysql_query("SELECT id,name,url FROM p_photos where (album_id=('$album_id')) ORDER BY id DESC ");
while ($row=mysql_fetch_array($qry)) {
$name=$row['name'];
$pic=$row['url'];
$post_id=$row['id']; 
$query2 = mysql_query("SELECT COUNT(*) as num2,id FROM postt where photo='$pic' and is_img='z'  "); 
$run2=mysql_fetch_array($query2);
$num2=$run2['num2'];       
$id=$run2['id'];		     
?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html ">                                                                       
<div class="work-wrapper"> 
<a href=''  data-image-id='' data-target='#image-gallery' >
<img src="uploades/page-album/<?php echo $pic ;?>" class="img-responsive img-rounded"  />
</a>
<div class="postboxa">
<h4><?php echo nl2br("$name"); ?></h4>
<?php if(($num2==0)&&($user_id==$u_id)){?>
<input onclick="change21(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='POST' ></input>
<?php }else if(($num2==1)&&($user_id==$u_id)){?>
<input onclick="change21(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='UNPOST' ></input>
<?php }?>
</div>
<?php if($user_id ==$u_id){?>
<h6>
<a href="include/p-albumdel.php?id=<?php echo $post_id;?>&&aid=<?php echo $album_id;?>" name= "delete"   class="">delete</a>
</h6>
<?php }?>
</div>                                      
</div>
<?php  } ?>
</div>
</div>
</section>
<?php }else
{
header('Location:index.php');
}}else
{
header('Location:index.php');
} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript"> function change21(e,i)
{ var dataString="id="+i+"&type=p";

 
    if(e.value=="POST")
	{   
		e.value="UNPOST";
		$.ajax({
			type:"POST",
			url:"include/post.php",
			data:dataString,
			success:function(response)
			{}
		});
	}	
    else if(e.value=="UNPOST")
	{   
		e.value="POST";
				$.ajax({
			type:"POST",
			url:"include/unpost.php",
			data:dataString,
			success:function(response)
			{}
		});
	}		
}
</script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
