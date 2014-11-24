<?php
	$time = time();

	$query = "SELECT *
	FROM upload
	WHERE start >= '".$time."';";
	if ($result = mysqli_query($con, $query))
	{
        while($delay = mysqli_fetch_assoc($result)) 
        {
        	$newStart = $delay['start'] + $duration;
        	$newEnd = $delay['end'] + $duration;
        	$newScheduled = $delay['scheduled'] + 'plus '.$duration.' seconds';
			      $query = "UPDATE upload 
			      SET start = '". $newStart ."',
			      end = '". $newEnd ."',
			      scheduled = '". $newScheduled ."'
			      WHERE id = '".$delay['id'] ."';";
			      $result = mysqli_query($con, $query);  
		}
	}

	include 'find-current.php';
		if ($current['end']) {
			$start = $current['end'];
		}
		else
		{
			$start = $time;
		}
	$end = $start + $duration;
	$scheduled = date("M j, Y, g:i:s a", $start);
?>