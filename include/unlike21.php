<?php
include('connect.php');
include 'function.php';
include ('username.php');
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id']; 
if(isset($_POST['id']))
{
$pos_id=$_POST['id'];
mysql_query("DELETE FROM likes WHERE user_id = $u_id&&post_id=$pos_id;");
$query3 = mysql_query("SELECT COUNT(*) as num3 FROM likes where post_id=$pos_id"); 
$run3=mysql_fetch_array($query3);
$num3=$run3['num3'];
echo $num3;	
}else{header("location:http://localhost/kwalks/index.php");}?>