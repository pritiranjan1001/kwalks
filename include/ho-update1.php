<?php include 'connect.php'; ?>
<?php include 'username.php';
$frind=implode(",",frnd($u_id));
$query = mysql_query(" SELECT COUNT(*) as page FROM postt WHERE user_id IN ($frind)");
$run1=mysql_fetch_array($query);
$p=intval($run1['page']); 
$page=$p/30;
?>
<div class="row text-center animate-in" data-anim-type="fade-in-up" >
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-bottom">
<div class="caegories">
<a href="#" data-filter="*" class="active btn btn-custom btn-custom-two btn-sm">All</a>
<a href="#" data-filter=".recent" class="btn btn-custom btn-custom-two btn-sm">FRIENDS</a>
<a href="#" data-filter=".popular" class="btn btn-custom btn-custom-two btn-sm">PAGES</a>
<a href="#" data-filter=".favourite" class="btn btn-custom btn-custom-two btn-sm" >ADVERTISEMENT</a>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-bottom">
<div>
<?php if($page>1){?>
<?php if($_GET['page']!=0){?>
<h5 class="nextpre">  <a href="home.php?page=<?php echo $_GET['page']-1;?>#work">&larrtl; PREVIOUS</a>&nbsp; ||  &nbsp;</h5>
<?php } ?>
<?php if($_GET['page']<$page-1){?>
<h5><a href="home.php?page=<?php echo $_GET['page']+1;?>#work">NEXT &rarrtl;</a></h5>
<?php } ?>
<?php } ?>
</div>
</div>
</div>	
<div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
<?php
$my_id=$_SESSION['user_id'];
$u_id=$_SESSION['user_id']; 
$sDate1 = date("Y-m-d H:i:s");   
if(intval($page)>=$_GET['page']&&$_GET['page']>=0)
{
$pg=$_GET['page']*30;
}
else{
 $pg=0;
}
$query = mysql_query(" SELECT id,heading,postt,photo,is_img,user_id,upload_date FROM postt WHERE user_id IN ($frind)  ORDER BY id DESC limit $pg,30;");
while ($run=mysql_fetch_array($query)) {
$postt=$run['postt']; 
$sDate=$run['upload_date']; 
$post_id=$run['id'];
$photo=$run['photo'];
$is_img=$run['is_img'];
$heading=$run['heading'];
$u=$run['user_id'];
$query1 = mysql_query("SELECT COUNT(*) as num FROM p_comment where post_id=$post_id  "); 
$run1=mysql_fetch_array($query1);
$num=$run1['num'];
$query2 = mysql_query("SELECT COUNT(*) as num2 FROM likes where post_id=$post_id  "); 
$run2=mysql_fetch_array($query2);
$num2=$run2['num2'];
$query3 = mysql_query("SELECT COUNT(*) as num3 FROM likes where post_id=$post_id&&user_id=$u_id"); 
$run3=mysql_fetch_array($query3);
$num3=$run3['num3'];                
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
                
if($is_img=='p'||$is_img=='e')
{	?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 recent " id="<?php echo $post_id;?>">
<div class="work-wrapper">
<BR>
<h6> <?php echo $Date;?></h6><BR>
<div class="postboxa">
<h5> 
<?php echo nl2br("$postt") ; ?>                          
</h5>
</div>
<h4><BR>
<h6><a href="#" class='' data-toggle="modal" data-target="#likes" id="<?php echo $post_id."1";?>"> <?php echo $num2;?> </a>  : people like this</h6>
<?php ob_start();?>
<?php if($num3==0){?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='like' ></input>
<?php }else{?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='unlike' ></input> 
<?php }?>
<a href="fix-pop-msg.php?id=<?php echo $post_id;?>"  value="comment" class="active btn btn-custom btn-custom-two btn-sm"><?php echo $num;?> comment</a><br>
<?php ob_end_flush();?>
<h6>
<?php if($is_img=='p'){?>
</h6>
<BR>
<a href="profile.php?user=<?php echo $u;?>"><h5><?php echo getusername($u) ; ?></h5> </a>         
<?php }elseif($is_img=='e'){?>	
</h6>
<BR>
<a href="wr-profile.php?u_id=<?php echo $u;?>"><h5><?php echo getpagename($u) ; ?></h5> </a>      
<?php }?>	   					
</div>
</div>
<?php }else if((($is_img=='i')||($is_img=='k')||($is_img=='c'))){?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 recent" id="<?php echo $post_id;?>" >
<div class="work-wrapper">
<a class="" href="fix-pop.php?id=<?php echo $post_id;?>"   data-target="#image-gallery" > 
<?php if($is_img=='i'){?>
<img src="uploades/album/<?php echo $photo ;?>" class="img-responsive img-rounded" />
<?php }else if($is_img=='k'){?>
<img src="uploades/user_images/<?php echo $photo ;?>" class="img-responsive img-rounded" />
<?php }else if($is_img=='c'){?>
<img src="uploades/cover/<?php echo $photo ;?>" class="img-responsive img-rounded" />
<?php }?>
</a> 
<h6><a href="#" class='' data-toggle="modal" data-target="#likes" id="<?php echo $post_id."1";?>"> <?php echo $num2;?> </a>  : people like this</h6>
<?php if($num3==0){?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='like' ></input>
<?php }else{?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='unlike' ></input>
<?php }?>
<a href="fix-pop.php?id=<?php echo $post_id;?>" name="comment" value="comment" class="active btn btn-custom btn-custom-two btn-sm"><?php echo $num;?> comment</a> <br>        
<h6> <?php echo $Date;?>  </h6>
<a href="profile.php?user=<?php echo $u;?>"><h5><?php echo getusername($u) ; ?></h5> </a>   
</div>       
</div>
<?php }else if((($is_img=='m')||($is_img=='n'))){?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 code">
<div class="work-wrapper">
<div class="tab-pane active" id="n1">
<div class="centered">
<h4> <?php echo $heading; ?></h4><hr>
</div>
<div class="light-pricing">
<p><?php if($is_img !='n'){?>
<img img src="uploades/notes/<?php echo $photo ;?>" class="img-responsive"><?php } ?>
<div class="postboxa"><h5> 
<?php echo nl2br("$postt") ; ?> 
</h5></div> 
</p>
<BR> <h6><a href="#" class='' data-toggle="modal" data-target="#likes" id="<?php echo $post_id."1";?>"> <?php echo $num2;?> </a>  : people like this</h6>
<?php if($num3==0){?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='like' ></input>
<?php }else{?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='unlike' ></input>
<?php }?>
<a href="fix-pop-msg.php?id=<?php echo $post_id;?>" name="comment" value="comment" class="active btn btn-custom btn-custom-two btn-sm"><?php echo $num;?> comment</a> <br> 
<a href="profile.php?user=<?php echo $u;?>"><h5><?php echo getusername($u) ; ?></h5> </a>  
</div>
</div>
</div>
</div>
<?php }else if((($is_img=='z'))){?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 popular" id="<?php echo $post_id;?>" >
<div class="work-wrapper">
<a class="" href="fix-pop.php?id=<?php echo $post_id;?>"   data-target="#image-gallery" > 
<img src="uploades/page-album/<?php echo $photo ;?>" class="img-responsive img-rounded" />
</a> 
<h6><a href="#" class='' data-toggle="modal" data-target="#likes" id="<?php echo $post_id."1";?>"> <?php echo $num2;?> </a>  : people like this</h6>
<?php if($num3==0){?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='like' ></input>
<?php }else{?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='unlike' ></input>
<?php }?>
<a href="fix-pop.php?id=<?php echo $post_id;?>" name="comment" value="comment" class="active btn btn-custom btn-custom-two btn-sm"><?php echo $num;?> comment</a> <br>        
<h6> <?php echo $Date;?>  </h6>
<a href="photographic_page.php?u_id=<?php echo $u;?>"><h5><?php echo getpagename($u) ; ?></h5> </a>   
</div>       
</div>				  
<?php }else if((($is_img=='u')||($is_img=='q')||($is_img=='l')||($is_img=='g'))){?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 code">
<div class="work-wrapper">
<div class="tab-pane active" id="n1">
<div class="centered">
<h4><?php echo $heading; ?></h4>
<hr>
</div>
<div class="light-pricing">
<p>
<?php if($is_img =='l'){?>
<img img src="uploades/w-notes/<?php echo $photo ;?>" class="img-responsive"><?php } ?>
<?php if($is_img =='u'){?>
<img img src="uploades/p-notes/<?php echo $photo ;?>" class="img-responsive"><?php } ?>
<div class="postboxa"><h5> 
<?php echo nl2br("$postt") ; ?> 
</h5></div> 
</p>
<BR><h6><a href="#" class='' data-toggle="modal" data-target="#likes" id="<?php echo $post_id."1";?>"> <?php echo $num2;?> </a>  : people like this</h6>
<?php if($num3==0){?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='like' ></input>
<?php }else{?>
<input onclick="change(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='unlike' ></input>
<?php }?>
<a href="fix-pop-msg.php?id=<?php echo $post_id;?>" name="comment" value="comment" class="active btn btn-custom btn-custom-two btn-sm"><?php echo $num;?> comment</a> <br> 
<?php if(($is_img=='u')||($is_img=='q')){?>
<a href="photographic_page.php?u_id=<?php echo $u;?>"><h6><?php echo getpagename($u) ; ?></h6> </a>  
<?php }else if(($is_img=='l')||($is_img=='g')){?>
<a href="wr-profile.php?u_id=<?php echo $u;?>"><h5><?php echo getpagename($u);?></h5> </a> 
<?php }?>
</div>
</div>
</div>
</div>						  
<?php   }  } ?>
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" >
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-bottom">
<?php if($page>1){?>
<?php if($_GET['page']!=0){?>
<h5 class="nextpre"><a href="home.php?page=<?php echo $_GET['page']-1;?>#work">&larrtl; PREVIOUS</a>&nbsp; ||  &nbsp;</h5>
<?php } ?>
<?php if($_GET['page']<$page-1){?>
<h5><a href="home.php?page=<?php echo $_GET['page']+1;?>#work">NEXT &rarrtl;</a></h5>
<?php } ?>
<?php } ?>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-bottom">
</div>






















      





