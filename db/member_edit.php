<?php
$data = [
  'head' => '',
  'msg' => '',
  'status' => ''
];

// if v_id isset display member

if (isset($_GET['v_id'])) {
  require '../../db/Conn.php';

  $vid = htmlentities($_GET['v_id']);
  $getMemQuery = $conn->prepare('SELECT * FROM user WHERE ID=?');
  $getMemQuery->bind_param('i', $vid);
  $getMemQuery->execute();
  $mem = $getMemQuery->get_result()->fetch_assoc();
  $conn->close();
}

// if d_id isset  permenently remove member

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

// if de_id isset deactivate account 

if (isset($_GET['de_id'])) {
  require '../../db/Conn.php';

  $did = htmlentities($_GET['de_id']);
  $delAccQuery = $conn->prepare('DELETE FROM account WHERE ID=?');
  $delAccQuery->bind_param('i', $did);
  $delAccQuery->execute();
  $conn->close();
}

// if c_id isset store member details after checking validation

if (isset($_POST['c_id'])) {
  session_start();

  $eid = htmlentities($_POST['c_id']);
  $Fname = htmlentities($_POST['Fname']);
  $Lname = htmlentities($_POST['Lname']);
  $Gender = htmlentities($_POST['Gender']);
  $Email = htmlentities($_POST['Email']);
  $Address = htmlentities($_POST['Address']);
  $Post = htmlentities($_POST['Post']);

  $emailPattern = '/^[0-9a-zA-Z]+([0-9a-zA-Z]*[-._+])*[0-9a-zA-Z]+@[0-9a-zA-Z]+([-.][0-9a-zA-Z]+)*([0-9a-zA-Z]*[.])[a-zA-Z]{2,6}$/';
  $namePattern = '/^[a-zA-z]+$/';

  if (!preg_match($namePattern, $Fname) || !preg_match($namePattern, $Lname)) {
    $data['head'] = 'Warning..!!';
    $data['msg'] = 'Only allowed alphabetic characters for first name & last name';
    $data['status'] = 'warning';
    $_SESSION['error'] = $data;

    header('location: ../helper/errorHandler.php');
  }

  if (!preg_match($emailPattern, $Email)) {
    $data['head'] = 'Warning..!!';
    $data['msg'] = 'Please make sure your Email is valid';
    $data['status'] = 'warning';
    $_SESSION['error'] = $data;

    header('location: ../helper/errorHandler.php');
  }

  if (!isset($_SESSION['error'])) {
    require './Conn.php';
    $inMemQuery = $conn->prepare('INSERT INTO user(ID, Fname, Lname, Gender, Email, Address, Post) VALUES(?, ?, ?, ?, ?, ?, ?)');
    $inMemQuery->bind_param('issssss', $eid, $Fname, $Lname, $Gender, $Email, $Address, $Post);
    $inMemQuery->execute();
    $conn->close();

    header('location: ../component/profile/member.php');
  }
}

// get next member id 

function getNewID()
{
  require '../../db/Conn.php';
  $getLastIDQuery = $conn->query('SELECT ID FROM user ORDER BY ID DESC LIMIT 1');
  $conn->close();

  if ($getLastIDQuery->num_rows > 0) {
    $prevIDData = $getLastIDQuery->fetch_assoc();
    $prevID = (int)$prevIDData['ID'];
    $nextID = $prevID + 1;
    echo $nextID;
  }
}
