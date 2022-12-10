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
<title>Albums</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/style-kwalk.css" rel="stylesheet" />
<link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include('include/header.php');?>
<?php include('include/connect.php');?>
<?php include ('include/username.php'); ?>
<?php if ($_SESSION['user_id']) { $user_id = true;?>
<div class="modal fade" id="pic-change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
</div>
<h5>CHANGE PROFILE PIC:</h5>
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
if (isset($_POST['upload-img12'])) {
if ($_FILES["files6"]["error"] > 0) 
{
$error = "please input an image";
} else if($_FILES['files6']['size']>2097152){$error = "size must be less than 2MB";}
else if (($_FILES["files6"]["type"] == "image/gif") || ($_FILES["files6"]["type"] == "image/jpeg") || ($_FILES["files6"]["type"] == "image/png") || ($_FILES["files6"]["type"] == "image/pjpeg")) 
{
$random_name=rand();   
$eimg=sha1($username.$random_name);
$sDate = date("Y-m-d H:i:s");
$file=$_FILES['files6'];
$file_type=$_FILES['files6']['type'];
$file_size=$_FILES['files6']['size'];
$url = 'uploades/user_images/'.$eimg.'.jpg';
$file_temp=compress_image($_FILES["files6"]['tmp_name'], $url, 40); 
header("Content-Transfer-Encoding: binary");
if($_FILES['files6']['size'] == 0)
{
echo "please input an image :<br/>";
}
else{
$u_id=$_SESSION['user_id'];
move_uploaded_file($file_temp, 'uploades/user_images/'.$eimg.'.jpg');
mysql_query("INSERT INTO pro_pic VALUES ('','$eimg.jpg','$u_id') ");
mysql_query("INSERT INTO postt VALUES ('','','profile pic is updated','$eimg.jpg','k','$u_id','$sDate') ");  
header("location:pro-img.php"); 
}
} else  { 
$error = "Uploaded image should be jpg or gif or png"; } 
}                          
echo  $error;
?>
<h6> <input type="file" class="imgx"  accept="image/*" name="files6" >  </input> </h6> 
<input class="btn button-custom btn-custom-three" name="upload-img12" type="submit" value="upload">
</form>
<br> <br>                                                      
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  <div class="maxio"></div></div>
<section id="work" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>profile images</h3>
<?php echo  $error;?>
<a href=""  data-toggle="modal"  data-target="#pic-change" ><i class="fa fa-fw fa-edit"></i> 
</a>
<hr />
</div>
</div>
<div class="row">
<div class="col-lg-12">
</div>
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
<?php   
$u_id=$_SESSION['user_id'];
$qry=mysql_query("SELECT id,url,user_id FROM pro_pic where user_id=('$u_id') ORDER BY id DESC limit 200");
while ($row=mysql_fetch_array($qry)) {
$pic=$row['url'];
$post_id=$row['id']; 
$user_id=$row['user_id'];
$query2 = mysql_query("SELECT COUNT(*) as num2,id FROM postt where photo='$pic'  "); 
$run2=mysql_fetch_array($query2);
$num2=$run2['num2'];       
$id=$run2['id'];					  
?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html " id="<?php echo $post_id;?>">                                                                       
<div class="work-wrapper">     
<a  <?php if($num2==1){?>href="fix-pop.php?id=<?php echo $id;?>" <?php }else if($num2==0){?>href="" <?php }?> > 
<img src="uploades/user_images/<?php echo $pic ;?>" class="img-responsive img-rounded"  />
</a>
<div class="postboxa">
<?php if(($num2==0)&&($user_id==$u_id)){?>
<input onclick="change21(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='POST' ></input>
<?php }else if(($num2==1)&&($user_id==$u_id)){?>
<input onclick="change21(this,<?php echo $post_id;?>)" type="button"   class="active btn btn-custom btn-custom-two btn-sm" value='UNPOST' ></input>
<?php }?>
</div>
</div>                                      
</div>
<?php  }   ?>
</div>
</div>        
<?php include ('include/username.php'); ?>
</section>
<?php }else{header('Location:index.php');} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript"> function change21(e,i)
{ var dataString="id="+i;

 
    if(e.value=="POST")
	{   
		e.value="UNPOST";
		$.ajax({
			type:"POST",
			url:"include/propost.php",
			data:dataString,
			success:function(response)
			{}
		});
	}	
    else if(e.value=="UNPOST")
	{   
		e.value="POST";
				$.ajax({
			type:"POST",
			url:"include/prounpost.php",
			data:dataString,
			success:function(response)
			{}
		});
	}		
}
</script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/post.box.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
