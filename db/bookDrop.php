<?php
require '../../db/Conn.php';

$allBook = $conn->query('SELECT ID FROM book');
$conn->close();

while ($row = $allBook->fetch_assoc()) {
  echo '<option value=' . $row['ID'] . '>' . $row['ID'] . '</option>';
}
