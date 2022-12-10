<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="description" content="Kwalks, the way you are" />
	<meta name="author" content="kwalks.com" />
	<link type="text/css" rel="Stylesheet" href="style/searchbutton.css" />
	<link href="assets/css/style-kwalk.css" rel="stylesheet" />
</head>
<?php if ($_SESSION['user_id']) {
	$user_id = true; ?>
	<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php?page=0"><img src="assets/img/logo6.png" class="log" id="logoim"></img></a>
			</div><?php $my_id = $_SESSION['user_id']; ?>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">REQUESTS <sup style="color:red;" id="mydiv4"></sup><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<div class="menuxc" id="mydiv5">
							</div>
						</ul>
					</li>
					<li><a href="home.php?page=0">HOME</a></li>
					<li><a href="profile.php">PROFILE</a></li>
					<li><a href="msg.php">MESSAGE<sup style="color:red;" id="mydiv3"></sup></a></li>
					<li><a href="#work">UPDATES</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">ACCOUNT<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="setting-account.php"><i class="fa fa-fw fa-edit"></i> Account setting</a></li>
							<li><a href="feed_back.php"><i class="fa fa-fw fa-edit"></i> feedback</a></li>
							<li><a href="logout.php"><i class="fa fa-fw fa-edit"></i>Logout</a></li>
						</ul>
					<li><a href="" data-toggle="modal" data-target="#search">
							<i class="fa fa-search"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
				</div>
				<div class="modal-body">
					<div class="forsearching">
						<div class="zw">
							<h5>Requests from friends<a href="kwalks/linksugg.php"> click here:</a></h5>
						</div>
						<form class="form1-wrapper cf" method="post">
							<input type="text" placeholder="Search here..." name="search" onkeydown="searchq()" ; />
						</form>
						<div id="output"></div><br>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function searchq() {
			var searchTxt = $("input[name='search']").val();
			$.post("include/search12.php", {
				searchVal: searchTxt
			}, function(output) {
				$("#output").html(output);
			});
		}
	</script>
<?php } else {
	header('http://localhost/kwalks/index.php');
} ?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		setInterval(function() {
			$('#mydiv3').load('include/mess.php');
		}, 1000);
	});
	$(document).ready(function() {
		setInterval(function() {
			$('#mydiv4').load('include/noti.php');
		}, 1000);
	});
	$(document).ready(function() {
		setInterval(function() {
			$('#mydiv5').load('include/noti2.php');
		}, 1000);
	});
</script>

</html>