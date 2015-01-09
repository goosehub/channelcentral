<?php
  include 'host-ajax.php';
?>

<h1 id="current-show-name">
  <?php
  $host['showName'] = htmlentities($host['showName']);
  echo $host['showName'];
  ?>
</h1>
<p id="current-show-description">
  <?php
// No longer santitized. Tags are striped on enter.
  // $host['showDescription'] = htmlentities($host['showDescription']);
// Make links clickable.
  $host['showDescription'] = preg_replace("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i","<a target=\"_blank\" href=\"$1\">$1</a>", $host['showDescription']);

  echo nl2br($host['showDescription']);
  ?>
</p>