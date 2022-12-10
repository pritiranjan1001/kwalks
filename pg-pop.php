
<?php ob_start();?>
<?php include'include/connect.php';?>

                <?php
             
                if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
                    $u_id=$_GET['u_id'];
                 require 'include/function.php';
   
                
                 }else{
   
                   require 'include/page-function.php';
            
                }
                        
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js" >
  
  <head>
  
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="Kwalks, the way you are" />
  <meta name="author" content="kwalks.in" />


  <title>Albums</title>

  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!--<link href="assets/css/animations.min.css" rel="stylesheet" />-->
  <link href="assets/css/style-kwalk.css" rel="stylesheet" />
  <link href="assets/css/pop-up.css" rel="stylesheet" />
  <link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  </head>
 <body data-spy="scroll" data-target="#menu-section">

<?php
                $my_id=$_SESSION['user_id'];
                if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
                    $u_id=$_GET['u_id'];
                 echo(include 'include/header.php');
                }else{
                    $u_id=$_SESSION['user_id'];
                    echo(include 'include/page-header.php');
                }
                        
                ?>


 <?php include ('include/username.php'); ?>

  <?php if ($_SESSION['user_id']) {
  $user_id = true;

    ?>


<section>


   <div class="modal img-modal">
      <div class="modal-dialog modal-lg">

          <div class="modal-body">
                           <?php
                            $post_id=$_GET['id'];
                            $u_id=$_SESSION['user_id'];
                            $i=$_GET['i'];
                             $query1 = mysql_query("SELECT url from p_photos where id=('$post_id')"); 
                             $run=mysql_fetch_array($query1);
                             $img= $run['url']; 
                             ?>   
  
                 <div class="col-md-8 modal-image">
                     


                     <img class="img-responsive" src="uploades/page-album/<?php echo $img ;?>">
                     

                    
          	     </div>
        
        	    <div class="col-md-4 modal-meta">
                 <div class="modal-meta-top">
                       <button type="button" class="close" data-dismiss="modal"><a href="javascript:window.history.go(<?php echo $i?>)"><span aria-hidden="true">X</span></a><span class="sr-only">Close</span></button>
                        <div class="img-poster clearfix" >
                            <a href=""><img class="img-circle" src="assets/img/team/1.jpg"/></a>
                            <strong><a href=""><?php echo $username;?></a></strong>
                             
                            <span>12 minutes ago</span>
                        </div>
                   </div>
                   
        <div class="modal-meta-middle">
                                      <div class="more-less">
                                <div class="more-block" style="overflow: scroll;">
                         
                                 
                             <h6>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
                            euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                             quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.                             
                             </h6>
                              

                                </div> 
                  </div> 
                  <hr>


                    <?php 

                              if((isset($_POST['comment']) OR !isset($_POST['comment'])))
                              {
                                 $u_id=$_SESSION['user_id'];
                                 $post_id=$_GET['id'];
                          
                                $query = mysql_query(" SELECT comment,p_id FROM pg_comm where post_id=$post_id");                                                                                                 
                                while ($run=mysql_fetch_array($query)) {
                                $postt=$run['comment']; 
   
                                                                 
                                                                           
                   ?> 

                  
                                <?php 
                             
                                 
                                 $query = mysql_query(" SELECT comment,user_id FROM pg_comm where post_id=$post_id ");                                                                                                 
                                                              while ($run=mysql_fetch_array($query)) {
                                                              $postt=$run['comment'];
                                                              $u_on=$run['user_id']; 
                                                 $query1 = mysql_query(" select username from users where id=$u_on "); 
                                                 $run=mysql_fetch_array($query1);
                                                 $name= $run['username'];

                                                 $query2 = mysql_query("SELECT url FROM pro_pic where user_id=$u_on  ORDER BY id DESC "); 
                                                 $ron=mysql_fetch_array($query2);
                                                 $pic= $ron['url'];                                                                                                                

                                  ?>

                 <form method="post" action="" enctype="multipart/form-data">
                  <ul class="img-comment-list">
                   
                   
                    <li>
                        <div class="comment-img">
                         <img src="user_images/<?php echo $pic;?>"/>
                        </div>
                        <div class="comment-text">
                            <strong><a href=""><?php  echo "$name"; ?></a></strong>
                            <p><?php echo nl2br("$postt"); ?></p> <span>on March 5th, 2014</span>          
                        </div>
                    </li>

                 </ul>
                   <?php  }  }  } ?>
                     
                </form> 

   </div>
                     <form  method="post" name="form" action="page-comm.php?id=<?php echo $post_id;?>">
                        <?php ob_start();?>
                     <div class="modal-meta-bottom">
                        <input type="text" name="content" id="content"  placeholder="Leave a commment.." class="ctex">
                        <input type="submit" id="joi" class="btn submit_button" value="Post" name="submit"/>
                     </div>
                     <?php  //header("location:profile.php");
                        ob_end_flush();?>
                      
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





<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">

$(function(){

// The height of the content block when it's not expanded
var adjustheight = 59;
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


<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<!--<script src="assets/js/animations.min.js"></script>-->
<script src="assets/js/custom-solid.js"></script>

