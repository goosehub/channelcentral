<?php
include '../connect.php';

	$query = "SELECT *
	FROM rooms
	WHERE id = 1;";
	$result = mysqli_query($con, $query);
	$host = mysqli_fetch_assoc($result);
?>