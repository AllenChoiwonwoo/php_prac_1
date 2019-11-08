<?php
session_start();
error_reporting(0);
  // main.php에서 mypage를 눌렀을때 mypage_old.php로 이동해서 php 문을 통해서 이미지를 로드해서 갤러리 같은 뷰를 만들어 줘야한다.
  // 회원 각각의 테이블은 회원가입시 만들어지게 하도록 한다.
  // 일단은 인스타의 마이페이지 형태로 갤러리만 보여준다.(사진만)
  // 38_gallery 에서 image_src에 있는 사진을 가져와 그것을 배열에 담고
  // 배열의 길이만큼 반복해서 img_src 를 만들게 하고 그것을 $result에 담아서
  // <body> 안에서 $result를 화면에서 보이게 한다.
  $result[0]='';
  $nub = -1;
  $test ='';
  $id = $_SESSION['id'];
  $mail = $_SESSION['mail'];
  $name = $_SESSION['name'];


  try {
      $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
      // echo "<script>alert(\"123132\");</script>";
      $statement = $pdo->query("select writer_mail,image_src from posts WHERE writer = '$id'");
      $a = 0;
      while($record = $statement->fetch(PDO::FETCH_ASSOC)){

        //record 는 한 행(row)의 값을 가지고 있는 배열 이다. 각 col의 이름이 키 값이다.(name, mail, phone, password, createdate)
        // $test1 .= $record["mail"].$record["name"];
        //while문은 row 개수만큼 반복된다.

          // $result .= "<tr>";
          // $test .= "<br>".$record['writer_mail']." @@ ".$record['image_src']."</br>";
          $result[$a] = $record['image_src'];
          $a += 1;


          // foreach($record as $column){
          //     $nub += 1;
          //     $result[$nub] = $column ;
          //     // foreach 로 record배열에 담겨있는 값을 개수만큼 반복한다.
          //     // 박복하며 <td> 값 </td> 가 result 에 쌓인다.
          // }
          // $result .= "</tr>";
      }
  } catch(PDOException $e){
      $result = "#ERR:" . $e->getMessage();
  }
    $length = count($result);//등록한 사진의 개수
  // print $test;

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
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

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
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
    <title>mypage</title>
  </head>
  <body>
    <?php
      $active2="active";
      include 'manubar.php'; ?>
<br><br><br><br>

    <div class="container" align="center">
      <img src="http://localhost/papamama/src/img/PapaMama_logo.png" height="150" alt="papamama로고"><br>
      <h1>   PapaMama</h1>
      <form class="" action="search.php" method="get">
        <!-- <input type="text" name="search" placeholder="검색어를 입력하세요">
        <input type="submit" value="검색"> -->
        <div class="" align="center">
          <br>
          <table>
            <tr>
              <td width=60>이름</td>
              <td width=10>:</td>
              <td><figcaption><?php echo $name; ?></figcaption></td>
            </tr>
            <tr>
              <td>메일</td>
              <td>:</td>
              <td><?php echo $mail; ?></td>
            </tr>
            <tr>
             <td>게시물</td>
             <td>:</td>
             <td><?=$length ?></td>
            </tr>
            <tr>
              <?php
              $connect = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");//연결자(pdo) 생성
              //@@ pdo를 왜써야하는지도 , 사용법~
              // 현업에서 대부분 mysql이나 mariaDB를 사용하기 때문에 mysqli를 사용해도 상관이 없다.
              // mysqli 와 pdo에서는 prepare statement를 사용할 수 있어 statement를 여러번 실행하거나, 인젝션 공격을 막는데 효과적이다.
              // pdo가 확장성이 좋다고들 하니까 pdo를 쓴다는것 외골수 적인 행동인 것이다.
                //pdo 사용법
                // new PDO("데이터베이스종류:host=서버이름;dbname=데이터베이스이름;charset=문자인코딩 방식","아이디","비밀번호")
              $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//연결자에 오류메시지 표시모드를 설정
              $statement = $connect->query("SELECT friends_list FROM user_info where id='$id'");
                //DB에서 현제 로그인한 사용자의 친구목록 컬럼의 값을 가져와 statement에 담는다.


              $frineds_list = $statement->fetch();//statement에서 값을 1개만 가져와 str_array에 담는다.
              $str_array = $frineds_list['friends_list'];//result에 '컬럼'이 키값인 값을 가져와 str_array에 담는다.

              $friends_numb = substr_count($str_array, "/"); //친구 id값을 구분하는 구분자인 "/"의 개수를 개산해서 총 친구수를 구하는 코드다.
               ?>
              <td>친구수</td>
              <td>:</td>
              <td><?=$friends_numb ?></td>
            </tr>
            <tr>
              <td></td>
            </tr>
          </table>

              <hr>

        </div>
      </form>
      <center><table>
        <tr>
        <td>
          <form class="" action="calender.php" method="post">
            <button class="btn btn-primary my-2" type="submit"> 캘린더 </button>
          </form>
        </td>
          <!-- <td>
            <form class="" action="myfriends.php" method="post">
              <input type="submit" name="일촌" value="최원우의 일촌들">
            </form>
          </td> -->
          <td>
            <button type="button" class="btn btn-primary my-2" onclick="location.href='myfriends.php' ">친구보기</button>
          </td>
          <td>
              <button class="btn btn-primary my-2" id="button1" onclick="go_main();">메인으로 돌아가기</button>
              <script type="text/javascript">
              function go_main(){
                location.href='main.php';
              }
              </script>
          </td>
        </tr>
      </table>


      <!-- <button type="button">일촌</button> -->


      <!-- <button class="btn btn-default">DEFAULT</button>
      <button class="btn btn-primary">BLUE</button>
      <button class="btn btn-success">GREEN</button>
      <button class="btn btn-info">SKY</button>
      <button class="btn btn-warning">YELLO</button>
      <button class="btn btn-danger">RED</button> -->
      <p>
        <!-- <center/> -->
        <center>
          <div class="">
          <?php
          $img_html='';

          // echo '<pre>'; print_r($result); echo '</pre>'; //4가 들어왔다.
          // print_r($result);
          // echo "string";
          // echo "<script>alert('$length');</script>";
          // echo $length;
          $a = 0;
          while ($length > $a) {
            // echo "반복문";
          //   // code...
            ?>

              <a href="post_detail.php?img_src='<?php echo $result[$a]; ?>'" >
                <img src="<?php echo $result[$a]; ?>" width="300px" height="300px" overflow="hidden" alt="" vspace="2" style="background-color:lightgrey">
              </a>

            <?php
            // $img_html .= "<img src= \"".$result[$a]."\" width=\"200\" style=\"width: 200px; height: auto;\" alt=\"\" >";
            // $img_html .= '<img src= ''.$result[$a].'' width="200" style="width: 200px; height: auto;" alt="" >';
            // if (($a+1)%3 == 0) {
            //
            // }
            $a++;
          }
          // echo $img_html;
          //정사각형에 맞추려면 가로나 세로중 더 짧은값을 구해서 그 값에 맞춰 사진을 키운다. (css 로 조건문 필요한데 다른거 구현하고 하자)
           ?>
         </div>

             <!-- <img src="이미지 경로" style="width: 200px; height: auto;"alt=""> -->

          <!-- <img src="src/img/trip_pic3.jpg" width="200" alt="">
          <img src="src/img/trip_pic4.jpg" width="200" alt="">
          <img src="src/img/trip_pic5.jpg" width="200" alt=""><br>
          <img src="src/img/mcthemax1.jpg" width="200" alt="">
          <img src="src/img/mcthemax2.jpg" width="200" alt="">
          <img src="src/img/mcthemax3.jpg" width="200" alt=""><br>
          <img src="src/img/mcthemax4.jpg" width="200" alt="">
          <img src="src/img/mcthemax5.jpg" width="200" alt="">
          <img src="src/img/mcthemax6.gif" width="200" alt=""><br>
          <img src="src/img/mcthemax7.jpg" width="200" alt="">
          <img src="src/img/mcthemax8.jpg" width="200" alt="">
          <img src="src/img/mcthemax9.JPG" width="200" alt="">
        div a href 로 감싼후 이미지를 클릭시 onclick이 발동하여 사진상세페이지로 넘어가고 ,
      post로 img-dir를 보내서 이미지를 띄우게 한다.-->
        </div>
      </p>
    </div>

    <!-- <div>
      <a href="img_src"></a>
    </div> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <!-- <script src="form-validation.js"></script> -->

  </body>
</html>
