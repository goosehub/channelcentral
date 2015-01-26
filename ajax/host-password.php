<?php

// Used to get host password for verifying

include '../connect.php';

$time = time();

// Get Slug
$slug = $_POST['slug'];

	$query = "SELECT password
	FROM passwords
	WHERE start < ".$time."
	AND end > ".$time."
    AND slug = '".$slug."'
	LIMIT 1;";
	$result = mysqli_query($con, $query);
	$hostPassword = mysqli_fetch_assoc($result);

// echo $hostPassword['password'];
?>