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

if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
}


?>