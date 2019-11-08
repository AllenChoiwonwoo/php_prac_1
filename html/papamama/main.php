

<?php
  ini_set('display_errors', '0');



  session_start();
  $user_id = $_SESSION['mail'];

  // $mail = $_SESSION['mail'];//dkssudnjsdn@navere.com
  // echo "<script>alert(\"$mail\");</script>";

  //로그인 안하고 메인으로 바로 왔을때에 $_COOKIE에 logindata가 없다면 login 화면으로 보낸다.
  if (!isset($_COOKIE['autologin'])) { // 자동로그인 체그를 안했다면

      if (!$_SESSION['mail']) {//세션mail에 값이 없다면 = 로그인 안하고 main.으로 왔ᅌᅳ면
      // code...
        echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        exit;
      }else {

        $mail = $_SESSION['mail'];//dkssudnjsdn@navere.com - 수동로그인을 했을시
        $likelist = $_SESSION['likelist'];
        // echo "<script>alert(\"$likelist\");</script>";
      // code...
      }
  }else {//자동로그인을 체크했다면
    $user_id = $_COOKIE['mail'];
    $mail = $_COOKIE['mail'];
    $likelist = $_COOKIE['likelist'];
    // echo "<script>alert(\"$likelist\");</script>";

  }
//likelist에 값이 있나 없나 = 좋아요를 누른적이 있나 없나

if (empty($likelist)) {
  // code...
  // echo "<script>alert(\"likelist 에 배열값 없음\");</script>";
}else {//좋아요 누른적이 있다면
  $likelist_array = explode('/',$likelist);//배열로 만든다.
}
// print_r($likelist_array);
$res = $likelist_array[1];
// echo "<script>alert(\"이거.$res\");</script>";

  //로그인시 받아온 아이디를 통해서 피드를 구성하여 보여준다.
  $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");




?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>PapaMama</title>

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

      @media (min-width: 500px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .container img {
        max-height: 300px;
        max-width: 100%;
      }
    </style>

    <!-- Custom styles for this template -->
    <!-- <link href="form-validation.css" rel="stylesheet"> -->
    <script type="text/javascript">
      function log_out(val){
        if(confirm("로그아웃 하시겠습니까?")){
          location.href='logout.php';
          return true;
        } else {
          return false;
        }

      }
    </script>

  </head>


  <body class="bg-light">
    <!-- 메뉴바 -->

    <?php
    $active1 = 'active';
    include 'manubar.php'; ?>
<!--  여기까지 네비게이션 바-->

    <div class="container">
      <div class="col-md-4">
        <br><br><br><br>
      </div>


  <div class="row" align="center">
    <br>
    <div class="order-md-2 mb-4">

      <br>
      <form class="card p-2">
        <p class="align-items-center">오늘 본 사진</p>
        <div class="input-group">
          <div class="d-flex justify-content-between align-items-center">

            <div class="align-center">

              <?php
              // 옆에 봤던 사진들을 보여주기 위한 코드
              if (!empty($_COOKIE['watch_today'])) {
                $watch_today_count = $_COOKIE['watch_today'];
                $max_count = $watch_today_count;
                for ($i=$max_count-5; $i<$watch_today_count ; $watch_today_count--) {
                  // code...
                  if ($watch_today_count < 1) {
                    break;//쿠키에는 1이상의 정수에만 값이 담겨있음으로 빈칸에 배경만 있지 않도록 break넣는다.
                  }
                  $watched_img_src = $_COOKIE[$watch_today_count];
                  $query3 = "select del FROM posts WHERE image_src='$watched_img_src'";
                  $stmt = $pdo->query($query3);
                  // echo $query3;
                  // // $statement = $pdo->query("select post_id, writer_mail, image_src, caption, likecount FROM posts ORDER BY post_id DESC");
                  // // $pdo->exec();
                  $record = $stmt->fetch();
                  $got_post_del = $record['del']; // 삭제 여부 검사를 위한 변수
                  // echo $got_post_del; //del 값이 잘 가져와지는지 확인용 테스트 코드
                  // // echo "<script>alert(\"$i\");</script>";
                  if ($got_post_del==0) { //삭제되지 않았다면
                    ?><hr><img src="<?php echo $watched_img_src; ?>" alt="" width="200px" height="200px" style="background-color:lightgrey; width=100%;height=100%;object-fit:contain;"><?php

                  }else {//삭제되었다면
                    $i--; // 원래 최신 5개의 이미지만 표시하나, 이미지가 없음으로 6번째까지 표시하게 한다.
                    // echo "<script>alert(\"$i\");</script>";
                  //   // $i--;
                  }
                  // echo "<script>alert(\"$watch_today_count\");</script>";

                //if ($watch_today_count = 1) {break;}
                }
              }else {
                echo "<br><p class=\"text-muted\">오늘 본 사진 없음</p>";
              }
              ?>



            </div>
          <!-- <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">선물하기 </button>
            <button type="button" class="btn btn-sm btn-outline-secondary">카드보내 </button>
          </div> -->
          <!-- <button type="button" name="선물하기">선물하기/카드보내기</button> -->
          <!-- <input type="text" class="form-control" placeholder="Promo code"> -->
          <!-- <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">선물하기</button>
          </div> -->
        </div>
      </div>
      </form>
    </div>


    <div class="col-md-8 order-md-1">

        <?php
        try {

            // echo "<script>alert(\"123132\");</script>";
            $statement = $pdo->query("select post_id, writer_mail, image_src, caption, likecount FROM posts WHERE del=0 ORDER BY post_id DESC");
            // $a = 0;
            while($record = $statement->fetch(PDO::FETCH_ASSOC)){
              //record 는 한 행(row)의 값을 가지고 있는 배열 이다. 각 col의 이름이 키 값이다.(name, mail, phone, password, createdate)

                // $result .= "<tr>";
                // $test .= "<br>".$record['writer_mail']." @@ ".$record['image_src']."</br>";
                // $result[$a] = $record['image_src'];
                $feed_post_id = $record['post_id'];// 글의 번호
                $feed_writer_mail = $record['writer_mail'];
                $feed_img_src = $record['image_src'];
                $feed_caption = $record['caption'];
                $feed_likecount = $record['likecount'];
                 // 현제 row(게시물)을 로그인 되어있는 사용자가 '좋아요'를 누른적이 있는지 검사하는 조건문이다.
                if (in_array($feed_post_id, $likelist_array)) {// likelist 안에 로그인한 post_id 값이 있다면 버튼을 빨강으로 바꾸고
                  $btn_col = "btn btn-sm btn-danger"; //빨강버튼
                  $yn = 'y'; // '좋아요'버튼을 눌렀을시 좋아요를 취소하게 하기위한 구분자
                  // code...
                }else {// likelist 안에 로그인한 post_id 값이 없다면 일반버튼(흰색)으로 표시한다.
                  $btn_col = "btn btn-sm btn-outline-secondary"; //흰색버튼
                  $yn = 'n'; // '좋아요'버튼을 누를시 좋아요를 등록하게 하기위한 구분자
                  // code...
                }
                include 'feed_cardview.php';

            }
        } catch(PDOException $e){
            $result = "#ERR:" . $e->getMessage();
        }
        ?>



        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">지난 사진 더보기</button>

    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="./4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
      <script src="form-validation.js"></script>
      </body>
</html>
