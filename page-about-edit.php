<?php ob_start();?>
<?php include 'include/page-function.php';?>
<?php include 'include/connect.php'; ?>
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
<link href="assets/css/pageabout.css" rel="stylesheet" />
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'></head>
<body data-spy="scroll" data-target="#menu-section">	
<?php include('include/page-header.php');?>
<?php if(($_SESSION['user_type']=='p')){$user_id = true;?><BR>
<section id="yes">
<div class="overlay">
<div class="container">
<div class="row text-center">
<div class="col-lg-12 col-md-12">
<div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1 ">
<span><a href="photographic_page.php"><i class="fa fa-home"></i></a></span><BR>
<span><a href="page-about.php">ABOUT</a> EDIT</span><hr><BR>                      
</div>
</div>
<div class="col-lg-12 col-md-12">
<form  method='post' name='about'>
<?php
if (isset($_POST['about'])) {
$about= stripslashes($_POST['about']);
$about=htmlentities($about, ENT_QUOTES, "UTF-8");
if (empty($about)) {
echo "please enter the text <br/><br/>";
}else{
$u_id=$_SESSION['user_id'];
mysql_query("UPDATE p_about SET about='$about' where user_id=('$u_id')");
echo" updated:<br>";  
header('Location:page-about.php');                   
}
}
?>
<textarea class="vgs" autocomplete="off" maxlength="8000" name="about"></textarea><BR>
<button class="btn button-custom btn-custom-two" type="submit">change</button>
</form>
</div>    
</div>
</div>
</div>
</section>
<?php }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>