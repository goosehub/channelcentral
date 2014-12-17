<?php 
session_start();

include '../connect.php';

// This is only for initial load
// model/chat-logger.php is used for loading new messages 

// Get chat data
$query = "SELECT *
        from chat
        ORDER BY id ASC;";
if ($result = mysqli_query($con, $query))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
                  if (! $row['name'] == "" || ! $row['message'] == "") {
                    $message = $row['message'];
                    $message = htmlentities($message);
                    $message = preg_replace("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i","<a target=\"_blank\" href=\"$1\">$1</a>", $message);
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

?>