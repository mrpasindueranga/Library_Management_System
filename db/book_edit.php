<?php

if (isset($_GET['v_id'])) {
  require '../../db/Conn.php';

  $vid = htmlentities($_GET['v_id']);
  $getBookQuery = $conn->prepare('SELECT * FROM book WHERE ID=?');
  $getBookQuery->bind_param('i', $vid);
  $getBookQuery->execute();
  $book = $getBookQuery->get_result()->fetch_assoc();
  $conn->close();
}

if (isset($_GET['d_id'])) {
  require '../../db/Conn.php';

  $did = htmlentities($_GET['d_id']);
  $delBookQuery = $conn->prepare('DELETE FROM book WHERE ID=?');
  $delBookQuery->bind_param('i', $did);
  $delBookQuery->execute();
  $conn->close();

  header('location: ./book.php');
}

if (isset($_POST['e_id'])) {
  require './Conn.php';

  $eid = htmlentities($_POST['e_id']);
  $title = htmlentities($_POST['title']);
  $author = htmlentities($_POST['author']);
  $lang = htmlentities($_POST['lang']);
  $releaseDate = htmlentities($_POST['releaseDate']);
  $copyright = htmlentities($_POST['copyright']);
  $cat = htmlentities($_POST['cat']);
  $picture = $eid . '.jpg';

  $_FILES;
  move_uploaded_file($_FILES['img']['tmp_name'], '../public/resources/book/' . $eid . '.jpg');

  $upCatQuery = $conn->prepare('UPDATE book SET Title=?, Author=?, Language=?, ReleaseDate=?, Copyright=?, Picture=?, CategoryID=? WHERE ID=?');
  $upCatQuery->bind_param('ssssssii', $title, $author, $lang, $releaseDate, $copyright,  $picture, $cat, $eid);
  $upCatQuery->execute();
  $conn->close();

  header('location: ../component/profile/book.php');
}

if (isset($_GET['c_id'])) {
  require './Conn.php';

  $eid = htmlentities($_POST['e_id']);
  $title = htmlentities($_POST['title']);
  $author = htmlentities($_POST['author']);
  $lang = htmlentities($_POST['lang']);
  $releaseDate = htmlentities($_POST['releaseDate']);
  $copyright = htmlentities($_POST['copyright']);
  $cat = htmlentities($_POST['cat']);
  $picture = $eid . '.jpg';

  move_uploaded_file($_FILES['img']['tmp_name'], '../public/resources/book/' . $eid . '.jpg');

  $inCatQuery = $conn->prepare('INSERT INTO category(Title, Author, Language, ReleaseDate, Copyright, Picture, CategoryID) VALUES(?,?,?,?,?,?,?)');
  $inCatQuery->bind_param('ssssssi', $title, $author, $lang, $releaseDate, $copyright,  $picture, $cat);
  $inCatQuery->execute();
  $conn->close();

  header('location: ../component/profile/book.php');
}
