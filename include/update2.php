 <?php ob_start();?>
 <?php include ('include/username.php'); ?>
 <?php include 'include/connect.php'; ?>
 <?php               
 $u_id=$_SESSION['user_id']; 
if($user ==$my_id){     
$u=getusername($my_id);
$query = mysql_query(" SELECT id,postt,photo,is_img,user_id,upload_date FROM postt where user_id=('$u_id') and is_img IN ( 'c', 'k', 'i','p' ) ORDER BY id DESC;");
}else{
$u=getusername($user);
$query = mysql_query(" SELECT id,postt,photo,is_img,user_id,upload_date FROM postt where user_id=('$user') and is_img IN ( 'c', 'k', 'i','p' ) ORDER BY id DESC; ");  
}                                           
while ($run=mysql_fetch_array($query)) {
$postt=$run['postt']; 
$sDate=$run['upload_date']; 
$post_id=$run['id'];
$photo=$run['photo'];
$is_img=$run['is_img'];
$query1 = mysql_query("SELECT COUNT(*) as num FROM p_comment where post_id=$post_id"); 
$run1=mysql_fetch_array($query1);
$num=$run1['num'];
$query2 = mysql_query("SELECT COUNT(*) as num2 FROM likes where post_id=$post_id"); 
$run2=mysql_fetch_array($query2);
$num2=$run2['num2'];
$query3 = mysql_query("SELECT COUNT(*) as num3 FROM likes where post_id=$post_id&&user_id=$u_id"); 
$run3=mysql_fetch_array($query3);
$num3=$run3['num3'];
$sDate1 = date("Y-m-d H:i:s");
$diff = abs(strtotime($sDate1)-strtotime($sDate));
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
if($is_img=='p')
{		
?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 recent " id="<?php echo $post_id;?> " >
<div class="work-wrapper"><BR>
<h6><?php echo $Date;?></h6>
<div class="postboxa">
<h5><?php echo nl2br("$postt");?></h5>
</div><BR>
<h6><a href="#" class='' data-toggle="modal" data-target="#likes" id="<?php echo $post_id."2";?>"> <?php echo $num2;?> </a>  : people like this</h6>
<?php ob_start();?>
<?php if($num3==0){?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='like' ></input>
<?php }else{?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='unlike' ></input>
<?php }?>
<a href="fix-pop-msg.php?id=<?php echo $post_id;?>"  value="comment" class="active btn btn-custom btn-custom-two btn-sm"><?php echo $num;?> comment</a><br>
<?php if($user==$my_id){?>
<h6>
<a href="delete.php?id=<?php echo $post_id;?>" name= "delete"   class="">delete</a>
</h6>
<?php }?>
<div class="postboxa">
<h5><?php echo $u ; ?></h5>
</div>
<h6> <?php echo $Date;?></h6>	            
<?php ob_end_flush();?>
<BR>
</div>
</div>
<?php } else if(($is_img=='i')||($is_img=='k')||($is_img=='c')){ ?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 favourite" id="<?php echo $post_id;?>">
<div class="work-wrapper">
<a class="fancybox-media" title="Image Title Goes Here" href="fix-pop.php?id=<?php echo $post_id;?>">
<?php if($is_img=='i'){?>
<img src="uploades/album/<?php echo $photo ;?>" class="img-responsive img-rounded" />
<?php }else if($is_img=='k'){?>
<img src="uploades/user_images/<?php echo $photo ;?>" class="img-responsive img-rounded" />
<?php }else if($is_img=='c'){?>
<img src="uploades/cover/<?php echo $photo ;?>" class="img-responsive img-rounded" />
<?php }?>
</a> 
<h6><a href="#" class='' data-toggle="modal" data-target="#likes" id="<?php echo $post_id."2";?>"> <?php echo $num2;?> </a>  : people like this</h6>
<?php ob_start();?>
<?php if($num3==0){?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='like' ></input>
<?php }else{?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='unlike' ></input>
<?php }?>
<a href="fix-pop.php?id=<?php echo $post_id;?>" name="comment" value="comment" class="active btn btn-custom btn-custom-two btn-sm"><?php echo $num;?> comment</a> <br>        
<?php ob_end_flush();?>
<h6>
<?php if($user ==$my_id){?>
<a href="delete.php?id=<?php echo $post_id;?>" name= "delete" class="">delete</a>
<?php }?>
</h6>
<div class="postboxa">
<h5><?php  echo $u ; ?></h5>
</div>
<h6> <?php echo $Date;?></h6>
</div>       
</div>
<?php  } } ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript"> function change(e,i)
{ var dataString="id="+i;
 var d="#"+i+"2";
    if(e.value=="like")
	{
		e.value="unlike";
		$.ajax({
			type:"POST",
			url:"include/like21.php",
			data:dataString,
			success:function(response)
			{$(d).text(response);}
		});
	}	
    else if(e.value=="unlike")
	{
		e.value="like";
				$.ajax({
			type:"POST",
			url:"include/unlike21.php",
			data:dataString,
			success:function(response)
			{$(d).text(response);}
		});
	}		
}
</script>    