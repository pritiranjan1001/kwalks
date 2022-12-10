<?php include'include/connect.php';?>
<?php include 'include/page-function.php';?> 
<?php if($_SESSION['user_type']=='p') { ?>
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
<link href="assets/css/style.css" rel="stylesheet" />
<link href="assets/css/pagealbum.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include 'include/page-header.php';?>
<?php include 'include/username.php'; ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="maxio"></div></div>
<section id="work" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>profile images</h3>
<a href=""  data-toggle="modal"  data-target="#pic-change" ><i class="fa fa-fw fa-edit"></i> 
</a>
<hr />
</div>
</div>
<div class="row">
<div class="col-lg-12">
</div> 
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
<?php   
$u_id=$_SESSION['user_id'];
$qry=mysql_query("SELECT id,url,user_id FROM p_impic where user_id=('$u_id') ORDER BY id DESC limit 200");
while ($row=mysql_fetch_array($qry)) {
$pic=$row['url'];
$post_id=$row['id']; 
$user_id=$row['user_id'];
$query2 = mysql_query("SELECT COUNT(*) as num2,id FROM postt where photo='$pic'  "); 
$run2=mysql_fetch_array($query2);
$num2=$run2['num2'];       
$id=$run2['id'];            
?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html " id="<?php echo $post_id;?>">                                                                       
<div class="work-wrapper">     
<img src="uploades/page-profile/<?php echo $pic;?>" class="img-responsive img-rounded"  />
</div>                                      
</div>
<?php  }   ?>
</div>
</div>        
<?php include ('include/username.php'); ?>
</section>
<?php }else{ header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
