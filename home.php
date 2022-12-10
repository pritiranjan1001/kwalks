<?php ob_start();?>
<?php include 'include/function.php';?>
<?php if($_SESSION['user_type']=='u'){  
if(!isset($_GET['page'])&& empty($_GET['page'])){
header('Location:home.php?page=0');} 
?>
<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="Kwalks, the way you are" />
<meta name="author" content="kwalks.com" />
<title>kwalks</title>
<link href="assets/img/logo6.png" rel="shortcut icon" />
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/slideUp.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php require('include/header.php');?>
<?php include('include/connect.php');?>
<?php include ('include/username.php'); ?>
<?php if ($_SESSION['user_id']) {$user_id = true;?>
<section id="post" >
<div class="contdoo" >
<div class="container">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="post-wrapper">
<h4>What's going on ?</h4>
<form  enctype="multipart/form-data" method='post' action="include/posstr.php" name="input">
<h4><textarea type="text" class="posts" autocomplete="off" maxlength="1500"  name="postt"></textarea></h4>
<input class="btn button-custom btn-custom-two" type="submit" name="posttname" value="Post">
</form>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="post-wrapper">
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
if (isset($_POST['upload-img'])) {
if ($_FILES["files"]["error"] > 0) 
{
$error = "please input an image";
} 
else if($_FILES['files']['size']>2097152){$error = "size must be less than 2MB";}
else if (($_FILES["files"]["type"] == "image/gif") || ($_FILES["files"]["type"] == "image/jpeg") || ($_FILES["files"]["type"] == "image/png") || ($_FILES["files"]["type"] == "image/pjpeg")) 
{
$random_name=rand();
$eimg=sha1($username.$random_name);								
$name=stripslashes($_POST['name']);
$name=htmlentities($name, ENT_QUOTES, "UTF-8"); 
$album_id=$_POST['album'];
$file=$_FILES['files']['name'];
$file_type=$_FILES['files']['type'];
$file_size=$_FILES['files']['size'];
$url = 'uploades/album/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["files"]['tmp_name'], $url, 70); 
header("Content-Transfer-Encoding: binary");
$sDate = date("Y-m-d H:i:s");
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/album/'.$eimg.'.jpg');
mysql_query("INSERT INTO photos VALUES ('','$name','$album_id','$eimg.jpg','$u_id','$sDate') ");
mysql_query("INSERT INTO postt VALUES ('','','$name','$eimg.jpg','i','$u_id','$sDate') ");
echo"image uploaded <br/><br/>";
echo"<a href='album.php'>check it in album page</a><br/><br/>";
header('Location:home.php?page=0'); 
} else  { 
$error = "Uploaded image should be jpg or gif or png"; } } 
echo  $error;
?><BR><BR><BR>
<div class="panel-group">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" href="#collapse1">upload an image</a>
</h4>
</div>
<div id="collapse1" class="panel-collapse collapse">
<form enctype='multipart/form-data' method='post'>
Image description:<br/>
<textarea type="text" class="inimgg" size="1500" autocomplete="off"  placeholder="insert something..." name="name"/></textarea>
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
<h6><input type="file" name="files" class="inimgg" accept="image/*"> <h6><br/><br/>
<input class="btn button-custom btn-custom-two" name="upload-img" type="submit" value="upload">
</form>	
</div>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="post-wrapper">
<h4>Write Note </h4>
<a href="re-note.php">	<input class="btn button-custom btn-custom-two" type="submit" value="let's start"></a>
</div>
</div>
</div>
</div>
</div>
</section>
<section id="work" >
<div class="container">
<?php include 'include/ho-update1.php';?>	
</div>
</section>
<?php }else{header('Location:index.php');} }else{header('Location:index.php');}?>
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
