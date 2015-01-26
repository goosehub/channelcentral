<?php

// Used to find the slot that an upload should be placed in

// Get Slug
$slug = $_POST['slug'];

	$query = "SELECT * 
	FROM upload 
	WHERE end >= '".$time."' 
	AND special != 'timed'
    AND slug = '".$slug."'
	ORDER BY end 
	DESC LIMIT 1";
	$result = mysqli_query($con, $query);
	$slot = mysqli_fetch_assoc($result);
// If queue, go to end
	if ($slot['end'] > 1)
	{
		$start = $slot['end'];
	}
// If not, start now
	else {
		$start = $time;
	}
?>