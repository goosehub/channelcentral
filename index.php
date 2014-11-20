<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
  <title>S4S RADIO
  </title>

  <meta name="keywords" content="________">
  <meta name="description" content="________">
  <meta name="author" content="________">
  <meta name="robots" CONTENT="all">

      <!-- Style -->
  <link rel="stylesheet" href="resources/bootstrap.min.css" />
  <link rel="stylesheet" href="resources/style.css" />
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
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
    <br><br><br><br><br>
    <div id="loginform">
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" />
        <input type="submit" name="enter" id="loginEnter" value="Enter Name" />
    </form>
    <br><br>
    <a type="button" id="loginLeave" class="btn btn-default">Leave</a>
    </div>
    </center>
    ';
}
// Set session
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
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
      <div id="navBar" class="btn-group" role="group" aria-label="...">
          <a id="homeBtn" class="btn btn-default" href="/">esfores</a>
          <button id="scheduleBtn" class="btn btn-default" href="#">Calendar</button>
          <button id="vocaBtn" class="btn btn-default" href="#">Record</button>
          <button id="uploadBtn" class="btn btn-default" href="#">Upload</button>
          <button id="chanBtn" class="btn btn-default" href="#">4chan</button>
      </div>
    </div>
    <div id="viewer">
    <iframe id="uploadFrame" name="uploadFrameName" src="view/upload.php" seamless></iframe>
    </div>
  </div>

<!-- Center -->
  
  <div class="col-md-4">
    <div id="headline">
        <p>S4S RADIO</p>
    </div>

  	<div id="contentWindow">
<p>Loading...</p>
  	</div>
  </div>

<!-- Right -->

  <div class="col-md-4">
      <div id="chatHead">
        <p>12 users active</p>
      </div>

                <!-- chatroom -->
    <div id="inputCnt">
    <form name="chatForm" id="chatForm" action="controller/chatpost.php" method="post" enctype="multipart/form-data">
    <input name="message" type="text" class="form-control" id="chatInput">
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