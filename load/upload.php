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
</head>

<body>
    <!-- Body -->

<?php 
session_start();
?>

    <div id="uploadFormCnt">

    <div id="uploadInfo">
    </div>

<!-- Error Reporting -->
<?php
    if ( $_SESSION['errLength']
      || $_SESSION['errRepeat']
      || $_SESSION['errCode']
      || $_SESSION['errImgSize']
      || $_SESSION['errAudioSize']
      || $_SESSION['errFileType']
      || $_SESSION['errQueueLimit']
      || $_SESSION['errRickRoll']
      )
    {
    echo '<div class="alert alert-danger" role="alert">';
      echo $_SESSION['errLength'];
      echo $_SESSION['errRepeat'];
      echo $_SESSION['errCode'];
      echo $_SESSION['errImgSize'];
      echo $_SESSION['errAudioSize'];
      echo $_SESSION['errFileType'];
      echo $_SESSION['errQueueLimit'];
      echo $_SESSION['errRickRoll'];
    echo '</div>';
    }
?>

    <form name="uploadForm" id="uploadForm" action="../post/form-post.php" method="post" enctype="multipart/form-data">
    <div class="form-group">

    <div class="input-group">
      <div class="uploadAddon input-group-addon">Enter Youtube URL</div>
      <input class="uploadInput form-control" type="input" name="youtubeInput" /><br />
    </div>
    
    <div id="contributeA">
    <input class="form-control btn btn-primary contribute" type="submit" name="submitForm" value="Contribute" />
    </div>

    <button class="or btn" disabled="disabled"><strong>OR</strong></button>

    <div class="input-group">
      <div class="uploadAddon input-group-addon">Upload Audio</div>
      <input class="uploadInput form-control" name="audioInput" type="file" />
    </div>

    <div class="input-group">
      <div class="uploadAddon input-group-addon">Attach Image</div>
      <input class="uploadInput form-control" name="imageInput" type="file" />
    </div>

<!--     <div id="typeInput" class="form-group">
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
    </div> -->

    <div id="contributeB">
    <input class="form-control btn btn-primary contribute" type="submit" name="submitForm" value="Contribute" />
    </div>

    </div>
    </form>
    </div>

<!-- Script -->
    <script type="text/javascript" src="../resources/tools/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../resources/tools/bootstrap.min.js"></script>
    <script type="text/javascript" src="../resources/upload-script.js"></script>

   </body>
   </html>