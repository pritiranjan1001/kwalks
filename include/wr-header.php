<?php  
$u_id=$_SESSION['user_id'];                     
$query=mysql_query("SELECT portfolio FROM puser WHERE id = ('$u_id')");
$run=mysql_fetch_array($query);
$portfolio=$run['portfolio'];
?>
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</button><a class="navbar-brand" href="photographic_page.php"><img src="assets/img/kwalks.png" width="80px" height="30px"></img></a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">Logout</a>
<ul class="dropdown-menu">
<li><a href="page-acc-setting.php">Account setting</a></li>
<li><a href="wr-feedback.php">feed back</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</li>
</ul>
</div>
</div>
</div>