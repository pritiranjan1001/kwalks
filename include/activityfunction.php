<?php
if( $_POST )
{
$con = mysql_connect("localhost","root","");
if (!$con)
{ die('Could not connect: ' . mysql_error());}
mysql_select_db("mydb", $con);
$name = $_POST['name'];
$act_from = $_POST['act_from'];
$email = $_POST['email'];
$education = $_POST['education'];                      
$website = $_POST['website'];
$query = " INSERT INTO 'mydb'.'activity' ('act_id', 'name', 'act_from','email', 'website') VALUES ('', '$name','$act_from','$email','$education', '$website');";
mysql_query($query);
echo "<h2>Thank you for your Comment!</h2>";
mysql_close($con);
}
?>