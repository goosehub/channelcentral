<?php

// Used to find the limit on the queue

// Get Slug
$slug = $_POST['slug'];

include '../connect.php';

include 'host-ajax.php';

$time = time();
$limit = $time + $host['queue'];
	$query = "SELECT start
	FROM upload
	WHERE end >= '".$limit."'
	AND special != 'timed'
    AND slug = '".$slug."'
	ORDER BY start DESC
	LIMIT 1;";
	$result = mysqli_query($con, $query);
	$queueLimit = mysqli_fetch_assoc($result);
?>