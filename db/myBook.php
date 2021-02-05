<?php
require '../db/Conn.php';
$UID = $_SESSION['ID'];
$getAllBookQuery = $conn->query("SELECT book.*, reservation.UID, reservation.Date FROM book LEFT JOIN reservation ON book.ID = reservation.BID WHERE reservation.UID='$UID'");
$conn->close();

if ($getAllBookQuery->num_rows > 0) :
  while ($book = $getAllBookQuery->fetch_assoc()) :
?>

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
    </div>

  <?php endwhile; ?>
<?php endif; ?>