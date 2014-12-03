<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
  <title>esfores RADIO
  </title>

  <meta name="keywords" content="music">
  <meta name="description" content="An interactive online radio station">
  <meta name="author" content="J Jonah Jameson">
  <meta name="robots" CONTENT="all">

      <!-- Style -->
  <link rel="stylesheet" href="resources/bootstrap.min.css" />
  <link rel="stylesheet" href="resources/style.css" />
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="resources/favicon.ico">
</head>

<body>
    <!-- Body -->

    <?php
session_start();
  
//prompt for session name before creating page

 //login form
function loginForm(){
    echo'
    <center>
    <br/><br/><br/><br/><br/>
    <div id="loginform">
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" />
        <br/>
        <input type="submit" name="enter" id="loginEnter" value="Enter Name" />
    </form>
    </div>
    </center>
    ';
}
// Set session
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
// Set Name
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
// Set error reporting
        $_SESSION['errLength'] = $_SESSION['errRepeat'] = $_SESSION['errCode'] = 
        $_SESSION['errImgSize'] = $_SESSION['errAudioSize'] = $_SESSION['errFileType'] =
        $_SESSION['errQueueLimit'] = $_SESSION['errRickRoll'] = '';
    }
}
//Check if logged in
if(!isset($_SESSION['name'])){
    loginForm();
}
else
//Must be connected to end on same view
{
//begin page content
?>
<div id="pageWrapper">

<div class="row">

<!-- Left -->

  <div class="col-md-4">
    <div id="navCnt">
      <div id="navBarTop" class="btn-group" role="group" aria-label="...">
          <button id="showsBtn" class="btn" href="#">Shows</button>
          <button id="uploadBtn" class="btn" href="#">Upload</button>
          <button id="leaveBtn" class="btn" href="#">Leave</button>
      </div>
      <div id="navBarBottom" class="btn-group" role="group" aria-label="...">
          <button id="purpleBtn" class="btn btn-low" href="#">&nbsp ! &nbsp</button>
          <button id="orangeBtn" class="btn btn-low" href="#">&nbsp ~ &nbsp</button>
          <button id="greenBtn" class="btn btn-low" href="#">&nbsp ? &nbsp</button>
      </div>
    </div>
    <div id="viewer">
    <iframe id="uploadFrame" src="view/upload.php" seamless></iframe>
    <iframe id="vocaFrame" src="http://vocaroo.com/?minimal" seamless></iframe>
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
<!--       <div id="chatHead">
        <p>You are <?php echo $_SESSION['name'] ?></p>
      </div> -->

                <!-- chatroom -->
    <div id="inputCnt">
    <form name="chatForm" id="chatForm" action="controller/chatpost.php" method="post" enctype="multipart/form-data">
    <input name="message" type="text" class="form-control" id="chatInput" autocomplete="off" placeholder="">
    <!-- submit button positioned off screen -->
    <input name="submitChat" type="submit" id="submitChat" value="DICK" style="position: absolute; left: -9999px">
    </form>
    </div>

    <div id="chatBox">
    Loading...
    </div>

  </div>

<!-- row and pagewrap -->
</div>
</div>
<?php 
} //no content after this bracket 
?>
    <!-- Script -->
  <script type="text/javascript" src="resources/jquery-1.8.3.min.js"></script>
    <script src="resources/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/script.js"></script>

</body>
</html>