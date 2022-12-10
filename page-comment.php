<!DOCTYPE html>
<?php include 'include/function.php' ?>
<?php include 'include/connect.php' ?>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="Kwalks, the way you are" />
<meta name="author" content="kwalks.com" />
<title>Albums</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href="assets/css/page-comment.css" rel="stylesheet" type="text/css" />
</head>
<body data-spy="scroll" data-target="#menu-section">
<section id="work" >
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-1"></div>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-10">
<div class="work-wrapper">
<div class="centered">
<button type="button" class="close" data-dismiss="modal" onclick="history.go(-1);"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
<h3>comments</h3>
<hr>
</div>
<div class="like-cont">
<div class="row">
<div class="col-lg-12">
<?php 
function Date1($sDate)	
{					
$sDate1 = date("Y-m-d H:i:s");
$diff = abs(strtotime($sDate1) - strtotime($sDate));
if($diff<60)
{
$Date=$diff.'s ago';
}
else if($diff>=60&&$diff<3600)
{
$Date=(int)($diff/60).'min ago';
}
else if($diff>=3600&&$diff<86400)
{
$Date=(int)($diff/3600).'hr ago';
}
else if($diff>=86400&&$diff<31536000)
{
$Date=(int)($diff/86400).'day ago';
} 
else 
{
$Date=(int)($diff/31536000).'year ago';
}							 
return $Date;				 
}					
$u_id=$_SESSION['user_id'];
$post_id=$_GET['id'];
$query = mysql_query("SELECT comment,user_id,upload_date FROM p_comment where post_id=$post_id ORDER BY upload_date DESC ");                                                                                                 
while ($run=mysql_fetch_array($query)) {
$postt=$run['comment'];
$u_on=$run['user_id'];
$sDate=$run['upload_date'];															  
?>
<?php 
$query1 = mysql_query(" select username from users where id=$u_on "); 
$run=mysql_fetch_array($query1);
$name= $run['username'];
$query2 = mysql_query("SELECT url FROM pro_pic where user_id=$u_on  ORDER BY id DESC "); 
$ron=mysql_fetch_array($query2);
$pic= $ron['url'];             
?>
<div class="media">
<a class="pull-left" href="#">
<img class="media-object img-circle" src="uploades/user_images/<?php echo $pic;?>" width="60px" height="70px" alt="">
</a>
<div class="media-body">
<h4 class="media-heading"><?php  echo "$name"; ?>
<span class="small pull-right"><?php echo Date1($sDate);?></span>
</h4>
<p><?php echo nl2br("$postt"); ?></p>
</div>
</div>
<?php } ?>
</div>
</div>
<br>
</div>
</div>
</div>
</div>
</div>
</section>  
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>