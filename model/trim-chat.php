<?php
include '../connect.php';
// Clear all but the latest 32
    $query = "DELETE FROM `chat`
    WHERE id NOT IN (
      SELECT id
      FROM ( -- intermediate subquery is required
      SELECT id
      FROM `chat`
      ORDER BY id DESC
      LIMIT 1024 -- keep this many records
      ) foo);"; 
    // foo is for required alias
    $result = mysqli_query($con, $query);
?>