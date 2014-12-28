<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
      <!-- Style -->
  <link rel="stylesheet" href="../resources/tools/bootstrap.min.css" />
  <link rel="stylesheet" href="../resources/upload-style.css" />
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="../resources/images/favicon.ico">
  <title>
  HOST center
  </title>
</head>

<body>
    <!-- Body -->

<?php 
session_start();
?>

<div id="hostFormCnt">

<h2 id="welcome">Welcome to the hosting center</h2>
<h4>During beta, this page is available to all users except during events</h4>

<form name="uploadForm" id="hostForm" action="../controller/host-form-post.php" method="post" enctype="multipart/form-data">
<div class="form-group">

<div class="input-group hostPassword">
    <div class="input-group-addon passwordAddon">Enter Password</div>
    <!-- Remove value="1234" when risk of unauthorized users exists or password changes -->
      <input class="input-lg" type="input" name="passwordInput" value="1234"/><br />
    </div>

<input class="btn btn-primary hostSubmit" type="submit" name="hostSubmitForm" value="Submit Changes" />

<h3>Host Settings</h3>

<h5 class="note">-Set Length or Queue to 1 to turn off user uploads</h5>

<div class="input-group">
    <div class="input-group-addon">Headline</div>
      <input class="form-control" type="input" name="hostHeadlineInput" /><br />
    </div>

<div class="input-group">
  <div class="input-group-addon">Background Image</div>
  <input class="form-control" name="hostBackgroundInput" type="file" />
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
    <div class="input-group-addon">Current Show Name</div>
      <input class="form-control" type="input" name="hostCurrentShowNameInput" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Current Show Description</div>
      <textarea class="form-control" type="input" name="hostCurrentShowDescInput" /></textarea><br />
    </div>

<h3>Host Uploads</h3>
<h5 class="note">-Host uploads go to the front of the queue | Host uploads have no length and size limits</h5>

    <div class="input-group">
  <div class="input-group-addon">Enter Youtube URL</div>
  <input class="form-control" type="input" name="hostYoutubeInput" /><br />
</div>

<button class="btn hostOr" disabled="disabled"><strong>OR</strong></button>

<div class="input-group">
  <div class="input-group-addon">Upload Audio</div>
  <input class="form-control" name="hostAudioInput" type="file" />
</div>

<div class="input-group">
  <div class="input-group-addon">Attach Image</div>
  <input class="form-control" name="hostImageInput" type="file" />
</div>

<button class="btn hostOr" disabled="disabled"><strong>OPTIONAL</strong></button>

<div class="input-group">
    <div class="input-group-addon">Start time</div>
      <input class="form-control" type="input" name="55ostStart" placeholder="YYYY-MM-DD HH:MM:SSPM" /><br />
    </div>
<h5 class="note">-Format is YYYY-MM-DD HH:MM:SSPM | All times are EST (New York Time)</h5>


<h3>Navbar</h3>
<h5 class="note">-Enter any HTML you want loaded on click.</h5>

<div class="input-group">
    <div class="input-group-addon">Navbar Viewer Purple</div>
      <input class="form-control" type="input" name="hostNavPurple" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Navbar Viewer Orange</div>
      <input class="form-control" type="input" name="hostNavOrange" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Navbar Viewer Green</div>
      <input class="form-control" type="input" name="hostNavGreen" /><br />
    </div>
<h5 class="note">-<a href="http://getbootstrap.com/css/">Bootstrap HTML, CSS, and JS Framework</a> classes are included for your use.</h5>
<h5 class="note">-Use <a href="http://7thspace.com/webmaster_tools/iframe_generator.html" target="_blank">this iframe generator tool</a> to easily embed websites.</h5>
<h5 class="note">-Sandbox attribute (disabled javascript) is applied to iframes for security reasons.</h5>
<h5 class="note">-Only iframe and <a href="https://quip.com/aO0pAZO9m9SG" target="_blank">gmail valid tags</a> are valid to use for security reasons.</h5>
<h5 class="note">-Set width and height in percent to prevent scroll bars from appearing.</h5>

<h3>Upload Maintenance</h3>

<div class="input-group">
    <div class="input-group-addon">Remove Queue Item by ID</div>
      <input class="form-control" type="input" name="hostDeleteItem" /><br />
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
    <div class="input-group-addon">Clear Past Uploads</div>
      <input class="checkbox" class="" type="checkbox" name="hostClearPastUploads" value="yes" />
</div>

<h3>Current Queue</h3>
<h5 class="note">-Ordered by start time, not by ID</h5>

  <div id="currentQueue">
  <?php 
  include '../model/current-queue.php';
    ?>
  </div>

<div class="reloadQueue btn btn-danger">Refresh</div>
  
<h3>Scheduled to Play</h3>

  <div id="timedQueue">
  <?php 
  include '../model/timed-queue.php';
    ?>
  </div>

<div class="reloadQueue btn btn-danger">Refresh</div>

</div>
</form>
</div>

<!-- Script -->
    <script type="text/javascript" src="../resources/tools/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../resources/tools/bootstrap.min.js"></script>
    <script type="text/javascript" src="../resources/host-script.js"></script>

   </body>
   </html>