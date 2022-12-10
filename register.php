<?php include 'include/connect.php';?>
<?php include 'include/function.php'; ?>
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
<link href="assets/css/frontpageindex.css" rel="stylesheet" />
</head>
<body data-spy="scroll" data-target="#menu-section">
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#"><img src="assets/img/kwalks.png" width="80px" height="30px"></img></a>
</a>
</div>
</div>
</div>
<div id="logonz">
<div class="container">			
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="maxio"></div></div>
<div class="login-wrapper">
<div class="fontcontainer1">
<ul class="fontend1">
<li class="fonx-left1"><span data-letter="K">K</span></li>
<li class="fonx-top1"><span data-letter="W">W</span></li>
<li class="fonx-right1"><span data-letter="A">A</span></li>
<li class="fonx-top1"><span data-letter="L">L</span></li>
<li class="fonx-bottom1"><span data-letter="K">K</span></li>
<li class="fonx-top1"><span data-letter="S">S</span></li>
</ul>
</div>
<ul class="nav">
<li class="la1"><a href="index.php">Login</a></li>
<li class="la2 active"><a href="#">Register</a></li>
</ul>
<div class="tab-content logon-wrapper">
<div class="tab-pane active">
<?php include "include/connectivity-sign-up.php"; ?>
<form method="POST" action="" enctype="multipart/form-data" >
<div class="input-group"><br>
<label for="login-uname">Username</label><br/>
<input type="text" class="login-field"  autocomplete="off" maxlength="35" name="username" value="" placeholder="e.g:&nbsp; example45 or Tia98 " id="login-uname">
</div>
<div class="input-group"><br>
<label for="login-email">Email</label><br/>
<input type="email" class="login-field" value="" maxlength="35" autocomplete="off" name="email" placeholder="example@domain.com" id="login-email">
</div>
<div class="input-group"><br>
<label for="login-pass">Password</label><br/>
<input type="password" class="login-field" value="" maxlength="35" name="password" placeholder=" min 8 char." id="password">
</div>
<div class="input-group"><br>
<label for="login-pass">Confirm Password</label><br/>
<input type="password" class="login-field" name="cpass" maxlength="35" value="" placeholder="password" id="cpass">
</div>
<br>
<input type="submit" class="btn button-custom btn-custom-two" name="submit" >
<h6>By clicking Submit, we consider that you agree to our <a href="terms&condition.html">Terms</a> and that you have read & observer our <a href="Privacy.html">Data Policy</a> including our Cookie.</h6>
</form>
<BR>
<a class="login-link" href="kwalkpage.php">create portfolio</a>
</div>
</div>
</div>
</div>
<script type="text/javascript">
function validatePassword(){
if(password.value != cpass.value) {
cpass.setCustomValidity("Passwords Don't Match recheck it");
} else {
cpass.setCustomValidity('');
}
}
password.onchange = validatePassword();
cpass.onkeyup = validatePassword();
</script>
<div class="fontcontainer">
<ul class="fontend">
<li class="fonx-left"><span data-letter="K">K</span></li>
<li class="fonx-left"><span data-letter="W">W</span></li>
<li class="fonx-left"><span data-letter="A">A</span></li>
<li class="fonx-left"><span data-letter="L">L</span></li>
<li class="fonx-left"><span data-letter="K">K</span></li>
<li class="fonx-left"><span data-letter="S">S</span></li>		              
</ul>
</div>
</div>
</div>
<div class="navbar navbar-inverse navbar-bottom scroll-me" id="menu-section" >
<div class="container">
<div class="navbar-header">
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-left">
<div class="footext"><a href="contactus.html"> Contact us </a>  | <a
href="aboutUs.html"> About us </a> | <a href="terms&condition.html">Terms and
Conditions </a> | <a href="Privacy.html"> Privacy Policy </a>| <a
href="Disclaimer.html">Disclaimer </a> Kwalks &copy; <?php echo date("Y") ?></div>
</div> 
</div>
</div>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/screen.display.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>