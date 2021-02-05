<?php
session_start();
date_default_timezone_set('Asia/Colombo');
require './Conn.php';
// reserve details store to the db
$BID = htmlentities($_GET['bookID']);
$UID = $_SESSION['ID'];
$Date = date('Y-m-d H:i:s', time());
$addReservationQuery = $conn->prepare('INSERT INTO reservation(UID,BID,Date) VALUES(?,?,?)');
$addReservationQuery->bind_param('iis', $UID, $BID, $Date);
$addReservationQuery->execute();
$conn->close();
