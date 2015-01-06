<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
  <title><?php echo $title; ?></title>

<!-- For Responsive Mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- For Crawlers -->
  <meta name="keywords" content="esfores, radio, music, video, share, youtube">
  <meta name="description" content="An interactive online radio station">
  <meta name="author" content="Goose">
  <meta name="robots" CONTENT="all">

<!-- Style -->
  <link rel="stylesheet" href="resources/tools/bootstrap.min.css" />
  <link rel="stylesheet" href="resources/style.css" />
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="resources/images/favicon.ico">
</head>

<body>

<?php
// Login form
function loginForm($slug){
    echo'<div id="loginform">
    <form action="'.$slug.'" method="post">
    <input type="text" name="name" id="name" />
    <input type="submit" name="enter" id="loginEnter" value="Enter Name" />
    </form></div>';
}
// Set session
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
// Set Session Name
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
// Set Session Variables
        $_SESSION['errLength'] = $_SESSION['errRepeat'] = $_SESSION['errCode'] = 
        $_SESSION['errImgSize'] = $_SESSION['errAudioSize'] = $_SESSION['errFileType'] =
        $_SESSION['errQueueLimit'] = $_SESSION['errRickRoll'] = $_SESSION['chat-id'] = 
        $_SESSION['loadName'] = $_SESSION['loadTimestamp'] = '';
    }
}
// Check if Logged in
if(!isset($_SESSION['name'])){
// Display login form
    loginForm($slug);
}
else 
{ ?>
<!-- Begin page content -->

<div id="pageWrapper">

<div class="row">

<!-- Left -->

<!-- Nav Bar -->
  <div class="col-md-4">
    <div id="navCnt">
      <div id="navBarTop" class="btn-group" role="group" aria-label="...">
          <button id="showsBtn" class="btn" href="#">Shows</button>
          <button id="uploadBtn" class="btn" href="#">Upload</button>
          <button id="leaveBtn" class="btn" href="#">Leave</button>
      </div>
      <div id="navBarBottom" class="btn-group" role="group" aria-label="...">
          <button id="purpleBtn" class="btn btn-low" href="#">&nbsp&nbsp&nbsp&nbsp&nbsp</button>
          <button id="orangeBtn" class="btn btn-low" href="#">&nbsp&nbsp&nbsp&nbsp&nbsp</button>
          <button id="greenBtn" class="btn btn-low" href="#">&nbsp&nbsp&nbsp&nbsp&nbsp</button>
      </div>
    </div>

<!-- Viewer -->
    <div id="viewer">
      <iframe id="showsFrame" src="load/shows.php" seamless></iframe> 
    </div>

  </div>

<!-- Center -->
  
  <div class="col-md-4">
    <div id="headline">
        <p>
        ...
        </p>
    </div>

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
	    <form name="chatForm" id="chatForm" action="model/chat-post.php" method="post" enctype="multipart/form-data">
		    <input name="message" type="text" class="form-control" id="chatInput" autocomplete="off" placeholder="">
		    <!-- submit button positioned off screen -->
		    <input name="submitChat" type="submit" id="submitChat" value="DICK" style="position: absolute; left: -9999px">
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
    <script>var slug = '<?php echo $slug; ?>';</script>
    <script type="text/javascript" src="resources/tools/jquery-1.8.3.min.js"></script>
    <script type="text/javascript"src="resources/tools/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/script.js"></script>

</body>
</html>