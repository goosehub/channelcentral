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

<h2>Password is 1234</h2>

<br/><br/>

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
      <input class="" type="checkbox" name="hostClearQueueInput" />
</div>

<h3>Each host uploads go to the front of the queue</h3> 

    <div class="input-group">
  <div class="input-group-addon">Enter Youtube URL</div>
  <input class="form-control" type="input" name="hostYoutubeInput" /><br />
</div>

<button class="instructions btn" disabled="disabled"><strong>OR</strong></button>

<div class="input-group">
  <div class="input-group-addon">Upload Audio</div>
  <input class="form-control" name="hostAudioInput" type="file" />
</div>

<div class="input-group">
  <div class="input-group-addon">Attach Image</div>
  <input class="form-control" name="hostImageInput" type="file" />
</div>

<br/><br/><br/>

<div class="input-group">
    <div class="input-group-addon">Enter Password</div>
      <input class="input-lg" type="input" name="passwordInput" value="1234"/><br />
    </div>
<input class="btn btn-primary hostSubmit" type="submit" name="hostSubmitForm" value="Contribute" />

</div>
</form>
</div>

<!-- Script -->
    <script type="text/javascript" src="../resources/jquery-1.8.3.min.js"></script>
    <script src="../resources/bootstrap.min.js"></script>
    <script type="text/javascript" src="../resources/host-script.js"></script>

   </body>
   </html>