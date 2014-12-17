<?php 
session_start();

include '../connect.php';

// This is only for loading new messages
// model/chat-load.php is the initial chat log load

// Get last loaded message
$sessChat = $_SESSION['chat-id'];

// Select most recent post
$query = "SELECT id
          from chat
          ORDER BY id DESC LIMIT 1;";
$result = mysqli_query($con, $query);
$lastPost = mysqli_fetch_assoc($result);

// If user is caught up on chat log
if ($_SESSION['chat-id'] === $lastPost['id']) 
{
// Send wait message to client script
  echo 'wait';
}
// Else, load log.
else
{
  // Get chat data
  $query = "SELECT *
          from chat
          WHERE id > ".$_SESSION['chat-id']."
          ORDER BY id ASC;";
  if ($result = mysqli_query($con, $query))
  {
    while($row = mysqli_fetch_assoc($result)) 
    {
            if (! $row['name'] == "" || ! $row['message'] == "") {
              $message = $row['message'];
              $message = htmlentities($message);
              $message = preg_replace("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i",
                "<a target=\"_blank\" href=\"$1\">$1</a>", $message);
// Prevent running html
// Load name and message
              if (! $row['name'] == "") {
              echo '<font class="chatName"><strong>'.$row['name'].' </strong></font>
              <font class="timestamp"> on '.$row['timestamp'].' EST</font>';
              }
              echo '<font class="chatMsg">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              '.nl2br($message).'</font>';
// set most recently loaded chat
              $_SESSION['chat-id'] = $row['id'];
              // echo $_SESSION['chat-id'];
              }
    }
  }
}

?>