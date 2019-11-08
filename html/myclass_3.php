<?php
echo "query()함수르 이용한 테이블 생성<br/>";

$host = 'localhost';
$user = 'pmadmin';
$pw = 'papamama';
$dbName = 'papamamaDB'
$mysqli = new mysqli($host, $user, $pw, $dbName);

if ($mysqli) {
  // cod
  echo "myClass1 접속 성공";
}else {
  echo "테이블 생성 실패";
}

 ?>
