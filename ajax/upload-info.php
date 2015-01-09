<?php

include '../connect.php';

include '../ajax/host-ajax.php';

$time = time();

if ($host['length'] === '1'
	|| $host['queue'] === '1')
{
echo '<p class="infoItem">The Host has switched off uploads</p>';
}
else
{
  $host['length'] = htmlentities($host['length']);
  $host['queue'] = htmlentities($host['queue']);
echo '<p class="infoItem">Length limit right now is <strong>';
// echo gmdate("H:i:s", $host['length']);
$minsec = gmdate("i:s", $host['length']);
$hours = gmdate("d", $host['length'])*24 + gmdate("H", $host['length']);
echo $hours.':'.$minsec;
echo '</strong></p>';
echo '<p class="infoItem">Queue limit right now is <strong>';
// echo gmdate("H:i:s", $host['queue']);
$minsec = gmdate("i:s", $host['queue']);
$hours = gmdate("d", $host['queue'])*24 + gmdate("H", $host['queue']);
echo $hours.':'.$minsec;
echo '</strong></p>';
}
?>