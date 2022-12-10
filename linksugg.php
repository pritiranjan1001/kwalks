<?php ob_start();?>
<?php include 'include/connect.php';?>
<?php include 'include/function.php';?>
<?php include 'include/username.php';?>
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
<link href="css/style1.css" rel="stylesheet" />
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include 'include/header.php'; ?>
<?php include 'include/connect.php';?>
<?php if ($_SESSION['user_id']) {$user_id = true;?>
<section id="team" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>link suggestion</h3><hr />
</div>
</div>
<div class="row animate-in" data-anim-type="fade-in-up">
<?php
$req_query=mysql_query("SELECT from_me FROM frnd_req WHERE to_frnd='$my_id'");
while ($run_req= mysql_fetch_array($req_query)) {
$from_me=$run_req['from_me'];
$from_username=getuser($from_me,'username');
$username=getusername($user);
?>					                      
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="team-wrapper">
<div class="description">
<h6 class="notifi"><?php  echo "<a href='profile.php?user=$from_me' class='nots' style='display:block'>$username</a> wants to be your friend<br>
<input onclick='change556(this, $from_me)' type='button' class='btn button-custom btn-custom-three' value='ignore' id='ignore' ></input>  <input onclick='change556(this, $from_me)' type='button' class='btn button-custom btn-custom-three' value='accept' id='accept'></input>"?></h6>
<?php  }  ?>
</div>
</div>
</div>
</div>
</section>
<?php }else{header('Location:index.php');} ?>
</body>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript"> function change556(e,i)
{ var dataString="id="+i;
 
   
     if(e.value=="accept")
	{
		dataString=dataString+"&action=accept"
		
		
		$("#ignore").hide();
		$.ajax({
			type:"POST",
			url:"include/action.php",
			data:dataString,
			success:function(response)
			{}
		});
	}
 	else if(e.value=="ignore")
	{
		dataString=dataString+"&action=ignore"
		
		
		  $("#accept").hide();
		$.ajax({
			type:"POST",
			url:"include/action.php",
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
