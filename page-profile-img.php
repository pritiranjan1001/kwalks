<?php include 'include/page-function.php';?> 
<?php if($_SESSION['user_type']=='p') 
{ ?>
<?php include'include/connect.php';?>
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
<link href="assets/css/pagealbum.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php  include 'include/page-header.php';?>
<?php include 'include/username.php';?>
<section id="work"  style="background-image:url('assets/img/writer.jpg')" >
<div class="overlay">
<div class="container">
<div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
<div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 html">
<div class="work-wrapper">
<div class="albumcont">
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
return $destination_url; } 
if (isset($_POST['upload-img1'])) {
if ($_FILES["files"]["error"] > 0) 
{
$error = "please input an image";
} else if($_FILES['files']['size']>3145728){$error = "size must be less than 3MB";}
else if (($_FILES["files"]["type"] == "image/gif") || ($_FILES["files"]["type"] == "image/jpeg") || ($_FILES["files"]["type"] == "image/png") || ($_FILES["files"]["type"] == "image/pjpeg")) 
{
$random_name=rand();  
$eimg=sha1($username.$random_name);   
$file=$_FILES['files'];
$file_type=$_FILES['files']['type'];
$file_size=$_FILES['files']['size'];
$url = 'uploades/page-profile/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["files"]['tmp_name'], $url, 40); 
header("Content-Transfer-Encoding: binary");
if($_FILES['files']['size'] == 0)
{
echo "please input an image :<br/>";
}
else{
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/page-profile/'.$eimg.'.jpg');
mysql_query("INSERT INTO p_impic VALUES ('','$eimg.jpg','$u_id','1') ");
echo"image uploaded <br/><br/>";
}
} else  { 
$error = "Uploaded image should be jpg or gif or png"; } 
echo $error."<br/><br/>";  
}
?>
<input type="file" class="imgx"  accept="image/*" name="files">  </input>  
<input class="btn button-custom btn-custom-two" name="upload-img1" type="submit" value="upload">
</form>
<?php
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$u_id')AND cat_ry='1' ORDER BY id DESC");		
$row=mysql_fetch_array($query);
$pic=$row['url'];
?>
<a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/1.jpg">
<img src="uploades/page-profile/<?php echo $pic;?>" class="img-rounded" alt=""  height="360px" width="250px"/>
</a>
<h6>First image </h6><h6>profile image </h6>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 html">
<div class="work-wrapper">
<div class="albumcont">
<form name="upload-img2" enctype='multipart/form-data' action="" method='post'>
<?php
if (isset($_POST['upload-img2'])) {
if ($_FILES["files2"]["error"] > 0) 
{
$error = "please input an image";
}else if($_FILES['files2']['size']>3145728){$error = "size must be less than 3MB";} 
else if (($_FILES["files2"]["type"] == "image/gif") || ($_FILES["files2"]["type"] == "image/jpeg") || ($_FILES["files2"]["type"] == "image/png") || ($_FILES["files2"]["type"] == "image/pjpeg")) 
{
$random_name=rand();      	
$eimg=sha1($username.$random_name);  
$file=$_FILES['files2'];
$file_type=$_FILES['files2']['type'];
$file_size=$_FILES['files2']['size'];
$url = 'uploades/page-profile/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["files2"]['tmp_name'], $url, 40); 
if($_FILES['files2']['size'] == 0)
{
echo "please input an image :<br/>";
}
else{
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/page-profile/'.$eimg.'.jpg');
mysql_query("INSERT INTO p_impic VALUES ('','$eimg.jpg','$u_id','2') ");
echo"image uploaded <br/><br/>";
}
} else  { 
$error = "Uploaded image should be jpg or gif or png"; } 
echo $error."<br/><br/>";
}
?>
<input type="file" class="imgx"  accept="image/*" name="files2">  </input>  
<input class="btn button-custom btn-custom-two" name="upload-img2" type="submit" value="upload">
</form>
<?php
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$u_id')AND cat_ry='2' ORDER BY id DESC");		
$row=mysql_fetch_array($query);
$pic=$row['url'];
?>
<a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/1.jpg">
<img src="uploades/page-profile/<?php echo $pic;?>" class="img-rounded" alt=""  height="360px" width="250px"/>
</a>
<h6>second image </h6>	<h6>update image </h6>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 html">
<div class="work-wrapper">
<div class="albumcont">
<form name="upload-img3" enctype='multipart/form-data' action="" method='post'>
<?php
if (isset($_POST['upload-img3'])) {
if ($_FILES["files3"]["error"] > 0) 
{
$error = "please input an image";
} else if($_FILES['files3']['size']>3145728){$error = "size must be less than 3MB";}
else if (($_FILES["files3"]["type"] == "image/gif") || ($_FILES["files3"]["type"] == "image/jpeg") || ($_FILES["files3"]["type"] == "image/png") || ($_FILES["files3"]["type"] == "image/pjpeg")) 
{
$random_name=rand();      	
$eimg=sha1($username.$random_name);  
$file=$_FILES['files3'];
$file_type=$_FILES['files3']['type'];
$file_size=$_FILES['files3']['size'];
$url = 'uploades/page-profile/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["files3"]['tmp_name'], $url, 40); 
if($_FILES['files3']['size'] == 0)
{
echo "please input an image :<br/>";
}
else{
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/page-profile/'.$eimg.'.jpg');
mysql_query("INSERT INTO p_impic VALUES ('','$eimg.jpg','$u_id','3') ");
echo"image uploaded <br/><br/>";
}
} else  { 
$error = "Uploaded image should be jpg or gif or png"; } 
echo $error."<br/><br/>";
}
?>
<input type="file" class="imgx"  accept="image/*" name="files3">  </input>  
<input class="btn button-custom btn-custom-two" name="upload-img3" type="submit" value="upload">
</form>
<?php
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$u_id')AND cat_ry='3' ORDER BY id DESC");		
$row=mysql_fetch_array($query);
$pic=$row['url'];
?>
<a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/1.jpg">
<img src="uploades/page-profile/<?php echo $pic;?>" class="img-rounded" alt=""  height="360px" width="250px"/>
</a>
<h6>third image </h6><h6> image for post</h6>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 html">
<div class="work-wrapper">
<div class="albumcont">
<form name="upload-img4" enctype='multipart/form-data' action="" method='post'>
<?php
if (isset($_POST['upload-img4'])) {
if ($_FILES["files4"]["error"] > 0) 
{
$error = "please input an image";
}else if($_FILES['files4']['size']>3145728){$error = "size must be less than 3MB";} 
else if (($_FILES["files4"]["type"] == "image/gif") || ($_FILES["files4"]["type"] == "image/jpeg") || ($_FILES["files4"]["type"] == "image/png") || ($_FILES["files4"]["type"] == "image/pjpeg")) 
{
$random_name=rand();      	
$eimg=sha1($username.$random_name);   
$file=$_FILES['files4'];
$file_type=$_FILES['files4']['type'];
$file_size=$_FILES['files4']['size'];
$url = 'uploades/page-profile/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["files4"]['tmp_name'], $url, 40); 
if($_FILES['files4']['size'] == 0)
{
echo "please input an image :<br/>";
}
else{
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/page-profile/'.$eimg.'.jpg');
mysql_query("INSERT INTO p_impic VALUES ('','$eimg.jpg','$u_id','4') ");
echo"image uploaded <br/><br/>";
}
} else  { 
$error = "Uploaded image should be jpg or gif or png"; } 
echo $error."<br/><br/>";
}
?>
<input type="file" class="imgx"  accept="image/*" name="files4">  </input>  
<input class="btn button-custom btn-custom-two" name="upload-img4" type="submit" value="upload">
</form>
<?php
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (id),(url) FROM p_impic where user_id=('$u_id')AND cat_ry='4' ORDER BY id DESC");		
$row=mysql_fetch_array($query);
$pic=$row['url'];
?>
<a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/1.jpg">
<img src="uploades/page-profile/<?php echo $pic;?>" class="img-rounded" alt=""  height="360px" width="250px"/>
</a>
<h6>forth image </h6><h6>cover image for portfolios</h6>
</div>
</div>
</div>
<div class="container">		
<h6>(--------&nbsp;&nbsp;  for better view please insert portrait views  &nbsp;&nbsp;--------)</h6>
</div></div></div>
</section>
<?php }else{
header('Location:index.php');
} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>