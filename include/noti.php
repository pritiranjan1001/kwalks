<?php
include('connect.php');
include 'function.php';
include ('username.php');
$my_id = $_SESSION['user_id'];
$query=mysql_query("SELECT COUNT(*) as num2 FROM frnd_req WHERE to_frnd='$my_id'");
$run= mysql_fetch_array($query);
$C=$run['num2'];
?>
<?php echo $C;?>