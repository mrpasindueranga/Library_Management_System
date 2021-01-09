<?php
  if (!isset($_GET['q'])) {
    require_once '../../db/Conn.php';
    $allCat = $conn->query('SELECT * FROM category');
    $conn->close();
  }else {
    require_once '../../db/Conn.php';
    $search = htmlentities($_GET['q']);
    $allCat = $conn->query("SELECT * FROM category WHERE Name like '%.$search.%'");
    $conn->close();
  }
  
  while ($row = $allCat->fetch_assoc()):
?>

<div class="cat_card">
  <div class="head">
    <div class="topic">
      <h1><?php echo $row['Name'];?></h1>
      <span><?php echo $row['Status'];?></span>
    </div>
    <a href='./category.php?ID=<?php echo$row['ID']?>'>View</a>
  </div>
  <p><?php echo $row['Description'];?></p>
</div>

<?php
  endwhile;
?>