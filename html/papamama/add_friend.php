<?php
session_start();
error_reporting(0);
$user_id = $_SESSION['id']; // 로그인 아이디

$fallow_id = $_POST['fallow_id'];// 친신/친삭 할 아이디
// echo $fallow_id;
$val = $_POST['val']; //친신/친삭
// echo $val;
if ($_POST['page']) {
  $return_page = $_POST['page'];
  /*
  fallow_id 를 친구목록에서 삭제한다.
  */
  $query = "UPDATE user_info SET friends_list = REPLACE(friends_list, '/$fallow_id', '') WHERE id=$user_id";
  //팔로우를 취소하는 쿼리
  $text = "친구를 삭제하였습니다.";

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
    echo "<script>alert(\"$text\");</script>";
    echo "<script>location.replace('myfriends.php?page=$return_page');</script>";
    //get으로 보던페이지 값을 넘겨 돌아간다.
  } catch (PDOException $e) {
    echo "<br><html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";
    echo "<script>alert(\"쿼리에 값이 없음=post된 값 없음\");</script>";
    echo "<script>location.replace('mypage_old.php');</script>";
  }
  exit;
}

if ($val == 1) {// 팔로잉
  // code...
  $query = "UPDATE user_info SET friends_list=CONCAT(friends_list,'/$fallow_id') WHERE id=$user_id";
  echo $query;
  $text = "친구가 되었습니다.";
}elseif ($val == 0) {// 팔로우 취소
  $query = "UPDATE user_info SET friends_list = REPLACE(friends_list, '/$fallow_id', '') WHERE id=$user_id";
  $text = "친구삭제 하였습니다.";
  // code...
}else {// post 됀 값 없음
  // code...
  echo "post값 없음";
}

// $query = "UPDATE user_info SET friends_list=CONCAT(friends_list,'/$fallow_id') WHERE id=$user_id";
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
  echo "<script>alert(\"$text\");</script>";
  echo "<script>location.replace('mypage_old.php');</script>";
} catch (PDOException $e) {
  echo "<br><html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";
  echo "<script>alert(\"쿼리에 값이 없음=post된 값 없음\");</script>";
  echo "<script>location.replace('mypage_old.php');</script>";
}



 ?>
