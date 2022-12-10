<?php ob_start();?>
<?php include 'include/connect.php'; ?>
<?php include 'include/function.php'; 
if(!isset($_GET['id'])&& empty($_GET['id'])){
header('Location:album.php');} ?>
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
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include('include/header.php');?>
<?php include('include/connect.php');?>
<?php include ('include/username.php'); ?>
<?php if ($_SESSION['user_type']=='u') {
$user_id = true;?>
<?php
$album_id = $_GET['id'];  
$u_id=$_SESSION['user_id'];
$query1 = mysql_query("SELECT name from album where id=('$album_id')"); 
$run=mysql_fetch_array($query1);
$nameo= $run['name']; 
?> 
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  <div class="maxio"></div></div>
<section id="work" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<br><h4><?php echo $nameo; ?></h4><hr />
</div>
</div>
<div class="row">
<div class="col-lg-12">
<h3></h3> 
</div> 
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
<?php               
$album_id = $_GET['id'];  
$u_id=$_SESSION['user_id'];
$qry=mysql_query("SELECT id,name,url,user_id FROM photos where album_id=('$album_id') ORDER BY id DESC");
while ($row=mysql_fetch_array($qry)) {
$name=$row['name'];
$pic=$row['url'];
$post_id=$row['id']; 
$user_id=$row['user_id'];
$query2 = mysql_query("SELECT COUNT(*) as num2,id FROM postt where photo='$pic' and is_img='i' "); 
$run2=mysql_fetch_array($query2);
$num2=$run2['num2'];       
$id=$run2['id'];					  
?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html " id="<?php echo $post_id;?>">                                                                       
<div class="work-wrapper">     
<a <?php if($num2==1){?> href="fix-pop.php?id=<?php echo $id;?>&i=-1" <?php }else if($num2==0){?>href="" <?php }?> > 
<img src="uploades/album/<?php echo $pic ;?>" class="img-responsive img-rounded"  />
</a>
<div class="postboxa">
<h6><?php echo nl2br("$name"); ?></h6>
<?php if(($num2==0)&&($user_id==$u_id)){?>
<input onclick="change21(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='POST' ></input>
<?php }else if(($num2==1)&&($user_id==$u_id)){?>
<input onclick="change21(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='UNPOST' ></input>
<?php }?>
</div>
<?php if($user_id ==$u_id){?>
<h6><a href="include/albumdel.php?id=<?php echo $post_id;?>&&aid=<?php echo $album_id;?>" name= "delete"   class="">delete</a></h6>
<?php }?>
</div>                                      
</div>
<?php  }   ?>
</div>
</div>        
<?php include ('include/username.php'); ?>
</section>
<?php }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript"> function change21(e,i)
{ var dataString="id="+i"&type=u";
 if(e.value=="POST")
	{   
		e.value="UNPOST";
		$.ajax({
			type:"POST",
			url:"post.php",
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
			url:"unpost.php",
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
