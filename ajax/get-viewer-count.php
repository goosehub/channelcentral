<?php

include '../connect.php';

// Get Slug
$slug = $_POST['slug'];

$query = "SELECT viewers
		FROM upload
		WHERE start < '".time()."'
	    AND slug = '".$slug."'
		ORDER BY id DESC
		LIMIT 1;";
		$result = mysqli_query($con, $query);
		$current = mysqli_fetch_assoc($result);
		if ($current['viewers'] < 2)
		{
			echo '1 Viewer';
		}
		else
		{
			echo $current['viewers'];
			echo ' Viewers';
		}
?>