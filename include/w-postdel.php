<?php
include 'function.php';
include('connect.php');
include ('username.php');
if(!isset($_GET['id'])&& empty($_GET['id']) ){
header('Location:wr-post-col.php');}
if($_SESSION['user_type']=='w'){
$sDate = date("Y-m-d H:i:s");
$u_id=$_SESSION['user_id']; 
$pos_id=htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
mysql_query("DELETE FROM postt WHERE id=$pos_id AND user_id=$u_id ;");
header('location:http://localhost/kwalks/wr-post-col.php');
}else{
header('location:http://localhost/kwalks/index.php');
}
?>