<?php
include('connect.php');
include 'function.php';
include ('username.php');?>
<?php
$sDate = date("Y-m-d H:i:s");
$u_id=$_SESSION['user_id']; 
$pos_id=$_POST['id'];                 
if($_POST['content']!="")
{
$content=htmlentities($_POST['content'], ENT_QUOTES, "UTF-8");
mysql_query("insert into p_comment(post_id,comment,user_id,upload_date) values ('$pos_id','$content','$u_id','$sDate')");
}
?>
