<?php

include '../connect.php';

include '../ajax/host-ajax.php';

$time = time();

// Error Reporting
    if ( isset($_SESSION['errLength'])
      || isset($_SESSION['errRepeat'])
      || isset($_SESSION['errCode'])
      || isset($_SESSION['errImgSize'])
      || isset($_SESSION['errAudioSize'])
      || isset($_SESSION['errFileType'])
      || isset($_SESSION['errQueueLimit'])
      || isset($_SESSION['errRickRoll'])
      )
    {
    	$errors = "TRUE";
    } else {
    	$errors = "FALSE";
    }

// Disabled Uploads
if ($host['length'] === '0')
{ ?>
    <button class="uploads-disabled" disabled>Uploads disabled</button>
<?php
// Error Reporting
	} else if (isset($_SESSION['errLength'])) { ?>
    <div class="upload-reload input-group">
      <div class="uploadAddon input-group-addon">Enter Youtube URL</div>
      <input class="uploadInput form-control" type="input" name="youtubeInput" placeholder="
    <?php
		  echo $_SESSION['errLength'];
		  echo $_SESSION['errRepeat'];
		  echo $_SESSION['errCode'];
		  echo $_SESSION['errImgSize'];
		  echo $_SESSION['errAudioSize'];
		  echo $_SESSION['errFileType'];
		  echo $_SESSION['errQueueLimit'];
		  echo $_SESSION['errRickRoll'];
	?>
	" /><br/>
    </div>
    <?php
// Normal Upload Form
	} else { 
	$host['length'] = htmlentities($host['length']);
	$minutes = $host['length'] / 60;
	$length_limit = 'Max: '.$minutes.' minutes';
?>
    <div class="upload-reload input-group">
      <div class="uploadAddon input-group-addon">Enter Youtube URL</div>
      <input class="uploadInput form-control" type="input" name="youtubeInput" placeholder="<?php echo $length_limit; ?>" /><br/>
    </div>
<?php } ?>