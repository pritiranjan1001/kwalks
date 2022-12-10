<?php	
$rand = rand();
move_uploaded_file($_FILES["file"]["tmp_name"], "d_user_images/" . $rand . ".jpeg");
echo $rand . ".jpeg" ;
?>

