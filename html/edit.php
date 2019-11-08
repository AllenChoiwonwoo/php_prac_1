<?php
  $text = $_POST['text'];
  $col = $_POST['col'];
  $row = $_POST['row'];
  echo $row;
  // $col = $_POST['col'];
  // $text = $_POST['text'];

  error_reporting(E_ALL);

  ini_set("display_errors", 1);


  try {
    $pdo = new PDO("mysql:host=localhost; dbname=mysampledata; charset=utf8", "root", "sql");
    $query = "update sampletable set $col = '$text' where name ='$row'";

    echo $query;

    $pdo -> exec($query);
  } catch (PDOException $e) {
    echo "<html><body><h1>ERR: " . $e->getMessage() + "</h1></body></html>";
  }
  $pdo = null;
  header('Location: pdo_index_3.php');

 ?>
