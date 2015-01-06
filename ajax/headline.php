<p>
<?php

include '../connect.php';

include '../ajax/host-ajax.php';

$host['headline'] = htmlentities($host['headline']);
echo $host['headline'];
	
?>
</p>