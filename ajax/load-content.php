<?php
// Session start is for potential future data needed
session_start();

include '../connect.php';

// Set time
$time = time();

// Get Slug
$slug = $_POST['slug'];

// Query database for current video
include '../ajax/find-current.php';

// Add 1 to the videos viewer count
$query = "UPDATE upload
		SET viewers = viewers + 1
		WHERE id = ".$current['id'].";";
		$result = mysqli_query($con, $query);

// Find how far behind if any user is
$lag = $time - $current['start'];
if ($lag < 4) {
	$lag = 0;
}

// If end is valid end
		if ($current['end'] > 1)
		{
// If content is youtube video 
			if ($current['youtube'])
			{
// Youtube load
				echo '<iframe id="youtubeFrame" src="//www.youtube.com/embed/
				'.$current['youtube'].'
				?autoplay=1&start='.$lag.'" frameborder="0" allowfullscreen></iframe>';
// Counter logic
				$counter = $current['end'] - $time;
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
				echo '<img id="imageCover" src="upload/images/
				'.$current['image'].'
				">';
// Audio load
		// add audio type variable and logic conversion
				echo '<audio controls id="audioPlayer" autoplay="autoplay">
				<source src="upload/audio/
				'.$current['audio'].'
				" type="audio/mpeg">
				  Your browser does not support this audio.
				</audio>';
			}
// Counter logic
				$counter = $current['end'] - $time;
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
		echo "<h1 id='requestContent'>Upload to start the show</h1>
		|
		2000";
		}
?>