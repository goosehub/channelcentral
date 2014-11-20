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
// Insert
			$query = "INSERT INTO
                chat(name, message)
            VALUES('$name', '$message')"; 
			$result = mysqli_query($con, $query);

}  
?>