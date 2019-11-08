<?php
  ini_set('display_errors', '0');
  $search_word = $_GET['search'];
  session_start();
  $user_id = $_SESSION['id'];


  // while($result = $stmt->fetch()){
  //   $mail = $result['mail'];
  //
  // }
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
    <title></title>
  </head>
  <body>
    <?php include 'manubar.php'; ?>
<br><br><br><br>

    <div class="container">



    <h2>친구찾기 결과</h2>
    <br>
    <p>검색어 : <?php echo $_GET["search"]; ?></p>
      <div class="table-responsive">
        <table class="table table-striped table-sm" align="center">
          <thead>
            <tr>
              <th>#</th>
              <th>메일</th>
              <th>이름</th>
              <th>친구여부</th>
              <!-- <th>Header</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
              $search_word = $_GET['search'];
              //mail을 검색한 값이 $search_word 가 들어있는 user_info 에서 mail을 찾아 mail, id를 찾는다.
              $query = "SELECT mail,id,name FROM user_info WHERE mail LIKE '%$search_word%'";
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
              } catch (PDOException $e) {
                echo "<br><html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";

              }
              $numbering = 1;
              while($result = $stmt->fetch()){
                $mail = $result['mail'];
                $id = $result['id'];// 검색어와 일치하는 유저의 아이디
                $name = $result['name'];
                // 찾은 id를 로그인한 유저의 친구목록과 대조하여 이미 있다면 "팔로우 끊기 버튼"을 보여준다.
                // echo "<script>alert(\"$id\");</script>";
                $query2 = "SELECT id FROM user_info WHERE id=$user_id AND friends_list LIKE '%/$id%'";
                // "SELECT friends_list FROM user_info WHERE "
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute();
                $result2 = $stmt2->fetch();
                $check_fallow = $result2['id'];

                if (empty($check_fallow)) {
                  // code...
                  // echo "<script>alert(\"비어있음.$check_fallow\");</script>";
                  $btn_text = '친구신청';
                  $val = '1';
                  $check_fallow = $id;// 기존의 값이 없음으로 팔로우 하기위한 id를 넣어준다.
                }else {
                  // code...
                  // echo "<script>alert(\"안빔.$check_fallow\");</script>";
                  $btn_text = '친구삭제';
                  $val = '0';
                  $check_fallow = $id;// 기존의 값이 있음으로 언팔로우 하기위한 id를 넣어준다.
                  $numbering++;
                }
                ?>
                <tr>
                  <td><?php echo $numbering; ?><br></td>
                  <td><?php echo $mail; ?><br></td>
                  <td><?php echo $name; ?><br></td>
                  <td>
                    <form class="" action="add_friend.php" method="post">
                      <input type="hidden" name="fallow_id" value="<?php echo $check_fallow; ?>">
                      <input type="hidden" name="val" value="<?php echo $val; ?>">
                      <button class="btn btn-xs btn-primary" type="submit" name="button"><?php echo $btn_text; ?></button>
                    </form>

                  </td>
                </tr>

                <?php
              }
             ?>

          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
