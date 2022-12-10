<?php include 'include/function.php';
include('include/connect.php');
include ('include/username.php');
if(isset($_POST['id']))
{
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id']; 
$pos_id=$_POST['id'];
if($_POST['type']=='u')
{
mysql_query("DELETE FROM postt WHERE photo=(SELECT url FROM photos where (id=('$pos_id') ))");
}
else if($_POST['type']=='p')
{
mysql_query("DELETE FROM postt WHERE photo=(SELECT url FROM p_photos where (id=('$pos_id') ))");
}                           
}
else
{
header("location:http://localhost/kwalks/index.php");
}
?>