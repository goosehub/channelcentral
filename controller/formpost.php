<?php
session_start();

// Create connection
$con = new mysqli("localhost","root","","radio");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



if($_SERVER['REQUEST_METHOD'] == 'POST')
// if(isset($_SESSION['name'])) //also works
{
	header("Location: upload.php");

//set known variables for query
	$name = $_SESSION['name'];
	$name = mysqli_real_escape_string($con, $name);
	$time = time();
	$youtubeInput = $_POST['youtubeInput'];
	$youtubeInput = mysqli_real_escape_string($con, $youtubeInput);
	$typeInput = $_POST['typeInput'];
	$typeInput = mysqli_real_escape_string($con, $typeInput);

//check if youtube input exists
if (strlen($youtubeInput) > 10)
	{
// Get youtube ID from URL
	parse_str( parse_url( $youtubeInput, PHP_URL_QUERY ), $my_array_of_vars );
	$youtubeID = $my_array_of_vars['v'];
//check if valid ID
//if valid, ignore audio and insert youtube into DB
	if (strlen($youtubeID) === 11)
		{
//get youtube video duration and title
		$url = "http://gdata.youtube.com/feeds/api/videos/". $youtubeID;
		$doc = new DOMDocument;
		$doc->load($url);
		$title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
		$duration = $doc->getElementsByTagName('duration')->item(0)->getAttribute('seconds');
// Query
		      $query = "INSERT INTO upload 
		      (name, time, type, youtube, title, duration)
		      VALUES('". $name ."', '". $time ."', '". $typeInput ."',
		       '". $youtubeID ."', '". $title ."', '". $duration ."');";
		      $result = mysqli_query($con, $query);  
//remove uneeded files if exists
		$imageInput = '';
		$audioInput = '';
//Load success view	
		  }
	}
	else
	{

//rest is for file uploads only

// Set error warnings
	$data['errorCode'] = '';
	$data['errorExists'] = '';
	$data['errorInvalid'] = '';

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
		set_time_limit(30); 
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
		  else {
// Move Files
		      move_uploaded_file($_FILES["imageInput"]["tmp_name"],
		      "../images/" . $_FILES["imageInput"]["name"]);
		      move_uploaded_file($_FILES["audioInput"]["tmp_name"],
		      "../audio/" . $_FILES["audioInput"]["name"]);
//Get audio duration
		      $duration = get_duration("../audio", $_FILES["audioInput"]["name"]);
		      $duration = floor($duration);
// Prepare for model
		      $imageInput = $_FILES["imageInput"]["name"];
			  $imageInput = mysqli_real_escape_string($con, $imageInput);
  		      $audioInput = $_FILES["audioInput"]["name"];
			  $audioInput = mysqli_real_escape_string($con, $audioInput);
// Query
		      $query = "INSERT INTO upload 
		      (name, time, audio, image, type, duration)
		      VALUES('". $name ."', '". $time ."', '". $audioInput ."',
		       '". $imageInput ."', '". $typeInput ."', '". $duration ."');";
		      $result = mysqli_query($con, $query);   
//Load success view	
		  }
		}

//Not usable in current form
// 		else if ($data['errorInvalid'] === TRUE)
// 		{
// // General error Reporting
// 			$data['errorInvalid'] = 'Invalid File Size. 200 by 200 pixels is the minimum. 3200 by 3200 is the maximum.';
// // view reporting
// 		}

	}
}

?>