<?php
  session_start();
  if ($_SESSION):
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./resources/css/prop.css">
  <link rel="stylesheet" href="./resources/css/navbar.css">
  <link rel="stylesheet" href="./resources/css/dashboard.css">
  <link rel="stylesheet" href="./resources/css/profile.css">
  <script src="../views/js/navbar.js" defer></script>
  <title>Lowa State University | E-Library</title>
</head>
<body>
  <?php require_once '../views/navbar.php';?>
  <section class="profile">
    <div class="info">
      <?php require_once '../views/profile/info.php';?>
    </div>
    <div class="content">
      <div class="basic_info">
        <div class="head">
          <h1>Basic Information</h1>
        </div>
        <div class="card_info">
          <div class="row">
            <h4>First Name : </h4><span><?php echo $_SESSION['Fname']?></span>
          </div>          
          <div class="row">
            <h4>Last Name : </h4><span><?php echo $_SESSION['Lname']?></span>
          </div>          
          <div class="row">
            <h4>Gender: </h4><span><?php echo $_SESSION['Gender']?></span>
          </div>
        </div>
      </div>
      <div class="contact_info">
        <div class="head">
          <h1>Contact Information</h1>
        </div>
        <div class="card_info">
          <div class="row">
            <h4>Email Address : </h4><span><?php echo $_SESSION['Email']?></span>
          </div>
          <div class="row">
            <h4>location : </h4><span><?php echo $_SESSION['Address']?></span>
          </div>
        </div>
      </div>
      <div class="acc_info">
        <div class="head">
          <h1>Account Information</h1>
        </div>
        <div class="card_info">
          <div class="row">
            <h4>Account ID : </h4><span><?php echo $_SESSION['ID']?></span>
          </div>
          <div class="row">
            <h4>Username : </h4><span><?php echo $_SESSION['Uname']?></span>
          </div>
          <div class="row">
            <h4>Password : </h4><span><?php echo $_SESSION['Passwd']?></span>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>

<?php
  endif;
?>

<?php
  if (!$_SESSION){
    header('location: ../public/index.php');
  }
?>