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
      <iframe src="../component/profile/dashboard.php" frameborder="0"></iframe>
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