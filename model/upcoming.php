<?php

include '../connect.php';

$time = time();
date_default_timezone_set('America/New_York');

// Get current queue
    $query = "SELECT *
    FROM schedule 
    WHERE start > '". $time ."'
    ORDER BY start ASC;";
// Fetch each row
if ($result = mysqli_query($con, $query))
{
      while($row = mysqli_fetch_assoc($result)) 
      {
      	?>
  <div class="event">
	  <p class="name"><?php echo $row['title'] ?></p>
	  <p class="time"><?php echo $row['timeframe'] ?></p>
  </div>
  <?php
      }
  }
?>