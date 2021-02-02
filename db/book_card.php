<?php
if (!isset($_GET['q'])) {
  require '../../db/Conn.php';
  $allBook = $conn->query('SELECT * FROM book ORDER BY Title');
  $conn->close();
}
if (isset($_GET['q'])) {
  require '../../db/Conn.php';
  $search = htmlentities($_GET['q']);
  $allBook = $conn->query("SELECT * FROM book WHERE Title LIKE CONCAT('%','$search','%') ");
  $conn->close();
}

while ($book = $allBook->fetch_assoc()) :
?>

  <div class="cat_card">
    <div class="head">
      <div class="topic">
        <h1><?php echo $book['Title']; ?></h1>
      </div>
      <a href='./book.php?v_id=<?php echo $book['ID'] ?>'>View</a>
    </div>
    <div class="body">
      <div class="author">
        Author : <?php echo $book['Author'] ?>
      </div>
      <a href='./book.php?d_id=<?php echo $book['ID'] ?>'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
          <polyline points="3 6 5 6 21 6"></polyline>
          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
          <line x1="10" y1="11" x2="10" y2="17"></line>
          <line x1="14" y1="11" x2="14" y2="17"></line>
        </svg></a>
    </div>
  </div>

<?php
endwhile;
?>