<?php
$query = "SELECT *
		FROM upload
		WHERE start <= '".$time."'
		AND end >= '".$time."'
		ORDER BY end DESC
		LIMIT 1;";
		$result = mysqli_query($con, $query);
		$current = mysqli_fetch_assoc($result);
?>