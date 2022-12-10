<?php include 'function.php';?>
<?php include 'connect.php';?>
<?php include ('username.php');?>
<?php
$output='';
if(isset($_POST['searchVal'])){
$searchq =$_POST['searchVal'];
$searchq =preg_replace("#[^0-9a-z]#i", "", $searchq);
$searchq=htmlentities($searchq, ENT_QUOTES, "UTF-8");
$mem_query=mysql_query(" SELECT * FROM user_data where concat_ws('',fname,lname) LIKE '%$searchq%' ") or die("could not connect");
$count =mysql_num_rows($mem_query);
if ($count == 0) {
$output='SORRY !!!! we can not find';
}else{
while ($run_mem=mysql_fetch_array($mem_query)) {
$fname=$run_mem['fname'];
$lname=$run_mem['lname'];
$user_id=$run_mem['user_id'];
$query = mysql_query(" SELECT (id),(url) FROM pro_pic where user_id=('$user_id') ORDER BY id DESC ");    
$row=mysql_fetch_array($query);
$pic=$row['url'];                                
echo "<div class='seop'>
<img src='http://localhost/kwalks/uploades/user_images/$pic' class='spic' />  
<div class='sname'>
<a href='profile.php?user=$user_id'> $fname&nbsp;$lname</a>
</div></div>";} }echo($output);}?>