<?php

include '../connect.php';

$time = time();
$limit = $time + 900;

	$query = "SELECT start
	FROM upload
	WHERE start >= '".$limit."'
	ORDER BY start DESC
	LIMIT 1;";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	if ($row['start'] > 16)
	{
		echo '<input class="form-control btn btn-primary contribute disabled" type="submit" name="submitForm" value="Queue Full" />';

	}
	else {
		echo '<input class="form-control btn btn-primary contribute" type="submit" name="submitForm" value="Contribute" />';
	}
?>