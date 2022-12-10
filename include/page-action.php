<?php
include'page-function.php';
include'connect.php';
$my_id=$_SESSION['user_id'];
if(isset($_POST['id']))
{
$action=$_POST['action'];
$u_id=$_POST['id'];
if ($action =='follow') {
mysql_query("INSERT INTO follow VALUES ('','$my_id','$u_id') ");
}
if ($action =='unfollow') {
mysql_query("DELETE FROM follow WHERE user_one=$my_id AND user_two=$u_id ");
}
}
else
{
header('Location:http://localhost/kwalks/index.php');
}
?>