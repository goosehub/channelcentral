<?php
session_start();

include '../connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
// if(isset($_SESSION['name'])) //also works
{
// Redirect after submit
	header("Location: ../view/upload.php");

//set known variables for query
	$name = $_SESSION['name'];
	$name = mysqli_real_escape_string($con, $name);
	$time = time();
	$limit = $time + 900;
	date_default_timezone_set('America/New_York');
	$youtubeInput = $_POST['youtubeInput'];
	$youtubeInput = mysqli_real_escape_string($con, $youtubeInput);
	// files must be sanitized later

// Load for later
include '../model/host-model.php';

// Load for now
include '../model/queue-limit.php';
	if ($queueLimit['end'] > 1)
	{
		// for passing errors later
	}
	else {

//check if youtube input exists
if (strlen($youtubeInput) > 10)
	{

//youtube logic below

// Get youtube ID from URL
	parse_str( parse_url( $youtubeInput, PHP_URL_QUERY ), $my_array_of_vars );
	$youtubeID = $my_array_of_vars['v'];

// Check database to see if youtubeID already exists
			$query = "SELECT youtube
			FROM upload
			WHERE youtube = '".$youtubeID."';";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_assoc($result);

//check if valid and non repeating youtubeID
//if valid, ignore audio and insert youtube into DB
	if (strlen($youtubeID) === 11
		&& $row['youtube'] !== $youtubeID)
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

//check duration
		if ($duration < $host['length'])
		{
// Find next available slot
		include '../model/find-slot.php';
			if ($slot['end'] > 1)
			{
				$start = $slot['end'];
			}
			else {
				$start = $time;
			}
			$end = $start + $duration;
			$scheduled = date("M j, Y, g:i:s a", $start);

// Query
		      $query = "INSERT INTO upload 
		      (name, time, youtube, duration, start, end, scheduled)
		      VALUES('". $name ."', '". $time ."',
		       '". $youtubeID ."', '". $duration ."', '". $start ."',
		        '". $end ."', '". $scheduled ."');";
		      $result = mysqli_query($con, $query);  

//remove uneeded files if exists
			$imageInput = '';
			$audioInput = '';
			}
		}
	}
	else
	{


//rest is for file uploads only


// GetID3 function
	function get_duration($audioPath, $audioFile) 
	{ 
// include getID3() library 
	require_once('../resources/getID3-1.9.8/getid3/getid3.php'); 
	$getID3 = new getID3();
//set up path
	$FullFileName = realpath($audioPath.'/'.$audioFile); 
	if (is_file($FullFileName)) { 
//limit time to work function
		set_time_limit(60); 
//analyze
		$ThisFileInfo = $getID3->analyze($FullFileName); 
		getid3_lib::CopyTagsToComments($ThisFileInfo); 
//return seconds
		$duration = $ThisFileInfo['playtime_seconds']; 
		return $duration; 
		} 
	} 

// File info
		$image_info = getimagesize($_FILES["imageInput"]["tmp_name"]);
		$audio_info = filesize($_FILES["audioInput"]["tmp_name"]);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
		$allowedExts = array("gif", "jpeg", "jpg", "png", "mp3", "ogg", "flak", "wav");
		$temp = explode(".", $_FILES["imageInput"]["name"]);
		$extension = end($temp);

//Validate
		if (
		(
		   ($_FILES["imageInput"]["type"] == "image/gif")
		|| ($_FILES["imageInput"]["type"] == "image/jpeg")
		|| ($_FILES["imageInput"]["type"] == "image/jpg")
		|| ($_FILES["imageInput"]["type"] == "image/pjpeg")
		|| ($_FILES["imageInput"]["type"] == "image/x-png")
		|| ($_FILES["imageInput"]["type"] == "image/png")
		)
		&& ($_FILES["imageInput"]["size"] < 1600000)
		&& ($_FILES["audioInput"]["size"] < 64000000)
		&& ($image_height < 3200)
		&& ($image_width < 3200)
		&& ($image_height > 200)
		&& ($image_width > 200)
		&& in_array($extension, $allowedExts)
		) 
		{	
// Error check
		  if ($_FILES["imageInput"]["error"] > 0) {
		    $data['errorCode'] = "Return Code: " . $_FILES["imageInput"]["error"] . "<br>";
		  } 
		  else if ($_FILES["audioInput"]["error"] > 0) {
		    $data['errorCode'] = "Return Code: " . $_FILES["audioInput"]["error"] . "<br>";
		  } 
		  else
		  {
// Rename file to UNIX time
	          $filename = time().'.'.$extension;
// Move Files
		      move_uploaded_file($_FILES["imageInput"]["tmp_name"],
		      "../images/" . $filename);
		      move_uploaded_file($_FILES["audioInput"]["tmp_name"],
		      "../audio/" . $_FILES["audioInput"]["name"]);

//Get audio duration
		      $duration = get_duration("../audio", $_FILES["audioInput"]["name"]);
		      $duration = floor($duration);
// Add time for ads and loading time
// Will need monitoring for adjusting
		      $duration = $duration + 5;
		      		if ($duration < $host['length'])
		      		{
// find next available slot
				include '../model/find-slot.php';
		      			if ($slot['end'] > 16)
		      			{
		      				$start = $slot['end'];
		      			}
		      			else {
		      				$start = $time;
		      			}
		      			$end = $start + $duration;
						$scheduled = date("M j, Y, g:i:s a", $start);

// Prepare for model
			      $imageInput = $filename;
				  $imageInput = mysqli_real_escape_string($con, $imageInput);
	  		      $audioInput = $_FILES["audioInput"]["name"];
				  $audioInput = mysqli_real_escape_string($con, $audioInput);

// Query
			      $query = "INSERT INTO upload 
			      (name, time, audio, image, duration, start, end, scheduled)
			      VALUES('". $name ."', '". $time ."', '". $audioInput ."',
			       '". $imageInput ."', '". $duration ."'
			       , '". $start ."', '". $end ."', '". $scheduled ."');";
			      $result = mysqli_query($con, $query);   
				    }
			    }
			}
		}
	}
}

?>