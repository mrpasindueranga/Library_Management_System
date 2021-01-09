<?php

  require '../db/Conn.php';

  $allCat = $conn->query('SELECT Name FROM category');
  $conn->close();
  
  while ($row = $allCat->fetch_assoc()) {
    echo '<option value='.$row['Name'].'>'.$row['Name'].'</option>';
  }

?>