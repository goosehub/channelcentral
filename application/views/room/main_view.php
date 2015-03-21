<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
  <title><?php echo $title; ?></title>

<!-- For Responsive Mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- For Crawlers -->
  <meta name="keywords" content="channelcentral, radio, music, video, share, youtube">
  <meta name="description" content="An interactive online radio station">
  <meta name="author" content="Goose">
  <meta name="robots" CONTENT="all">
<!-- For IE -->
  <!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Style -->
  <link rel="stylesheet" href="resources/tools/bootstrap.min.css" />
  <link rel="stylesheet" href="resources/room-style.css" />
  <link rel="shortcut icon" href="resources/images/favicon.ico">
</head>

<body>
<!-- Body -->

<?php
// Set session

// Set room
        $_SESSION['slug'] = $slug;
// Set Session Variables
        $_SESSION['errLength'] = $_SESSION['errRepeat'] = $_SESSION['errCode'] = 
        $_SESSION['errImgSize'] = $_SESSION['errAudioSize'] = $_SESSION['errFileType'] =
        $_SESSION['errQueueLimit'] = $_SESSION['errYoutube'] = $_SESSION['errRickRoll'] = $_SESSION['chat-id'] = 
        $_SESSION['loadName'] = $_SESSION['loadTimestamp'] = '';

// If named posted, and not blank
if(isset($_POST['name'])){
    if($_POST['name'] != ''){

// Set Session Name
        $_SESSION['name'] = $chatname = stripslashes(htmlspecialchars($_POST['name']));

    }
}

?>

<!-- Begin page content -->

<!-- Absolute Navbar -->
<div class="absolute-bar">
  <?php echo form_open('home/do_search'); ?>
  <div class="btn-group" role="group" aria-label="...">
    <div id="viewersBtn" class="nav-btn btn">1 Viewer</div>
    <div id="hostBtn" class="nav-btn btn">Host</div>
    <div id="fadeoutBtn" class="nav-btn btn">Fade</div>
    <a id="leaveBtn" class="nav-btn btn" href="<?=base_url()?>">Leave</a>
  </div>

  <input class="nav-btn in-channel-search" type="search" name="search" placeholder="Go To New Room"></input>

  </form>
</div>

<div id="pageWrapper">

<div class="row">

<!-- Left -->

<!-- Nav Bar -->
  <div class="col-md-4">

<!-- Viewer -->
  <div id="info-content-cnt">
    <div id="info-content">
    </div>
  </div>

  </div>

<!-- Center -->
  
  <div class="col-md-4">

    <iframe class="upload-frame" src="<?php echo $slug; ?>/upload" scrolling="no" seamless></iframe> 

  	<div id="contentWindow">
<p>Loading...</p>
  	</div>

  </div>

<!-- Right -->

  <div class="col-md-4">

<!-- Chatroom -->
    <div id="chatWrap">
      <div id="chatBox">
        Loading...
      </div>
    </div>

<!-- Chat input -->
    <div id="inputCnt">

      <div id="loginform">
        <form action="" method="post" >
          <div class="row">
            <div class="col-sm-8">
              <input class="form-control" type="text" name="name" id="name" 
              placeholder="Enter Your Name" onKeydown="memSort(event);"/>
            </div>
            <div class="col-sm-4">
              <input name="enter-room" id="enter-room" class="form-control btn- btn-default" type="submit" value="Join">
            </div>
          </div>
        </form>
      </div>
      
    </div>


  </div>

<!-- row and pagewrap -->
</div>
</div>
    <!-- Script -->
    <!-- Set slug for script files -->
    <script>var slug = '<?php echo $slug; ?>';
    </script>
    <script type="text/javascript" src="resources/tools/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="resources/tools/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/script.js"></script>

</body>
</html>