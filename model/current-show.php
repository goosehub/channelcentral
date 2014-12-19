<?php
  include '../model/host-model.php';
?>

<h1 id="current-show-name">
  <?php
  $host['showName'] = htmlentities($host['showName']);
  echo $host['showName'];
  ?>
</h1>
<p id="current-show-description">
  <?php
  $host['showDescription'] = htmlentities($host['showDescription']);
  echo nl2br($host['showDescription']);
  ?>
</p>