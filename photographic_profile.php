<?php ob_start();?>
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
require 'include/function.php';
}else{
require 'include/page-function.php';
}
if(($_SESSION['user_type']=='p')|| ($_SESSION['user_type']=='u'&& isset($_GET['u_id'])&& !empty($_GET['u_id'])))      
{		      
?><?php include'include/connect.php';?>
<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="Kwalks, the way you are" />
<meta name="author" content="kwalks.com" />
<title>kwalks</title>
<link href="assets/img/logo6.png" rel="shortcut icon" />
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/slideUp.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href="assets/css/pagealbum.css" rel="stylesheet" />
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php
$my_id=$_SESSION['user_id'];
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id= stripslashes($_GET['u_id']);
$u_id=htmlentities($u_id, ENT_QUOTES, "UTF-8");
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
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="maxio"></div></div>
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="panel-body"> 
<h5>Wish to change the COVER image :</h5>
<BR>
<form name="upload-img1" enctype='multipart/form-data' action="" method='post'>
<?php
$name = '';
$type = '';
$size = ''; 
$error = '';
function compress_image($source_url, $destination_url, $quality)
{
$info = getimagesize($source_url); if ($info['mime'] == 'image/jpeg') 
$image = imagecreatefromjpeg($source_url); elseif ($info['mime'] == 'image/gif') 
$image = imagecreatefromgif($source_url); elseif ($info['mime'] == 'image/png')
$image = imagecreatefrompng($source_url); imagejpeg($image, $destination_url, $quality); 
return $destination_url; } if (isset($_POST['upload-img1']))
{ 
if ($_FILES["files"]["error"] > 0) 
{
$error = "please input an image";
}else if($_FILES['files']['size']>4194304){$error = "size must be less than 4MB";}  
else if (($_FILES["files"]["type"] == "image/gif") || ($_FILES["files"]["type"] == "image/jpeg") || ($_FILES["files"]["type"] == "image/png") || ($_FILES["files"]["type"] == "image/pjpeg")) 
{
if (isset($_POST['upload-img1'])) {                              
$random_name=rand();
$eimg=sha1($username.$random_name);                                                           
$file=$_FILES['files']['name'];
$file_type=$_FILES['files']['type'];
$file_size=$_FILES['files']['size'];
$url = 'uploades/p-cover/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["files"]['tmp_name'], $url, 70); 
header("Content-Transfer-Encoding: binary");
$sDate = date("Y-m-d H:i:s");                   
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/p-cover/'.$eimg.'.jpg');
mysql_query("INSERT INTO cvr_pic VALUES ('','$eimg.jpg','$u_id') ");
echo"image uploaded <br/><br/>";
} else  { 
$error = "Uploaded image should be jpg or gif or png"; } } 
echo $error."<br/><br/>";
}                                 
?>
<h6> <input type="file" class="imgx"  accept="image/*" name="files">  </input> </h6> 
<input class="btn button-custom btn-custom-three" name="upload-img1" type="submit" value="upload">
</form>
</div>
</div>
</div>
</div>
<section id="work" >
<?php
if($user==$my_id){
$query = mysql_query(" SELECT (id),(url) FROM  cvr_pic where user_id=('$u_id') ORDER BY id DESC");  
}else{ 
$query = mysql_query(" SELECT (id),(url) FROM  cvr_pic where user_id=('$user') ORDER BY id DESC"); 
}   
$row=mysql_fetch_array($query);                         
$pic=$row['url'];                                                     
?>
<br><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="maxio"><br></div></div>
<div class="coverbox" style="background-image:url('uploades/p-cover/<?php echo $pic;?>')">
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
echo"<div class='covericon'>
<div class='write'><a href='photographic_page.php?u_id=$u_id'>go to home <i class='fa fa-home'></i></a></div>
</div>";
}else{
$u_id=$_SESSION['user_id'];
echo" <div class='text'>
<a href='' class='btn button-custom btn-custom-three' data-toggle='modal' data-target='#myModal'>change image </a>
</div>";
?>
</div> 
<div class="covericon">
<div class="write"><a href="photographic_page.php">go to home <i class="fa fa-home"></i></a></div>
</div>
<?php } ?>
</section>
<section id="work" >
<div class="container">
<div class="row text-center animate-in" data-anim-type="fade-in-up" >
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-bottom">
<?php
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
echo"<div class='reupdates'><h4>RECENT  UPDATES /HISTORIES<div class='write1'>
<a href='photographic_page.php?u_id=$u_id'>go to home <i class='fa fa-home'></i></a></div>
</h4>";
}else{
$u_id=$_SESSION['user_id'];
echo"<div class='reupdates'><h4>RECENT  UPDATES /HISTORIES<div class='write1'>
<a href='photographic_page.php'>go to home <i class='fa fa-home'></i></a></div>
</h4>";
}
?>
</div>
</div>
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
<?php                          
if(isset($_GET['u_id'])&& !empty($_GET['u_id'])){
$u_id=$_GET['u_id'];
$query = mysql_query(" SELECT id,postt,photo,upload_date FROM postt where user_id=('$u_id') AND is_img='z' ORDER BY id DESC"); 
}else{
$query = mysql_query(" SELECT id,postt,photo,upload_date FROM postt where  user_id=('$user') AND is_img='z' ORDER BY id DESC"); 
}                                            
while ($row=mysql_fetch_array($query)) {
$name=$row['postt'];
$pic=$row['photo'];
$sDate=$row['upload_date'];    
$post_id=$row['id'];		 
$query1 = mysql_query("SELECT COUNT(*) as num FROM p_comment where post_id=$post_id  ");                
$run1=mysql_fetch_array($query1);
$num=$run1['num'];
$query2 = mysql_query("SELECT COUNT(*) as num2 FROM likes where post_id=$post_id  ");                
$run2=mysql_fetch_array($query2);
$num2=$run2['num2'];
?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 favourite">
<div class="work-wrapper">
<a class="fancybox-media" title="Image Title Goes Here" href="#">
<img src="uploades/page-album/<?php echo $pic ;?>" class="img-responsive img-rounded"  />
</a> <h4><?php echo $name; ?></h4>
<h4>
<h6><a href="#" class='' data-toggle="modal" data-target="#likes" id="like"> <?php echo $num2;?> </a>  : people like this</h6>
<a href="page-comment.php?id=<?php echo $post_id;?>" class="active btn btn-custom btn-custom-two btn-sm"><?php echo $num ;?>  comments</a>
</h4>
<h6><?php echo $sDate;?>  </h6>
<?php  echo $username; ?>
</div>       
</div>
<?php    }  ?>
</div>
</section>	
<?php }else
{
header('Location:index.php');
} }else
{
header('Location:index.php');
} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript"> function change(e,i)
{ var dataString="id="+i;
var d="#"+i+"1";
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
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/slide.over.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
