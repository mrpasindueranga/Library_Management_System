<?php
  require '../db/Conn.php';

  session_start();

  $Uname = htmlentities($_POST['Uname']);
  $Passwd = htmlentities($_POST['Passwd']);

  $checkCredQuery = $conn->prepare('SELECT ID FROM account WHERE Uname=? AND Passwd=?');
  $checkCredQuery->bind_param('ss',$Uname, $Passwd);
  $checkCredQuery->execute();
  $getUser = $checkCredQuery->get_result()->fetch_assoc();
  $conn->close();

  $data = [
    'head'=>'',
    'msg'=>'',
    'status'=>''
  ];

  if($getUser){
    // Create session store info and redirected to home page
    require '../db/Conn.php';
    $getUserDataQuery = $conn->prepare('SELECT * FROM user WHERE ID=?');
    $getUserDataQuery->bind_param('i',$getUser['ID']);
    $getUserDataQuery->execute();
    $getUserData = $getUserDataQuery->get_result()->fetch_assoc();
    $conn->close();

    require '../db/Conn.php';
    $getAccDataQuery = $conn->prepare('SELECT * FROM account WHERE ID=?');
    $getAccDataQuery->bind_param('i',$getUser['ID']);
    $getAccDataQuery->execute();
    $getAccData = $getAccDataQuery->get_result()->fetch_assoc();
    $conn->close();
    
    $_SESSION['ID'] = $getUserData['ID'];
    $_SESSION['Fname'] = $getUserData['Fname'];
    $_SESSION['Lname'] = $getUserData['Lname'];
    $_SESSION['Email'] = $getUserData['Email'];
    $_SESSION['Gender'] = $getUserData['Gender'];
    $_SESSION['Post'] = $getUserData['Post'];
    $_SESSION['Address'] = $getUserData['Address'];
    $_SESSION['Profile'] = $getUserData['Profile'];
    $_SESSION['Uname'] = $getAccData['Uname'];
    $_SESSION['Passwd'] = $getAccData['Passwd'];

    header('location: ../public/home.php');
  }
  else {
    // Display error message
    $data['head'] = 'Warning..!!';
    $data['msg']='Please create an account';
    $data['status']='warning';
    $_SESSION['error'] = $data;
    header('location: ../helper/errorHandler.php');
  }
?>