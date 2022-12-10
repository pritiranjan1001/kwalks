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
</head>
<body data-spy="scroll" data-target="#menu-section">
<?php include('include/header.php'); ?>
<?php include('include/username.php'); ?>
<?php if ($_SESSION['user_type']=='u') {?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  <div class="maxio"></div></div>
<section id="work" >
<div class="container">	
<br><br><br><br>
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
<a href=""  data-toggle="modal"  data-target="#search1" class="btn button-custom btn-custom-two">SEARCH</a>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 "></div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 recent">
<div class="work-wrapper">
<a class="fancybox-media"  href="follow-search.php"><img src="assets/img/design-3.jpg" class="img-responsive img-rounded" alt="" /></a>
<h4><a href="follow-search.php" class="active btn btn-custom btn-custom-two btn-sm">photographer</a></h4>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 popular">
<div class="work-wrapper">
<a class="fancybox-media"  href="foll-se-wr.php"><img src="assets/img/design-1.jpg" class="img-responsive img-rounded" alt="" /></a>
<h4><a href="foll-se-wr.php" class="active btn btn-custom btn-custom-two btn-sm">writer</a></h4></div>
</div>
</div>
</section>
<div class="modal fade" id="search1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
</div>
<div class="modal-body">
<div class="forsearching"> 
<div class="zw">  
<h4>search portfolios<h6> 
</div>
<form class="form1-wrapper cf" method="post">
<input type="text" placeholder="Search here..."name="search1" onkeydown="search1q()";/>
</form>
<div id="output1"></div><BR>
</div>
</div>
</div>
</div>
</div>
<?php }else{header('Location:index.php');} ?>
</body>
<script type="text/javascript">
      function search1q(){var searchTxt=$("input[name='search1']").val();
      $.post("include/search-portfolio.php",{searchVal:searchTxt},function(output){
        $("#output1").html(output);
      });

}
</script>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>
