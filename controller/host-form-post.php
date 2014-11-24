<?php

session_start();

include '../connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
// if(isset($_SESSION['name'])) //also works
{
// Redirect after submit
	header("Location: ../");

//set known variables for query
	// variable names are long to prevent confusion
	$name = $_SESSION['name'];
	$name = mysqli_real_escape_string($con, $name);
	$time = time();
	$hostHeadlineInput = $_POST['hostHeadlineInput'];
	$hostHeadlineInput = mysqli_real_escape_string($con, $hostHeadlineInput);
	$hostClearQueueInput = $_POST['hostClearQueueInput'];
	$hostClearQueueInput = mysqli_real_escape_string($con, $hostClearQueueInput);
	$hostLengthInput = $_POST['hostLengthInput'];
	$hostLengthInput = mysqli_real_escape_string($con, $hostLengthInput);
	$hostQueueLimitInput = $_POST['hostQueueLimitInput'];
	$hostQueueLimitInput = mysqli_real_escape_string($con, $hostQueueLimitInput);
	$hostYoutubeInput = $_POST['hostYoutubeInput'];
	$hostYoutubeInput = mysqli_real_escape_string($con, $hostYoutubeInput);
	$hostAudioInput = $_POST['hostAudioInput'];
	$hostAudioInput = mysqli_real_escape_string($con, $hostAudioInput);
	$hostImageInput = $_POST['hostImageInput'];
	$hostImageInput = mysqli_real_escape_string($con, $hostImageInput);

	$passwordInput = $_POST['passwordInput'];
	$passwordInput = mysqli_real_escape_string($con, $passwordInput);
	date_default_timezone_set('America/New_York');

	if (
// MASTER KEY
		$passwordInput = '8462'
		||
// Temporary for event hosts
		($passwordInput = '1234'
		&& $time >= 1400000000
		&& $time <= 2400000000)
		)
	{
// Query
		if ($hostHeadlineInput)
		{
		      $query = "UPDATE host 
		      SET headline = '". $hostHeadlineInput ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
		if ($hostLengthInput)
		{
		      $query = "UPDATE host 
		      SET length = '". $hostLengthInput ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
		if ($hostQueueLimitInput)
		{
		      $query = "UPDATE host 
		      SET queue = '". $hostQueueLimitInput ."'
		      WHERE id = 1;";
		      $result = mysqli_query($con, $query);  
		}
		if ($hostClearQueueInput)
		{
		      $query = "DELETE FROM upload 
		      WHERE start > '". $time ."';";
		      $result = mysqli_query($con, $query);  
		}






		
	}
}

?>