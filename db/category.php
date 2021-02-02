<?php
require '../db/Conn.php';

$allCat = $conn->query('SELECT ID, Name FROM category');
$conn->close();

while ($row = $allCat->fetch_assoc()) {
  echo '<option value=' . $row['ID'] . '>' . $row['Name'] . '</option>';
}
