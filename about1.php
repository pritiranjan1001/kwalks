<?php include 'include/function.php';?>
<?php include 'include/connect.php';?>
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
<link href="assets/css/about.css" rel="stylesheet" />
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<?php if ($_SESSION['user_type']=='u') {
$user_id = true;
?>
<body data-spy="scroll" data-target="#menu-section">
<?php include 'include/header.php';?>			
<div class="aboutbox">
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="login-wrapper">
<ul class="nav">
<li class="la1"><a href="about.php">About</a></li>
<li class="la2"><a href="activity.php" data-toggle="tab">Activity</a></li>	
</ul>
<div class="tab-content logon-wrapper">
<div class="tab-pane active" id="log">
<div class="input-group">
<div class="col-xs-12 col-sm-12 col-md-5 col-lg-3">
<div class="profile-wrapper">
<div class="profile-inner" style="background-image: url('assets/img/team/1.jpg')" >	
</div>
<div class="description">
<?php  $user=$_SESSION['user_id'];
$query3 = mysql_query("SELECT COUNT(*) as num3 FROM frnds where user_one=$user|| user_two=$user"); 
$run3=mysql_fetch_array($query3);
$num3=$run3['num3'];				
$query4 = mysql_query("SELECT COUNT(*) as num4 FROM follow where user_one=$user"); 
$run4=mysql_fetch_array($query4);
$num4=$run4['num4'];     ?>		     
<h4> <?php echo getusername($_SESSION['user_id']);?></h4>
<a class="btn button-custom btn-custom-two" href="following.php"> <?php echo $num4  ?> Following </a>
<a class="btn button-custom btn-custom-two" href="followers.php"> <?php echo $num3  ?> Followers </a>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-7 col-lg-9">
<div class="axion">  
<form method="post"  action="" enctype="multipart/form-data">
<?php
if (isset($_POST['des_pan']) && isset($_POST['descw']) ) {
$des_pan=htmlentities($_POST['des_pan'], ENT_QUOTES, "UTF-8"); 
$descw=htmlentities($_POST['descw'], ENT_QUOTES, "UTF-8");
if (empty($des_pan) or empty($descw)) {
echo "please enter the from <br/><br/>";
}else{                       
$u_id=$_SESSION['user_id'];                                
mysql_query("UPDATE about SET des_pan='$des_pan', descw='$descw'  where user_id=$u_id");
echo"update is filled up:<br>";}
}
?>              
<textarea name="des_pan" class="axiomm" maxlength="1000"  type="text" placeholder="heading" ></textarea>
<Br><Br>
<textarea class="axiom" type="text" maxlength="5000" name="descw" placeholder="description" ></textarea>
<input type="submit" name="submit" value="change" class="btn button-custom btn-custom-two" >
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php }else{
header('Location:index.php');
} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
