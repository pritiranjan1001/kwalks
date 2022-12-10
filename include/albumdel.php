<?php
include 'connect.php';
include 'function.php';
include 'username.php';
if(!isset($_GET['id'])&& empty($_GET['id']) && !isset($_GET['aid'])&& empty($_GET['aid'])){
header('Location:http://localhost/kwalks/album.php');}
if($_SESSION['user_type']=='u'){
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id']; 
$pos_id=htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
$query=mysql_query("SELECT url from photos where id=$pos_id AND user_id=$u_id");
if($run=mysql_fetch_array($query))
{
$a=$_GET['aid'];
$url=$run['url'];
mysql_query("DELETE FROM photos WHERE id=$pos_id;");
mysql_query("DELETE FROM postt WHERE photo='$url';");
header('location:http://localhost/kwalks/imgopen12.php?id='.$a);
}
else{
header('location:http://localhost/kwalks/profile.php');
}}
else{
header('location:http://localhost/kwalks/profile.php');
}
?>