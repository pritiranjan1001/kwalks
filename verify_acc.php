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
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href="assets/css/editprofile.css" rel="stylesheet" />
</head>
<?php if ($_SESSION['user_type']=='u') {
$user_id = true;
$u=$_SESSION['user_id'];
$query = mysql_query(" SELECT id FROM users where id=$u and ver=0");
if(!mysql_fetch_array($query)){header('Location:index.php');}?>
<body data-spy="scroll" data-target="#menu-section">
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><BR><BR><BR>
<form method="post" action="" enctype="multipart/form-data">
<?php 
if (isset($_POST['submit'])) 
{ 
$verify=$_POST['verify'];         
$u_id=$_SESSION['user_id'];
$check_login=mysql_query("SELECT ver_code FROM users WHERE  id=('$u_id')");
$get = mysql_fetch_array($check_login);
$num=$get['ver_code'];
if($verify==$num)
{
mysql_query("UPDATE users SET ver='1'WHERE  id=('$u_id')");
header('location:editprofile.php');
}
else
{
echo "( error in validation code )<br/> ";
}
}
?>
<p class="contact"><label for="phone">verification code:</label></p> 
<h6>( check the email account for the validation code )</h6>
<input id="ver" name="verify" placeholder="enter the code"  tabindex="1" required="" type="text"> 
<input type="submit" value="verify" name="submit" class="btn button-custom btn-custom-two" href="#"><br>
<br>
<h6> Resend verification code <a href=""> &nbsp;click</a></h6>
</form>
</div>
</div>
<?php }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>