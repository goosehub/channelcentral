<?php

include 'connect.php';

$time = time();

// echo '
// 	  <div id="navBar" class="btn-group" role="group" aria-label="...">
//       <a id="homeBtn" class="btn btn-default disabled" href="#">esfores</a>
//       ';

// Check if it wins
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


// 	echo '
// 	<!-- <button id="vocaBtn" class="btn btn-success" href="#">Record</button> -->
// 	<!-- <button id="scheduleBtn" class="btn btn-success" href="#">Schedule</button> -->
// 	<button id="pulpBtn" class="btn btn-primary" href="#">Pulp</button>
// 	<!-- <button id="chanBtn" class="btn btn-warning" href="#">4chan</button> -->
// 	<button id="tribuneBtn" class="btn btn-danger" href="#">Tribune</button>
// 	<button id="leaveBtn" class="btn btn-warning" href="#">Re-Enter</button>
// 	<button id="sumoBtn" class="btn btn-success" href="#">Sumo</button>
// ';
?>