<?php

include '../connect.php';

include 'host-model.php';

$time = time();
$limit = $time + $host['queue'];
	$query = "SELECT start
	FROM upload
	WHERE end >= '".$limit."'
	ORDER BY start DESC
	LIMIT 1;";
	$result = mysqli_query($con, $query);
	$queueLimit = mysqli_fetch_assoc($result);
?>