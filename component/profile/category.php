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
  <link rel="stylesheet" href="./resources/css/category.css">
  <link rel="stylesheet" href="./resources/css/catForm.css">

</head>
<body>
  <?php require_once '../../views/profile/navbar.php'?>
  <?php if(!isset($_GET['v_id']) && !isset($_GET['cr_id']) && !isset($_GET['d_id'])):?>
  <div class="find">
    <div class="search">
      <input id="search" type="text" placeholder="Find a category...">
      <a href="">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
      </a>
    </div>
    <a href="./category.php?cr_id=true">New</a>
  </div>
  <div class="card_container">
    <?php
        require_once '../../db/category_card.php';
     ?>
  </div>
  <?php endif;?>
  <?php if(isset($_GET['v_id']) || isset($_GET['cr_id'])){
    echo '<h1 id="formHeading">Category Form</h1>';
    require '../form/category.php';
  }?>

  <?php if(isset($_GET['d_id'])){
    require '../../db/category_edit.php';
  }?>
</body>
</html>
<?php
  endif;
?>