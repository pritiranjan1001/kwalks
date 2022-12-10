<?php ob_start();?>
<?php include 'connect.php';?>
<?php include 'function.php';?>
<?php 
function Date1($sDate)	
{					
$sDate1 = date("Y-m-d H:i:s");
$diff = abs(strtotime($sDate1) - strtotime($sDate));
if($diff<60)
{
$Date=$diff.'s ago';
}
else if($diff>=60&&$diff<3600)
{
$Date=(int)($diff/60).'min ago';
}
else if($diff>=3600&&$diff<86400)
{
$Date=(int)($diff/3600).'hr ago';
}
else if($diff>=86400&&$diff<31536000)
{
$Date=(int)($diff/86400).'day ago';
} 
else 
{
$Date=(int)($diff/31536000).'year ago';
}							 
return $Date;				 
}					
$u_id=$_SESSION['user_id'];
$post_id=$_GET['id'];
$query = mysql_query("SELECT comment,user_id,upload_date FROM p_comment where post_id=$post_id ORDER BY upload_date DESC ");                                                                                                 
while ($run=mysql_fetch_array($query)) {
$postt=$run['comment'];
$u_on=$run['user_id'];
$sDate=$run['upload_date'];															  
?>
<?php 
$query1 = mysql_query(" select username from users where id=$u_on "); 
$run=mysql_fetch_array($query1);
$name=  getusername($u_on);
$query2 = mysql_query("SELECT url FROM pro_pic where user_id=$u_on  ORDER BY id DESC "); 
$ron=mysql_fetch_array($query2);
$pic= $ron['url'];             
?>
<ul class="img-comment-list">
<li>
<div class="comment-img"><img src="uploades/user_images/<?php echo $pic;?>"/></div>
<div class="comment-text"><strong><a href="profile.php?user=<?php echo $u_on;?>"><?php  echo "$name"; ?></a></strong>
<p><?php echo nl2br("$postt"); ?></p><span id="timer"><?php echo Date1($sDate);?></span>
</div>
</li>
</ul>
<?php } ?>
  

      