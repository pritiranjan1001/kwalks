<?php ob_start();?>
<?php include 'include/connect.php';?>
<?php include 'include/function.php';?>
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
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include('include/header.php');?>
<?php include('include/connect.php');?>
<?php include ('include/username.php'); ?>
<?php if ($_SESSION['user_type']=='u') {$user_id = true;?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  <div class="maxio"></div></div>
<section id="work" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>notes collections</h3>( &nbsp; <a href="re-note.php"> <i class="fa fa-pencil-square-o"></i></a> )<hr />
</div>
</div>					
<div class="row  animate-in" data-anim-type="fade-in-up" id="work-div">
<?php                          
$u_id=$_SESSION['user_id']; 
if($user==$my_id){
$query = mysql_query(" SELECT id,name,descptn,url,upload_date FROM notes  where user_id=('$u_id')");   
}else{
$query = mysql_query(" SELECT id,name,descptn,url,upload_date FROM notes  where  user_id=('$user')"); 
}                                            
while ($row=mysql_fetch_array($query)) {
$name=$row['name'];
$pic=$row['url'];
$sDate=$row['upload_date'];
$descptn=$row['descptn'];
?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 code">
<div class="work-wrapper">
<div class="tab-pane active" id="n1">
<div class="centered">
<h4> <?php echo $name; ?>
</h4><hr>
</div>
<div class="light-pricing">
<p>
<?php if($pic !='nothing'){?>
<img img src="uploades/notes/<?php echo $pic ;?>" class="img-responsive"><?php } ?>
<div class="postboxa"><h5> 
<?php echo nl2br("$descptn"); ?> 
</h5></div> 
</p>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</section>
<?php }else
{header('Location:index.php');
} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/slide.over.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
