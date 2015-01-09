<?php 
session_start();
date_default_timezone_set('America/New_York');

$time = time();

include '../connect.php';

// This is only for loading new messages
// ajax/chat-load.php is the initial chat log load

// Get Slug

$slug = $_POST['slug'];

// Tell javascript to reload if session expired
if (! isset($_SESSION['chat-id'])) {
    echo 1;
}
else
{

  $sessChat = $_SESSION['chat-id'];



  // Select most recent post
  $query = "SELECT id
            from chat
            WHERE slug = '".$slug."'
            ORDER BY id DESC LIMIT 1;";
  $result = mysqli_query($con, $query);
  $lastPost = mysqli_fetch_assoc($result);

  // If user is not caught up on chat log
  if ($_SESSION['chat-id'] != $lastPost['id']) 
  {
    // Get chat data
    $query = "SELECT *
            from chat
            WHERE id > ".$_SESSION['chat-id']."
            AND slug = '".$slug."'
            ORDER BY id ASC;";
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
  }

}

?>