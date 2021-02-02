<?php require '../../db/book_edit.php';

if (isset($_GET['v_id'])) :
?>
  <div class="book">
    <form action="../../db/book_edit.php" method="POST" enctype="multipart/form-data">
      <div class="details">
        <div class="title">
          <h3>Title : </h3>
          <h3>Author : </h3>
          <h3>Language : </h3>
          <h3>Release Data : </h3>
          <h3>Copyright : </h3>
          <h3>Category : </h3>
        </div>
        <div class="input">
          <input name="e_id" type="hidden" value="<?php echo $book['ID']; ?>">
          <input name="title" type="text" value="<?php echo $book['Title']; ?>">
          <input name="author" type="text" value="<?php echo $book['Author'] ?>">
          <input name="lang" type="text" value="<?php echo $book['Language'] ?>">
          <input name="releaseDate" type="text" value="<?php echo $book['ReleaseDate'] ?>">
          <input name="copyright" type="text" value="<?php echo $book['Copyright'] ?>">
          <select name="cat">
            <?php require '../../db/book_cat.php'; ?>
          </select>
        </div>
      </div>
      <div class="book_img">
        <img src="../../public/resources/book/<?php echo $book['Picture'] ?>" alt="">
        <input name="img" class="change" type="file">
      </div>
      <div class="book_btn">
        <input type="submit" value="Save Changes">
      </div>
    </form>
  </div>
<?php endif; ?>
<?php if (isset($_GET['cr_id'])) : ?>
  <div class="book">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="details">
        <div class="title">
          <h3>Title : </h3>
          <h3>Author : </h3>
          <h3>Language : </h3>
          <h3>Release Date : </h3>
          <h3>Copyright : </h3>
          <h3>Category : </h3>
        </div>
        <div class="input">
          <input type="text" required>
          <input type="text" required>
          <input type="text" required>
          <input type="date" required>
          <input type="text" required>
          <select name="" id="" required>
            <?php require '../../db/book_cat.php'; ?>
          </select>
        </div>
      </div>
      <div class="book_img">
        <img src="../../public/resources/book/book.jpg" alt="">
        <input class="change" type="file" required>
      </div>
      <div class="book_btn">
        <input name="img" type="submit" value="Save Changes">
      </div>
    </form>
  </div>
<?php endif ?>