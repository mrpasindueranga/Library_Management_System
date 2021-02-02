<?php
require '../../db/Conn.php';

$allCat = $conn->query('SELECT ID, Name FROM category');
$conn->close();

while ($row = $allCat->fetch_assoc()) {
  if (isset($_GET['v_id'])) {
    if ($row['ID'] == $book['CategoryID']) {
      echo '<option value="' . $row['ID'] . '" selected>' . $row['Name'] . '</option>';
    } else {
      echo '<option value=' . $row['ID'] . '>' . $row['Name'] . '</option>';
    }
  }
  if (isset($_GET['cr_id'])) {
    echo '<option value=' . $row['ID'] . '>' . $row['Name'] . '</option>';
  }
}
