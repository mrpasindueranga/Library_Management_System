<?php
if (!isset($_GET['q'])) {
  require '../../db/Conn.php';
  $allMem = $conn->query('SELECT * FROM user WHERE Post!="Librarian"');
  $conn->close();
}
if (isset($_GET['q'])) {
  require '../../db/Conn.php';
  $search = htmlentities($_GET['q']);
  $allMem = $conn->query('SELECT * FROM user WHERE Fname LIKE CONCAT("%","$search","%") AND Post!="Librarian"');
  $conn->close();
}

while ($user = $allMem->fetch_assoc()) :
?>

  <div class="mem_card">
    <div class="details">
      <div class="img">
        <img src="../../public/resources/profile/<?php echo $user['Profile'] ?>" alt="">
      </div>
      <div class="info">
        <h2><?php echo $user['Fname'] . ' ' . $user['Lname'] ?></h2>
        <span class="data">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
          </svg>
          <?php echo $user['Post'] ?>
        </span>
        <span class="data">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
          </svg>
          <?php echo $user['Email'] ?>
        </span>
      </div>
    </div>
    <div class="controls">
      <a class="view" href="./category.php?v_id=<?php echo $user['ID'] ?>">View</a>
      <a class="delete" href="./category.php?d_id=<?php echo $user['ID'] ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
          <polyline points="3 6 5 6 21 6"></polyline>
          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
          <line x1="10" y1="11" x2="10" y2="17"></line>
          <line x1="14" y1="11" x2="14" y2="17"></line>
        </svg>
      </a>
    </div>
  </div>

<?php
endwhile;
?>