<?php
include('connect.php');
include 'function.php';
include ('username.php');?>
<?php
$content=htmlentities($_POST['content'], ENT_QUOTES, "UTF-8");
$sDate = date("Y-m-d H:i:s");
$u_id=$_SESSION['user_id']; 
$id=$_POST['id'];
if($content!='')
{
$frnd_query=mysql_query("SELECT user_one,user_two FROM frnds WHERE id='$id'");
$run_frnd=mysql_fetch_array($frnd_query);
$user_one=$run_frnd['user_one'];
$user_two=$run_frnd['user_two'];
if($user_one == $my_id){
mysql_query("insert into msg(frnd_id,user_id,msg,to_user,u_read,date) values ('$id','$u_id','$content','$user_two','0','$sDate')");
}
else if($user_two == $my_id)
{
 mysql_query("insert into msg(frnd_id,user_id,msg,to_user,u_read,date) values ('$id','$u_id','$content','$user_one','0','$sDate')");
}
}
?>