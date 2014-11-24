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

<br/>

<div id="uploadInfo">
    <p id="currentLimit">Password is 1234</p>
</div>

<br/><br/>

<form name="uploadForm" id="hostForm" action="../controller/host-form-post.php" method="post" enctype="multipart/form-data">
<div class="form-group">

<div class="input-group">
    <div class="input-group-addon">Enter Headline</div>
      <input class="form-control" type="input" name="hostHeadlineInput" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Clear Queue</div>
      <input class="form-control" type="checkbox" name="hostClearQueueInput" value="Clear Queue" />
</div>

<div class="input-group">
    <div class="input-group-addon">Enter Password</div>
      <input class="form-control" type="input" name="passwordInput" /><br />
    </div>

    <input class="form-control btn btn-primary contribute" type="submit" name="hostSubmitForm" value="Contribute" />


<!-- <p class="instructions">For youtube videos</p> -->

<!--     <div class="input-group">
  <div class="input-group-addon">Enter Youtube URL</div>
  <input class="form-control" type="input" name="youtubeInput" /><br />
</div>

<div id="contributeA">
<input class="form-control btn btn-primary contribute" type="submit" name="submitForm" value="Contribute" />
</div>

<button class="instructions btn" disabled="disabled"><strong>OR</strong></button>

<div class="input-group">
  <div class="input-group-addon">Upload Audio</div>
  <input class="form-control" name="audioInput" type="file" />
</div>

<div class="input-group">
  <div class="input-group-addon">Attach Image</div>
  <input class="form-control" name="imageInput" type="file" />
</div>

<div id="contributeB">
<input class="form-control btn btn-primary contribute" type="submit" name="submitForm" value="Contribute" />
</div> -->

</div>
</form>
</div>

<!-- Script -->
    <script type="text/javascript" src="../resources/jquery-1.8.3.min.js"></script>
    <script src="../resources/bootstrap.min.js"></script>
    <script type="text/javascript" src="../resources/host-script.js"></script>

   </body>
   </html>