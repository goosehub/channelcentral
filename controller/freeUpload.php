<?php

include 'connect.php';

$time = time();

	$query = "SELECT start
	FROM upload
	WHERE start >= '".$time."'
	ORDER BY start DESC
	LIMIT 1;";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	if ($row['start'] > 16)
	{
		echo '<input class="form-control btn btn-primary contribute disabled" type="submit" name="submitForm" value="Contribute" />';

	}
	else {
		echo '<input class="form-control btn btn-primary contribute" type="submit" name="submitForm" value="Contribute" />';
	}
?>