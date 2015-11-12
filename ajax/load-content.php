<?php
session_start();
include '../connect.php';

// Used for loading content into the play view

// Set time
$time = time();

// Get Slug
$slug = $_POST['slug'];

// Query database for host info
include '../ajax/host-ajax.php';

// Audio Stream
if ($host['audio_stream_on'] === '1')
{
// Embed audio stream
	?>
	<audio controls autoplay id="audio_stream_element">
	  <source src="<?php echo $host['audio_stream']; ?>">
	  Try a different browser to listen to this stream
	</audio>
	<?php
// Split from data
	echo '|';
// Data is sent with echo.
	echo 10000000000000000;
}
// Twitch
if ($host['twitch_on'] === '1')
{
// Embed twitch stream
	?>
	<iframe id="twitchFrame" src="http://www.twitch.tv/<?php echo $host["twitch"]; ?>/embed" frameborder="0" scrolling="no"></iframe> 
	<?php
// Split from data
	echo '|';
// Data is sent with echo.
	echo 10000000000000000;
}
// Other media
else
{
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
// If repeat, tell users it is a repeat
			if ($current['special'] === 'repeat') {
			    echo '<h2 id="repeatNotice">Replay</h2>' ;
			}
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
// Audio uploads disabled, so this comment disabled
//Image load
			// echo '<img id="imageCover" src="upload/images/
			// '.$current['image'].'
			// ">';
// Audio load
	// add audio type variable and logic conversion
			// echo '<audio controls id="audioPlayer" autoplay="autoplay">
			// <source src="upload/audio/
			// '.$current['audio'].'
			// " type="audio/mpeg">
			//   Your browser does not support this audio.
			// </audio>';
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
// Get a random video
		$query = "SELECT *
		FROM upload
		WHERE slug = '".$slug."'
		AND special != 'repeat'
		ORDER BY RAND()
		LIMIT 1;";
		$result = mysqli_query($con, $query);
		$current = mysqli_fetch_assoc($result);
// Get room info
		include 'host-ajax.php';
// If shuffle is off, or this room has never had an upload, request for content
		if (empty($current) || $host['shuffle'] === '0')
		{
// Pipe is used to split data
			echo "<h1 id='requestContent'>Upload to start the show</h1>
			|
			2000";
// Else, load a random video into playlist
		} else {
// Calculate and store values
			$name = 'repeat2424';
			$time = time();
			$youtubeID = $current['youtube'];
			$duration = $current['duration'] + 5;
			$start = time();
// Find natural end
			$end = $start + $duration;
// Check if timed uploads will have to cutoff this upload
			$query = "SELECT *
			FROM upload
			WHERE start >= '".$start."'
			AND start <= '".$end."'
			AND special = 'timed'
		    AND slug = '".$slug."'
			ORDER BY start ASC
			LIMIT 1;";
			$result = mysqli_query($con, $query);
			$cutoff = mysqli_fetch_assoc($result);
// If so, end is start of timed video
			if (strlen($cutoff['start']) > 2)
			{
				$end = $cutoff['start'];
			}
// Record information
			$scheduled = date("M j, Y, g:i:s a", $start);
			$special = 'repeat';
			$slug = $slug;
// Insert into database as a repeat
		    $query = "INSERT INTO upload 
		      		(name, time, youtube, duration,
		      		start, end, scheduled, special, slug)
		      		VALUES('". $name ."', '". $time ."',
		       		'". $youtubeID ."', '". $duration ."', '". $start ."',
		       		'". $end ."', '". $scheduled ."', '".$special."', '".$slug."');";
		    $result = mysqli_query($con, $query); 
// Tell users it is a repeat
		    echo '<h2 id="repeatNotice">Repeat</h2>' ;
// Youtube load
			echo '<iframe id="youtubeFrame" src="//www.youtube.com/embed/
			'.$current['youtube'].'
			?autoplay=1" frameborder="0" allowfullscreen></iframe>';
// Counter logic
			$counter = $current['duration'];
// Convert to milliseconds
			$counter = $counter * 1000;
// Split from data
			echo '|';
// Data is sent with echo.
			echo $counter;
// Request for content turned off
			// echo "<h1 id='requestContent'>Upload to start the show</h1>
			// |
			// 2000";
		}			
	}
}
?>