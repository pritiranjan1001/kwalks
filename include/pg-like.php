<?php
include('connect.php');
include 'function.php';
include ('username.php');
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id']; 
$pos_id=$_GET['id'];
$user1 =$_GET['u'];
$query3 = mysql_query("SELECT COUNT(*) as num3 FROM pg_like where post_id=$pos_id&&user_id=$u_id"); 
$run3=mysql_fetch_array($query3);
$num3=$run3['num3'];
if($num3==0){
mysql_query("insert into pg_like(post_id,user_id,time) values ('$pos_id','$u_id','$sDate')");
}
header('location:http://localhost/kwalks/home.php?user='.$user1.'#'.$pos_id);
?>