<?php 

// Create connection
$con = new mysqli("localhost","root","","radio");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT *
            from chat
            ORDER BY id DESC;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
                  if (! $row['name'] == "" && ! $row['message'] == "") {
                    $message = $row['message'];
                    $message = htmlentities($message);
                    echo '<strong>
                    <font class="chatName">'.$row['name'].'</font>
                      </strong><br><font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      '.nl2br($message).'<font><br>';
                    }
          }
}

?>