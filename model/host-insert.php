<?php
// Find current upload
include 'find-current.php';
// If timed start, start at time
	if (strlen($hostStart) > 1) {
		$start = $hostStart;
		$special = 'timed';
	}
// Else if current exists, start at the end of current
	else if ($current['end']) {
		$start = $current['end'];
	}
// Else start now
	else
	{
		$start = $time;
	}
	include 'find-end.php';
	$query = "SELECT *
	FROM upload
	WHERE start >= ".$time."
	AND special != 'timed';";
	$result = mysqli_query($con, $query);
        while(($delay = mysqli_fetch_assoc($result))
        	&& (strlen($hostStart) < 3) )
        {
        	$newStart = $delay['start'] + $duration;
        	$newEnd = $delay['end'] + $duration;
        	$newScheduled = ' '.$delay['scheduled'].' + '.$duration.' secs';
	        	// Inner is needed
			      $queryInner = "UPDATE upload 
			      SET start = '". $newStart ."',
			      end = '". $newEnd ."',
			      scheduled = '". $newScheduled ."'
			      WHERE id = '".$delay['id'] ."'
			      AND special != 'timed';";
			$resultInner = mysqli_query($con, $queryInner);  
		}
?>