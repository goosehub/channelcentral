<?php

// Used to find end of an upload

// Get Slug
$slug = $_POST['slug'];

// Find natural end
	$end = $start + $duration;
// Check if timed uploads will have to cutoff this upload
	$query = "SELECT *
	FROM upload
	WHERE start >= '".$start."'
	AND start <= '".$end."'
	AND special = 'timed'
    AND slug = '".$slug."'
	ORDER BY start ASC
	LIMIT 1;";
	$result = mysqli_query($con, $query);
	$cutoff = mysqli_fetch_assoc($result);
// If so, end is start of timed video
	if (strlen($cutoff['start']) > 2)
	{
		$end = $cutoff['start'];
	}
// Record information
		$scheduled = date("M j, Y, g:i:s a", $start);
?>