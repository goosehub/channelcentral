<?php
include '../connect.php';

// Used to get master password for verification

// Get Slug
$slug = $_POST['slug'];

	$query = "SELECT password
	FROM passwords
    WHERE slug = '".$slug."';";
	$result = mysqli_query($con, $query);
	$masterPassword = mysqli_fetch_assoc($result);

// echo $masterPassword['password'];
?>