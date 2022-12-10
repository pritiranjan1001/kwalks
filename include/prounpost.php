<?php
include 'function.php';include('connect.php');
include ('username.php');
if(isset($_POST['id']))
{
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id']; 
$pos_id=$_POST['id'];
mysql_query("DELETE FROM postt WHERE photo=(SELECT url FROM pro_pic where (id=('$pos_id') ))");                          
}
else
{
header("location:http://localhost/kwalks/index.php");
}
?>