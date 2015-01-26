<?php

// Used to check if currently playing was canceled

// Find time
$time = time();
// Search for reload command
include 'host-ajax.php';
// If reload time is in the future, reload content
if ($host['reload'] > $time) {
	echo 'reload';
}
?>