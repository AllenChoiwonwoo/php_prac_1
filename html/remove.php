<?php
  $name = $_POST['name'];
  try {
    $pdo = new PDO("mysql:host=localhost; dbname=mysampledata; charset=utf8", "root", "sql");
    $query = "delete from sampletable where name = '$name'";
    $pdo -> exec($query);

  } catch (PDOException $e) {
    echo "<html><body><h1>ERR: " . $e->getMessage() + "</h1></body></html>";
    $res = mysql_query($sql) or die(__FILE__." : Line ".__LINE__."<p>Query : $res<br><br><br>".mysql_error());
  }
  $pdo = null;
  header('Location: pdo_index_3.php');
  // echo $name;
 ?>
