<?php

include '../connect.php';

include '../model/host-model.php';

$time = time();

if ($host['length'] === '1'
	|| $host['queue'] === '1')
{
echo '<p class="infoItem">The Host has switched off uploads</p>';
}
else
{
echo '<p class="infoItem">Length limit right now is <strong>';
echo gmdate("H:i:s", $host['length']);
echo '</strong></p>';
echo '<p class="infoItem">Queue limit right now is <strong>';
echo gmdate("H:i:s", $host['queue']);
echo '</strong></p>';
}
?>