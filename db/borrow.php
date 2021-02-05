<?php
require './Conn.php';
$UID = htmlentities($_POST['UID']);
$BID = htmlentities($_POST['BID']);
$ExDate = htmlentities($_POST['Date']);
$BrDate = date('Y-m-d H:i:s', time());

$makeBorrow = $conn->prepare('INSERT INTO borrow(UID,BID,BorrowDate,ExpireDate) VALUES(?,?,?,?)');
$makeBorrow->bind_param('iiss', $UID, $BID, $BrDate, $ExDate);
$makeBorrow->execute();
$conn->close();

require './Conn.php';
$lastBRID = $conn->query('SELECT * FROM borrow ORDER BY ID DESC LIMIT 1');
$conn->close();

require './Conn.php';
$BRID = $lastBRID->fetch_assoc()['ID'];
$makeFine = $conn->prepare('INSERT INTO fine(BRID) VALUES(?)');
$makeFine->bind_param('i', $BRID);
$makeFine->execute();
$conn->close();

header('location: ../component/profile/borrow.php');
