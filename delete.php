<?php
include('include/connect.php');
include 'include/function.php';
include ('include/username.php');
if(!isset($_GET['id'])&& empty($_GET['id'])){
header('Location:location:http://localhost/kwalks/profile.php');}
if($_SESSION['user_type']=='u'){
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id']; 
$pos_id=htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
$query=mysql_query("SELECT id from postt where id=('$pos_id')AND user_id=('$u_id')");
if(mysql_fetch_array($query))
{
mysql_query("DELETE FROM postt WHERE id=$pos_id;");
header('location:http://localhost/kwalks/profile.php');
}
else{
header('location:http://localhost/kwalks/profile.php');
}}
else{
header('location:http://localhost/kwalks/profile.php');
}
?>