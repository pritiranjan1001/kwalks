<?php ob_start();?>
<?php include 'include/connect.php';?>
<?php include 'include/function.php';?>
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
<link href="assets/css/msg.css" rel="stylesheet" />
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php require 'include/header.php';?>
<?php require 'include/connect.php';?>
<?php include 'include/username.php';?>
<?php if ($_SESSION['user_type']=='u') {
$user_id = true;
$id=mysql_real_escape_string($_GET['id']);
$id=htmlentities($id, ENT_QUOTES, "UTF-8");
if(preg_match("#\W+#", $id)|| preg_match("#[A-Z]+#", $id)|| preg_match("#[a-z]+#", $id)){header('Location:profile.php');}
$u_id=$_SESSION['user_id'];
$frnd_query=mysql_query("SELECT user_one,user_two FROM frnds WHERE id='$id'");
$run_frnd=mysql_fetch_array($frnd_query);
$user_one=$run_frnd['user_one'];
$user_two=$run_frnd['user_two'];
if($user_one==$u_id||$user_two==$u_id)
{
if($user_one == $u_id){
$user=$user_two;
}else{
$user=$user_one;
}
mysql_query("UPDATE msg SET u_read='2'WHERE  to_user=('$u_id') AND frnd_id=('$id') ");
$username=getuser($user,'username');
$query2 = mysql_query("SELECT url FROM pro_pic where user_id=$user ORDER BY id DESC "); 
$ron=mysql_fetch_array($query2);
$pic= $ron['url'];
$query=mysql_query("SELECT logoutt,login FROM login WHERE id='$user'");
$run=mysql_fetch_array($query);
$sDate1 = date("Y-m-d H:i:s");
$online=$run['login'];
$logoutt=$run['logoutt'];
if(abs(strtotime($sDate1) - strtotime($logoutt))<=60)
{
$Date='online';
}
else 
{
$diff = abs(strtotime($sDate1) - strtotime($logoutt));
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
else
{
$Date='on '.date("d-m-Y", strtotime($logoutt));
} 
}
?>
<section>
<div class="modal img-modal">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-meta-top">
<button type="button" class="close" data-dismiss="modal" onclick="history.go(-1);"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
<div class="img-poster clearfix">
<a href=""><img class="img" src="uploades/user_images/<?php echo $pic;?>"/></a>
<strong><a href=""><?php echo getusername($user) ; ?></a></strong>
<span><?php echo$Date?></span><hr>
</div>
</div>
<div class="col-md-12 modal-meta" id="top">          
<div class="modal-meta-middle" id="mydiv">          
</div>
</div> 
</div>
<div class="bottomx">
<form  method="post" name="form" onsubmit="return false" id="form1">
<?php ob_start();?>
<input type="text" class="form-control" name="content" maxlength="500" id="contenti" placeholder="Leave a commment.." onkeypress="return runScript2(event,<?php echo $id;?>)" autocomplete="off"/>
<input type="submit"  onclick="change2(<?php echo $id;?>)" class="btn btn-custom btn-custom-two btn-sm" value="send" id="sucom" name="submit"/>
</form>
</div>  
<input type="hidden" id="field" value="<?php echo $id;?>"/>
<input type="hidden" id="field1" value="40"/>
</div>
</div>
</section>
<?php }else{header('Location:profile.php');
}}else  { header('Location:index.php');
}?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript">
          $(document).ready(function () {setInterval( function loaddata()
    {
	
	var id =$("#field").val();
	var len =$("#field1").val();
	var dataString="id="+id+"&len="+len;
	
	$.ajax({
			type: 'get',
			url: 'include/msg2.php',
			data:dataString,
			success: function (response) {		
			$('#mydiv').html(response);
			}
		   });

	},1000);
          });
      </script>  
 <script type="text/javascript"> function change2(i)
{ var param = $("#contenti").val();
var dataString="id="+i+"&content="+param;
		$.ajax({
			type:"POST",
			url:"include/postmsg.php",
			data:dataString,
			success:function(response)
			{document.getElementById("form1").reset();
			  
			document.getElementById('field1').value=50;
			document.getElementById('mydiv').scrollTop = 0;}
		});   	
}
function runScript2(e,i) {
    if (e.keyCode == 13) {
        
        change2(i);
        return false;
    }
}
</script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/custom-solid.js"></script>