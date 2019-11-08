<?php
  /*
    댓글을 등록 하기
      받아와야할 데이터 : id, mail,comment,  parent_comm(대댓글시)

      comment talbe 에 값을 넣기 위한 쿼리,

  */
    session_start();
    error_reporting(0);
    $id = $_SESSION['id'];
    $mail = $_SESSION['mail'];
    $post_id = $_POST['post_id'];
    $parent_comm_id = $_POST['parent_comm_id'];
    // 댓글달 글의 번호
    // $comment = $_POST['comment'];
    // echo $id."<br>".$mail."<br>".$_POST['comment']."<br>".$post_id;

    $comment = '';
    if ($_POST['comment']) {
      $comment = $_POST['comment'];
      // echo $comment;
    }else {
      echo "<script>alert(\"입력된 댓글이 없습니다. 다시 입력하세요\");</script>";
      echo"<script>history.back();</script>";
      exit();
    }


    //?????????????????????????????????????????????????????????????????? 여기까진 괜춘
// 대댓글일 경우 cocomm
    // print "<br>cocomm = ".$parent_comm_id;
    // echo  "<br>cocomm = ".$_POST['parent_comm_id'];
    $cocomm = '';
    if ($parent_comm_id!='not') {// 댓글일경우 not 이 온다.
      // echo "";
      // code...
      $cocomm = $_POST['parent_comm_id'];


      $anounce = "<script>alert(\"대_댓글이 등록되었습니다.\");</script>";

      try {
          $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
          $query = "insert into comments (id, mail, comment, createdate, parent_post, parent_comm) values ('$id', '$mail', '$comment', now(), '$post_id', '$cocomm')";
          $pdo->exec($query);
          // echo "<br>".$query;
          // echo $anounce;
          echo"<script>location.href='post_detail.php';</script>";
          // echo"<script>history.back();</script>";
      } catch(PDOException $e){
          echo "<br><html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";
           // $result = "#ERR:" . $e->getMessage();
      }

    }else { // 대댓글일 경우 댓글번호가 온다.
      // code...
      $anounce = "<script>alert(\"댓글이 등록되었습니다.\");</script>";

      try {
          $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
          $query = "insert into comments (id, mail, comment, createdate, parent_post) values ('$id', '$mail', '$comment', now(), '$post_id')";
          $pdo->exec($query);
          // echo "<br>".$query;
          // echo $anounce;
          echo"<script>location.href='post_detail.php';</script>";
          // echo"<script>history.back();</script>";
      } catch(PDOException $e){
          echo "<br><html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";
           // $result = "#ERR:" . $e->getMessage();
      }

    }

    // $parent_comm='';
    // if ($_POST['parent_comm']) {
    //   // 대댓글
    //   $parent_comm = $_POST['parent_comm'];
    //   try {
    //       $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    //       $query = "insert into comments (id, mail, comment, createdate, parent_comm) values ('$id', '$mail', '$comment', now(), $parent_comm)";
    //       $pdo->exec($query);
    //       echo"<script>alert(\"대댓글이 등록되었습니다.\");</script>";
    //       echo"<script>location.href='main.php';</script>";
    //   } catch(PDOException $e){
    //       echo "<br><html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";
    //        // $result = "#ERR:" . $e->getMessage();
    //   }
    // }else {
    //   // code...
    // }
    // // 게시글과 댓글과 대댓글을 어떻게 연결 시킬 것인가?
    //
    //


 ?>
