<?php ob_start();?>
<?php include 'include/connect.php';?>
<?php include 'include/function.php';?>
<?php if($_SESSION['user_type']=='u'){?>
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
<link href="assets/css/msg.css" rel="stylesheet" />
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include('include/header.php');?>
<?php include('include/connect.php');?>
<?php include ('include/username.php'); ?>	
<?php if ($_SESSION['user_id']) {
$user_id = true;
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  <div class="maxio"></div></div>
<section id="work" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4>MESSAGE BOX</h4><hr />
</div>
</div>
<div class="row">
<div class="col-lg-12">
<h5>Links of friend </h5><br>
<div>
<?php
$my_id=$_SESSION['user_id'];
$frnd_query=mysql_query("SELECT user_one,user_two,id FROM frnds WHERE(user_one='$my_id' OR user_two='$my_id')");
while ($run_frnd=mysql_fetch_array($frnd_query)) {
$user_one=$run_frnd['user_one'];
$user_two=$run_frnd['user_two'];
$id=$run_frnd['id'];
if($user_one == $my_id){
$user=$user_two;
}else{
$user=$user_one;
}
$username=getusername($user);
$query=mysql_query("SELECT logoutt FROM login WHERE id='$user'");
$run=mysql_fetch_array($query);
$logoutt=$run['logoutt'];
$sDate1 = date("Y-m-d H:i:s");
$diff = abs(strtotime($sDate1) - strtotime($logoutt));
if(abs(strtotime($sDate1) - strtotime($logoutt))<=60)
{
$Date='online';
}
else 
{
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
else
{
$Date='on '.date("d/m", strtotime($logoutt));
} 
}
mysql_query("UPDATE msg SET u_read='1'WHERE  to_user=('$my_id') AND frnd_id=('$id') AND u_read='0'");
$query1=mysql_query("SELECT COUNT(*) as num2 FROM msg WHERE (to_user='$my_id') AND (u_read=1) AND (frnd_id=('$id')) ");
$run1= mysql_fetch_array($query1);
$C2=$run1['num2'];
$query2 = mysql_query("SELECT url FROM pro_pic where user_id=$user ORDER BY id DESC "); 
$ron=mysql_fetch_array($query2);
$pic= $ron['url'];
?>
<div class="col-lg-4 col-md-4 col-xs-12 thumb">
<a class="thumbnail" href="msg-pop.php?id=<?php echo $id?>" >
<div class="boxes">
<img src="uploades/user_images/<?php echo $pic;?>">
<div class="ubox"><h6><?php echo $username;?><sup style="color:red;" ><?php echo $C2;?></sup> </h6></div>
<div class="ubox1"><h5> <span><?php echo $Date;?> </span></h5> </div>
</div>
</a>
</div>
<?php }?>
</div>
</div>
</div>
</section>
<?php }else
  {
 header('Location:index.php');
} }else
  {
header('Location:index.php');
}?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
