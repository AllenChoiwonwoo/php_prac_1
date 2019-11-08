<?php
  try {
    $name = "alen";
    $country = "UK";

    $pdo = new PDO("mysql:host=localhost; dbname=papamamaDB; charset=utf8", "root", "sql");
    $query = "insert into porson (name, country) values ('$name', '$country')";
    $pdo->exec($query);

  } catch (PDOException $e) {
    // echo "what?";
    echo "<html><body><h1> ERR:" . $e->getMessage() + "</h></body></html>";

  }
    $pdo = null;
  // header('location: pdo_ex1.php');
  // header(“location:DESTINATION-URL”); can move to DESTINATION-URL

 ?>
