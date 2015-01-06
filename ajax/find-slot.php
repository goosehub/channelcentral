<?php
	$query = "SELECT * 
	FROM upload 
	WHERE end >= '".$time."' 
	AND special != 'timed'
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