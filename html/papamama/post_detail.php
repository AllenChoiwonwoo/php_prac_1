<?php
  //main 에서 넘어온 게시글의 데이터들
  session_start();
  error_reporting(0);

  if (empty($_POST['post_id'])) {// main에서 온것이 아닐때
    // code...
    // echo "<script>alert(\"add_cocomm이 비었다.\");</script>";
    if ($_GET['img_src']) { //mypage_old에서 이미지 클릭하여 get으로 왔을때
      $img_src = $_GET['img_src'];
      // echo "<script>alert(\"$img_src\");</script>";
      if($_SESSION['id']){//로그인을 한 상태라면
        $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
        // echo "<script>alert(\"123132\");</script>";
        $img_src = $_GET['img_src'];
        $statement = $pdo->query("select post_id, writer, writer_mail, image_src, caption FROM posts WHERE image_src=$img_src");
        $record = $statement->fetch();
        $post_id = $record['post_id'];
        $post_src = $record['image_src'];
        $post_writer_mail = $record['writer_mail'];
        $post_caption = $record['caption'];
        $parent_comm_id = 'not';
        $insert = "댓글등록";

      }
      // code...
    }else { // post_detail에 갔다가 뒤로 가기로 왔을때
      // code...
      $post_id = $_SESSION['post_id'];
      $post_src = $_SESSION['post_src'];
      $post_writer_mail = $_SESSION['writer_mail'];
      $post_caption = $_SESSION['caption'];
      $parent_comm_id = 'not';
      $insert = "댓글등록";
    }

  }else {
  # main에서  선택해서 왔을때
    if (empty($_POST['add_cocomm'])) {

      $post_id = $_POST['post_id'];
      $post_src = $_POST['img_src'];
      // echo "<script>alert(\"$post_src\");</script>";
      $post_writer_mail = $_POST['writer_mail'];
      $post_caption = $_POST['caption'];

      $_SESSION['post_id'] = $post_id;
      $_SESSION['post_src'] = $post_src;
      $_SESSION['writer_mail'] = $post_writer_mail;
      $_SESSION['caption'] = $post_caption;
      $parent_comm_id = 'not';
      $insert = "댓글등록";

      // post_detail 에 들어왔을때
      // 현재사진의 쿠키를 새로 만들기전에 이전에
      // 있던 최대 10개의 쿠키의 img_src값과 문자열을 전부 비교하여
      // 같은 값이 있다면 쿠키를 생성하지 않는 조건을 건다.

      ////쿠키에 오늘 본 이미지 저장
      //넘버링 한 키를 가져와서  그거에 1 더한 번째 쿠키를 새로 만든다.

      /* 사진을 본적이 잇는지 확인
          기존 저장되있는 오늘본 사진들과 현재 클릭한 사진 중복검사
            중복됨
              사진 저장 안함
            중복안됨
              기존의 쿠키 값(n+1) 변경
              n+1이라는 이미지 주소를 가진 쿠키 생성
              오늘 본 사진을 10개가 넘는다면
                가장 오래된 사진을 지운다.
          사진을 본적이 없다면
            새로운 쿠키 생성
              1번째 오늘본사진 쿠키 생성
                1이라는 이미지 주소를 가진 쿠키 생성


      */
    #사진을 본적이 있다
      if (!empty($_COOKIE['watch_today'])) {
      #사진 중복검사(기존 과 현재클릭사진)
      // echo "<script>alert(\"쿠키가 있다.\");</script>";
        $latist_count = $_COOKIE['watch_today']; //가장최신쿠키의 번호 ( = [1이상의]최신번호 - 10 이 가장 오랜된 쿠키)
        $i = $latist_count; // 반복문을 위한 구분자 생성
        // echo "<script>alert(\"$i\");</script>";
        $boolen2 = 0;
        $count = 0;
          // echo "<script>alert(\"while 밖\");</script>";
        while (0 < $i && $latist_count-10 < $i) { //반복문을 통해서 모든 쿠키(10개)의 이미지 주소값과 이번에 클릭한 사진을 비교하기위한 함수
          //같은 값이 있다면 쿠키를 등록하지 않는다.
          // echo "쿠키 값 ".$i.": ".$_COOKIE[$i]."<br>";
          // echo "포스트 값 : ".$post_src."<br>";
          $boolen = strcmp($_COOKIE[$i], $post_src);
          // echo "<script>alert(\"불린값은.$boolen\");</script>";

          $count++; //저장된 이미지 개수만금 반복하기때문에 count = 반복횟수
          // strcmp(a,b) 함수는 a와b의 문자열이 일치하면 0를, 불일치시 음수를 반환한다.
        #사진이 중복될 경우
          if ($boolen == 0) {
            // 현재 이미지의 쿠키를 생성하지 않는다.
             //모든 쿠키가 중복되면 boolen2 = 반복한횟수(사진개수) = count
              // echo "<script>alert(\"사진 중복.\");</script>";
              // echo "<br>중복 0 , boolen = ".$boolen." 이다.";
        #사진이 중복이 안될경우
          }else{
            $boolen2++;
              // echo "<script>alert(\"$$$$$$$$$$$$$$$$$$$$$$\");</script>";
              // echo "<br>중복 x , boolen = ".$boolen." 이다.";

          }
          $i--;//그 전사진 비교
        }
        // echo "<script>alert(\"불린값:.$boolen2.카운트값:.$count\");</script>";
        if ($boolen2 != $count) {//중복된 사진이 있다면
          // 사진 개수와 중복안된 사진의 개수가 같지 않다는건 = 중복이 있다는 것
        }else{//중복된 사진이 없다면
          // echo "<script>alert(\"$boolen2.오늘본 사진을 등록한다.\");</script>";
          $numb = $_COOKIE['watch_today']; // watch_today 쿠키에서 numb 값을 가져와
          $numb +=1;
          setCookie('watch_today', $numb, time()+1440, '/');//numb에 1을 더한 값을 watch_today에 저장한다.
          setCookie($numb, $post_src, time()+1440,'/'); // numb 에 1을 더한 값을 키값으로 갖는 img_src를 저장한 쿠키를 만든다.
        #쿠키 개수가 10개가 넘어가면 지운다.
          if ($numb-10 > 0) { // (쿠키는 10개까지 저장하고) 새로운 쿠키가 생성되었을때 10개가 넘으면 가장 오래된 쿠키를 지워 10개를 유지한다.
            setCookie(($numb-10),'',time()-1000,'/');// 새로운 쿠키 번호 -10 한 번째 쿠키를 지운다.
          }
        }
    #사진을 본적이 없다
      }else {
        // echo "<script>alert(\"쿠키가 없다.\");</script>";
        $numb = 1;//첫번째 를 부여한다.
        // echo "<script>alert(\"$numb.'watch_today 에 아무것도 없다'\");</script>";
        setCookie('watch_today', $numb, time()+1440,'/'); //watch_today 쿠키에 numb 저장한다.
        setCookie($numb, $post_src, time()+1440,'/'); //numb 라는 키로 img_src를 가지고 있는 쿠키를 만든다.
        // code...
      }

      // echo "<script>alert(\"$numb\");</script>";

  # 대댓글 등록을 위해 새로고침 했을때
    }else {
      // code...
      $post_id = $_SESSION['post_id'];
      $post_src = $_SESSION['post_src'];
      $post_writer_mail = $_SESSION['writer_mail'];
      $post_caption = $_SESSION['caption'];
      $parent_comm_id = $_POST['add_cocomm'];
      $insert = "대댓글등록";
      // echo "<script>alert(\"대댓글 달려고 새로고침\");</script>";
      // echo "대댓글 을 위한 parent_comm_id 가 들어왔다.".$parent_comm_id;
    }
  }
//   function addCookie(id) {
//   $items = $_COOKIE('productItems'); // 이미 저장된 값을 쿠키에서 가져오기
//   // var maxItemNum = 5; // 최대 저장 가능한 아이템개수
//   // var expire = 7; // 쿠키값을 저장할 기간
//   if ($items) {
//     if (itemArray.indexOf(id) != -1) {
//       // 이미 존재하는 경우 종료
//       console.log('Already exists.');
//     }
//     else {
//       // 새로운 값 저장 및 최대 개수 유지하기
//       itemArray.unshift(id);
//       if (itemArray.length > maxItemNum ) itemArray.length = 5;
//       items = itemArray.join(',');
//       setCookie('productItems', items, expire);
//     }
//   }
//   else {
//     // 신규 id값 저장하기
//     setCookie('productItems', id, expire);
//   }
// }


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

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/"> -->

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
    <script type="text/javascript">
      // function change_button(){
      //
      //   var numb = $("#parent_comm"+).val();
      //   // var aaa = <? echo $parent_comm_numb; ?>
      //   alert('대댓글 버튼눌림'+numb);
      //   document.getElementById("change").value = '대댓글등록';
      //   document.getElementById("cocomm").value = numb;
      //
      // }
      //
      // function del_mod(numb){
      //   if (numb == 1) {
      //     alert('1번');
      //     document.choos_del_mod.action = 'post_edit.php';
      //   }
      //   if (numb == 2) {
      //     document.choos_del_mod.action = 'page2.html';
      //   }
      //   document.choos_del_mod.submit();
      // }


    </script>

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="">
        <br>
        <button class="btn btn-xs btn-primary" id="button1" onclick="go_main();">메인으로 돌아가기</button>
        <br>
        <script type="text/javascript">
        function go_main(){
          location.href='main.php';
        }
        </script>

      </div>
      <br>
      <div class="card mb-4 box-s" style="float:left; margin-right:20px">
        <img src="<?php echo $post_src; ?>" height="300" alt="dating_pic1"><br>

      </div>

      <div class="card mb-4 box-s" style="float:under; padding:10px;">
        <!-- <img src="src/img/profile.jpg" alt="프로필 이미지" height="50"> -->
      <table>
        <tr>
          <td width="600">
            <p><h5><?php echo $post_writer_mail; ?></h5></p>
          </td>
          <td>
            <form class="" name="" action="post_edit.php" method="post">
              <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
              <input type="hidden" name="post_src" value="<?php echo $post_src ?>">
              <input type="hidden" name="post_writer_mail" value="<?php echo $post_writer_mail ?>">
              <input type="hidden" name="post_caption" value="<?php echo $post_caption ?>">
              <input type="submit" class="btn btn-outline-primary" name="" value="수정">
              <!-- <input type="button" class="btn btn-outline-primary" name="" value="삭제" onClick = 'del_mod(2)'> -->
            </form>
          </td>
          <td>
            <form class="" action="post_edit.php" method="post">
              <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
              <input type="hidden" name="post_src" value="<?php echo $post_src ?>">
              <input type="hidden" name="post_writer_mail" value="<?php echo $post_writer_mail ?>">
              <input type="hidden" name="post_caption" value="<?php echo $post_caption ?>">
              <input type="hidden" name="delete_call" value=1>
              <!-- <input type="button" class="btn btn-outline-primary" name="" value="수정" onClick = 'del_mod(1)'> -->
              <input type="submit" class="btn btn-outline-primary" name="" value="삭제">
            </form>
          </td>
      </tr>
    </table>
            <!-- <form class="" action="index.html" method="post">
              <input type="submit" name="" value="test">
            </form> -->

        </div>

        <div class="">
          <p><?php echo $post_caption; ?></p>
        </div>
        <table class="table">

        <?php
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
            // echo "<script>alert(\"123132\");</script>";
            $statement = $pdo->query("select comm_id, id, mail, comment, createdate, del FROM comments where parent_post = $post_id AND parent_comm IS NULL ORDER BY comm_id");
            $parent_comm_numb = 0;
            echo count($statement->fetch(PDO::FETCH_ASSOC));
            while($record = $statement->fetch(PDO::FETCH_ASSOC)){

                $parent_comm_numb += 1;
                $comm_id = $record['comm_id'];
                $id = $record['id'];
                $mail = $record['mail'];
                $for_tag = $mail;
                $comment = $record['comment'];
                $createdate = $record['createdate'];
                $del = $record['del'];
              //  $a_comment = $mail." : ".$comment."   ".$createdate;//댓글내용
                include 'comm_box.php';

                  $statement2 = $pdo->query("select comm_id, id, mail, comment, createdate, del FROM comments where parent_post = $post_id AND parent_comm = $comm_id ORDER BY comm_id");
                  while($record = $statement2->fetch(PDO::FETCH_ASSOC)){
                    $comm_id = $record['comm_id'];
                    $id = $record['id'];
                    $mail = $record['mail'];
                    $comment = $record['comment'];
                    $createdate = $record['createdate'];
                    $parrent_tag = $for_tag;
                    $del = $record['del'];

                //    $a_comment = "   #".$for_tag." | ".$mail." : ".$comment."   ".$createdate;//댓글내용
                    include 'comm_box_cocomm.php';

                  }
                  // code...


            }
            // echo $test;
        } catch(PDOException $e){
            $result = "#ERR:" . $e->getMessage();
            echo $result;
        }
        ?>
        </table>
        <!-- 댓글 입력란 -->
          <form class="form-inline my-2 my-lg-0" action="register_comm.php" method="post">
            <input class="form-control mr-sm-2" type="text" name="comment" placeholder="댓글 입력" aria-label="Search">
            <input class="form-control mr-sm-2" type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <input class="form-control mr-sm-2" type="hidden" name="parent_comm_id" value="<?php echo $parent_comm_id; ?>">
            <!-- 이값이 대댓글을 달기위해 parent_comm_id 를 받아온 값이다. -->

            <!-- 댓글달 글의 번호 = post_id -->
            <input type="hidden" name="cocomm" id="cocomm" value="">
            <input class="btn btn-secondary my-2 my-sm-0" type="submit" id="change" name="" value="<?php echo $insert ?>">
          </form>
        </div>
      </div >

    <!-- <div class="" style="position:absolute; bottom:0px;"><center>
      <footer>
        <table border="1" align="center">
          <tr>
            <td>PapaMama 정보</td>
            <td>지원 </td>
            <td>홍보센터</td>
            <td>API</td>
            <td>채용 정보</td>
          </tr>
        </table>
      </footer>
    </div> -->



  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <!-- <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script> -->
          <!-- <script src="form-validation.js"></script></body> -->

</html>
