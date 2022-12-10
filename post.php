<?php
include 'include/connect.php';
include 'include/function.php';
include 'include/username.php';
$sDate = date("Y-m-d H:i:sa");
if(isset($_POST['id']))
{
$u_id=$_SESSION['user_id']; 
$pos_id=$_POST['id'];
if($_POST['type']=='u')
{
$qry=mysql_query("SELECT name,url FROM photos where (id=('$pos_id') )");
}
else if($_POST['type']=='p')
{
$qry=mysql_query("SELECT name,url FROM p_photos where (id=('$pos_id') )");
}
$row=mysql_fetch_array($qry);
$name=$row['name'];
$pic=$row['url'];
if($_POST['type']=='u')
{
mysql_query("INSERT INTO postt VALUES ('','','$name','$pic','i','$u_id','$sDate') ");
}
else if($_POST['type']=='p')
{
mysql_query("INSERT INTO postt VALUES ('','','$name','$pic','z','$u_id','$sDate') ");
}                           
}
else
{
header("location:http://localhost/kwalks/index.php");
}
?>