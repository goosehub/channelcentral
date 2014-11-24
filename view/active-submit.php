<?php

include '../connect.php';

include '../model/queue-limit.php';

	if ($queueLimit['end'] > 1)
	{
		echo '<input class="form-control btn btn-primary contribute disabled" type="submit" name="submitForm" value="Queue Full" />';

	}
	else {
		echo '<input class="form-control btn btn-primary contribute" type="submit" name="submitForm" value="Contribute" />';
	}
?>