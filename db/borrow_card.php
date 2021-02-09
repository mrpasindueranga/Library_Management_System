<?php
require '../../db/Conn.php';
$allBorrow = $conn->query('SELECT borrow.*, fine.Amount FROM borrow LEFT JOIN fine ON borrow.ID = fine.BRID');
$conn->close();

while ($row = $allBorrow->fetch_assoc()) :
  $expireDate = date_create($row['ExpireDate']);
  $currentDate = date_create(date('Y-m-d H:i:s', time()));
  $diff = date_diff($currentDate, $expireDate);
  // add fine
  if ($diff->d >= 1) {
    $amount = $diff->d * 5;
    $ID = $row['ID'];
    require '../../db/Conn.php';
    $setAmount = $conn->query('UPDATE fine SET Amount = "$amount" WHERE BRID = "$ID"');
    $conn->close();
  }
?>

  <div class="borrow_card">
    <h3><?php echo 'Borrow ID : ' . $row['ID']; ?></h3>
    <div class="details">
      <div class="row">
        <label>User ID : </label>
        <span><?php echo $row['UID']; ?></span>
      </div>
      <div class="row">
        <label>Book ID : </label>
        <span><?php echo $row['BID']; ?></span>
      </div>
      <div class="row">
        <label>Borrow Date : </label>
        <span><?php echo $row['BorrowDate']; ?></span>
      </div>
      <div class="row">
        <label>Expire Date : </label>
        <span><?php echo $row['ExpireDate']; ?></span>
      </div>
      <div class="row">
        <label>Fine Amount : </label>
        <span><?php echo $row['Amount']; ?></span>
      </div>
    </div>
    <div class="btn">
      <a href="../../db/borrowClear.php?ID=<?php echo $row['ID']; ?>">
        <button>Clear Record</button>
      </a>
    </div>
  </div>
<?php
endwhile;
?>