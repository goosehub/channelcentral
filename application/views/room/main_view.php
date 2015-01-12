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

<!-- Login Form -->

<?php
function loginForm($slug){ ?>
    <div id="loginform">
    <form action="<?php echo $slug; ?>" method="post">
    <input type="text" name="name" id="name" placeholder="Enter Your Name" onKeydown="memSort(event);"/>
    <a id="return-link" class="btn btn-default btn-sm" href="<?=base_url()?>">Return</a>
    <a id="host-link" class="btn btn-default btn-xs" href="<?php echo $slug; ?>/host">Host page</a>
    <input name="enter-room" id="enter-room" type="submit" value="foo" style="position: absolute; left: -9999px">
    </form></div>
<?php }
// Set session
// Set room
        $_SESSION['slug'] = $slug;
// Set Session Variables
        $_SESSION['errLength'] = $_SESSION['errRepeat'] = $_SESSION['errCode'] = 
        $_SESSION['errImgSize'] = $_SESSION['errAudioSize'] = $_SESSION['errFileType'] =
        $_SESSION['errQueueLimit'] = $_SESSION['errRickRoll'] = $_SESSION['chat-id'] = 
        $_SESSION['loadName'] = $_SESSION['loadTimestamp'] = '';

// If named posted, and not blank
if(isset($_POST['name'])){
    if($_POST['name'] != ''){

// Set Session Name
        $_SESSION['name'] = $chatname = stripslashes(htmlspecialchars($_POST['name']));

    }
}

// Check if Logged in
if(!isset($_SESSION['name'])){

// Display login form
    loginForm($slug);

// Else, show page
}
else 
{ ?>
<!-- Begin page content -->

<!-- Absolute Navbar -->
<div class="absolute-bar">
  <?php echo form_open('home/do_search'); ?>
  <!-- <div class="viewers-cnt"> -->
  <div id="viewersBtn" class="btn">1</div>
  <!-- </div> -->
  <div id="fadeoutBtn" class="btn">Fade</div>
  <div id="leaveBtn" class="btn" href="#">Leave</div>
  <input class="in-channel-search" type="search" name="search" placeholder="Go To New Room"></input>
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

      <!-- <iframe class="frame" src="<?php echo $slug; ?>/shows" seamless></iframe>  -->

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

    <div id="inputCnt">
	    <form name="chatForm" id="chatForm" action="post/chat-post.php" method="post" enctype="multipart/form-data">
		    <input type="text" name="message" class="form-control" id="chatInput" autocomplete="off" placeholder="">
        <input type="hidden" name="slug" value="<?php echo $slug; ?>">
		    <!-- submit button positioned off screen -->
		    <input name="submitChat" type="submit" id="submitChat" value="foo" style="position: absolute; left: -9999px">
	    </form>
    </div>

  </div>

<!-- row and pagewrap -->
</div>
</div>
<?php 
} //no content after this bracket 
?>
    <!-- Script -->
    <!-- Set slug for script files -->
    <script>var slug = '<?php echo $slug; ?>';
    </script>
    <script type="text/javascript" src="resources/tools/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="resources/tools/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/script.js"></script>

</body>
</html>