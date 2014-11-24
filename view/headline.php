<p>
<?php

include '../connect.php';

$time = time();
$limit = $time + 900;

	$query = "SELECT headline
	FROM host
	WHERE id = 1;";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
		echo $row['headline'];
?>
</p>