<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
      <!-- Style -->
  <link rel="stylesheet" href="../resources/bootstrap.min.css" />
  <link rel="stylesheet" href="../resources/upload-style.css" />
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
    <!-- Body -->

<?php 
session_start();
?>

<div id="hostFormCnt">

<h2>Welcome to your hosting center</h2>
<h4> Be sure to remember your password with each submit</h4>

<br/>

<form name="uploadForm" id="hostForm" action="../controller/host-form-post.php" method="post" enctype="multipart/form-data">
<div class="form-group">

<div class="input-group">
    <div class="input-group-addon">Enter Headline</div>
      <input class="form-control" type="input" name="hostHeadlineInput" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Max Upload Length in Seconds</div>
      <input class="form-control" type="input" name="hostLengthInput" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Max Queue in Seconds</div>
      <input class="form-control" type="input" name="hostQueueLimitInput" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Clear Queue</div>
      <input class="" type="checkbox" name="hostClearQueueInput" value="yes" />
</div>

<div class="input-group">
  <div class="input-group-addon">Background Image</div>
  <input class="form-control" name="hostBackgroundInput" type="file" />
</div>

<h5>Each host uploads go to the front of the queue</h5> 
<h5>Host uploads have no length limits</h5>

    <div class="input-group">
  <div class="input-group-addon">Enter Youtube URL</div>
  <input class="form-control" type="input" name="hostYoutubeInput" /><br />
</div>

<button class="btn" disabled="disabled"><strong>OR</strong></button>

<div class="input-group">
  <div class="input-group-addon">Upload Audio</div>
  <input class="form-control" name="hostAudioInput" type="file" />
</div>

<div class="input-group">
  <div class="input-group-addon">Attach Image</div>
  <input class="form-control" name="hostImageInput" type="file" />
</div>

<br/>

<h5>Password Required</h5>

<div class="input-group">
    <div class="input-group-addon">Enter Password</div>
      <input class="input-lg" type="input" name="passwordInput" value="1234"/><br />
    </div>
<input class="btn btn-primary hostSubmit" type="submit" name="hostSubmitForm" value="Submit Changes" />

</div>
</form>
</div>

<h3>Below is the current queue in order</h3>
<h5>Refresh to update</h5>

<?php 

include '../connect.php';

$time = time();

// Get current queue
    $query = "SELECT *
    FROM upload 
    WHERE start > '". $time ."';";
// Fetch each row
if ($result = mysqli_query($con, $query))
{
        while($row = mysqli_fetch_assoc($result)) 
        {
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
          echo '<img id="imageCover" src="../images/'.$row['image'].'
          ">';
// Audio load
          // add audio type variable and logic conversion
          echo '<br/><audio controls id="audioPlayer">
          <source src="../audio/'.$row['audio'].'
          " type="audio/mpeg">
            Your browser does not support this audio.
          </audio><br/>';
          }
    }
}

?>

<!-- Script -->
    <script type="text/javascript" src="../resources/jquery-1.8.3.min.js"></script>
    <script src="../resources/bootstrap.min.js"></script>
    <script type="text/javascript" src="../resources/host-script.js"></script>

   </body>
   </html>