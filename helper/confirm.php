<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/resources/css/prop.css">
  <link rel="stylesheet" href="./confirm.css">
  <title>Lowa State University | E-Library</title>
</head>

<body>
  <?php
  $de_id = $_GET['de_id'];
  $head = $_GET['head'];
  $msg = $_GET['msg'];
  ?>
  <div class="errorCard">
    <div class="errorHead">
      <h1><?php echo $head ?></h1>
      </h1>
    </div>
    <div class="errorPara">
      <p><?php echo $msg ?></p>
      <?php if (isset($_SERVER['HTTP_REFERER'])) : ?>
        <div class="button">
          <a href="<?php echo $_SERVER['HTTP_REFERER'] . '?de_id=' . $de_id ?>">Confirm</a>
          <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Cancel</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>