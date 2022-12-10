<?php
$rand = rand();
move_uploaded_file($_FILES["file"]["tmp_name"], "uploades/d-notes/" . $rand . ".jpeg");
echo $rand . ".jpeg" ;
?>

