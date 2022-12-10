<?php
if (isset($_GET['user'])&& !empty($_GET['user'])) {
$user=mysql_real_escape_string($_GET['user']);
$user=htmlentities($user, ENT_QUOTES, "UTF-8");
if( preg_match("#[A-Z]+#",$user)||preg_match("#\W+#", $user)||preg_match("#[a-z]+#",$user) )
{header('Location:http://localhost/kwalks/index.php');}
$query = mysql_query(" SELECT id FROM users where id='$user'");
if(!mysql_fetch_array($query)){header('Location:index.php');}
}else{
$user=$_SESSION['user_id'];
}
$my_id=$_SESSION['user_id'];
$username=getuser($user,'username');
?>