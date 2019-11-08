<?php
try {
  $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  // $topic = $stmt->fetch();
  // echo "<pre>";
  // print_r($topic);
  // echo "왜 왜왜 ";
  // printf($topic);
  // print($topic);
  // echo "</pre>";
} catch (PDOException $e) {
  echo "<br><html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";

}

 ?>
