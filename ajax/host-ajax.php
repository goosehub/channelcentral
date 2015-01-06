<?php
include '../connect.php';

// Get Slug
$slug = $_POST['slug'];

	$query = "SELECT *
	FROM rooms
	WHERE id = 1
    AND slug = '".$slug."';";
	$result = mysqli_query($con, $query);
	$host = mysqli_fetch_assoc($result);
?>