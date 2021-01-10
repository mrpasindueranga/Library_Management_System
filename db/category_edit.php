<?php

  if (isset($_GET['v_id'])) {
      require '../../db/Conn.php';

      $vid = htmlentities($_GET['v_id']);
      $getCatQuery = $conn->prepare('SELECT * FROM category WHERE ID=?');
      $getCatQuery->bind_param('i',$vid);
      $getCatQuery->execute();
      $cat = $getCatQuery->get_result()->fetch_assoc();
      $conn->close();
  }

  if (isset($_GET['d_id'])) {
    require '../../db/Conn.php';

    $did = htmlentities($_GET['d_id']);
    $delCatQuery = $conn->prepare('DELETE FROM category WHERE ID=?');
    $delCatQuery->bind_param('i',$did);
    $delCatQuery->execute();
    $conn->close();

    header('location: ./category.php');
}

  if (isset($_GET['e_id'])) {
    require './Conn.php';

    $eid = htmlentities($_GET['e_id']);
    $Name = htmlentities($_GET['Name']);
    $Des = htmlentities($_GET['Des']);

    $upCatQuery = $conn->prepare('UPDATE category SET Name=?, Description=? WHERE ID=?');
    $upCatQuery->bind_param('ssi',$Name,$Des,$eid);
    $upCatQuery->execute();
    $conn->close();

    header('location: ../component/profile/category.php');
  }

  if (isset($_GET['c_id'])) {
    require './Conn.php';

    $eid = htmlentities($_GET['c_id']);
    $Name = htmlentities($_GET['Name']);
    $Des = htmlentities($_GET['Des']);

    $inCatQuery = $conn->prepare('INSERT INTO category(Name, Description) VALUES(?,?)');
    $inCatQuery->bind_param('ss',$Name,$Des);
    $inCatQuery->execute();
    $conn->close();

    header('location: ../component/profile/category.php');
   }

?>
