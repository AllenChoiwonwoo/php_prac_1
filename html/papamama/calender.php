<?php
ini_set('display_errors', '0');
session_start();
$id = $_SESSION['id']; //numb

  if ($_GET['select_date']) {// get으로 받은 날짜가 있다면
    $select_date = $_GET['select_date'];
    $edited_date = substr($select_date, 0, 10);
    // echo $edited_date."<br>";
    $aaa = $edited_date.'%';
    // echo $aaa."<br>";
    // $just_me = $_GET['just_me'];
    // $all = $_GET['all'];

    // if ($just_me) {// just_me만 선택한다면
    //   // code...
    //   $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    //   // echo "<script>alert(\"123132\");</script>";
    //   $statement = $pdo->query("select writer, writer_mail, image_src, caption, createdate FROM posts WHERE writer = $id AND parent_comm IS NULL ORDER BY comm_id DESC");
    //   // SELECT * FROM faqContent where title LIKE '%$search_word%'
    //   $record = $statement->fetch(PDO::FETCH_ASSOC);
    // }else if ($all) {
    //   // code...
    //   $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    //   // echo "<script>alert(\"123132\");</script>";
    //   $statement = $pdo->query("select writer, writer_mail, image_src, caption, createdate FROM posts ORDER BY comm_id DESC");
    //   $record = $statement->fetch(PDO::FETCH_ASSOC);
    // }else {// 날짜만 선택했을때
    //   // code...
    // }


    // try {
    //   $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    //   // echo "<script>alert(\"123132\");</script>";
    //   $statement = $pdo->query("select * FROM posts WHERE createdate Like '$aaa'");
    //   // SELECT * FROM faqContent where title LIKE '%$search_word%'s
    //   while ($record = $statement->fetch(PDO::FETCH_ASSOC)){
    //     echo "aaaaaaa<br>";
    //   }
    //
    // } catch(PDOException $e){
    //     $result = "#ERR:" . $e->getMessage();
    //     echo $result;
    // }



  }else {
    // code...
  }





?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
      <link href="4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <?php include 'manubar.php'; ?>

<!--  여기까지 네비게이션 바-->
    <div class="container" align="center">



      <div>
        <!-- <button class="btn btn-xs btn-primary" id="button1" onclick="go_main();">메인으로 돌아가기</button>
        <script type="text/javascript">
        function go_main(){
          location.href='main.php';
        }
        </script> -->

        <!-- <div class="">
          <h3>다가 올 이밴트</h3>
            <ul>
              <li>우리 어머니 생신</li>
              <li>병찬이 어머니 생신</li>
              <li>발렌타인데이</li>
              <li>고조할아버지 제사</li>
            </ul>
        </div> -->
      </div>

      <div class="">
        <!-- <form class="" action="index.html" method="post">
          <input type="submit" name="submit_1" value="작년의 오늘 사진보기">
        </form>
        <form class="" action="index.html" method="post">
          <button type="submit" name="submit_2 " >과거의 오늘 사진보기</button>
        </form> -->
      </div>
      <br>
      <div class=""><br><br><br>
        <h1>추억을 찾아보세요</h1>

      <form id="frm" action="" method="get">

          <div>날짜 입력: <input class="col-sm-2 col-form-label" type="date" id="userdate" name="select_date" value="2019-02-28"></div>
          <br>
          <!-- <input type="radio" name="just_me" value="me">내사진
          <input type="radio" name="all" value="all">모두 -->
          <br>
          <input type="submit" class="btn btn-primary" value="찾기">
      </form>
      <div class="">
        <?php
        try {
          $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
          // echo "<script>alert(\"123132\");</script>";
          $statement = $pdo->query("select image_src FROM posts WHERE createdate Like '$aaa'");
          // SELECT * FROM faqContent where title LIKE '%$search_word%'s
          while ($record = $statement->fetch(PDO::FETCH_ASSOC)){
            $img_src = $record['image_src'];
            // echo $img_src."<br>";
            echo "<br><hr>";
            // echo "<img src=\"".$img_src."\" alt=\"\" width=\"500px\">";
            ?>
            <img src="<?=$img_src ?>" alt="" width="500px" height="500px" style="background-color:black; width=100%;height=100%;object-fit:contain;">
            <!-- width와 height 에 안에서 비율에 맞게 이미지를 줄여서 보여주고 여백이 생기면 배경색이 보여진다. -->
            <!-- <img src="<?php $img_src; ?>" alt=""> -->

        <?php  }

        } catch(PDOException $e){
            $result = "#ERR:" . $e->getMessage();
            echo $result;
        }

         ?>
      </div>



      </div>

    </div>

  </body>
</html>
