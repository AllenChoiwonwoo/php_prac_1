<?php
    $servername = "localhost";
    $dbname = "papamamaDB";
    $user = "root";
    $password = "sql";

    try{
        $connect = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", "$user","$password");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $connect->beginTransaction(); // 새로운 트랜젝션을 시작함.
    for ($i=350; $i < 500; $i++) {
        // $name='더미미AAx'+$i;
        // echo $name."<br>";
        // $mail='dumiiiAAx@naver.com'+$i;
        // echo $mail."<br>";

      // id 58-64 bts
      // $connect->exec("UPDATE user_info SET friends_list='내가 정한 방식의 문자열' WHERE id=38");
      $connect->exec("UPDATE user_info SET friends_list=CONCAT(friends_list,'/$i') WHERE id=38");
        // $connect->exec("INSERT INTO user_info(name, mail, phone, password, createdate) VALUES('$name', '$mail', '01057891245','cww1003',now())");
      //38은 추가할 회원 id, 59는 팔로우를 누를 id다
    }

    // $connect->exec("INSERT INTO test1 (id, name) VALUES(6, 106)");
    // $connect->exec("INSERT INTO test1 (id, name) VALUES(7, 107)");
   $connect->commit(); // 해당 트랜젝션을 커밋(commit)함.

        echo "반복으로 dumi 레코드 추가 성공!";
    }
    catch(PDOException $ex){
        echo "레코드 추가 실패! : ".$ex->getMessage()."<br>";
    }
    $connect = null;
//
// ALTER TABLE BOARD ADD SECURITY CHAR(1) NULL;
// UPDATE table
// SET column_1 = value_1,
//     ...
// WHERE condition



    // $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    // $query = "insert into posts
    // (writer, writer_mail, image_src, caption, createdate, tag)
    //  values ($id, '$mail', '$edited_img_src', '$caption', now(), '$tag' )";
    //  print "<bt> </br>".$query;
    // $pdo->exec($query);

?>
