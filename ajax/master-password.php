<?php

include '../connect.php';

// Get Slug
$slug = $_POST['slug'];

	$query = "SELECT password
	FROM passwords
	WHERE id = 1
    AND slug = '".$slug."';";
	$result = mysqli_query($con, $query);
	$masterPassword = mysqli_fetch_assoc($result);

// echo $masterPassword['password'];
?>