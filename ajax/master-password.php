<?php

include '../connect.php';

	$query = "SELECT password
	FROM passwords
	WHERE id = 1;";
	$result = mysqli_query($con, $query);
	$masterPassword = mysqli_fetch_assoc($result);

// echo $masterPassword['password'];
?>