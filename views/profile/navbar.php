<div class="contain">
  <nav>
    <a href="">Overview</a>
    <?php if ($_SESSION['Post'] === 'Librarian') : ?>
      <a href="../../component/profile/book.php">Books</a>
      <a href="../../component/profile/member.php">Members</a>
      <a href="../../component/profile/category.php">Category</a>
    <?php endif ?>
  </nav>
</div>