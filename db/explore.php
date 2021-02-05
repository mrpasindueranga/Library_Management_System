<?php
// get result according to category dropdown and search
if (!isset($_GET['category']) || $_GET['category'] === 'All') {
  if (isset($_GET['book']) && $_GET['book'] !== '') {
    require '../db/Conn.php';
    $search = htmlentities($_GET['book']);
    $getAllBookQuery = $conn->query("SELECT book.*, reservation.ID AS RID, reservation.UID, reservation.Date FROM book LEFT JOIN reservation ON book.ID = reservation.BID WHERE Title LIKE CONCAT('%','$search','%') ");
    $conn->close();
  } else {
    require '../db/Conn.php';
    $getAllBookQuery = $conn->query('SELECT book.*, reservation.ID AS RID, reservation.UID, reservation.Date FROM book LEFT JOIN reservation ON book.ID = reservation.BID ORDER BY Title');
    $conn->close();
  }
}
if (isset($_GET['category']) && $_GET['category'] !== 'All') {
  if (isset($_GET['book']) && $_GET['book'] !== '') {
    require '../db/Conn.php';
    $CID = htmlentities($_GET['category']);
    $search = htmlentities($_GET['book']);
    $getAllBookQuery = $conn->query("SELECT book.*, reservation.ID AS RID, reservation.UID, reservation.Date FROM book LEFT JOIN reservation ON book.ID = reservation.BID WHERE CategoryID = '$CID' AND Title LIKE CONCAT('%','$search','%') ");
    $conn->close();
  } else {
    require '../db/Conn.php';
    $CID = htmlentities($_GET['category']);
    $getAllBookQuery = $conn->query("SELECT book.*, reservation.ID AS RID, reservation.UID, reservation.Date FROM book LEFT JOIN reservation ON book.ID = reservation.BID WHERE CategoryID = '$CID'");
    $conn->close();
  }
}

if ($getAllBookQuery->num_rows > 0) :
  while ($book = $getAllBookQuery->fetch_assoc()) :
    if ($book['Date'] !== null) {
      $expireDate = date_create($book['Date']);
      $currentDate = date_create(date('Y-m-d H:i:s', time()));
      $diff = date_diff($currentDate, $expireDate);
      if ($diff->d >= 1) {
        require '../db/Conn.php';
        $ID = $book['RID'];
        $getAllBookQuery = $conn->query("DELETE FROM reservation WHERE ID=$ID");
        $conn->close();
      }
    }
?>
    <!-- book card implement -->
    <div class="book_card">
      <div class="img">
        <img src="./resources/book/<?php echo $book['Picture'] ?>">
      </div>
      <div class="details">
        <h3><?php echo $book['Title'] ?></h3>
        <h4><?php echo $book['Author'] ?></h4>
        <h4><?php echo $book['Language'] ?></h4>
        <h4><?php echo $book['ReleaseDate'] ?></h4>
      </div>
      <?php if ($_SESSION['Post'] !== 'Librarian') : ?>
        <div class="btn">
          <a href="../db/reserve.php?bookID=<?php echo $book['ID'] ?>">
            <?php if ($book['UID'] !== null) : ?>
              <button>Reserve Book</button>
            <?php endif; ?>
            <?php if ($book['UID'] === null) : ?>
              <button disabled>Reserve Book</button>
            <?php endif; ?>
          </a>
        </div>
      <?php endif; ?>
    </div>

  <?php endwhile; ?>
<?php endif; ?>