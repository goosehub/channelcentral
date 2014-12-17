<?php
session_start();

$time = time();

include '../connect.php';

// Find who wrote the most recent message
$query = "SELECT name
        from chat
        WHERE CHAR_LENGTH(name) > 0
        ORDER BY id 
        DESC LIMIT 1;";
$result = mysqli_query($con, $query);
$recentName = mysqli_fetch_assoc($result);

// If new message
if($_SERVER['REQUEST_METHOD'] == 'POST')
// if(isset($_SESSION['name'])) //also works
{
// Set and secure data
	$name = $_SESSION['name'];
	$message = $_POST['text'];
	$message = mysqli_real_escape_string($con, $message);
	date_default_timezone_set('America/New_York');
	$timestamp = date("M j, g:i A");
	$spamLimit = $_SESSION['spamLimit'];
// Check length of message
	if (strlen($message) < 512)
	{
// Check if user is breaking spamLimit
		if ($time < $spamLimit)
		{
			$_SESSION['spamLimit'] = $time + 2;
		}
		else
		{
			$_SESSION['spamLimit'] = $time + 2;
			if ($recentName['name'] === $_SESSION['name']) 
			{
// Insert without name
				$query = "INSERT INTO
		        chat(message, timestamp)
		        VALUES('$message', '$timestamp');"; 
				$result = mysqli_query($con, $query);
			}
			else
			{
// Insert with name
				$query = "INSERT INTO
		        chat(name, message, timestamp)
		        VALUES('$name', '$message', '$timestamp');"; 
				$result = mysqli_query($con, $query);
			}
		}

	}

}  
?>