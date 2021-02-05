<div class="contain">
  <nav>
    <?php if ($_SESSION['Post'] === 'Librarian') : ?>
      <a href="../../component/profile/book.php">Books</a>
      <a href="../../component/profile/member.php">Members</a>
      <a href="../../component/profile/category.php">Category</a>
      <a href="../../component/profile/borrow.php">Borrow</a>
    <?php endif ?>
  </nav>
</div>