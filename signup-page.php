<?php include 'include/page-function.php';?>
<?php include 'include/connect.php';?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="Kwalks, the way you are" />
<meta name="author" content="kwalks.com" />
<title>kwalks</title>
<link href="assets/img/logo6.png" rel="shortcut icon" />	
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href="assets/css/frontpageindex.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="assets/css/reg-page.css" />
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="home.php?page=0"><img src="assets/img/logo6.png" class="log" id="logoim"></img></a>
</div>
</div>
</div>
<div class="container">
<BR><BR><BR><h5>  For portfolio pages:  </h5><BR>
<span class="input input--kwalk">
<div class="res">
<ul class="fontend">
<li class="fonx-left"><span data-letter=""></span></li>
<li class="fonx-left"><span data-letter="S">S</span></li>
<li class="fonx-left"><span data-letter="I">I</span></li>
<li class="fonx-left"><span data-letter="G">G</span></li>
<li class="fonx-left"><span data-letter="N">N</span></li>
<li class="fonx-left"><span data-letter=""></span></li>
<li class="fonx-left"><span data-letter="I">I</span></li>
<li class="fonx-left"><span data-letter="N">N</span></li>
<li class="fonx-left"><span data-letter=":">:</span></li>
</ul>
</div>
</span>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<section class="content"><BR>
<form method="post" action="" enctype="multipart/form-data">
<?php
if (isset($_POST['submit'])) {
$email=$_POST['email'];
$message='';
$password=$_POST['password'];
$pwd=stripslashes(sha1($password)&$password);
$pwd=htmlentities($pwd, ENT_QUOTES, "UTF-8");
if (empty($email)or empty($password)) {
$message="please fill the fields";
} else {
$check_login=mysql_query("SELECT id,ver,act FROM puser WHERE ( email='".mysql_real_escape_string($email)."' OR username='".mysql_real_escape_string($email)."')AND password='".mysql_real_escape_string($pwd)."'");
if (mysql_num_rows($check_login)==1) {
$get = mysql_fetch_array($check_login);
$user_id=$get['id'];
$ver=$get['ver'];
$act=$get['act'];
$num=rand(1000,9999);
$num1=rand(1000,9999);
$num2=rand(1000,9999);
$_SESSION['user_id']=$user_id;
$_SESSION['user_type']=$act;
mysql_query("UPDATE puser SET ver_code='$num' ,ver_code1='$num1',ver_code2='$num2' WHERE  id=('$user_id')");
if($ver==1)
{
$date=date("Y-m-d h:i:s");
mysql_query("UPDATE login SET logint='$date',login='1' WHERE  id=('$user_id')");
if ($act=='w') {
header('location:wr-profile.php');
}else{
header('location:photographic_page.php');
}
}
else if($ver==0)
{
mail($email,"My subject",$num." "."http://localhost/kwalks/ver1.php?i=".sha1($num)."&x=".$user_id."&y=".sha1($num1)."&z=".sha1($num2),"rocky11091993@gmail.com");
header("location:verify_acc1.php");
}
}else{
$message = "user name or password incorrect";
}
}  
echo "<div class='box'>$message</div>";
}
?>	
<h6>I have not Registered yet !! <b><a class="login-link" href="reg-page.php">click</a></h6>
<span class="input input--kwalk">
<input class="input__field input__field--kwalk" type="text" autocomplete="off" maxlength="35" name="email" id="input-37" />
<label class="input__label input__label--kwalk" for="input-37">
<span class="input__label-content input__label-content--kwalk">Email</span>
</label>
</span>
<span class="input input--kwalk">
<input class="input__field input__field--kwalk"  maxlength="35" type="password" name="password" id="input-38" />
<label class="input__label input__label--kwalk" for="input-38">
<span class="input__label-content input__label-content--kwalk">Password</span>
</label>
</span>
<a><input type="submit" class="btn button-custom btn-custom-two" name="submit" ></input></a>
</form>
<h5><a class="login-link" href="pagelostpass.php"> Lost your password? </a></h5><BR><BR>
</section>
</div>	
</div>
</body>
</html>