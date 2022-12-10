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
<a class="navbar-brand" href="home.php?page=0">
<img src="assets/img/logo6.png" class="log" id="logoim"></img>
</a>
</div>
</div>
</div>
<div class="container">
<BR></br>
<span class="input input--kwalk">
<div class="res">
<ul class="fontend">
<li class="fonx-left"><span data-letter="R">R</span></li>
<li class="fonx-left"><span data-letter="E">E</span></li>
<li class="fonx-left"><span data-letter="S">S</span></li>
<li class="fonx-left"><span data-letter="I">I</span></li>
<li class="fonx-left"><span data-letter="S">S</span></li>
<li class="fonx-left"><span data-letter="T">T</span></li>
<li class="fonx-left"><span data-letter="E">E</span></li>
<li class="fonx-left"><span data-letter="R">R</span></li>
<li class="fonx-left"><span data-letter=":">:</span></li>
</ul>
</div>
</span>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-1"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
<section class="content">
<?php include "include/page-reg-signin.php";?>
<form method="POST" action="" enctype="multipart/form-data">
<span class="input input--kwalk">
<input class="input__field input__field--kwalk" type="text" autocomplete="off" maxlength="35" name="username" id="input-35" />
<label class="input__label input__label--kwalk" for="input-35" >
<span class="input__label-content input__label-content--kwalk" >UserName</span>
</label>
</span><h6>username must be unique and you can use it through your sign-in process.<br> e.g like : example456 or ted456 <br>( * tip : don't use any symbol)</h6><br>
<span class="input input--kwalk">
<input class="input__field input__field--kwalk" type="text" autocomplete="off" maxlength="35" name="portfolio" id="input-36" />
<label class="input__label input__label--kwalk" for="input-36">
<span class="input__label-content input__label-content--kwalk">portfolio name</span>
</label>
</span><h6>portfolio name or the name what you want to show in the website <br> e.g like : lens arc photography or charles jonson</h6><br>
<span class="input input--kwalk">
<input class="input__field input__field--kwalk" type="email" autocomplete="off"  maxlength="35" name="email"  id="input-37" />
<label class="input__label input__label--kwalk" for="input-37">
<span class="input__label-content input__label-content--kwalk">Email</span>
</label>
</span><h6>your valid email address</h6>
<span class="input input--kwalk">
<input class="input__field input__field--kwalk" type="password" name="password" maxlength="35" id="input-38" />
<label class="input__label input__label--kwalk" for="input-38">
<span class="input__label-content input__label-content--kwalk">Password</span>
</label>
</span><h6>your password must be minimum 8 char.</h6>
<span class="input input--kwalk">
<input class="input__field input__field--kwalk" type="password" name="cpass" maxlength="35" id="input-39" />
<label class="input__label input__label--kwalk" for="input-39">
<span class="input__label-content input__label-content--kwalk">Confirm Password</span>
</label>
</span><h6>insert the password again for confirmation</h6>
<span class="input input--kwalk">
<select class="select-style act" type="text" name="act" tabindex="3" value="select" required="">
<option value="p">photographer</option>
<option value="w">writer</option>
</select>
</span>
<h6>choose category</h6><br>
<input type="submit" class="btn button-custom btn-custom-two"  name="submit"><!--submit--></input>
<h6>By clicking Submit,we consider that you agree to our <a href="">Terms</a> and that you have read our <a href="">Data Policy</a> including our Cookie Use.</h6>
<BR><BR>
</form>
</section>
</div>	
</div>
</body>
</script>
</html>