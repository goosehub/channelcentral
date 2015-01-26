<?php

// Used to find current upload playing

// Get Slug
$slug = $_POST['slug'];

$query = "SELECT *
		FROM upload
		WHERE start <= '".$time."'
		AND end >= '".$time."'
	    AND slug = '".$slug."'
		ORDER BY end DESC
		LIMIT 1;";
		$result = mysqli_query($con, $query);
		$current = mysqli_fetch_assoc($result);
?>