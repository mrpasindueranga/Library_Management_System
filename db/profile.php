<?php
  session_start();
  if ($_SESSION){

    $data = [
      'head'=>'',
      'msg'=>'',
      'status'=>''
    ];

    if ($_SERVER['REQUEST_METHOD']==='POST'){
      
      if (isset($_POST['e_id'])) {
        $ID = htmlentities(trim($_POST['e_id']));
        $Fname = htmlentities(trim($_POST['Fname']));
        $Lname = htmlentities(trim($_POST['Lname']));
        $Email = htmlentities(trim($_POST['Email']));
        $Address = htmlentities(trim($_POST['Address']));
        $Gender = htmlentities(trim($_POST['Gender']));
        $Uname = htmlentities(trim($_POST['Uname']));
        $Passwd = htmlentities(trim($_POST['Passwd']));
        
        $emailPattern = '/^[0-9a-zA-Z]+([0-9a-zA-Z]*[-._+])*[0-9a-zA-Z]+@[0-9a-zA-Z]+([-.][0-9a-zA-Z]+)*([0-9a-zA-Z]*[.])[a-zA-Z]{2,6}$/';
        $namePattern = '/^[a-zA-z]+$/';
        
        if (!preg_match($namePattern, $Fname)||!preg_match($namePattern, $Lname)) {
          $data['head'] = 'Warning..!!';
          $data['msg'] = 'Only allowed alphabetic characters for first name & last name';
          $data['status']='warning';
          $_SESSION['error'] = $data;
          
          header('location: ../helper/errorHandler.php');
        }
        
        if (!preg_match($emailPattern, $Email)) {
          $data['head'] = 'Warning..!!';
          $data['msg'] = 'Please make sure your Email is valid';
          $data['status']='warning';
          $_SESSION['error'] = $data;
          
          header('location: ../helper/errorHandler.php');
        }
        
        if (!isset($_SESSION['error'])) {
          move_uploaded_file($_FILES['IMG']['tmp_name'], '../public/resources/profile/'.$ID.'.png');
          
          require './Conn.php';
          $upUserQuery = $conn->prepare('UPDATE user SET Fname=?, Lname=?, Email=?, Address=?, Gender=? WHERE ID=?');
          $upUserQuery->bind_param('sssssi',$Fname, $Lname, $Email, $Address, $Gender, $ID);
          $upUserQuery->execute();
          $conn->close();

          require './Conn.php';
          $upAccQuery = $conn->prepare('UPDATE account SET Uname=?, Passwd=? WHERE ID=?');
          $upAccQuery->bind_param('ssi',$Uname, $Passwd, $ID);
          $upAccQuery->execute();
          $conn->close();
    
          session_destroy();
          header('location: ../public/index.php');
        }
      }
    }
  }else {
    header('location: ../public/index.php');
  }
