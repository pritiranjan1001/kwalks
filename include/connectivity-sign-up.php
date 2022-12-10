<?php
if (isset($_POST['submit'])) {
$email= stripslashes($_POST['email']);
$username=stripslashes($_POST['username']);	
$username=htmlentities($username, ENT_QUOTES, "UTF-8");	
$password=stripslashes($_POST['password']);
$cpassword=stripslashes($_POST['cpass']);
$pwd=stripslashes(sha1($password)&$password);
$pwd=htmlentities($pwd, ENT_QUOTES, "UTF-8");
$check_login=mysql_query("SELECT id FROM users WHERE  email='".mysql_real_escape_string($email)."' ");
$check_login1=mysql_query("SELECT id FROM users WHERE  username='".mysql_real_escape_string($username)."' ");
if (empty($email) or empty($username) or empty($password)) {
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
else    if( strlen($password) < 8 ) {
$message= "Password too short! ";
}
else if($password!=$cpassword) {
$message= "Passwords Don't Match recheck it";
}
else {
$num=rand(1000,9999);
$num1=rand(1000,9999);
$num2=rand(1000,9999);
$date=date("Y-m-d h:i:s");
mysql_query("INSERT INTO users VALUES ('','$email','$username','$pwd','$num','$num1','$num2','$date','0') ");
$query = mysql_query(" SELECT (id) FROM users where email=('$email')");
$run=mysql_fetch_array($query);
$user_id=$run['id'];
mysql_query("INSERT INTO status VALUES ('','Welcome','$user_id') ");
mysql_query("INSERT into album VALUES  ('','other uploads','$user_id','')");
mysql_query(" INSERT into login VALUES ('$user_id','','','0')");
mail($email,"My subject",$num." "."http://localhost/kwalks/ver.php?i=".sha1($num)."&x=".$user_id."&y=".sha1($num1)."&z=".sha1($num2),"rocky11091993@gmail.com");
$check_login=mysql_query("SELECT id FROM users WHERE  email='".mysql_real_escape_string($email)."' AND password='".mysql_real_escape_string($pwd)."'");
if (mysql_num_rows($check_login)==1) {
$get = mysql_fetch_array($check_login);
$user_id=$get['id'];
$_SESSION['user_id']=$user_id;
$_SESSION['user_type']='u';
header("location:http://localhost/kwalks/verify_acc.php");
}$message="now you can loggedin";
}  
echo "<div class='box'>$message</div>";
}
?>
