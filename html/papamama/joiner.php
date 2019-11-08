<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');


  $name=$_POST['name'];
  $mail=$_POST['mail'];
  $phone1=$_POST['phone1'];
  $phone2=$_POST['phone2'];
  $phone=$_POST['phone1'].$_POST['phone2'];
  $password=$_POST["password"];
  $pw_conferm=$_POST["pw_conferm"];
  // echo "뭐지이거?";
  echo $name;
  echo $mail;
  echo $phone;
  echo $password;
  echo $pw_conferm;

//아이디 중복검사
  $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
  $statement = $pdo->prepare("select mail from user_info where mail='$mail'");
  $statement->execute();
  $result = $statement->fetch();
  // print_r($result);
  $val = $result['mail'];
  if (!empty($val)) {
    echo "<script>alert(\"이미 사용중인 아이디입니다. 다시 입력하세요\");</script>";
    echo "<script>history.back();</script>";
    // code...
  }

  // echo "<script>alert(\"$val\");</script>";

//비밀번호 일치 검사
  if ($password != $pw_conferm) {//false
    echo "<script>alert(\"패스워드가 일치하지 않습니다.\");</script>";
    echo "<script>history.back();</script>";
    exit();
  }else{

  }

  // 아이디 중복검사 만들기
  /*
  join 페이지에서 사용자가 입력한 아이디를 넘겨받는다.
  db에서 id항목에 있는 데이터를 모두 가져온다.
  id 항목의 데이터와 사용자 입력 아이디가 일치하는지 비교하고
  일치하는 아이디가 있다면 alert로 " 중복되는 id가 존제한다고 알려주고 다시 회원가입 페이지로 돌려보낸다."
  joiner.php는 exit(); 시킨다.
  */

  $result = "";
  // $test1 = "";
  // $nub = 0;
  // try {
  //     $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
  //     $statement = $pdo->query("select * from user_info");
  //     while($record = $statement->fetch(PDO::FETCH_ASSOC)){
  //       //record 는 한 행(row)의 값을 가지고 있는 배열 이다. 각 col의 이름이 키 값이다.(name, mail, phone, password, createdate)
  //       $test1 .= $record["mail"].$record["name"];
  //       //while문은 row 개수만큼 반복된다.
  //
  //         $result .= "<tr>";
  //         foreach($record as $column){
  //             $result .= "<td>" . $column . "</td>";
  //             // foreach 로 record배열에 담겨있는 값을 개수만큼 반복한다.
  //             // 박복하며 <td> 값 </td> 가 result 에 쌓인다.
  //         }
  //         $result .= "</tr>";
  //     }
  // } catch(PDOException $e){
  //     $result = "#ERR:" . $e->getMessage();
  // }
  // // $pdo = null;
  //


 // // db에 회원정보 저장하기
  $result2='';
  try {
      $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
      $query = "insert into user_info (name, mail, phone, password) values ('$name', '$mail', '$phone', '$password')";
      $pdo->exec($query);
      echo"<script>alert(\"회원가입 되었습니다\");</script>";
      echo"<script>location.href='login.php';</script>";
  } catch(PDOException $e){
      echo "<br><html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";
       // $result = "#ERR:" . $e->getMessage();
  }


  // //새로운 회원의 테이블 생성
  // $result3='';
  // try {
  //     $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
  //     $query = "CREATE TABLE papamamaDB (
  //       post_id int(11) NOT NULL AUTO_INCREMENT,
  //       )";
  //     $pdo->exec($query);
  // } catch(PDOException $e){
  //     echo "<br><html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";
  //      // $result = "#ERR:" . $e->getMessage();
  // }


  ?>

  <!DOCTYPE html>
  <html lang="ko">
      <head>
          <meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" />
          <title>sample page</title>
          <style>
          h1 { font-size:14pt;
              padding:5px;
              background-color:#AAFFFF; }
          table tr td {
              padding:5px;
              background-color:#DDFFCC; }
          </style>
      </head>
      <body>
          <h1>Hello PHP!</h1>
          <table>
          <?php
          // echo $result2;
          // echo $test1;
          // echo $result3;
           ?>
          </table>
      </body>
  </html>
