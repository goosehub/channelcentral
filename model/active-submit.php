<?php

include '../connect.php';

include '../model/queue-limit.php';

include '../model/host-model.php';

	if ($queueLimit['start'] > 1)
	{
		echo '<input class="form-control btn btn-primary contribute disabled" type="submit" name="submitForm" value="Queue Full" />';
	}
	else if ($host['length'] === '1'
	|| $host['queue'] === '1')
	{
		echo '<input class="form-control btn btn-primary contribute disabled" type="submit" name="submitForm" value="Disabled" />';
	}
	else 
	{
		echo '<input class="form-control btn btn-primary contribute" type="submit" name="submitForm" value="Contribute" />';
	}
?>