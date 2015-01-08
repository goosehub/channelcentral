<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
      <!-- Style -->
  <!-- <link rel="stylesheet" href="../resources/tools/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="<?=base_url()?>resources/shows-style.css" />
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
    <!-- Body -->
    <?php $_POST['slug'] = $slug; ?>

<div id="showsWrp">

<div id="current-show-cnt">

  <?php
  // include 'ajax/current-show.php';
  ?>

</div>

<!-- <h1 id="upcoming-headline">Upcoming</h1> -->
<div id="upcoming">
  <?php
  include 'ajax/upcoming.php';
  ?>
</div>

<!--   <div id="appeal">
  <h1 id="appeal-headline">Seeking Hosts</h1>
  <p class="appeal">Want to host the room for a few hours?</p>
  <p class="appeal">goosetube on skype</p>
  <p class="appeal">goosepostbox@gmail.com</p>
  </div> -->

</div>

<!-- Script -->
    <!-- Set slug for script files -->
    <script>var slug = '<?php echo $slug; ?>';</script>
    <script type="text/javascript" src="<?=base_url()?>resources/tools/jquery-1.8.3.min.js"></script>
    <!-- <script type="text/javascript" src="../resources/tools/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="<?=base_url()?>resources/shows-script.js"></script>

   </body>
   </html>