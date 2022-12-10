<?php
session_start();
function loggedin(){
if (isset($_SESSION['user_id'])&& !empty($_SESSION['user_id'])) {
return true;
}else{
return false;
}
}
function getuser($user_id,$field){
$query=mysql_query("SELECT $field FROM puser WHERE id ='$user_id'");
$run=mysql_fetch_array($query);
return $run[$field];
}
?>