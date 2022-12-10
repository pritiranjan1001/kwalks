<?php
include 'function.php';
include('connect.php');
include ('username.php');
$sDate = date("Y-m-d H:i:sa");
if(isset($_POST['id']))
{
$u_id=$_SESSION['user_id'];
$pos_id=$_POST['id'];
$qry=mysql_query("SELECT url FROM pro_pic where (id=('$pos_id') )");
$row=mysql_fetch_array($qry);
$pic=$row['url'];
mysql_query("INSERT INTO postt VALUES ('','','','$pic','k','$u_id','$sDate') ");                            
}
else
{
header("location:http://localhost/kwalks/index.php");
}
?>