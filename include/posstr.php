<?php include 'connect.php' ?>
<?php include 'function.php' ?>
<?php
if (isset($_POST['postt'])) {
$postt= stripslashes($_POST['postt']);
$postt=htmlentities($postt, ENT_QUOTES, "UTF-8"); 
if (empty($postt)) {
echo "please enter the text <br/><br/>";
header("location:http://localhost/kwalks/home.php?page=0");
}else{
$sDate = date("Y-m-d H:i:sa");
$u_id=$_SESSION['user_id'];                              
mysql_query("INSERT into postt VALUES('','','$postt','','p','$u_id','$sDate')");
echo"status is updated:<br>"; 
header("location:http://localhost/kwalks/home.php?page=0");
}
}
?>
                               