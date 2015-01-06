<?php

include '../connect.php';

$time = time();

	$query = "SELECT password
	FROM passwords
	WHERE start < ".$time."
	AND end > ".$time."
	LIMIT 1;";
	$result = mysqli_query($con, $query);
	$hostPassword = mysqli_fetch_assoc($result);

// echo $hostPassword['password'];
?>