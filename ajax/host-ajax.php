<?php
include '../connect.php';

// Utility used to get host information

// Get Slug
$slug = $_POST['slug'];

	$query = "SELECT *
	FROM rooms
    WHERE slug = '".$slug."';";
	$result = mysqli_query($con, $query);
	$host = mysqli_fetch_assoc($result);
?>