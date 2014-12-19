<?php
  $time = time();
  date_default_timezone_set('America/New_York');

  // Get current queue
      $query = "SELECT *
      FROM upcoming 
      WHERE start > '". $time ."'
      ORDER BY start ASC;";
  // Fetch each row
  if ($result = mysqli_query($con, $query))
  {
        while($row = mysqli_fetch_assoc($result)) 
        {
    $row['title'] = htmlentities($row['title']);
    $row['timeframe'] = htmlentities($row['timeframe']);
        	?>
    <div class="event">
  	  <p class="name"><?php echo $row['title'] ?></p>
  	  <p class="time"><?php echo $row['timeframe'] ?></p>
    </div>
    <?php
        }
    }
?>