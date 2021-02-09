<?php
// clear member records
require './Conn.php';
$ID = htmlentities($_GET['ID']);
$clearFine = $conn->prepare('DELETE FROM fine WHERE BRID=?');
$clearFine->bind_param('i', $ID);
$clearFine->execute();
$conn->close();

require './Conn.php';
$ID = htmlentities($_GET['ID']);
$clearBorrow = $conn->prepare('DELETE FROM borrow WHERE ID=?');
$clearFine->bind_param('i', $ID);
$clearFine->execute();
$conn->close();

header('location: ../component/profile/borrow.php');
