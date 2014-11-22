<?php
session_start();

include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
// if(isset($_SESSION['name'])) //also works
{
// Set and secure data
	$name = $_SESSION['name'];
	$message = $_POST['text'];
	$message = mysqli_real_escape_string($con, $message);
	date_default_timezone_set('America/New_York');
	$timestamp = date("M j, g:i A");
// Check length of message
	if (strlen($message) < 512)
	{
// Insert
		$query = "INSERT INTO
        chat(name, message, timestamp)
        VALUES('$name', '$message', '$timestamp');"; 
		$result = mysqli_query($con, $query);

// Clear all but the latest 32
		$query = "DELETE FROM `chat`
		WHERE id NOT IN (
  		SELECT id
  		FROM ( -- intermediate subquery is required
    	SELECT id
    	FROM `chat`
    	ORDER BY id DESC
    	LIMIT 32 -- keep this many records
  		) foo);"; 
		// foo is for required alias
		$result = mysqli_query($con, $query);

	}

}  
?>