<?php
session_start();
if ($_SESSION) :
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/resources/css/prop.css">
    <link rel="stylesheet" href="../../views/profile/resources/css/navbar.css">
    <link rel="stylesheet" href="./resources/css/borrow.css">

  </head>

  <body>
    <?php require_once '../../views/profile/navbar.php' ?>
    <div class="make_borrow">
      <form action="../../db/borrow.php" method="POST">
        <div class="row">
          <label>Book ID: </label>
          <select name="BID" required>
            <option value="null">--SELECT BOOK ID--</option>
            <?php require '../../db/bookDrop.php'; ?>
          </select>
        </div>
        <div class="row">
          <label>User ID: </label>
          <select name="UID" required>
            <option value="null">--SELECT USER ID--</option>
            <?php require '../../db/memberDrop.php'; ?>
          </select>
        </div>
        <div class="row">
          <label>Expire Date : </label>
          <input type="date" name="Date" required>
        </div>
        <input type="submit" value="Make Borrow">
      </form>
    </div>
    <div class="card_container">
      <?php require '../../db/borrow_card.php'; ?>
    </div>
  </body>

  </html>
<?php
endif;
?>