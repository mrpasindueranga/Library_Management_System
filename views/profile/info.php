<?php
  echo '<img src="./resources/profile/'.$_SESSION['ID'].'.png" alt="">';
?>

<div class="detail">
  <h1>
    <?php echo $_SESSION['Fname'].' '.$_SESSION['Lname'];?>
  </h1>
  <h5>
    <?php echo $_SESSION['Post']?>
  </h5>
  <input type="submit" value="Edit Profile">
</div>

