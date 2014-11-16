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
	header("Location: /s4sradio/index.php");

	$name = $_SESSION['name'];
	$message = $_POST['text'];
	$message = mysqli_real_escape_string($con, $message);
			$operation = "INSERT INTO
                chat(name, message)
            VALUES('$name', '$message')"; 
			$result = mysqli_query($con, $operation);

}  
?>