<?php

session_start();

include '../connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
// if(isset($_SESSION['name'])) //also works
{
// Redirect after submit
	header("Location: ../");

//set known variables for query
	$name = $_SESSION['name'];
	$name = mysqli_real_escape_string($con, $name);
	$time = time();
	$hostHeadlineInput = $_POST['hostHeadlineInput'];
	$hostClearQueueInput = $_POST['hostClearQueueInput'];
	$passwordInput = $_POST['passwordInput'];
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
		if ($hostClearQueueInput)
		{
		      $query = "DELETE FROM upload 
		      WHERE start > '". $time ."';";
		      $result = mysqli_query($con, $query);  
		}
	}
}

?>