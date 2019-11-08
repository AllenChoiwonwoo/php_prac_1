<?php
  $user_id = 'dkssudnjsdn@naver.com';
  // session_start();
  $mail = "dkssudnjsdn@naver.com";//dkssudnjsdn@navere.com
  echo "<script>alert(\"$mail\");</script>";

  //로그인시 받아온 아이디를 통해서 피드를 구성하여 보여준다.
?>

<!doctype html>
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
    <link href="form-validation.css" rel="stylesheet">
  </head>


  <body class="bg-light">
    <!-- 메뉴바 -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
   <img src="http://localhost/papamama/src/img/PapaMama_logo.png" alt="PapaMama" width="55">
 </a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>

 <div class="collapse navbar-collapse" id="navbarsExampleDefault">
   <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
       <a class="nav-link" href="mypage_old.php">mypage<span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">좋아요</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="upload_post.php?name=<?php echo $user_id; ?>">사진업로드</a>
       <!-- <a class="nav-link" href="upload_img_finder.php?name=<?php echo $user_id; ?>">사진업로드</a> -->
       <!-- 사진 업로드 를 누르면 아이디를 post로 보낸다. -->
     </li>
     <!-- <li class="nav-item">
       <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
     </li> -->
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
       <div class="dropdown-menu" aria-labelledby="dropdown01">
         <a class="dropdown-item" href="#">Action</a>
         <a class="dropdown-item" href="#">Another action</a>
         <a class="dropdown-item" href="#">Something else here</a>
       </div>
     </li>
   </ul>
   <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
     <input class="form-control mr-sm-2" type="text" name="search" placeholder="search" aria-label="Search">
     <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
   </form>
 </div>
</nav>
<!--  여기까지 네비게이션 바-->

    <div class="container">
      <div class="col-md-4">
        <br><br><br><br>
      </div>


  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">다가오는 생일</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">첫째큰아버지 생신</h6>
            <small class="text-muted">2월 23일(오늘)</small>
          </div>
          <!-- <span class="text-muted">$12</span> -->
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">홍길동 생일</h6>
            <small class="text-muted">2월 24일</small>
          </div>

        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">배수지 생일</h6>
            <small class="text-muted">2월 24</small>
          </div>

      </ul>

      <form class="card p-2">
        <div class="input-group">
          <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">선물하기 </button>
            <button type="button" class="btn btn-sm btn-outline-secondary">카드보내 </button>
          </div>

        </div>
      </div>
      </form>
    </div>


    <div class="col-md-8 order-md-1">
        <!-- id/pw post 로 잘 넘어오나 확인 -->
      <h4 class="mb-3">
        <p>session-ID:
          <?php
          if (empty($mail)) {
            // code...
            echo "일도없어";
            echo $mail;
          }else {
            echo $mail."<br>";
            echo "어쩌구";
            // code...
          } ?>
        </p>
        <!-- <p>post-PW: <?php echo $_POST["inputPassword"]; ?></p> -->
      </h4>
      <form class="needs-validation" novalidate>
<!-- 여기서 부터 이미지 카드뷰 -->
    <script type="text/javascript">
      var a = 0;
      while (a<4) {
        document.write(
        );
        a++;
      }


    </script>

      <div class="">
        <div class="card mb-4 box-s">

            <a href="post_dating_pic1.php?alt=trip_pic3"><img class="card-img-top" src="src/img/dating_pic1.jpg" alt="trip_pic3"></a>
          <div class="card-body">
            <p class="card-text">엄마가 저 신화의 애릭 닮았다고해서, 애릭 팬이셨던 음악선생님께 맞았던 기억이나네요</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
              </div>
              <small class="text-muted">27 mins</small>
            </div>
          </div>
        </div>
      </div>

      <?php 
        $caption = "새뮤얼 프레데릭 \"샘\" 스미스는 잉글랜드의 싱어송라이터이다. 디스클로저의 \"Latch\"와 너티 보이의 \"La La La\"의 피처링을 맡으며 이름을 알렸다";
      include '../example/include_ex1.php' ?>


        <div class="">
                <div class="card mb-4 box-s">
                  <img class="card-img-top" src="src/img/trip_pic5.jpg" alt="trip_pic3">
                  <div class="card-body">
                    <p class="card-text">제가 뉴욕 여행가서 찍은 사진이에요 잘 찍었죠. 엄마 아빠 보고싶어요. 돌아가서 봬요</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                      </div>
                      <small class="text-muted">1 weeks</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="">
                      <div class="card mb-4 box-s">
                        <img class="card-img-top" src="src/img/trip_pic4.jpg" alt="trip_pic3">
                        <div class="card-body">
                          <p class="card-text">워싱턴이에요! 전기세 많이 나오겠죠?</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                              <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                            </div>
                            <small class="text-muted">3 weeks</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="">
                            <div class="card mb-4 box-s">
                              <img class="card-img-top" src="src/img/familyimage1.jpg" alt="trip_pic3">
                              <div class="card-body">
                                <p class="card-text">저 유치원때 가족여행갔던 사진이에요. 다 같이 또가요</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                                  </div>
                                  <small class="text-muted">1 month</small>
                                </div>
                              </div>
                            </div>
                          </div>



        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">지난 사진 더보기</button>
      </form>
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
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script></body>
</html>
