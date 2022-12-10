<?php ob_start();?>
<?php include 'include/function.php';?>
<?php include 'include/connect.php';?>
<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="Kwalk, the way you are" />
<meta name="author" content="kwalk.in" />
<title>Albums</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/slideUp.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href="assets/css/msg.css" rel="stylesheet" />
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include('include/header.php');?>
<?php include('include/connect.php');?>
<?php include ('include/username.php'); ?>
<div class="modal img-modal">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-meta-top">
<div class="img-poster clearfix">
<a href=""><img class="img" src="assets/img/team/1.jpg"/></a>
<strong><a href=""><?php echo "$username";?></a></strong>
<span>12 minutes ago </span>
 <hr>
 </div>
    
  </div>
    <div class="col-md-12 modal-meta">          
        <div class="modal-meta-middle">
                  <ul class="img-comment-list">                    
                                             

                              <?php echo "hello";
                             
                              if((isset($_POST['comment']) OR !isset($_POST['comment'])))
                              {
                                 $u_id=$_SESSION['user_id'];
                                 $post_id=$_GET['id'];
                                 echo "hello";
                                 $query = mysql_query(" SELECT comment,p_id FROM p_comment where post_id=$post_id");                                                                                                 
                                                              while ($run=mysql_fetch_array($query)) {
                                                              $postt=$run['comment']; 
   
                                               echo "               <div class='showbox'>
                                                                           <li>
                                                                              <div  class='comment-img'>
                                                                                   <img src='assets/img/team/3.jpg'>
                                                                              </div>
                                                                              <div  class='comment-text'>
                                                                         <strong><a href=''>$username</a></strong>
                                                                              <p>$postt</p> <span>on March 5th, 2014</span>
                                                                              </div>
                                                                           </li>  
                                                                     </div> ";

                                                                    }  
                                                            }                      
                              ?>
             
           </div>


               
                <div id="flash" align="left"></div>
                 <div id="show" align="left"></div>
               </ul>
          
         
          </div>

            </div> 


             <form  method="post" name="form" action="postcom.php?id=<?php echo $post_id;?>">

                    <div class="modal-meta-bottom">
                      <div class="xbottomx">
                        <textarea name="content" id="content"  placeholder="Leave a commment.." class="ctex"></textarea>
                      <BR>
                        <input type="submit" id="joi" class="btn submit_button" value="Post" name="submit"/>
                      </div>  
                    </div>
              </form>


  
      </div>
   
  </div>
</div>




