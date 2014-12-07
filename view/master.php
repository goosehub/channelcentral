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
  <link rel="shortcut icon" href="../resources/images/favicon.ico">
  <title>
  MASTER center
  </title>
</head>

<body>
    <!-- Body -->

<?php 
session_start();
?>

<div id="hostFormCnt">

<h2 id="welcome">Welcome to your Master center</h2>
<h4>Enter password, make changes, then press enter or click submit</h4>

<form name="uploadForm" id="masterForm" action="../controller/master-form-post.php" method="post" enctype="multipart/form-data">
<div class="form-group">

<div class="input-group hostPassword">
    <div class="input-group-addon passwordAddon">Enter Password</div>
    <!-- Remove value="1234" when risk of unauthorized users exists or password changes -->
      <input class="input-lg" type="input" name="passwordInput" value="1234"/><br />
    </div>

<input class="btn btn-primary hostSubmit" id="masterSubmitForm" type="submit" name="masterSubmitForm" value="Submit Changes" />

<h5 class="note-lg">Changes can take up to 30 seconds to take effect</h5>

<h3>Schedule A Show</h3>

<div class="input-group">
    <div class="input-group-addon">Title</div>
      <input class="form-control" type="input" name="masterShowTitle" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Timeframe</div>
      <input class="form-control" type="input" name="masterShowTimeframe" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Start time</div>
      <input class="form-control" type="input" name="masterShowStart" placeholder="YYYY-MM-DD HH:MM:SSPM"/><br />
    </div>
<h5 class="note">Format is YYYY-MM-DD HH:MM:SSPM | All times are EST (New York Time)</h5>
<h5 class="note">When specifying timeframe, be sure to to specify timezone</h5>

<h3>Schedule a host</h3>

<div class="input-group">
    <div class="input-group-addon">Host Name</div>
      <input class="form-control" type="input" name="masterHostName" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Generate Password</div>
      <input class="form-control" type="input" name="masterPasswordGenerate" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Start time</div>
      <input class="form-control" type="input" name="masterHostStart" placeholder="YYYY-MM-DD HH:MM:SSPM"/><br />
    </div>


<div class="input-group">
    <div class="input-group-addon">End time</div>
      <input class="form-control" type="input" name="masterHostEnd" placeholder="YYYY-MM-DD HH:MM:SSPM"/><br />
    </div>

<h5 class="note">Format is YYYY-MM-DD HH:MM:SSPM | All times are EST (New York Time)</h5>

</div>
</form>
</div>

<!-- Script -->
    <script type="text/javascript" src="../resources/tools/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../resources/tools/bootstrap.min.js"></script>
    <script type="text/javascript" src="../resources/host-script.js"></script>

   </body>
   </html>