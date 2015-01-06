<?php
	echo '<br><br><br><br><center><font size="400px">bye</font></center>';
session_start();
//logout
    session_destroy();
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/">';
?>