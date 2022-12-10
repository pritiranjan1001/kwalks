<?php
include 'connect.php';
include 'function.php';
if(isset($_POST['action'])&&isset($_POST['id']))
{
$action = $_POST['action'];
$user =  $_POST['id'];
$my_id = $_SESSION['user_id'];
if($action == 'send'){
mysql_query("INSERT INTO frnd_req VALUES ('','$my_id','$user') ");
}
else if($action == 'cancel'){
mysql_query("DELETE FROM frnd_req WHERE from_me =$my_id AND to_frnd =$user ");
}
else if ($action == 'accept') {
mysql_query("DELETE FROM frnd_req WHERE from_me =$user  AND to_frnd =$my_id ");
mysql_query("INSERT INTO frnds VALUES ('','$user','$my_id')");
}
else if($action == 'unfrnd'){
mysql_query("DELETE FROM frnds WHERE (user_one=$my_id AND user_two=$user) OR (user_one=$user AND user_two=$my_id) ");
}
else if ($action == 'ignore') {
mysql_query("DELETE FROM frnd_req WHERE from_me =$user  AND to_frnd =$my_id ");
}
}
else
{
header('Location:http://localhost/kwalks/index.php');
} 
?>