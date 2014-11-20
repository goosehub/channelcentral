<?php
// Session start is for potential future data needed
session_start();

include 'connect.php';

// Set time
$time = time();

// Query database
$query = "SELECT start, end, duration, youtube, audio, image, special
		FROM upload
		WHERE start <= '".$time."'
		AND end >= '".$time."'
		ORDER BY end DESC
		LIMIT 1;";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
// If end is valid end
		if ($row['end'] > 16)
		{
// If content is youtube video 
			if ($row['youtube'])
			{
// Youtube load
				echo '<iframe id="youtubeFrame" src="//www.youtube.com/embed/
				'.$row['youtube'].'
				?autoplay=1" frameborder="0" allowfullscreen></iframe>';
// Counter logic
				$counter = $row['end'] - $time;
// Convert to milliseconds
				$counter = $counter * 1000;
// Split from data
				echo '|';
// Data is sent with echo.
				echo $counter;
			}
// Else is an upload
			else
			{
//Image load
				echo '<img id="imageCover" src="images/
				'.$row['image'].'
				">';
// Audio load
		// add audio type variable and logic conversion
				echo '<audio controls id="audioPlayer" autoplay="autoplay">
				<source src="audio/
				'.$row['audio'].'
				" type="audio/mpeg">
				  Your browser does not support this audio.
				</audio>';
			}
// Counter logic
				$counter = $row['end'] - $time;
// Convert to milliseconds
				$counter = $counter * 1000;
// Split from data
				echo '|';
// Data is sent with echo.
				echo $counter;
		}
// Else request users for content
		else 
		{
		echo "<h1 id='requestContent'>Upload content to start the show</h1>
		|
		4000";
		}
?>