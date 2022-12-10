<?php
include 'function.php';
include 'connect.php';
include 'username.php';?>
<?php
if (isset($_POST['submit'])) {
$content=mysql_real_escape_string($_POST['content']);
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id']; 
$pos_id=$_GET['id'];
mysql_query("insert into pg_comm(post_id,comment,user_id,upload_date) values ('$pos_id','$content','$u_id','$sDate')");
header('location:http://localhost/kwalks/page-pop.php?id='.$pos_id);
}?>