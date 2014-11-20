<?php
// Create connection
$con = new mysqli("localhost","root","","radio");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>