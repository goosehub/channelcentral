<?php

include '../connect.php';

include '../ajax/host-ajax.php';

$time = time();

if ($host['length'] === '1')
{ ?>
    <button class="uploads-disabled" disabled>Uploads disabled</button>
<?php
	} else { 
	$host['length'] = htmlentities($host['length']);
	$host['queue'] = htmlentities($host['queue']);
	$minsec = gmdate("i:s", $host['length']);
	$hours = gmdate("d", $host['length'])*12 + gmdate("H", $host['length']);
	$length_limit = 'Max Length is '.$hours.':'.$minsec;
?>
    <div class="upload-reload input-group">
      <div class="uploadAddon input-group-addon">Enter Youtube URL</div>
      <input class="uploadInput form-control" type="input" name="youtubeInput" placeholder="<?php echo $length_limit; ?>" /><br />
    </div>
<?php } ?>