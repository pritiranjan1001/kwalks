<?php
if (isset($_POST['submit'])) {
$email= stripslashes($_POST['email']);
$username=stripslashes($_POST['username']);	
$username=htmlentities($username, ENT_QUOTES, "UTF-8");
$portfolio=stripslashes($_POST['portfolio']);	
$password=stripslashes($_POST['password']);
$cpassword=stripslashes($_POST['cpass']);
$pwd=stripslashes(sha1($password)&$password);
$pwd=htmlentities($pwd, ENT_QUOTES, "UTF-8");
$act=$_POST['act'];
$check_login=mysql_query("SELECT id FROM puser WHERE  email='".mysql_real_escape_string($email)."' ");
$check_login1=mysql_query("SELECT id FROM puser WHERE  username='".mysql_real_escape_string($username)."' ");
if (empty($email) or empty($username) or empty($portfolio) or empty($password)or empty($act)) {
$message="please fill the fields";
}
else if (mysql_num_rows($check_login)==1)
{
$message="email already exists";
}
else if (mysql_num_rows($check_login1)==1)
{
$message="username already exists";
}
else  if( strlen($password) < 8 ) {
$message= "Password too short! ";
}else if($password!=$cpassword) {
$message= "Passwords Don't Match recheck it";
}
else if( preg_match("#\W+#", $username)) {
$message= "Username must not contain symbol";
}
else {
$num=rand(1000,9999);
$num1=rand(1000,9999);
$num2=rand(1000,9999);
$date=date("Y-m-d h:i:s");    
mysql_query("INSERT INTO puser VALUES ('','$email','$username','$portfolio','$pwd','$act','$num','$num1','$num2','$date','0') ");
$query = mysql_query(" SELECT (id) FROM puser where email=('$email')");
$run=mysql_fetch_array($query);
$user_id=$run['id'];
mysql_query("INSERT INTO p_about VALUES ('','here is who you are','$user_id') ");
mysql_query("INSERT INTO wr_about VALUES ('','write about you...','$user_id') ");
mysql_query("INSERT INTO p_impic VALUES ('','about.jpg','$user_id','1') "); 
mysql_query("INSERT INTO p_impic VALUES ('','updates.jpg','$user_id','2') "); 
mysql_query("INSERT INTO p_impic VALUES ('','posts.jpg','$user_id','3') "); 
mysql_query("INSERT INTO p_impic VALUES ('','kwalks-works.jpg','$user_id','4') ");
mysql_query("INSERT INTO cvr_pic VALUES ('','page-cover.jpg','$user_id') "); 
mysql_query("INSERT INTO w_profile VALUES ('','writer-profile.jpg','$user_id') "); 
$message="<h6>now you can loggedin <br> click here for <a href='signup-page.php'>sign-in </a> </h6> ";
mail($email,"My subject",$num." "."http://localhost/kwalks/ver1.php?i=".sha1($num)."&x=".$user_id."&y=".sha1($num1)."&z=".sha1($num2),"rocky11091993@gmail.com");
$check_login=mysql_query("SELECT id FROM puser WHERE  email='".mysql_real_escape_string($email)."' AND password='".mysql_real_escape_string($pwd)."'");
if (mysql_num_rows($check_login)==1) {
$get = mysql_fetch_array($check_login);
$user_id=$get['id'];
$_SESSION['user_id']=$user_id;
$_SESSION['user_type']=$act;
header("location:http://localhost/kwalks/verify_acc1.php");
}
}  
echo "<div class='box'>$message</div>";
}
?>
