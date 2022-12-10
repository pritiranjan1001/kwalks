<?php
include('connect.php');
include 'function.php';
include ('username.php');?>
<?php
if(isset($_POST['content']))
{
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (id) FROM postt");
while ($run=mysql_fetch_array($query)) {
$post_id=$run['id'];
}                               			
$content=mysql_real_escape_string($_POST['content']);
$sDate = date("Y-m-d H:i:s");
$u_id=$_SESSION['user_id']; 
$pos_id=$post_id;
mysql_query("insert into p_comment(post_id,comment,user_id,upload_date) values ('$pos_id','$content','$u_id','$sDate')");
$fetch= mysql_query("SELECT comment,p_id FROM p_comment order by p_id desc");
$row=mysql_fetch_array($fetch);
}
?>
<div class="showbox">
<li>
<div  class='comment-img'><img src='assets/img/team/3.jpg'></div>
<div  class='comment-text'>
<strong><a href=''><?php echo "$username";?></a></strong>
<h6><?php echo $row['comment']; ?></h6>
<?php echo "$post_id"; ?>
<span>on March 5th, 2014</span>
</div>
</li> 
</div>


               