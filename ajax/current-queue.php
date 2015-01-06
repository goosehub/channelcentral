<?php
include '../connect.php';

$time = time();
date_default_timezone_set('America/New_York');

// Get current queue
    $query = "SELECT *
    FROM upload 
    WHERE start > '". $time ."'
    AND special != 'timed'
    ORDER BY start ASC;";
// Fetch each row
if ($result = mysqli_query($con, $query))
{
      while($row = mysqli_fetch_assoc($result)) 
      {
// Display info
        $queueItemStart = date("M j, Y, g:i:s A", $row['start']);
        echo '<div class="queueItem btn btn-default">
              <h3 class="itemInfo">ID: '.$row['id'].'</h3>
              <h3 class="itemInfo">ID: '.$row['name'].'</h3>
              <h3 class="itemInfo">'.$queueItemStart.' EST</h3>';
// If youtube, load youtube
        if ($row['youtube'])
        {
          echo '<iframe id="youtubeFrame" 
          src="//www.youtube.com/embed/'.$row['youtube'].'?autoplay=0" 
          frameborder="0" allowfullscreen></iframe><br/>';
        }
// Else load audio and image
        else
        {
// Image load
          echo '<img id="imageCover" src="../upload/images/'.$row['image'].'
          ">';
// Audio load
        // add audio type variable and logic conversion
          echo '<br/><audio controls id="audioPlayer">
          <source src="../upload/audio/'.$row['audio'].'
          " type="audio/mpeg">
            Your browser does not support this audio.
          </audio><br/>';
        }
        echo '</div>';
    }
}
?>