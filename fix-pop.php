
<?php ob_start();?>
<?php include 'include/function.php' ?>
<?php include 'include/connect.php' ?>
<?php if ($_SESSION['user_type']=='u') {
  $user_id = true;

?>

<!DOCTYPE html>
<html lang="en" class="no-js" >
  
  <head>
  
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="Kwalks, the way you are" />
  <meta name="author" content="kwalks.in" />


  <title>kwalks</title>
  <link href="assets/img/logo6.png" rel="shortcut icon" />

   
   <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/style-kwalk.css" rel="stylesheet" />
  <link href="assets/css/pop-up.css" rel="stylesheet" />
  <link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  </head>
 <body data-spy="scroll" data-target="#menu-section">
 <!--MENU SECTION START-->
    <?php require('include/header.php');?>
    
   
  <!--MENU SECTION END-->




<section>

<!--<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
   <div class="modal img-modal">
      <div class="modal-dialog modal-lg">

          <div class="modal-body">
                           <?php
                            $post_id=mysql_real_escape_string($_GET['id']);
							$post_id=htmlentities($post_id, ENT_QUOTES, "UTF-8");
							 if(preg_match("#\W+#", $post_id)|| preg_match("#[A-Z]+#", $post_id)|| preg_match("#[a-z]+#", $post_id)){header('Location:profile.php');}
                            $u_id=$_SESSION['user_id'];
                           
                            $query1 = mysql_query("SELECT photo,upload_date,user_id,postt,is_img from postt where id=('$post_id')"); 
                            $run=mysql_fetch_array($query1);
                            $img= $run['photo']; 
                            $sDate=$run['upload_date'];
                            $u=$run['user_id']; 
                            $p_des=$run['postt']; 
                            $is_img=$run['is_img'];
							if($u!=$u_id){if(isfrnd($u)==0){header('Location:profile.php');}} 
							 if((($is_img=='i')||($is_img=='k')||($is_img=='c'))){
                            $query2 = mysql_query("SELECT url FROM pro_pic where user_id=$u  ORDER BY id DESC "); 
                                                 $ron=mysql_fetch_array($query2);
                                                 $pic= $ron['url'];
                             }else if(($is_img=='z')){
                                $query2 = mysql_query("SELECT url FROM p_impic where user_id=$u AND cat_ry=1  ORDER BY id DESC "); 
                                                 $ron=mysql_fetch_array($query2);
                                                 $pic= $ron['url'];
                                   }    
                    
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
          
                           ?>  
   
  
                 <div class="col-md-8 modal-image">
                     

                     <?php if($is_img=='i') {?>
                     <img class="img-responsive" src="uploades/album/<?php echo $img ;?>">
                     <?php }else if($is_img=='k') {?>
                      <img class="img-responsive" src="uploades/user_images/<?php echo $img ;?>"> 
					  <?php }else if($is_img=='c'){?>
			          <img class="img-responsive" src="uploades/cover/<?php echo $img ;?>"> 
					  <?php }else if($is_img=='z'){?>
			          <img class="img-responsive" src="uploades/page-album/<?php echo $img ;?>"> 
					 <?php }?>
                     <!--<img class="img-responsive hidden" src="assets/img/1.jpg" />
                     <img class="img-responsive hidden" src="assets/img/2.jpg" />-->
                                
                     <!--<a href="" class="img-modal-btn left"><i class="glyphicon glyphicon-chevron-left"></i></a>
                     <a href="" class="img-modal-btn right"><i class="glyphicon glyphicon-chevron-right"></i></a>-->
          	     </div>
        
        	    <div class="col-md-4 modal-meta">
                 <div class="modal-meta-top">
                       <button type="button" class="close" data-dismiss="modal" onclick="history.go(-1);"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
                        <div class="img-poster clearfix" >
						<?php if((($is_img=='i')||($is_img=='k')||($is_img=='c'))){?>
                            <a href=""><img class="img" src="uploades/user_images/<?php echo $pic;?>"/></a>
                            <strong><a href="profile.php?user=<?php echo $u;?>"><?php echo getusername($u);?></a></strong>
                         <?php }else if(($is_img=='z')){?>
						 <a href=""><img class="img" src="uploades/page-profile/<?php echo $pic;?>"/></a>
                            <strong><a href="photographic_page.php?u_id=<?php echo $u;?>"><?php echo getpagename($u);?></a></strong>
							  <?php }?>
                            <span><?php echo Date1($sDate);?></span>
                        </div>
                   </div><!--end of modal-meta-top-->
                   
        <div class="modal-meta-middle" >
                                      <div class="more-less">
                                <div class="more-block" style="overflow: scroll;">
                         
                                 
                             <h6>

                                  <?php echo wordwrap($p_des,100,"<br>\n",TRUE); ?> 
                                                   
                             </h6>
                              

                                </div> 
                  </div> 
                  <hr>
            
                
                  <ul class="img-comment-list" id="mydiv">
                   
                   
             

                  </ul>
                   
                     
             

   </div>
                     <form  method="post" name="form" id="form2" onsubmit="return false">
                        <?php ob_start();?>
               
                     <div class="modal-meta-bottom">
                        <input type="text" name="content" id="content" autocomplete="off" placeholder="Leave a commment.." maxlength="500" class="ctex" onkeypress="return runScript1(event,<?php echo $post_id;?>)">
                        <input type="submit" id="joi" class="btn submit_button" value="Post" name="submit" onclick="change1(<?php echo $post_id;?>)"/>
                     </div>
             
              </form>         
          	</div> 

        
      </div> 
    </div>
 </div>




</section>




  <?php }else

  {

    header('Location:index.php');

  } ?>



<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->

<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">

$(function(){

// The height of the content block when it's not expanded
var adjustheight = 35;
// The "more" link text
var moreText = "+ See more..";
// The "less" link text
var lessText = "- (close)";

// Sets the .more-block div to the specified height and hides any content that overflows
$(".more-less .more-block").css('height', adjustheight).css('overflow', 'hidden');

// The section added to the bottom of the "more-less" div
$(".more-less").append('<h6 class="continued">...</h6><a href="#" class="adjust"></a>');

$("a.adjust").text(moreText);

$(".adjust").toggle(function() {
    $(this).parents("div:first").find(".more-block").css('height', 'auto').css('overflow', 'visible');
    // Hide the [...] when expanded
    $(this).parents("div:first").find("h6.continued").css('display', 'none');
    $(this).text(lessText);
  }, function() {
    $(this).parents("div:first").find(".more-block").css('height', adjustheight).css('overflow', 'hidden');
    $(this).parents("div:first").find("h6.continued").css('display', 'block');
    $(this).text(moreText);
});
});

</script>
<script type="text/javascript">
          $(document).ready(function () {setInterval(function(){
      $('#mydiv').load('include/com.php?id=<?php echo $_GET['id'];?>');},1000);
          });
 </script>
 <script type="text/javascript"> function change1(i)
{ var param = $("#content").val();
var dataString="id="+i+"&content="+param;
 
    
		
		$.ajax({
			type:"POST",
			url:"include/postcom.php",
			data:dataString,
			success:function(response)
			{document.getElementById("form2").reset();}
		});

    	
}
function runScript1(e,i) {
    if (e.keyCode == 13) {
        
        change1(i);
        return false;
    }
}
</script>

<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>

