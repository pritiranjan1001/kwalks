<?php
if (isset($_POST['submit'])) {
$fname= stripslashes($_POST['fname']);
$lname=stripslashes($_POST['lname']); 
$birthday=stripslashes($_POST['birthday']);
$gender= stripslashes($_POST['gender']);
$mno=stripslashes($_POST['mno']); 
$u_id=$_SESSION['user_id'];
if (empty($fname) or empty($lname) or empty($birthday)  or empty($gender) ) {
$message="please fill the fields";}
else if( preg_match("#\W+#", $fname)||preg_match("#[0-9]+#", $fname)||preg_match("#\W+#", $lname)||preg_match("#[0-9]+#", $lname)) {
$message= "Frist name/Last name must not contain symbol/number";}
else if( !preg_match("#[0-9]+#", $mno)||preg_match("#\W+#", $mno)||preg_match("#[A-Z]+#", $mno)||preg_match("#[a-z]+#", $mno)||strlen($mno) < 10) {
$message= "Give valid number";
}else{
mysql_query("INSERT INTO about VALUES ('','description','about me...','$u_id') ");
mysql_query("INSERT INTO activity VALUES ('','address/location/country'','','$u_id') ");      
mysql_query(" INSERT into user_data VALUES ('','$fname','$lname','$birthday','$gender','$mno','$u_id')");
mysql_query("UPDATE users SET ver='2'WHERE  id=('$u_id')");
if($gender=='m'){
mysql_query("INSERT INTO pro_pic VALUES ('','male.jpg','$u_id') "); 
}else if($gender=='f'){
 mysql_query("INSERT INTO pro_pic VALUES ('','female.jpg','$u_id') ");  
}
$message="now you can loggedin";
$date=date("Y-m-d h:i:s");
mysql_query("UPDATE login SET logint='$date',login='1' WHERE  id=('$u_id')");
header("location:http://localhost/kwalks/profile.php");
ob_end_flush();
}
echo "<div>$message</div>";
}
?>