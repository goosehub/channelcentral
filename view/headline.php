<p>
<?php

include '../connect.php';

$time = time();
$limit = $time + 900;

include '../model/host-model.php';

		echo $host['headline'];
?>
</p>