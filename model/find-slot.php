<?php
	$query = "SELECT * 
	FROM upload 
	WHERE end >= '".$time."' 
	ORDER BY end 
	DESC LIMIT 1";
	$result = mysqli_query($con, $query);
	$slot = mysqli_fetch_assoc($result);
?>