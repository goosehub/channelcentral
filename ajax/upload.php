<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
      <!-- Style -->
  <link rel="stylesheet" href="../resources/bootstrap.min.css" />
  <link rel="stylesheet" href="../resources/style.css" />
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
    <!-- Body -->

<?php 
session_start();
?>

    <div id="uploadFormCnt">

    <form name="uploadForm" id="UploadForm" action="/s4sradio/ajax/formpost.php" method="post" enctype="multipart/form-data">
    <div class="form-group">

    <div class="input-group">
      <div class="input-group-addon">Enter Youtube URL</div>
      <input class="form-control" type="input" name="youtubeInput" /><br />
    </div>
    
    <div class="input-group">
      <div class="input-group-addon contributeFileAddon"><strong>Or</strong> Upload Audio</div>
      <input class="form-control contributeFile" name="audioInput" type="file" />
    </div>

    <div class="input-group">
      <div class="input-group-addon contributeFileAddon"><strong>With</strong> An Image</div>
      <input class="form-control contributeFile" name="imageInput" type="file" />
    </div>

    <div id="typeInput" class="form-group">
      <div class="input-group">
        <div class="input-group-addon"><strong>And</strong> Pick Type</div>

        <select class="form-control" name="typeInput">
          <option value="default">Pick An Option</option>
          <option value="Music">Music</option>
          <option value="Shoutout">Shoutout</option>
          <option value="Segment">Segment</option>
          <option value="Other">Other</option>
        </select>

      </div>
    </div>

    <input class="form-control input-lg" id="contributeSubmit" type="submit" name="submitForm" value="Contribute" />

    </div>
    </form>
    </div>

<!-- Script -->
    <script type="text/javascript" src="../resources/jquery-1.8.3.min.js"></script>
    <script src="../resources/bootstrap.min.js"></script>
    <script type="text/javascript" src="../resources/script.js"></script>

   </body>
   </html>