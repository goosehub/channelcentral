<?php

include '../connect.php';

include '../ajax/host-ajax.php';

$time = time();

if ($host['length'] === '1')
{
echo '<p class="infoItem">The Host has switched off uploads</p>';
}
else
{
  $host['length'] = htmlentities($host['length']);
  $host['queue'] = htmlentities($host['queue']);
echo '<p class="infoItem">Length limit right now is <strong>';
// Convert so that hours time can display more than 23 hours
$minsec = gmdate("i:s", $host['length']);
$hours = gmdate("d", $host['length'])*12 + gmdate("H", $host['length']);
echo $hours.':'.$minsec;
echo '</strong></p>';
echo '<p class="infoItem">Queue limit right now is <strong>';
// Convert so that hours time can display more than 23 hours
$minsec = gmdate("i:s", $host['queue']);
$hours = gmdate("d", $host['queue'])*12 + gmdate("H", $host['queue']);
echo $hours.':'.$minsec;
echo '</strong></p>';
}
?>