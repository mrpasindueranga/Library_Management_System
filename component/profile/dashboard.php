<?php
  session_start();
  if ($_SESSION):
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/resources/css/prop.css">
  <link rel="stylesheet" href="../../views/profile/resources/css/navbar.css">
</head>
<body>
  <?php require_once '../../views/profile/navbar.php'?>
</body>
</html>
<?php
  endif;
?>