

<?php
$pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
$statement = $pdo->query('SELECT id,name FROM test1');
// while ($row = $statement->fetch()) {
//   print_r($row);
//   echo "<br>";
//   // code...
// }
// $array = []
// while ($a <= 10) {
//   // code...
// }

$row = $statement->fetch();
$numb = count($row);
// print_r($row);
// echo "<br>";
echo $row['name'];
// echo $numb;
 ?>
