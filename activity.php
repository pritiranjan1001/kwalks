<?php ob_start();?>
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
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php require 'include/header.php';?>
<?php include 'include/connect.php';?>
<?php include 'include/username.php';?>
<?php if ($_SESSION['user_type']=='u') {$user_id = true;?>
<div class="aboutbox">
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="login-wrapper">
<ul class="nav">
<li class="la1"><a href="about.php">About</a></li>
<li class="la2"><a href="#reg" data-toggle="tab">Activity</a></li>	
</ul>
<div class="tab-content logon-wrapper">
<div class="tab-pane active" id="log">
<div class="input-group">
</div>
<div class="tab-pane" id="reg">
<div class="input-group"><br>
<?php
if (isset($_POST['act_from'])) {
$act_from=htmlentities($_POST['act_from'], ENT_QUOTES, "UTF-8"); 
if (empty($act_from)) {
echo "please enter the from <br/><br/>";
}else{                       
$u_id=$_SESSION['user_id'];                                
mysql_query("UPDATE activity SET act_from='$act_from' where user_id=('$u_id')");
echo"from is updated:<br>";  
}
}
if (isset($_POST['act_from1'])) {
$act_from1=htmlentities($_POST['act_from1'], ENT_QUOTES, "UTF-8"); 
if (empty($act_from1)) {
echo "please enter the from <br/><br/>";
}else{                       
$u_id=$_SESSION['user_id'];                                
mysql_query("UPDATE activity SET education='$act_from1' where user_id=$u_id");
echo"from is updated:<br>";  
}
}
if (isset($_POST['act_from2'])) {
$act_from2=htmlentities($_POST['act_from2'], ENT_QUOTES, "UTF-8"); 
if (empty($act_from2)) {
echo "please enter the from <br/><br/>";
}else{                       
$u_id=$_SESSION['user_id'];                                
mysql_query("UPDATE activity SET website='$act_from2' where user_id=$u_id");
echo"from is updated:<br>";  
}
}   
?>
<div class="panel-heading">
<h4 class="panel-title">
<label for="login-uname">From:</label><br/>
<?php  
$u_id=$_SESSION['user_id'];             
$query = mysql_query(" SELECT act_from,education,website FROM activity where user_id=$u_id");                                           
while ($run=mysql_fetch_array($query)) {
$act_from=$run['act_from'];        
$education=$run['education']; 
$website=$run['website'];
?>
<a data-toggle="collapse" href="#collapse2"><?php echo $act_from ; ?> &nbsp;&nbsp;&nbsp;edit  </a>
<?php } ?>
</h4>
</div>
<div id="collapse2" class="panel-collapse collapse">
<form method="post"  action="" enctype="multipart/form-data">
<input type="text" name="act_from" maxlength="1000" value="<?php echo $act_from ; ?> ">
<input class="btn button-custom btn-custom-two" type="submit" name="submit" value="change">
</form>
<h6>address of you locality,state,country etc.</h6>
</div>
</div>
<div class="input-group"><br>
<div class="panel-heading">
<h4 class="panel-title">
<label for="login-uname">education:</label><br/>
<a data-toggle="collapse" href="#collapse4"><?php echo $education;?> &nbsp;&nbsp;&nbsp;edit</a>
</h4>
</div>
<div id="collapse4" class="panel-collapse collapse">
<form method="post"  action="" enctype="multipart/form-data">
<input type="text" name="act_from1" maxlength="1000" value="<?php echo $education ;?>">
<input class="btn button-custom btn-custom-two" type="submit" name="submit" value="change">
</form>
</div>
</div>
<div class="input-group"><br>
<div class="panel-heading">
<h4 class="panel-title">
<label for="login-uname">website:</label><br/>
<a data-toggle="collapse" href="#collapse5"><?php echo $website;?>&nbsp;&nbsp;&nbsp;edit</a>
</h4>
</div>
<div id="collapse5" class="panel-collapse collapse"> 
<form method="post"  action="" enctype="multipart/form-data">
<input type="text" name="act_from2" maxlength="1000" value="<?php echo $website ; ?> ">
<input class="btn button-custom btn-custom-two" type="submit" name="submit" value="change">
</form>
<h6>add your websites</h6>
</div>
</div>
<br>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php }else{header('Location:index.php');} ?>	
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
