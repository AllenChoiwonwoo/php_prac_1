<!--
  저번주 피드백
@@@ 느낌을 이해해야한다. 코드를 한글로 옮기는건 멍청한 것이다.
@@@ 칼을 가져왔다. 칼을 사용했다. 칼을 X -> 수박을 먹고 싶다. 수박은 있는데 잘라야한다. 칼이 필요하다. 칼을 가져오자.
@@@ 이 코드를 만든이유를생각해 내야한다/
@@@ 자기가 쓴 코드에 주석(이변수가 무슨 값을 담기 위해 필요하고 뭘하기위한 값인지)을 제대로 달 수 있어야하고
@@@ 그다음 주석부터 다쓰고 코드를 짤 수 있다 그러면 더 빠르고 잘 짤 수 있다. -->



<?php
error_reporting(0);
  session_start();##좋아요 버튼 눌렀을때 이밴트 처리 ##########################################################
  ///
  ##좋아요 버튼 눌렀을때 이밴트 처리 ##########################################################
  ///
  //꼭 봐줬으면 하는 부분은 표시해서 가져오자
  //변수명은 연관이 있게 작성
  //(쿼리)join을 쓰면 select를 두번쓰지 않아도 된다.
  // 동시에 여러 ㅋ컴퓨터에서 접속하면 세션이 엉킨다
  //세션에 넣을필요도 없었다.

  //기술을 선택하는 기준과 이유ᄙᅳᆯ 생각하기

  $post_id = $_POST['like'];# '좋아요'를 누른 글번호
  $yn = $_POST['yn']; # '좋아요'누른적 있는지 구분해주는 구분자 ( y or n)
  $id = $_SESSION['id']; # 현재 로그인한 아이디 ex 38
  $likelist = $_SESSION['likelist']; # 로그인한 사용자가 좋아요 누른 목록

  # 문자열인 좋아요 리스트를 배열로 바꾼다.
  $array = explode('/',$likelist);// explode(' ', $문자열로된 좋아요리스트) : 분할하여 배열로 만들어준다.
  if ($yn =='n') {// 어레이에 값이 없으면 (좋아요 누른적 없으면)
    #좋아요를 누른적이 없다면(n) 좋아요 리스트에 '좋아요'누른 글을 추가한다.

    array_unshift($array, $post_id);//배열의 맨앞에 값 추가
    $str_array = implode('/',$array);// 문자열로 변환

    try {

      $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
      $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      #현재 포스트의 '좋아요'카운트를 하나 올린다.
      $query = "UPDATE posts SET likecount=likecount+1 WHERE post_id='$post_id'";
       print "<bt> </br>".$query;
      $pdo->exec($query);

      $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      #수정된 '좋아요'리스트 배열을 db에 저장한다.
      $query = "UPDATE user_info SET likelist='$str_array' WHERE id='$id'";
       print "<bt> </br>".$query;
      $pdo->exec($query);

      // 세션에 값을 바뀐 likelist 값을 넣어준다.
      $_SESSION['likelist'] = $str_array;
      echo "<script>alert(\"지금.$str_array\");</script>";

    } catch(PDOException $e){
        echo "<br>ERR:" . $e->getMessage() + "<br>";

    }


  }else {// 좋아요를 누른적이 있으면
    #'좋아요' 누른적이 있다면 좋아요리스트에서 현재글번호를 지운다.
    try {

    $key = array_search($post_id, $array); // '좋아요'리스트에서 현재글번호의 키(index)값을 찾아낸다.
    array_splice($array, $key, 1); // '좋아요'리스트에서 키(index) 값을 지운다.
    $str_array = implode('/',$array); //수정된 '좋아요'리스트 배열을 문자열로 바꾼다.

    $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    # 현재 포스트의 '좋아요'카운트를 하나 내린다.
    $query = "UPDATE posts SET likecount=likecount-1 WHERE post_id='$post_id'";
    $pdo->exec($query);

    #수정된 '좋아요'리스트 배열을 db에 넣는다.
    $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "UPDATE user_info SET likelist='$str_array' WHERE id='$id'";
    $pdo->exec($query);

    $_SESSION['likelist'] = $str_array;
    echo "<script>alert(\"지금은.$str_array\");</script>";

    } catch(PDOException $e){
        echo "<br>ERR:" . $e->getMessage() + "<br>";
    }

  }
   header('Location: ./main.php');

 ?>
