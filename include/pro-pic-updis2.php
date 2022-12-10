<?php
if($user ==$my_id){
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (id),(name) FROM album where user_id=('$u_id')");	
}
else
{
$query = mysql_query(" SELECT (id),(name) FROM album where user_id=$user");
}																					
while ($run=mysql_fetch_array($query)) {
$album_id=$run['id'];
$album_name=$run['name'];
$query1=mysql_query("SELECT (url) FROM photos where (album_id)=($album_id)");
$run1=mysql_fetch_array($query1);
$pic=$run1['url'];
?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 code">
<div class="work-wrapper">
<?php
if($user ==$my_id){
$u_id=$_SESSION['user_id'];
?>
<a class="fancybox-media" title="Image Title Goes Here" href="imgopen12.php?id=<?php echo $album_id;?>">
<?php}else{?>
<a class="fancybox-media" title="Image Title Goes Here" href="imgopen12.php?user_id=$user&id=<?php echo $album_id;?>">  
<?php } ?>
<?php 
if(empty($pic)){
echo "<img src='http://localhost/kwalks/assets/img/1.jpg' class='img-responsive img-rounded' />";
}else
{
?>
<img src="http://localhost/kwalks/uploades/album/<?php echo $pic;?>" class="img-responsive img-rounded" alt="" />
<?php  }  ?>
</a>
<div class="postboxa">
<h4><?php echo $album_name ?></h4>
</div>
</div>
</div>
<?php  } ?>

					
				
		