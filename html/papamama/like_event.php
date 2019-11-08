<?php
  session_start();
  error_reporting(0);
// $_SESSION['id']=$id;
  $post_id = $_POST['like'];# '좋아요'를 누른 글번호
  // echo $post_id."<br>";
  $yn = $_POST['yn']; # '좋아요'누른적 있는지 구분해주는 구분자 ( y or n)
  // echo $yn."<br>";
  $id = $_SESSION['id']; # 현재 로그인한 아이디 ex 38
  // echo "session id 는 ".$id."<br>";
  $likelist = $_SESSION['likelist']; # 로그인한 사용자가 좋아요 누른 목록
  // echo "session likelist 는 ".$likelist."<br>";
  // print_r($likelist);
  // echo "위가 likelist pr한거 <br>";

  # 문자열인 좋아요 리스트를 배열로 바꾼다.
  $array = explode('/',$likelist);// explode(' ', $문자열로된 좋아요리스트) : 분할하여 배열로 만들어준다.
  if ($yn =='n') {// 어레이에 값이 없으면 (좋아요 누른적 없으면)
    #좋아요를 누른적이 없다면(n) 좋아요 리스트에 '좋아요'누른 글을 추가한다.
    // code...
  // print_r($array);

    array_unshift($array, $post_id);//배열의 맨앞에 값 추가
    // $array[] = $post_id;
  print_r($array);
    $str_array = implode('/',$array);// 문자열로 변환

    try {

      $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
      $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      #현재 포스트의 '좋아요'카운트를 하나 올린다.
      $query = "UPDATE posts SET likecount=likecount+1 WHERE post_id='$post_id'";
       print "<bt> </br>".$query;
      $pdo->exec($query);


      $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
      $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      #수정된 '좋아요'리스트 배열을 db에 저장한다.
      $query = "UPDATE user_info SET likelist='$str_array' WHERE id='$id'";
       print "<bt> </br>".$query;
      $pdo->exec($query);

      // $_COOKIE['likelist'] = $str_array;
      // setCookie('likelist', $str_array, time()+1440,'/');
      // $likelist_test=$_COOKIE['likelist'];
      // 세션에 값을 바뀐 likelist 값을 넣어준다.
      $_SESSION['likelist'] = $str_array;
      echo "<script>alert(\"지금.$str_array\");</script>";


    } catch(PDOException $e){
        echo "<br>ERR:" . $e->getMessage() + "<br>";
         // $result = "#ERR:" . $e->getMessage();
    }


  }else {// 좋아요를 누른적이 있으면
    #'좋아요' 누른적이 있다면 좋아요리스트에서 현재글번호를 지운다.
    try {

    $key = array_search($post_id, $array); // '좋아요'리스트에서 현재글번호의 키(index)값을 찾아낸다.
    array_splice($array, $key, 1); // '좋아요'리스트에서 키(index) 값을 지운다.
    print_r($array);
    $str_array = implode('/',$array); //수정된 '좋아요'리스트 배열을 문자열로 바꾼다.

    $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    # 현재 포스트의 '좋아요'카운트를 하나 내린다.
    $query = "UPDATE posts SET likecount=likecount-1 WHERE post_id='$post_id'";
     print "<bt> </br>".$query;
    $pdo->exec($query);

    #수정된 '좋아요'리스트 배열을 db에 넣는다.
    $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "UPDATE user_info SET likelist='$str_array' WHERE id='$id'";
     print "<bt> </br>".$query;
    $pdo->exec($query);

    // setCookie('likelist', $str_array, time()+1440,'/');
    $_SESSION['likelist'] = $str_array;
    echo "<script>alert(\"지금은.$str_array\");</script>";

    } catch(PDOException $e){
        echo "<br>ERR:" . $e->getMessage() + "<br>";
       // $result = "#ERR:" . $e->getMessage();
    }

  }
   header('Location: ./main.php');

 ?>
