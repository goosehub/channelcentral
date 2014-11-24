<?php
	$time = time();

	$query = "SELECT *
	FROM upload
	WHERE start >= '".$time."';";
	$result = mysqli_query($con, $query);
        while($delay = mysqli_fetch_assoc($result)) 
        {
        	$newStart = $delay['start'] + $duration;
        	$newEnd = $delay['end'] + $duration;
        	$newScheduled = ' '.$delay['scheduled'].' plus '.$duration.' seconds';
	        	// Inner is needed
			      $queryInner = "UPDATE upload 
			      SET start = '". $newStart ."',
			      end = '". $newEnd ."',
			      scheduled = '". $newScheduled ."'
			      WHERE id = '".$delay['id'] ."';";
			$resultInner = mysqli_query($con, $queryInner);  
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