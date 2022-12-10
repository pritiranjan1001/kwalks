<?php include 'include/connect.php' ?>
<?php include 'include/function.php' ?>
<?php if($_SESSION['user_type']=='u'){?>
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
<?php $u=$_SESSION['user_id'];
$query = mysql_query(" SELECT id FROM users where id=$u and ver=1");
if(!mysql_fetch_array($query))
{header('Location:index.php');}?>
<body data-spy="scroll" data-target="#menu-section">
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
<form method="POST" action="" enctype="multipart/form-data" >
<div class="bbody"><br/>
<div  class="form">
<p class="contact"><label for="fname">First Name</label></p> 
<input id="name" name="fname" placeholder="First name" required="" tabindex="1" type="text"> 
<p class="contact"><label for="lname">Last Name</label></p> 
<input id="name" name="lname" placeholder="last name" required="" tabindex="2" type="text"> 
<br/><br/> 
<fieldset>
<label>Birthday:</label>
 <label><input class="birthday" type="date" maxlength="2" name="birthday"   placeholder="Day" required=""></label>
</fieldset>
<select class="select-style gender" type="text" name="gender" tabindex="3" required="">
<option value="m">Male</option>
<option value="f">Female</option>
</select><BR><BR><BR>
<p class="contact"><label for="phone"> Phone number</label></p> 
+91 <input id="mno" name="mno" placeholder="phone number"  tabindex="6"  type="text"> 
<h6><?php include 'include/edit-p.php';?></h6><br/> <br/> 
<p class="contact"></p><input class="buttom" name="submit" id="submit" tabindex="6" value="next" type="submit"><br/><br/><br/>  
</div>       
</div>
</form> 
</div></div>
</body>
<?php }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
</body>
</html>