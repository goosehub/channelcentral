<?php
// Create connection
$con = new mysqli("localhost","root","","channelcentral");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>