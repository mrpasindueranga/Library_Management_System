<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="../public/resources/css/prop.css">
  <link rel="stylesheet" href="./errorHandler.css">
</head>
<body>
  <?php 
    if (isset($_SESSION['error'])):
      $data = $_SESSION['error'];
      unset ($_SESSION['error']);
  ?>
  <div class="errorCard">
    <div class="errorHead <?php echo $data['status']?>">
      <h1><?php echo $data['head']?></h1>
    </div>
    <div class="errorPara">
      <p><?php echo $data['msg']?></p>
      <?php if(isset($_SERVER['HTTP_REFERER'])):?>
      <a href="<?php echo $_SERVER['HTTP_REFERER']?>">Go Back</a>
      <?php endif;?>
    </div>
  </div>
  <?php endif;?>
</body>
</html>