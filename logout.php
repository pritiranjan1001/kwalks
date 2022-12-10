<?php include 'include/connect.php';?>
<?php include 'include/function.php';?>
<?php
$u_id=$_SESSION['user_id'];
$date=date("Y-m-d h:i:s");
mysql_query("UPDATE login SET logoutt='$date',login='0' WHERE  id=('$u_id')");
if(session_destroy())
{
header("location:index.php"); 
}
else{
header("location:logout.php");
}
?>
