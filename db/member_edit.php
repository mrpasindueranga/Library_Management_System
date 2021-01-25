<?php

if (isset($_GET['v_id'])) {
  require '../../db/Conn.php';

  $vid = htmlentities($_GET['v_id']);
  $getMemQuery = $conn->prepare('SELECT * FROM user WHERE ID=?');
  $getMemQuery->bind_param('i', $vid);
  $getMemQuery->execute();
  $mem = $getMemQuery->get_result()->fetch_assoc();
  $conn->close();
}

if (isset($_GET['d_id'])) {
  require '../../db/Conn.php';

  $did = htmlentities($_GET['d_id']);
  $delAccQuery = $conn->prepare('DELETE FROM account WHERE ID=?');
  $delAccQuery->bind_param('i', $did);
  $delAccQuery->execute();

  $did = htmlentities($_GET['d_id']);
  $delMemQuery = $conn->prepare('DELETE FROM user WHERE ID=?');
  $delMemQuery->bind_param('i', $did);
  $delMemQuery->execute();


  $conn->close();
}

if (isset($_GET['de_id'])) {

  require '../../db/Conn.php';

  $did = htmlentities($_GET['de_id']);
  $delAccQuery = $conn->prepare('DELETE FROM account WHERE ID=?');
  $delAccQuery->bind_param('i', $did);
  $delAccQuery->execute();

  $conn->close();
}

// Edit after implement the member form

if (isset($_GET['e_id'])) {
  require './Conn.php';

  $eid = htmlentities($_GET['e_id']);
  $Name = htmlentities($_GET['Name']);
  $Des = htmlentities($_GET['Des']);

  $upCatQuery = $conn->prepare('UPDATE user SET Name=?, Description=? WHERE ID=?');
  $upCatQuery->bind_param('ssi', $Name, $Des, $eid);
  $upCatQuery->execute();
  $conn->close();

  header('location: ../component/profile/member.php');
}

if (isset($_GET['c_id'])) {
  require './Conn.php';

  $eid = htmlentities($_GET['c_id']);
  $Name = htmlentities($_GET['Name']);
  $Des = htmlentities($_GET['Des']);

  $inCatQuery = $conn->prepare('INSERT INTO user(Name, Description) VALUES(?,?)');
  $inCatQuery->bind_param('ss', $Name, $Des);
  $inCatQuery->execute();
  $conn->close();

  header('location: ../component/profile/member.php');
}
