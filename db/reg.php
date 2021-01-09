<?php

  require '../db/Conn.php';

  // Gather data from registration form

  if ($_SERVER['REQUEST_METHOD']==='POST'){
    $ID = htmlentities($_POST['ID']);
    $Uname = htmlentities($_POST['Uname']);
    $Passwd = htmlentities($_POST['Passwd']);

    $data = [
      'msg'=>'',
      'status'=>''
    ];

    // Check ID exits in user table
  
   if (!empty($ID) && !empty($Uname) && !empty($Passwd)){
    $getUserQuery = $conn->prepare("SELECT ID FROM user WHERE ID = ?");
    $getUserQuery->bind_param('i',$ID);
    $getUserQuery->execute();
    $getUser = $getUserQuery->get_result()->fetch_assoc();
    $conn->close();

     // If ID exits create creditinal for login

    if($getUser){

      // Check user already exits in database
  
      require '../db/Conn.php';
      $checkUserExitsQuery = $conn->prepare("SELECT ID FROM account WHERE ID=?");
      $checkUserExitsQuery->bind_param('i',$ID);
      $checkUserExitsQuery->execute();
      $isUserExit = $checkUserExitsQuery->get_result()->fetch_assoc();
      $conn->close();
  
      if(!$isUserExit){
        require '../db/Conn.php';
        $regUserQuery = $conn->prepare("INSERT INTO account VALUES(?,?,?)");
        $regUserQuery->bind_param("iss",$ID,$Uname,$Passwd);
        $regUserQuery->execute();
        $conn->close(); 
      
        $data['msg'] = 'You are registered successfully';
        $data['status'] = 'success';
        header('location: ../public/index.php');
      }else{
        $data['msg'] = 'You are already registered';
        $data['status'] = 'info';
        header('location: ../public/index.php');
      }
  
    }

   }else {
    $data['msg'] = 'Please fields are required';
    $data['status'] = 'warning';
    header('location: ../public/index.php');
   }
  }

?>