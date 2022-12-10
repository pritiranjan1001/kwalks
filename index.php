<?php ob_start();session_start(); ?>
<?php include 'include/connect.php'; ?>
<!DOCTYPE html><html lang="en" class="no-js" ><head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /><meta name="description" content="Kwalks, the way you are" /><meta name="author" content="kwalks.com" /><title>kwalks</title>
<link href="assets/css/img/logo6.png" rel="shortcut icon" />
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href="assets/css/frontpageindex.css" rel="stylesheet" />
</head>
<body data-spy="scroll" data-target="#menu-section">
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button><a class="navbar-brand" href="#"><img src="assets/img/kwalks.png" width="80px" height="30px"></img></a>
		</div>
	</div>
</div>
<div id="home" >
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 ">
				<div id="carousel-slider" data-ride="carousel" class="carousel slide  animate-in" data-anim-type="fade-in-up">
					<div class="carousel-inner">
						<div class="item active"><h3>Obstacles are those frightful things you see when you take your eyes of your goals. - Henry Ford</h3></div>
						<div class="item"><h3>You must be the change you wish to see in the world. <br>- Mohandas Gandhi</h3></div>
						<div class="item"><h3>The unhappiest & unsuccessful people in this world, are those who care the most about what other people think. ― C. JoyBell</h3></div>
						<div class="item"><h3>The achievement of one goal should be the starting point of another. ― Alexander Graham Bell</h3></div>
						<div class="item"><h3>Never give up! Failure and rejection are only the fist step to succeeding. ― Jimmy Valvano</h3></div>
						<div class="item"><h3>People are not lazy; they just have impotent goals, that is, goals that do not inspire them. ― Anthony Robbins</h3></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="logonz">
	<div class="container">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
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
					<li class="la1 active"><a href="#log" data-toggle="tab">Login</a></li>
					<li class="la2"><a href="register.php">Register</a></li>
				</ul>
				<div class="tab-content logon-wrapper">
					<div class="tab-pane active" id="log">
						<form method="post" action="" enctype="multipart/form-data">
							<?php
							if (isset($_POST['submit'])) {
							$email=$_POST['email'];
							$password=$_POST['password'];
							$pwd=stripslashes(sha1($password)&$password);
							$pwd=htmlentities($pwd, ENT_QUOTES, "UTF-8");
							if (empty($email)or empty($password)) {
							$message="please fill the fields";
							} else {
							$check_login=mysql_query("SELECT id,ver FROM users WHERE ( email='".mysql_real_escape_string($email)."' OR username='".mysql_real_escape_string($email)."')AND password='".mysql_real_escape_string($pwd)."'");
							if (mysql_num_rows($check_login)==1) {
							$get = mysql_fetch_array($check_login);
							$user_id=$get['id'];
							$num=rand(1000,9999);
							$num1=rand(1000,9999);
							$num2=rand(1000,9999);
							$ver=$get['ver'];
							$_SESSION['user_id']=$user_id;
							$_SESSION['user_type']='u';
							mysql_query("UPDATE users SET ver_code='$num' ,ver_code1='$num1',ver_code2='$num2' WHERE  id=('$user_id')");
							if($ver==2)
							{
							$date=date("Y-m-d h:i:s");
							mysql_query("UPDATE login SET logint='$date',login='1' WHERE  id=('$user_id')");
							$_SESSION['ver']='2';
							header('location:home.php?page=0');
							}
							else if($ver==0)
							{
							$_SESSION['ver']='0';
							$link="http://www.kwalks.com/ver.php?i=".sha1($num)."&x=".$user_id."&y=".sha1($num1)."&z=".sha1($num2);
							$subject = "VERIFICATION CODE";
							$message = "
							<html>
								<title>kwalks</title>
								<style type='text/css'>
								.mail{
								text-align: center;
								background-color: #000;
								color: #fff;
								}
								</style><br><br><br><br>
								<div class='mail'>
									<br><br><br><br>
									<h2>Hello</h2>
									<h1>Welcome to Kwalks , thanks for joining us.</h1>
									<p>You have sucessfully registered with kwalks.com</p>
									<p>Your verification code is: ".$num." <br><br>
									Please use this verification code to or the link below, to verify your account.<br></p>
									<h4>Verification Link: <a href='".$link."'>".$link."</a></h4><br>
									<h5>In case you face any problems, kindly revert back to us on: support@kwalks.com</h5>
									<br><br><br><br>
								</div>
							</html>
							";
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
							$headers .= 'From: <info@kwalks.com>' . "\r\n";
							mail($verify,$subject,$message,$headers,"-finfo@kwalk.com");
							header("location:verify_acc.php");
							}
							else if($ver==1)
							{
							$_SESSION['ver']='1';
							header('location:editprofile.php');
							}
							}else{
							$message = "user name or password incorrect";
							}
							}
							echo "<div class='box'>$message</div>";
							}
							?>
							<div class="input-group">
								<label for="login-name">Email/Username </label><br/>
								<input type="text" class="login-field" autocomplete="off" placeholder="example@domain.com"  name="email" maxlength="35" ><br/>
							</div>
							<div class="input-group"><br>
								<label for="login-pass">Password </label><br/>
								<input type="password" class="login-field" autocomplete="off" placeholder="password" maxlength="35" name="password"  ><br/>
								<span class="error"></span>
							</div><br>
							<input type="submit" value="SIGN IN" name="submit" class="btn button-custom btn-custom-two" href="#"><br>
							<a class="login-link" href="lostpass.php">Lost your password?</a><BR><BR>
							<a href='signup-page.php' id="wex" class="btn button-custom btn-custom-two" >sign-in for portfolio page</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="navbar navbar-inverse navbar-bottom scroll-me" id="menu-section" ><div class="container"><div class="navbar-header"></div><div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-left"><div class="footext"><a href="contactus.html"> Contact us </a>  | <a href="aboutUs.html"> About us </a> | <a href="terms&condition.html">Terms and Conditions </a> | <a href="Privacy.html"> Privacy Policy </a>| <a href="Disclaimer.html">Disclaimer </a> Kwalks &copy;<?php echo date("Y")?></div></div></div></div>
<script src="assets/js/jquery-1.11.1.js"></script><script src="assets/js/bootstrap.js"></script><script src="assets/js/screen.display.js"></script><script src="assets/js/custom.js"></script>
</body>
</html>