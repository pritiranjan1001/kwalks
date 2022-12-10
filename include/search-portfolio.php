<?php include 'function.php';?>
<?php include 'connect.php';?>
<?php include ('username.php'); ?>
<?php
$output='';
if(isset($_POST['searchVal'])){
$searchq =$_POST['searchVal'];
$searchq =preg_replace("#[^0-9a-z]#i", "", $searchq);
$mem_query=mysql_query(" SELECT * FROM puser where portfolio LIKE '%$searchq%' ") or die("could not connect");
$count =mysql_num_rows($mem_query);
if ($count == 0) {
$output='SORRY !!!! we can not find';
}else{
while ($run_mem=mysql_fetch_array($mem_query)) {
$portfolio=$run_mem['portfolio'];
$user_id=$run_mem['id'];
$act=$run_mem['act'];
if($act=='p') {
$query = mysql_query(" SELECT (url) FROM p_impic where user_id=('$user_id') and cat_ry=1 ORDER BY id DESC "); 
} else if($act=='w') {
$query = mysql_query(" SELECT (url) FROM w_profile where user_id=('$user_id')  ORDER BY id DESC ");     
}
$row=mysql_fetch_array($query);
$pic=$row['url'];                                
echo "
<div class='seop'>";
if($act=='p') {
echo"<img src='http://localhost/kwalks/uploades/page-profile/$pic' class='spic' /> 
<div class='sname'>
<a href='http://localhost/kwalks/photographic_page.php?u_id=$user_id'> $portfolio</a>
</div>";
 } else if($act=='w') {
echo "<img src='http://localhost/kwalks/uploades/w-profile/$pic' class='spic' /> 
<div class='sname'>
<a href='wr-profile.php?u_id=$user_id'> $portfolio</a>
</div>";   
}
echo"</div>";} }echo($output);}?>