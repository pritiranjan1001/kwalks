


<?php
// connect to the database
$conn = mysqli_connect('localhost','root','','kwalk');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
