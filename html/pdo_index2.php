<?php
// $name = "moonjh";
// $mail = "moon93@naver.com";
// $tel = "010 5555 1555";
// $memo = "badbadbbad";
try {
    $pdo = new PDO("mysql:host=localhost;dbname=mysampledata;charset=utf8", "root","sql");
    $query = "insert into sampletable (name, mail, tel, memo) values ('momomomo', 'moon@naver.com', '01000000000', 'kkkkkkk')";
    $pdo->exec($query);
} catch(PDOException $e){
    echo "<html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";
}
$pdo = null;
// header('Location: index.php');
