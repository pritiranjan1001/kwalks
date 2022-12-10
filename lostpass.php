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
<link href="assets/css/editprofile.css" rel="stylesheet" />
</head>
<body data-spy="scroll" data-target="#menu-section">
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="index.php">
<img src="assets/img/kwalks.png" width="80px" height="30px"></img>
</a>
</div>
</div>
</div>
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
<BR><BR><BR> <BR><BR><BR>
<form method="post" action="" enctype="multipart/form-data">
<p class="contact"><label for="phone">Email Address:</label></p> 
<h6>( Give your email account for the new password )</h6>
<input id="verify" name="verify" placeholder="email address"  tabindex="1" required="" type="email"> 
<input  type="submit" value="submit" name="submit" class="btn button-custom btn-custom-two" href="#"><br>
</form><br>
<?php 
if (isset($_POST['submit']))                   { 
$verify=$_POST['verify']; 
$query1 = mysql_query("select * from users where email='$verify' ");     	  
if($run=mysql_fetch_array($query1)){
$i=$run['id'];
$num=$run['ver_code'];
$num1=$run['ver_code1'];
$num2=$run['ver_code2'];
$link="http://192.168.1.105/kwalks12/loss-chan.php?i=".sha1($num)."&x=".$i."&y=".sha1($num1)."&z=".sha1($num2);
$subject = "LOST PASSWORD";
$message = "
<html>
<title>kwalks</title>
<style type='text/css'>.mail{text-align: center;background-color: #000;color: #fff;}</style><br><br><br><br>
<div class='mail'>
<br><br><br><br>
<h2>Hello</h2>
<p>We received a request to reset your password. 
Don't worry, all you have to do is reset your password by clicking on the link below:</p>

<p><a href='".$link."'>".$link."</a><br><br>
Clicking on this link will allow you to choose a new password for your account removing the old one.<br></p>

<br>

<h5>Well! if you have remembered the password now, or didn't request to reset password, just feel free to forget about this mail.<br>
Your password won't be reset.</h5>
<br><br>
<h5>Thanks, </h5>
<h5>KWALKS Team </h5><br><br><br>
</div>
</html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <webmaster@example.com>' . "\r\n";
mail($verify,$subject,$message,$headers,"-finfo@kwalk.com");
}
echo "a link has been send to your email account. <br>please check your email.";    
}
?>
</div>
</div>
</body>
</html>