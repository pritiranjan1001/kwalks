<?php ob_start();?>
<?php include 'include/function.php';?>
<?php include 'include/connect.php';?>
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
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include 'include/header.php';?>
<?php include 'include/connect.php';?>
<?php include 'include/username.php';?>
<?php if ($_SESSION['user_type']=='u') {
$user_id = true;
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  <div class="maxio"></div></div><br>
<section id="post" >
<div class="container">
<div class="row animate-in" data-anim-type="fade-in-up">
<div class="col-lg-3"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<?php
if($user ==$my_id){
?>
<div class="post-wrapper">
<h6>create a new album</h6>
<form name="mailinglist" method="post">
<?php
if (!empty($_POST['mailing-name'])) {
if (isset($_POST['name'])) {
$name=htmlentities($_POST['name'], ENT_QUOTES, "UTF-8");
if (empty($name)) {
echo "please enter the album name<br/><br/>";
}else{
$sDate = date("Y-m-d H:i:s");
$u_id=$_SESSION['user_id'];
mysql_query("INSERT into album VALUES('','$name','$u_id','$sDate')");
echo"Album is created:<br>";	
}
}
}
?>
album caption: &nbsp; <input type="text" maxlength="50" autocomplete="off" name="name">
<input class="btn button-custom btn-custom-two" name="mailing-name" type="submit" value="create">
<BR/><br/>
</form>
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
if (isset($_POST['upload-img']))
{ 
if ($_FILES["files"]["error"] > 0) 
{
$error = "please input an image";
}else if($_FILES['files']['size']>3145728){$error = "size must be less than 3MB";} 
else if (($_FILES["files"]["type"] == "image/gif") || ($_FILES["files"]["type"] == "image/jpeg") || ($_FILES["files"]["type"] == "image/png") || ($_FILES["files"]["type"] == "image/pjpeg")) 
{
if (isset($_POST['upload-img'])) {
$name=$status=htmlentities($_POST['name'], ENT_QUOTES, "UTF-8");
$album_id=$_POST['album'];
$file=$_FILES['files']['name'];
$file_type=$_FILES['files']['type'];
$file_size=$_FILES['files']['size'];
$file_temp=$_FILES['files']['tmp_name'];
$random_name=rand();
$eimg=sha1($username.$random_name);		
$url = 'uploades/album/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["files"]['tmp_name'], $url, 50); 
$sDate = date("Y-m-d H:i:s");
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/album/'.$eimg.'.jpg');
mysql_query("INSERT INTO photos VALUES ('','$name','$album_id','$eimg.jpg','$u_id','$sDate') ");
echo"image uploaded <br/><br/>";
} else  { 
$error = "Uploaded image should be jpg or gif or png"; } } 
}
echo $error ;
?>
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" href="#collapse1">upload an image</a>
</h4>
</div>
<div id="collapse1" class="panel-collapse collapse">
<form name="uploadimg" enctype='multipart/form-data' method='post'>
Image description:<br/><br/>
<textarea type="text" class="inimgg" name="name" maxlength="1500" autocomplete="off"  placeholder="insert something...."/></textarea>
<br/><br/>
select album:
<select name="album">
<?php
$u_id=$_SESSION['user_id'];
$query = mysql_query(" SELECT (id),(name) FROM album where user_id=('$u_id')");
while ($run=mysql_fetch_array($query)) {
$album_id=$run['id'];
$album_name=$run['name'];
echo ' <option  value= '.$album_id.'> '.$album_name.' </option>';
}
?>
</select><br/><br/>
select image:
<input type="file" class="inimg" accept="image/*" name="files">  </input>                            	
<br/><br/>
<input class="btn button-custom btn-custom-two" name="upload-img" type="submit" id="upload" value="upload"></input>
</form>	
</div>
</div>
</div>
</div>
<?php }	?>
</div>
</div>
</div>
</section>
<section id="work" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>Albums</h3><hr/>
</div>
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
<?php include "include/pro-pic-updis2.php"; ?>
</div>
</div>
</section>
<?php }else
{
header('Location:index.php');
} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
