<?php 

include 'connect.php';

// Get chat data
$sql = "SELECT *
            from chat
            ORDER BY id DESC;";
if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
                  if (! $row['name'] == "" && ! $row['message'] == "") {
                    $message = $row['message'];
// Prevent running html
                    $message = htmlentities($message);
// Load name and message
                    echo '<strong>
                    <font class="chatName">'.$row['name'].'</font>
                      </strong><br><font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      '.nl2br($message).'<font><br>';
                    }
          }
}

?>