<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
      <!-- Style -->
  <link rel="stylesheet" href="../resources/bootstrap.min.css" />
  <link rel="stylesheet" href="../resources/shows-style.css" />
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
    <!-- Body -->

<div id="showsWrp">

<h1>Upcoming</h1>
<div id="upcoming">
  <?php
  include '../model/upcoming.php';
  ?>
</div>

  <h1>Seeking Hosts</h1>
  <div id="appeal">
  <p class="appeal">Want to host the room for a few hours?</p>
  <p class="appeal">goosetube on skype</p>
  <p class="appeal">goose@esfores.com</p>
  </div>

</div>

<!-- Script -->
    <!-- <script type="text/javascript" src="../resources/jquery-1.8.3.min.js"></script> -->
    <!-- <script src="../resources/bootstrap.min.js"></script> -->
    <!-- <script type="text/javascript" src="../resources/script.js"></script> -->

   </body>
   </html>