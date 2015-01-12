<?php

include '../connect.php';

// Get Slug
$slug = $_POST['slug'];

$query = "SELECT viewers
		FROM upload
		WHERE end >= '".time()."'
	    AND slug = '".$slug."'
		ORDER BY end DESC
		LIMIT 1;";
		$result = mysqli_query($con, $query);
		$current = mysqli_fetch_assoc($result);
		echo $current['viewers'];
		echo ' viewers';
?>