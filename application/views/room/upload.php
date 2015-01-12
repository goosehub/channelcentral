<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
      <!-- Style -->
  <link rel="stylesheet" href="<?=base_url()?>resources/tools/bootstrap.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>resources/upload-style.css" />
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
    <!-- Body -->

    <div id="uploadFormCnt">

<!--     <div id="uploadInfo">
    </div> -->

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

    <form name="uploadForm" id="uploadForm" action="<?=base_url()?>/post/form-post.php" method="post" enctype="multipart/form-data">
    <div class="form-group">

    <div class="upload-reload input-group">
      <div class="uploadAddon input-group-addon">Enter Youtube URL</div>
      <input class="uploadInput form-control" type="input" name="youtubeInput" placeholder="" /><br />
    </div>

    <input type="hidden" name="slug" value="<?php echo $slug; ?>">

    </div>
    </form>
    </div>

<!-- Script -->
    <!-- Set slug for script files -->
    <script>var slug = '<?php echo $slug; ?>';</script>
    <script type="text/javascript" src="<?=base_url()?>resources/tools/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/tools/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/upload-script.js"></script>

   </body>
   </html>