<?php
include('connect.php');
include 'function.php';
include ('username.php');
$my_id = $_SESSION['user_id'];
$date=date("Y-m-d h:i:s");
mysql_query("UPDATE login SET logoutt='$date' WHERE  id=('$my_id')");
$query1=mysql_query("SELECT COUNT(id) as num2 FROM msg WHERE to_user='$my_id' AND u_read='0'");
$run1= mysql_fetch_array($query1);
$C2=$run1['num2'];
?>
<?php echo $C2;?>