<?php
  session_start();
  error_reporting(0);
  $logined_id = $_SESSION['id'];
  echo $logined_id;
  $id = $_POST['mail']; // 이 값이 오지 않았다
  echo $id;
  $comm_id = $_POST['comm_id'];
  echo $comm_id;

  if ($logined_id == $id) {
    try {
      $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root", "sql");
      // $query = "DELETE FROM comments where comm_id=$comm_id";
      $query = "UPDATE comments SET del=1 WHERE comm_id=$comm_id";
      // update member set passwd='3579' where id='abc';

      $pdo->exec($query);
      // $query2 = "DELETE FROM comments where parent_comm=$comm_id";
      // $pdo->exec($query2);
      echo "<script>alert(\"삭제되었습니다.\");</script>";
      echo"<script>location.href='post_detail.php';</script>";
    } catch (PDOException $e) {
      $result = "#ERR:" . $e->getMessage();
      echo $result;
    }


    // code...
  }else {
    // code...
    echo "<script>alert(\"작성자 아이디와 일치하지 않습니다.\");</script>";
  }

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?php echo $id; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <!-- <link href="form-validation.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="card mb-4 box-s">
        <form class="" action="edit_comm.php" method="post">
          <span><input type="text" name="editing_comment" value="<?php echo $comment; ?>"></span>
          <span>
            <input type="hidden" name="editing_comm_id" value="<?php echo $comm_id; ?>"> -->
            <!-- <input type="hidden" name="" value=""> -->
          <!-- </span>
          <span><input type="submit" name="" value="수정"></span>

        </form>
      </div>
    </div> -->




  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="form-validation.js"></script></body>
</html>
