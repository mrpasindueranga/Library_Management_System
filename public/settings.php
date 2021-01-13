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
  <link rel="stylesheet" href="./resources/css/settings.css">
  <link rel="stylesheet" href="./resources/css/profile.css">

  <script src="../views/js/navbar.js" defer></script>
  <title>Lowa State University | E-Library</title>
</head>
<body>
  <?php require_once '../views/navbar.php';?>
  <form action="../db/profile.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="e_id" value="<?php echo $_SESSION['ID']?>">
    <section class="profile">
      <div class="dp">
        <img src="./resources/profile/<?php echo $_SESSION['Profile']?>" alt="">
      </div>
      <div class="change">
        <input type="file" name="IMG">
      </div>
    </section>
    <section class="content">
    <div class="basic_info">
        <div class="head">
          <h1>Basic Information</h1>
        </div>
        <div class="card_info">
          <div class="row">
            <h4>First Name : </h4><span><input name="Fname" type="text" required value="<?php echo $_SESSION['Fname']?>"></span>
          </div>          
          <div class="row">
            <h4>Last Name : </h4><span><input name="Lname" type="text" required value="<?php echo $_SESSION['Lname']?>"></span>
          </div>          
          <div class="row">
            <h4>Gender: </h4>
            <span>
              <select name="Gender" id="">
                <?php if($_SESSION['Gender']==='Male'):?>
                <option value="Male" selected>Male</option>
                <option value="Female">Female</option>
                <?php endif?>
                <?php if($_SESSION['Gender']==='Female'):?>
                <option value="Male">Male</option>
                <option value="Female" selected>Female</option>
                <?php endif?>
              </select>
            <?php $_SESSION['Gender']?>
            </span>
          </div>
        </div>
      </div>
      <div class="contact_info">
        <div class="head">
          <h1>Contact Information</h1>
        </div>
        <div class="card_info">
          <div class="row">
            <h4>Email Address : </h4><span><input type="text" name="Email" required value="<?php echo $_SESSION['Email']?>"></span>
          </div>
          <div class="row">
            <h4>location : </h4><span><textarea name="Address" cols="30" required rows="3"><?php echo $_SESSION['Address']?></textarea></span>
          </div>
        </div>
      </div>
      <div class="acc_info">
        <div class="head">
          <h1>Account Information</h1>
        </div>
        <div class="card_info">
          <div class="row">
            <h4>Username : </h4><span><input type="text" name="Uname" required value="<?php echo $_SESSION['Uname']?>"></span>
          </div>
          <div class="row">
            <h4>Password : </h4><span><input type="text" name="Passwd" required value="<?php echo $_SESSION['Passwd']?>"></span>
          </div>
        </div>
      </div>
    </section>
    <section class="btn">
      <input type="submit" value="Save Information">
    </section>
  </form>
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