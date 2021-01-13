<?php
  echo '<img src="./resources/profile/'.$_SESSION['Profile'].'" alt="">';
?>

<div class="detail">
  <h1>
    <?php echo $_SESSION['Fname'].' '.$_SESSION['Lname'];?>
  </h1>
  <h5>
    <?php echo $_SESSION['Post']?>
  </h5>
  <a href="./settings.php">
    <input type="submit" value="Edit Profile">
  </a>
</div>

