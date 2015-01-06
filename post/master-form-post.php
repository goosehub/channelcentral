<?php

session_start();

include '../connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
// if(isset($_SESSION['name'])) //also works
{
// Redirect after submit
	header("Location: ../load/master.php");

//Set and sanitize known variables for query
	// variable names are long to prevent confusion
	$name = $_SESSION['name'];
	$name = mysqli_real_escape_string($con, $name);
	$time = time();
	date_default_timezone_set('America/New_York');
	$masterShowTitle = $_POST['masterShowTitle'];
	$masterShowTitle = mysqli_real_escape_string($con, $masterShowTitle);
	$masterShowTimeframe = $_POST['masterShowTimeframe'];
	$masterShowTimeframe = mysqli_real_escape_string($con, $masterShowTimeframe);
	$masterShowStart = $_POST['masterShowStart'];
	$masterShowStart = mysqli_real_escape_string($con, $masterShowStart);

	$masterHostName = $_POST['masterHostName'];
	$masterHostName = mysqli_real_escape_string($con, $masterHostName);
	$masterPasswordGenerate = $_POST['masterPasswordGenerate'];
	$masterPasswordGenerate = mysqli_real_escape_string($con, $masterPasswordGenerate);
	$masterHostStart = $_POST['masterHostStart'];
	$masterHostStart = mysqli_real_escape_string($con, $masterHostStart);
	$masterHostEnd = $_POST['masterHostEnd'];
	$masterHostEnd = mysqli_real_escape_string($con, $masterHostEnd);
// Password
	$passwordInput = $_POST['passwordInput'];
	$passwordInput = mysqli_real_escape_string($con, $passwordInput);

// Records readable time before converted
	$masterHostReadStart = $masterHostStart;
	$masterHostReadEnd = $masterHostEnd;

// Translate to unix time
	$masterShowStart = strtotime($masterShowStart);
	$masterHostStart = strtotime($masterHostStart);
	$masterHostEnd = strtotime($masterHostEnd);

// Get Valid Passwords
	include '../ajax/master-password.php';
	$masterPassword = $masterPassword['password'];

// 
// Start Password locked functions
// 
	if (
// MASTER KEY
		$passwordInput === $masterPassword
		)
	{
// Show insert
		if ($masterShowTitle && $masterShowTimeframe && $masterShowStart)
		{
		      $query = "INSERT INTO upcoming 
		      (title, timeframe, start, name)
		      VALUES('". $masterShowTitle ."',
		      '". $masterShowTimeframe ."',
		      '". $masterShowStart ."',
		      '". $name ."');";
		      $result = mysqli_query($con, $query);  
		}
// Show insert
		if ($masterHostName && $masterPasswordGenerate && $masterHostStart 
			&& $masterHostEnd && $masterHostReadStart && $masterHostReadEnd)
		{
		      $query = "INSERT INTO passwords 
		      (name, password, start, end, readStart, readEnd)
		      VALUES('". $masterHostName ."',
		      '". $masterPasswordGenerate ."',
		      '". $masterHostStart ."',
		      '". $masterHostEnd ."',
		      '". $masterHostReadStart ."',
		      '". $masterHostReadEnd ."');";
		      $result = mysqli_query($con, $query);  
		}
	}
}
?>