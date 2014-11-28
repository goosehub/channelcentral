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

<h2 id="welcome">Welcome to your hosting center</h2>
<h4>When ready, enter Password and Submit</h4>

<form name="uploadForm" id="hostForm" action="../controller/host-form-post.php" method="post" enctype="multipart/form-data">
<div class="form-group">

<div class="input-group hostPassword">
    <div class="input-group-addon">Enter Password</div>
      <input class="input-lg" type="input" name="passwordInput" value="1234"/><br />
    </div>

<input class="btn btn-primary hostSubmit" type="submit" name="hostSubmitForm" value="Submit Changes" />

<h5>Changes can take up to 30 seconds to take effect</h5>

<h3>Host Uploads</h3>
<h5 class="note">Host uploads go to the front of the queue</h5> 
<h5 class="note">Host uploads have no length and size limits</h5>

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

<button class="btn" disabled="disabled"><strong>OPTIONAL</strong></button>

<div class="input-group">
    <div class="input-group-addon">UNIX time start</div>
      <input class="form-control" type="input" name="hostStart" /><br />
    </div>
      <a href="http://www.unixtimestamp.com/" target="_blank">UNIX converter</a>

<h3>Host Settings</h3>

<h5 class="note">Turn Length and Queue to 0 to turn off user uploads</h5>

<div class="input-group">
    <div class="input-group-addon">Headline</div>
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
  <div class="input-group-addon">Background Image</div>
  <input class="form-control" name="hostBackgroundInput" type="file" />
</div>

<div class="input-group">
    <div class="input-group-addon">Clear Currently Playing</div>
      <input class="checkbox" class="" type="checkbox" name="hostClearCurrent" value="yes" />
</div>

<div class="input-group">
    <div class="input-group-addon">Clear Upcoming Queue</div>
      <input class="checkbox" class="" type="checkbox" name="hostClearQueueInput" value="yes" />
</div>

<div class="input-group">
    <div class="input-group-addon">Remove Queue Item by ID</div>
      <input class="form-control" type="input" name="hostDeleteItem" /><br />
    </div>

<h3>Current Queue</h3>
<h5 class="note">Ordered by start time, not by ID</h5>
<div id="reloadQueue" class="btn btn-success">Click here to refresh</div>

  <div id="currentQueue">

  <?php 

  include '../model/current-queue.php';

  ?>

  </div>

</div>
</form>
</div>

<!-- Script -->
    <script type="text/javascript" src="../resources/jquery-1.8.3.min.js"></script>
    <script src="../resources/bootstrap.min.js"></script>
    <script type="text/javascript" src="../resources/host-script.js"></script>

   </body>
   </html>