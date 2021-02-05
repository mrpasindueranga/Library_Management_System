<?php
require '../../db/Conn.php';

$allUser = $conn->query('SELECT ID FROM user');
$conn->close();

while ($row = $allUser->fetch_assoc()) {
  echo '<option value=' . $row['ID'] . '>' . $row['ID'] . '</option>';
}
