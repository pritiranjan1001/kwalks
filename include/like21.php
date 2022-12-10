<?php
include('connect.php');
include 'function.php';
include ('username.php');
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id']; 
$pos_id=$_POST['id'];
$query3 = mysql_query("SELECT COUNT(*) as num3 FROM likes where post_id=$pos_id&&user_id=$u_id"); 
$run3=mysql_fetch_array($query3);
$num3=$run3['num3'];
if($num3==0){
mysql_query("insert into likes(post_id,user_id,time) values ('$pos_id','$u_id','$sDate')");
}
$query3 = mysql_query("SELECT COUNT(*) as num3 FROM likes where post_id=$pos_id"); 
$run3=mysql_fetch_array($query3);
$num3=$run3['num3'];
echo $num3;
?>