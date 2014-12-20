<p>
<?php

include '../connect.php';

include '../model/host-model.php';

$host['headline'] = htmlentities($host['headline']);
echo $host['headline'];
	
?>
</p>