<?php

include '../connect.php';

include '../model/host-model.php';

$time = time();

echo '<p class="infoItem">Length limit right now is <strong>';
echo gmdate("H:i:s", $host['length']);
echo '</strong></p>';
echo '<p class="infoItem">Queue limit right now is <strong>';
echo gmdate("H:i:s", $host['queue']);
echo '</strong></p>';

?>