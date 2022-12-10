<?php
include('connect.php');
include 'function.php';
include ('username.php');
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id']; 
$pos_id=$_GET['id'];
$user1 =$_GET['u'];
mysql_query("DELETE FROM pg_like WHERE user_id = $u_id&&post_id=$pos_id;");
header('location:http://localhost/kwalks/home.php?user='.$user1.'#'.$pos_id);
?>