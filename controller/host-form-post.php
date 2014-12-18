<?php

session_start();

include '../connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
// if(isset($_SESSION['name'])) //also works
{
// Redirect after submit
	header("Location: ../view/host.php");

//Set and sanitize known variables for query
	// variable names are long to prevent confusion
	$special = 'host';
	$name = $_SESSION['name'];
	$name = mysqli_real_escape_string($con, $name);
	$time = time();
	date_default_timezone_set('America/New_York');
	$hostCurrentShowNameInput = $_POST['hostCurrentShowNameInput'];
	$hostCurrentShowNameInput = mysqli_real_escape_string($con, $hostCurrentShowNameInput);
	$hostCurrentShowDescInput = $_POST['hostCurrentShowDescInput'];
	$hostCurrentShowDescInput = mysqli_real_escape_string($con, $hostCurrentShowDescInput);
	$hostHeadlineInput = $_POST['hostHeadlineInput'];
	$hostHeadlineInput = mysqli_real_escape_string($con, $hostHeadlineInput);
	$hostLengthInput = $_POST['hostLengthInput'];
	$hostLengthInput = mysqli_real_escape_string($con, $hostLengthInput);
	$hostQueueLimitInput = $_POST['hostQueueLimitInput'];
	$hostQueueLimitInput = mysqli_real_escape_string($con, $hostQueueLimitInput);
	$hostStart = $_POST['hostStart'];
	$hostStart = mysqli_real_escape_string($con, $hostStart);
	$hostYoutubeInput = $_POST['hostYoutubeInput'];
	$hostYoutubeInput = mysqli_real_escape_string($con, $hostYoutubeInput);
	$hostNavPurple = $_POST['hostNavPurple'];
	$hostNavPurple = mysqli_real_escape_string($con, $hostNavPurple);
	$hostNavOrange = $_POST['hostNavOrange'];
	$hostNavOrange = mysqli_real_escape_string($con, $hostNavOrange);
	$hostNavGreen = $_POST['hostNavGreen'];
	$hostNavGreen = mysqli_real_escape_string($con, $hostNavGreen);
	// files must be sanitized later

// Get Valid Passwords
	include '../model/host-password.php';
	$hostPassword = $hostPassword['password'];
	include '../model/master-password.php';
	$masterPassword = $masterPassword['password'];

// Translate hostStart into UNIX
	$hostStart = strtotime($hostStart);

// Allowed tags for host navbar
	$whiteTags = '<iframe><a><abbr><acronym><address><area><b><bdo><big><blockquote><br><button><caption><center><cite><code><col><colgroup><dd><del><dfn><dir><div><dl><dt><em><fieldset><font><form><h1><h2><h3><h4><h5><h6><hr><i><img><input><ins><kbd><label><legend><li><map><menu><ol><optgroup><option><p><pre><q><s><samp><select><small><span><strike><strong><sub><sup><table><tbody><td><textarea><tfoot><th><thead><u><tr><tt><u><ul><var>';

// If current video will be clear, set as ID to be deleted
	if (isset($_POST['hostClearCurrent'])) {
		include '../model/find-current.php';
		$hostDeleteItem = $current['id'];
	}
// Else, prepare any other ID's to be deleted
	else
	{
		$hostDeleteItem = $_POST['hostDeleteItem'];
		$hostDeleteItem = mysqli_real_escape_string($con, $hostDeleteItem);
	}

	$passwordInput = $_POST['passwordInput'];
	$passwordInput = mysqli_real_escape_string($con, $passwordInput);

// 
// Start Password locked functions
// 
	if (
// MASTER KEY
		$passwordInput === $masterPassword
		||
// Temporary for event hosts
		$passwordInput === $hostPassword
		)
	{
// Current show Name
		if ($hostCurrentShowNameInput)
		{
		      $query = "UPDATE host 
		      SET showName = '". $hostCurrentShowNameInput ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
// Current Show Description
		if ($hostCurrentShowDescInput)
		{
		      $query = "UPDATE host 
		      SET showDescription = '". $hostCurrentShowDescInput ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
// Headline
		if ($hostHeadlineInput)
		{
		      $query = "UPDATE host 
		      SET headline = '". $hostHeadlineInput ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
// Nav Purple
		if ($hostNavPurple)
		{
			$hostNavPurple = strip_tags($hostNavPurple, $whiteTags);
			$hostNavPurple = preg_replace("/<iframe/i", "<iframe sandbox", $hostNavPurple);
		      $query = "UPDATE host 
		      SET purple = '". $hostNavPurple ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
// Nav Orange
		if ($hostNavOrange)
		{
			$hostNavOrange = strip_tags($hostNavOrange, $whiteTags);
			$hostNavOrange = preg_replace("/<iframe/i", "<iframe sandbox", $hostNavOrange);
		      $query = "UPDATE host 
		      SET orange = '". $hostNavOrange ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
// Nav Green
		if ($hostNavGreen)
		{
			$hostNavGreen = strip_tags($hostNavGreen, $whiteTags);
			$hostNavGreen = preg_replace("/<iframe/i", "<iframe sandbox", $hostNavGreen);
		      $query = "UPDATE host 
		      SET green = '". $hostNavGreen ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
// Max Length
		if ($hostLengthInput)
		{
		      $query = "UPDATE host 
		      SET length = '". $hostLengthInput ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
// Max Queue
		if ($hostQueueLimitInput)
		{
		      $query = "UPDATE host 
		      SET queue = '". $hostQueueLimitInput ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
// Clear Past Uploads
		if (isset($_POST['hostClearPastUploads']))
		{
		      $query = "DELETE FROM upload 
		      WHERE end < '". $time ."';";
		      $result = mysqli_query($con, $query);  
		}
// Clear Queue
		if (isset($_POST['hostClearQueueInput']))
		{
		      $query = "DELETE FROM upload 
		      WHERE start > '". $time ."'
		      AND special != 'timed';";
		      $result = mysqli_query($con, $query);  
		}
// If current or future is being cleared
		if (isset($hostDeleteItem)
			|| isset($_POST['hostClearCurrent']))
		{
// Check if current is deleted
			if (isset($_POST['hostClearCurrent']))
			{
// change number to whatever the current hostInfo refresh time is
// Keep consistant
				$reloadTime = $time + 20;
// Set reload command to be found by client
			    $query = "UPDATE host 
			    SET reload = '". $reloadTime ."'
			    WHERE id = 1;";
			    $result = mysqli_query($con, $query); 
// Set ID to be deleted to be the current
			include '../model/find-current.php';
			$hostDeleteItem = $current['id'];
			}
// find duration of deleted item
			$query = "SELECT * FROM upload 
			WHERE id = '". $hostDeleteItem ."';";
			$deleteItemResult = mysqli_query($con, $query); 
			$deletedItem = mysqli_fetch_assoc($deleteItemResult);
// Deleted selected
		    $query = "DELETE FROM upload 
		    WHERE id = '". $hostDeleteItem ."';";
		    $deletedResult = mysqli_query($con, $query); 
// Move the rest forward that are not timed
  		    $query = "SELECT * FROM upload 
		    WHERE special != 'timed'
		    AND start >= '".$deletedItem['start']."';";
			if ($advanceResult = mysqli_query($con, $query))
			{
		        while($advance = mysqli_fetch_assoc($advanceResult)) 
		        {
// Set new time slot
		        	$newStart = $advance['start'] - $deletedItem['duration'];
		        	$newEnd = $advance['end'] - $deletedItem['duration'];
		        	$newScheduled = ''.$advance['scheduled'].' - '.$deletedItem['duration'].' secs';
		        	$query = "UPDATE upload 
						      SET start = '". $newStart ."',
						      end = '". $newEnd ."',
						      scheduled = '". $newScheduled ."'
						      WHERE id = '".$advance['id'] ."'
						      AND special != 'timed';";
		        	$result = mysqli_query($con, $query); 
		        }
		    }
		}
// Upload new background image
		if ($_FILES["hostBackgroundInput"]["name"])
		{
// File info
			$image_info = getimagesize($_FILES["hostBackgroundInput"]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["hostBackgroundInput"]["name"]);
			$extension = end($temp);
//Validate
			if (
			(
			   ($_FILES["hostBackgroundInput"]["type"] == "image/gif")
			|| ($_FILES["hostBackgroundInput"]["type"] == "image/jpeg")
			|| ($_FILES["hostBackgroundInput"]["type"] == "image/jpg")
			|| ($_FILES["hostBackgroundInput"]["type"] == "image/pjpeg")
			|| ($_FILES["hostBackgroundInput"]["type"] == "image/x-png")
			|| ($_FILES["hostBackgroundInput"]["type"] == "image/png")
			)
			&& ($_FILES["hostBackgroundInput"]["size"] < 320000000)
			// && ($image_height < 100000)
			// && ($image_width < 100000)
			// && ($image_height > 100)
			// && ($image_width > 100)
			&& in_array($extension, $allowedExts)
			) 
			{	
// Error check
			  if ($_FILES["hostBackgroundInput"]["error"] > 0) {
			    $data['errorCode'] = "Return Code: " . $_FILES["hostBackgroundInput"]["error"] . "<br>";
			  } 
			  else
			  {
// Rename file to UNIX time
          $filename = time().'.'.$extension;

// Move Files
		      move_uploaded_file($_FILES["hostBackgroundInput"]["tmp_name"],
		      "../upload/background/" . $filename);
// Prepare for model
		      $hostBackgroundInput = $filename;
// Query
		      $query = "UPDATE host 
		      SET background = '". $hostBackgroundInput ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
	}
}

// 
// Upload
// 

	if (strlen($hostYoutubeInput) > 10)
		{

//youtube logic below

// Get youtube ID from URL
		parse_str( parse_url( $hostYoutubeInput, PHP_URL_QUERY ), $my_array_of_vars );
		$youtubeID = $my_array_of_vars['v'];

//check if valid
//if valid, ignore audio and insert youtube into DB
			if (strlen($youtubeID) === 11)
				{
//get youtube video duration and title
				$url = "http://gdata.youtube.com/feeds/api/videos/". $youtubeID;
				$doc = new DOMDocument;
				$doc->load($url);
					// title is not retrieved for all videos 
				// $title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
				$duration = $doc->getElementsByTagName('duration')->item(0)->getAttribute('seconds');
				// Add time for ads and loading time
				// Will need monitoring for adjusting
				$duration = $duration + 5;

// Find next available slot
				include '../model/host-insert.php';
// Query
			      $query = "INSERT INTO upload 
			      			(name, time, youtube, duration,
			      			start, end, scheduled, special)
			      			VALUES('". $name ."', '". $time ."',
			       			'". $youtubeID ."', '". $duration ."', '". $start ."',
			       			'". $end ."', '". $scheduled ."', '".$special."');";
			      $result = mysqli_query($con, $query);  

//remove uneeded files if exists
				$hostImageInput = '';
				$hostAudioInput = '';
				}
			}
			if ($_FILES["hostAudioInput"]["size"] > 1)
			{


				//rest is for file uploads only


// GetID3 function
			function get_duration($audioPath, $audioFile) 
			{ 
			// include getID3() library 
			require_once('../resources/tools/getID3-1.9.8/getid3/getid3.php'); 
			$getID3 = new getID3();
			//set up path
			$FullFileName = realpath($audioPath.'/'.$audioFile); 
			if (is_file($FullFileName)) { 
			//limit time to work function
				set_time_limit(120); 
			//analyze
				$ThisFileInfo = $getID3->analyze($FullFileName); 
				getid3_lib::CopyTagsToComments($ThisFileInfo); 
			//return seconds
				$duration = $ThisFileInfo['playtime_seconds']; 
				return $duration; 
				} 
			} 

// File info
				$image_info = getimagesize($_FILES["hostImageInput"]["tmp_name"]);
				$audio_info = filesize($_FILES["hostAudioInput"]["tmp_name"]);
				$image_width = $image_info[0];
				$image_height = $image_info[1];
				$allowedExts = array("gif", "jpeg", "jpg", "png", "mp3", "ogg", "flak", "wav");
				$temp = explode(".", $_FILES["hostImageInput"]["name"]);
				$extension = end($temp);

//Validate
				if (
				(
				   ($_FILES["hostImageInput"]["type"] == "image/gif")
				|| ($_FILES["hostImageInput"]["type"] == "image/jpeg")
				|| ($_FILES["hostImageInput"]["type"] == "image/jpg")
				|| ($_FILES["hostImageInput"]["type"] == "image/pjpeg")
				|| ($_FILES["hostImageInput"]["type"] == "image/x-png")
				|| ($_FILES["hostImageInput"]["type"] == "image/png")
				)
				&& ($_FILES["hostImageInput"]["size"] < 8000000)
				&& ($_FILES["hostAudioInput"]["size"] < 64000000000)
				&& ($image_height < 3200)
				&& ($image_width < 3200)
				&& ($image_height > 200)
				&& ($image_width > 200)
				&& in_array($extension, $allowedExts)
				) 
				{	
// Error check
				  if ($_FILES["hostImageInput"]["error"] > 0) {
				    $data['errorCode'] = "Return Code: " . $_FILES["hostImageInput"]["error"] . "<br>";
				  } 
				  else if ($_FILES["hostAudioInput"]["error"] > 0) {
				    $data['errorCode'] = "Return Code: " . $_FILES["hostAudioInput"]["error"] . "<br>";
				  } 
				  else
				  {
// Rename file to UNIX time
	          $filename = time().'.'.$extension;

// Move Files
				      move_uploaded_file($_FILES["hostImageInput"]["tmp_name"],
				      "../upload/images/" . $filename);
				      move_uploaded_file($_FILES["hostAudioInput"]["tmp_name"],
				      "../upload/audio/" . $_FILES["hostAudioInput"]["name"]);

//Get audio duration
				      $duration = get_duration("../upload/audio", $_FILES["hostAudioInput"]["name"]);
				      $duration = floor($duration);
// Add time for ads and loading time
// Will need monitoring for adjusting
				      $duration = $duration + 5;

// Find next available slot
					  include '../model/host-insert.php';

// Prepare for model
				      $hostImageInput = $filename;
		  		      $hostAudioInput = $_FILES["hostAudioInput"]["name"];
					  $hostAudioInput = mysqli_real_escape_string($con, $hostAudioInput);

// Query
				      $query = "INSERT INTO upload 
				      (name, time, audio, image, duration, start, end, scheduled, special)
				      VALUES('". $name ."', '". $time ."', '". $hostAudioInput ."',
				       '". $hostImageInput ."', '". $duration ."'
				       , '". $start ."', '". $end ."', '". $scheduled ."', '".$special."');";
				      $result = mysqli_query($con, $query);   
				  }
		    }
		}
	}
}

?>