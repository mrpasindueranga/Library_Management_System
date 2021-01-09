<?php
  require '../db/Conn.php';

  $Uname = htmlentities($_POST['Uname']);
  $Passwd = htmlentities($_POST['Passwd']);

  $checkCredQuery = $conn->prepare('SELECT ID FROM account WHERE Uname=? AND Passwd=?');
  $checkCredQuery->bind_param('ss',$Uname, $Passwd);
  $checkCredQuery->execute();
  $getUser = $checkCredQuery->get_result()->fetch_assoc();
  $conn->close();

  $data = [
    'msg'=>'',
    'status'=>''
  ];

  if($getUser){
    // Create session store info and redirected to home page
    session_start();
    require '../db/Conn.php';
    $getUserDataQuery = $conn->prepare('SELECT * FROM user WHERE ID=?');
    $getUserDataQuery->bind_param('i',$getUser['ID']);
    $getUserDataQuery->execute();
    $getUserData = $getUserDataQuery->get_result()->fetch_assoc();
    $conn->close();
    
    $_SESSION['ID'] = $getUserData['ID'];
    $_SESSION['Fname'] = $getUserData['Fname'];
    $_SESSION['Lname'] = $getUserData['Lname'];
    $_SESSION['Email'] = $getUserData['Email'];
    $_SESSION['Post'] = $getUserData['Post'];
    $_SESSION['Address'] = $getUserData['Address'];
    
    header('location: ../public/home.php');
  }
  else {
    // Display error message
    $data['msg']='Please create an account';
    $data['status']='warning';
    header('location: ../public/index.php');
  }
?>