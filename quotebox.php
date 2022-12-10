<?php include 'include/connect.php' ?>
<?php include 'include/function.php' ?>
<?php if ($_SESSION['user_type']=='u') {
	$user_id = true;

?>


<!DOCTYPE html>
<html>
    <head>
        <title>kwalks</title>
  <link href="assets/img/logo6.png" rel="shortcut icon" />
        <link rel="stylesheet" href="assets/css/quotebox.css">
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/style-kwalk.css" rel="stylesheet" />
        <link href="settings/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
         <script src="quotebox/js/jquery.js"></script>
        
    </head>
   
    <body>


    
  <?php include('include/header.php'); ?>
 
  
       

    <section class="quotes">

        <script src="quotebox/js/quotes.js"></script>
        <script type="text/javascript">

            $(function() {

                var limit = 25;
                var $container = $( '.quotes' );

            
                for ( var i = 0, n = Math.min( limit, quotes.length ); i < n; i++ ) {

                    $container.append(
                        '<article>' +
                            '<p>' + quotes[i].quote + '</p>' +
                            '<em>' + quotes[i].author + '</em>' +
                        '</article>');
                }

              
                $container.moving({
                    perspective: 900,
                    margin: '220px'
                });
            });

        </script></section>
         
         <div class="xyz">
        <div class="footext"> Contact us | About us | Terms and Conditions | Privacy Policy | Disclaimer Kwalk &copy;2015</div>
         </div>
<?php }else

	{

		header('Location:index.php');

	} ?>

<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/screen.display.js"></script>
<script src="assets/js/custom.js"></script>
<script src="quotebox/js/moving.js"></script>

</body>


</html>