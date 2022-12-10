<?php ob_start();?>
<?php include 'connect.php' ?>
<?php include 'function.php' ?>
 <ul class="img-comment-list">
<?php 
 function Date1($sD)	
{					
$sDate1 = date("Y-m-d H:i:s");
$diff = abs(strtotime($sDate1) - strtotime($sD));
if($diff<=59)
{
$Date=(int)($diff/10).'0s ago';
}
else if(($diff>=60)&&($diff<=3599))
{
$Date=(int)($diff/60).'min ago';
}
else if(($diff>=3600)&&($diff<86399))
{
$Date=(int)($diff/3600).'hr ago';
}
else
{
$Date='on '.date("d-m-Y", strtotime($sD));
} 
return $Date;				 
}					
$u_id=$_SESSION['user_id'];
$post_id=$_GET['id'];
$len=$_GET['len'];
$i=0;
mysql_query("UPDATE msg SET u_read='2'WHERE  to_user=('$u_id') AND frnd_id=('$post_id') ");
$query = mysql_query("SELECT msg,user_id,date,u_read FROM msg where frnd_id=$post_id  ORDER BY id DESC limit $len");    
while ($run=mysql_fetch_array($query)) {
$postt=$run['msg'];
$u_on=$run['user_id'];
$sDate=$run['date'];															  
$u_read=$run['u_read'];
$i++;
?>
<?php 
$query1 = mysql_query(" select username from users where id=$u_on "); 
$run=mysql_fetch_array($query1);
$name= $run['username'];
$query2 = mysql_query("SELECT url FROM pro_pic where user_id=$u_on  ORDER BY id DESC "); 
$ron=mysql_fetch_array($query2);
$pic= $ron['url'];             
?>
<li>
<?php if($u_on==$u_id){ ?>
<div class="selfChat">
<div class="tri-right">
<div class="comment-text">
<p><?php echo nl2br("$postt"); ?></p> <span class="date sub-text"> <?php echo Date1($sDate);?>  &nbsp;   <?php if($u_read==0){echo '<div class="date sub-text" style="color:#e14747;">unread</div>';}?> <?php if($u_read==1){echo '<div class="date sub-text" style="color:#3cb142;">view</div>';}?> <?php if($u_read==2){echo  '<div class="date sub-text" style="color:#3c63b1;">read</div>';}?></span>
<div class="comment-img"> <a href="profile.php?user=<?php echo $u_on;?>"><?php echo getusername($u_id) ; ?></a> </div>
</div>
</div>
</div>
<?php }else{ ?>
<div  class="frndChat">
<div class="tri-left">
<div class="comment-text">
<p><?php echo nl2br("$postt"); ?></p> <span class="date sub-text"> <?php echo Date1($sDate);?>  &nbsp;   <?php if($u_read==0){echo '<div class="date sub-text" style="color:#e14747;">unread</div>';}?> <?php if($u_read==1){echo '<div class="date sub-text" style="color:#3cb142;">view</div>';}?> <?php if($u_read==2){echo  '<div class="date sub-text" style="color:#3c63b1;">read</div>';}?></span>
<div class="comment-img"><a href="profile.php?user=<?php echo $u_on;?>"><?php echo getusername($u_on) ; ?></a></div>
</div>
</div>
<?php } ?>
</li>
<?php    }if($i>50){ ?>
<a  onclick="document.getElementById('field1').value=parseInt(document.getElementById('field1').value)+10;"  class="active btn btn-custom btn-custom-two btn-sm">more</a>
<?php    } ?>
</ul>
          
          