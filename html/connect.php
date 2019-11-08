<?php
$host = 'localhost';
$user = 'root';
$pw = 'sql';
$dbName = 'mysql';
$mysqli = new mysqli($host, $user, $pw, $dbName);

if($mysqli){
    echo "sql 성공";
}else{
    echo "sql 실패";
}
?>
