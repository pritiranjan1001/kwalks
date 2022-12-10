<?php ob_start(); ?>
<?php include 'include/function.php'; ?>
<?php include 'include/connect.php'; ?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Kwalks, the way you are" />
    <meta name="author" content="kwalks.com" />
    <title>kwalks</title>
    <link href="assets/img/logo6.png" rel="shortcut icon" />
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style-kwalk.css" rel="stylesheet" />
    <link href="assets/css/about.css" rel="stylesheet" />
    <link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body data-spy="scroll" data-target="#menu-section">
    <?php require 'include/header.php'; ?>
    <?php include 'include/connect.php'; ?>
    <?php include 'include/username.php'; ?>
    <?php if ($_SESSION['user_type'] == 'u') {
        $user_id = true;
    ?>
        <div class="aboutbox">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="login-wrapper">
                        <ul class="nav">
                            <li class="la1 active"><a href="#log" data-toggle="tab">About</a></li>
                            <li class="la2"><a href="#reg" data-toggle="tab">Activity</a></li>
                        </ul>
                        <div class="tab-content logon-wrapper">
                            <div class="tab-pane active" id="log">
                                <div class="input-group">
                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-3">
                                        <?php
                                        if ($user == $my_id) {
                                            $u_id = $_SESSION['user_id'];
                                            $query = mysql_query(" SELECT (id),(url) FROM pro_pic where user_id=('$u_id') ORDER BY id DESC");
                                        } else {
                                            $query = mysql_query(" SELECT (id),(url) FROM pro_pic where  user_id=('$user') ORDER BY id DESC");
                                        }
                                        $row = mysql_fetch_array($query);
                                        $pic = $row['url'];
                                        ?>
                                        <?php
                                        if (empty($pic)) {
                                            echo "<img src='assets/img/1.jpg' class='abopic' height='100%' width='100%'/>";
                                        } else {
                                        ?>
                                            <img src="uploades/user_images/<?php echo $pic; ?>" class="abopic" height="100%" width="100%">
                                        <?php  } ?>
                                        <div class="description">
                                            <?php
                                            $query3 = mysql_query("SELECT COUNT(*) as num3 FROM frnds where user_one=$user|| user_two=$user");
                                            $run3 = mysql_fetch_array($query3);
                                            $num3 = $run3['num3'];
                                            $query4 = mysql_query("SELECT COUNT(*) as num4 FROM follow where user_one=$user");
                                            $run4 = mysql_fetch_array($query4);
                                            $num4 = $run4['num4']; ?>
                                            <?php
                                            if ($user == $my_id) { ?>
                                                <a class="btn button-custom btn-custom-two" href="following.php"> <?php echo $num4  ?> Following </a>
                                                <a class="btn button-custom btn-custom-two" href="followers.php"> <?php echo $num3  ?> Followers </a>
                                            <?php } else { ?>
                                                <a class="btn button-custom btn-custom-two" href="following.php?user=<?php echo $user ?>"> <?php echo $num4  ?> Following </a>
                                                <a class="btn button-custom btn-custom-two" href="followers.php?user=<?php echo $user ?>"> <?php echo $num3  ?> Followers </a>
                                            <?php } ?>
                                            <?php
                                            if ($user == $my_id) {
                                                echo " <a class='btn button-custom btn-custom-two' href='about1.php'>Edit</a><br>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-9">
                                        <div class="axion">
                                            <h6><br></h6>
                                            <h4> <?php echo getusername($user); ?></h4><br>
                                            <?php
                                            if ($user == $my_id) {
                                                $u_id = $_SESSION['user_id'];
                                                $query = mysql_query(" SELECT des_pan FROM about where user_id=$u_id ");
                                            } else {
                                                $query = mysql_query(" SELECT des_pan FROM about where  user_id=$user ");
                                            }
                                            while ($run = mysql_fetch_array($query)) {
                                                $des_pan = $run['des_pan'];
                                            ?>
                                                <h4><?php echo $des_pan; ?></h4>
                                            <?php } ?>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <h6><br></h6>
                                                <?php
                                                if ($user == $my_id) {
                                                    $u_id = $_SESSION['user_id'];
                                                    $query = mysql_query(" SELECT descw FROM about where user_id=$u_id ");
                                                } else {
                                                    $query = mysql_query(" SELECT descw FROM about where user_id=$user ");
                                                }
                                                while ($run = mysql_fetch_array($query)) {
                                                    $descw = $run['descw'];
                                                ?>
                                                    <h6> <?php echo nl2br("$descw"); ?> </h6>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="reg">
                                <div class="input-group">
                                    <label for="login-name">Name</label><br />
                                    <h6><?php echo getusername($user); ?></h6>
                                </div>
                                <div class="input-group"><br>
                                    <label for="login-uname">From</label><br />
                                    <?php
                                    $u_id = $_SESSION['user_id'];
                                    $query = mysql_query(" SELECT act_from,education,website FROM activity where user_id=$u_id ");
                                    $run = mysql_fetch_array($query);
                                    $act_from = $run['act_from'];
                                    $education = $run['education'];
                                    $website = $run['website'];
                                    ?>
                                    <h6><?php echo $act_from; ?></h6>
                                </div>
                                <div class="input-group"><br>
                                    <label for="login-pass">Education</label><br />
                                    <h6><?php echo $education; ?></h6>
                                </div>
                                <div class="input-group"><br>
                                    <label for="login-pass">Website</label><br />
                                    <h6><?php echo $website; ?></h6>
                                </div>
                                <br>
                                <?php
                                if ($user == $my_id) {
                                    echo "<a class='btn button-custom btn-custom-two' href='activity.php'>Edit</a>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
        header('Location:index.php');
    } ?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.isotope.js"></script>
    <script src="assets/js/custom-solid.js"></script>
</body>

</html>