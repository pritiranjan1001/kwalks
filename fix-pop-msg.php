<?php ob_start();?>
<?php include 'include/connect.php';?>
<?php include 'include/function.php';?>
<?php if ($_SESSION['user_type']=='u') {$user_id = true;?>
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
<?php require 'include/header.php';?>
<section>
<div class="modal img-modal">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="col-md-8 modal-image">
<div class="postdes">
<?php
$post_id=mysql_real_escape_string($_GET['id']);
$post_id=htmlentities($post_id, ENT_QUOTES, "UTF-8");
if(preg_match("#\W+#", $post_id)|| preg_match("#[A-Z]+#", $post_id)|| preg_match("#[a-z]+#", $post_id)){header('Location:profile.php');}
$u_id=$_SESSION['user_id'];
$query1 = mysql_query("SELECT postt,heading,upload_date,user_id,is_img from postt where id=$post_id"); 
$run=mysql_fetch_array($query1);
$sDate=$run['upload_date'];
$postn= $run['postt'];
$u=$run['user_id'];	
$head=$run['heading'];
$is_img=$run['is_img'];
if($u!=$u_id){if(isfrnd($u)==0){header('Location:profile.php');}}
if(($is_img=='m')||($is_img=='n')||($is_img=='p')){				
$query2 = mysql_query("SELECT url FROM pro_pic where user_id=$u  ORDER BY id DESC "); 
$ron=mysql_fetch_array($query2);
$pic= $ron['url'];
}else if(($is_img=='u')||($is_img=='q')){
$query2 = mysql_query("SELECT url FROM p_impic where user_id=$u AND cat_ry=1  ORDER BY id DESC "); 
$ron=mysql_fetch_array($query2);
$pic= $ron['url'];
}else if(($is_img=='e')||($is_img=='l')||($is_img=='g')){
$query2 = mysql_query("SELECT url FROM w_profile where user_id=$u   ORDER BY id DESC "); 
$ron=mysql_fetch_array($query2);
$pic= $ron['url'];					 
}    
function Date1($sDate)	{					
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
?>  
<h3><?php echo nl2br("$head");?></h3><br>
<h5><?php echo nl2br("$postn");?></h5>
</div>     
</div>
<div class="col-md-4 modal-meta">
<div class="modal-meta-top">
<button type="button" class="close" data-dismiss="modal" onclick="history.go(-1);"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
<div class="img-poster clearfix" >
<?php if(($is_img=='m')||($is_img=='n')||($is_img=='p')){?>
<a href=""><img class="img" src="uploades/user_images/<?php echo $pic;?>"/></a>
<strong><a href="profile.php?user=<?php echo $u;?>"><?php echo getusername($u);?></a></strong>
<?php }else if(($is_img=='u')||($is_img=='q')){?>
<a href=""><img class="img" src="uploades/page-profile/<?php echo $pic;?>"/></a>
<strong><a href="photographic_page.php?u_id=<?php echo $u;?>"><?php echo getpagename($u);?></a></strong>
<?php } else if(($is_img=='e')||($is_img=='l')||($is_img=='g')){?>
<a href=""><img class="img" src="uploades/w-profile/<?php echo $pic;?>"/></a>
<strong><a href="wr-profile.php?u_id=<?php echo $u;?>"><?php echo getpagename($u);?></a></strong>
<?php }?>  
<span><?php echo Date1($sDate);?></span>
</div>
</div>
<div class="modal-meta-middle" id="mydiv">      
</div>
<form  method="post" name="form" id="form1" onsubmit="return false">
<?php ob_start();?>
<div class="modal-meta-bottom">
<input type="text" name="content" id="content" autocomplete="off" placeholder="Leave a commment.." maxlength="500" class="ctex" onkeypress="return runScript1(event,<?php echo $post_id;?>)">
<input type="submit" id="joi" class="btn submit_button" value="Post" name="submit" onclick="change1(<?php echo $post_id;?>)"/>
</div>
</form>  
</div> 
</div>
</div>
</div>
</section><?php }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript">
$(document).ready(function () {setInterval(function(){
$('#mydiv').load('include/com.php?id=<?php echo $_GET['id'];?>');},1000);
});
</script>
<script type="text/javascript"> function change1(i)
{ var param = $("#content").val();
var dataString="id="+i+"&content="+param;
$.ajax({
type:"POST",
url:"include/postcom.php",
data:dataString,
success:function(response)
{document.getElementById("form1").reset();}
});
}
function runScript1(e,i) {
if (e.keyCode == 13) {
change1(i);
return false;
}
}
</script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
<script src="./js/jquery.form.js"></script>