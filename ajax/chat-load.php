<?php 
session_start();
date_default_timezone_set('America/New_York');

// Get Slug
$slug = $_POST['slug'];

include '../connect.php';

// This is only for initial load
// ajax/chat-logger.php is used for loading new messages 

// Get chat data
// Select the most recent 50, then order by ASC
$query = "SELECT * from (
        SELECT * from chat
        WHERE slug = '".$slug."'
        order by id DESC limit 50
        ) tmp ORDER BY tmp.id ASC;";
if ($result = mysqli_query($con, $query))
{
    while($row = mysqli_fetch_assoc($result)) 
    {
// Sanitize message
        $message = $row['message'];
        $message = htmlentities($message);
        $message = preg_replace("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i",
          "<a target=\"_blank\" href=\"$1\">$1</a>", $message);
// If name is different or time has passed
        if ($row['timestamp'] > $_SESSION['loadTimestamp'] + 1200
          || $row['name'] != $_SESSION['loadName'])
        {
// Load Name
            echo '<font class="chatName"><strong>'.$row['name'].' </strong></font>';
// Convert and load Timestamp
            $timestamp = $row['timestamp'];
            $timestamp = date("M j, g:i A T", $timestamp);
            echo '<font class="timestamp"> on '.$timestamp.'</font>';
        }
// Set recent timestamp
        $_SESSION['loadTimestamp'] = $row['timestamp'];
// Load Message
        echo '<font class="chatMsg">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        '.nl2br($message).'</font>';
// set most recently loaded chat
        $_SESSION['chat-id'] = $row['id'];
        $_SESSION['loadName'] = $row['name'];
    }
}

?>