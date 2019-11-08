<?php
/*
친구 목록을 조회 할 수 있는 기능에 paging을 사용해 보려고 한다. 그러려면
1. 친구 목록이 저장되있는 곳이 있어야한다.
  친구목록 저장을 user_info 에 하나의 레코드에 json 같은 형태로 저장할 것인가?
    그럼 쿠키를 동시에 사용하므로 새로 고침 전까진 db의 데이터를 다시 받아와 implode해 array화 시켜도 되지 않는다면
    back엔드에서 의 연산에 덜 부하가 거리지 않을까?
      "db 값 안에 특정 문자 지우기"라고 검색해서 몇몇 글을 보니 "replace"라는 메소드를 찾았다.
        "mysql replace" 라 검색해본다.
        http://blog.freezner.com/archives/578
        이 방법에 where 를 같이쓰면 db에서 str_array를 받아와 array로 바꾸고 여기서 일치항목을 찾아 수정하고
        다시 str_array로 바꾸고 이것으 다시 저장(update)하는 일을 하지 않아도 될것이다.
          사실 str_array을 가져와서 문자열 대체 함수를 사용해, 수정된 str_array를 update하는 방법도 있을 것이다.
            결국 팔로우/언팔로우 를 눌렀을시 php로 처리하여 db에 저장할것인가? or 쿼리문으로 db가 연산하여 값을 수정하게 할 것인가인데.
              팔로우/언팔로우 를 눌렀을시 사용자에게 보여주는 데이터는 팔로우버튼의 텍스트&색 변화 뿐이다.
                그럼 클라이언트에게 표시할땐 캐쉬데이터만 변경하면서 화면진행을 유지하고
                동시에 php로 혹은 db에서 값을 수정하게 하면 (쓰레드 처럼) 비교해야하는 데이터가 많아도 클라이언트에게 서비스하는데는 버벅임이 없지 안을까?
                  하지만 결론적으로 php는 동기식이고 팔로우 버튼을누르면 submit하게 된다. 그렇다면 결론적으로 서버에 서버에 요청하게 되고 그 작업이 끝나야만
                  다음 코드가 진행되는것이 아닌가?
  새로운 db를 만들어서 거기에 친구목륵을 만들것인가...
    이렇게 하면 각 유저마다 테이블을 가지고 있어야하니 관리 측면에서 안좋을 가능성이 높다.

      =>일단은 하나의 항목에 implode로 str화 해서 저장하는 것으로 하기로 하자, 데이터 변경은 mysql에서 replace 시키는것을 상용해보자

2. 그곳에서 select 를 해와야한다.

@@@ 느낌을 이해해야한다. 코드를 한글로 옮기는건 멍청한 것이다.
@@@ 칼을 가져왔다. 칼을 사용했다. 칼을 X -> 수박을 먹고 싶다. 수박은 있는데 잘라야한다. 칼이 필요하다. 칼을 가져오자.
@@@ 이 코드를 만든이유를생각해 내야한다//ㅁㄴ
*/
  session_start();
  error_reporting(0);
  $id = $_SESSION['id'];
  // 현제 로그인 한 사용자의 세션 아이디값을 $id에 넣는다

  $connect = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");//연결자(pdo) 생성
  //@@ pdo를 왜써야하는지도 , 사용법~
  // 현업에서 대부분 mysql이나 mariaDB를 사용하기 때문에 mysqli를 사용해도 상관이 없다.
  // mysqli 와 pdo에서는 prepare statement를 사용할 수 있어 statement를 여러번 실행하거나, 인젝션 공격을 막는데 효과적이다.
  // pdo가 확장성이 좋다고들 하니까 pdo를 쓴다는것 외골수 적인 행동인 것이다.
    //pdo 사용법
    // new PDO("데이터베이스종류:host=서버이름;dbname=데이터베이스이름;charset=문자인코딩 방식","아이디","비밀번호")
    // 쿼리문을 prepare 시키고, excute시키면 된다. DB에 쿼리가 적용되어 statement->fetch를 통해 값을 받아올 수 있다.
    // fetch에는 어러가지 메소드가 있으나 여기선 하나의 값만 찾아서 가져올 것이기에 반복하지 않고
    // 결과값에서 key값이 "friends_list"인 값을 가져온다.
      //while($result = $statement->fetch()){} 이렇게도 쓸 수 있는데 그 이유는 fetch라는 메소드가
      //select 쿼리의 결과를 순서대로 한개씩 가져오고 더이상 가져올 값이 없을때 false를 반환하기 때문이다.
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//연결자에 오류메시지 표시모드를 설정
  $statement = $connect->prepare("SELECT friends_list FROM user_info where id=?");
  $statement->execute($id);
    //DB에서 현제 로그인한 사용자의 친구목록 컬럼의 값을 가져와 statement에 담는다.
    //




  $result = $statement->fetch();//statement에서 값을 1개만 가져와 str_array에 담는다.
  $str_array = $result['friends_list'];//result에 '컬럼'이 키값인 값을 가져와 str_array에 담는다.
    //사용자의 친구목록 레코드에 있는 문자열로 변환된 배열을 가져온다.

  $array = explode('/',$str_array);
    //친구목록 문자열을 배열로 바꾼다.

  $array_length = count($array);//dlzhemfmf qhseskaus xhltkgofk
    //배열 친구목록의 길이를 구한다.


    //회원정보 테이블에서 친구목록 배열에 있는 id만 불러오기 위한 쿼리문 작성과정
  $where_condition = 'id='.$array[1]; //array[0]이 0이라 1부터 시작해야한다.
    //where_condition을 쿼리문의 where절 뒤에 넣을 때 처음엔 or 이 들어가지 않기에
    //'id='.$array[1]를 먼저 하나 넣는다.

  // array길이만큼 반복하게 한다. 무엇을 = $where_condition .= ' OR id=+array[2]' 를
  for ($i=2; $i < ($array_length); $i++) {
    $where_condition .= ' OR id='.$array[$i];
  } //where_condition에 친구목록 배열에 있는 값을 다 넣는다.

  $query = 'SELECT mail,name FROM user_info WHERE '.$where_condition;
    //회원정보에서 table 에서 친구목록배열에 있는 id의 정보만 가져오기 위한 쿼리

    //페이징을 하기위한 코드
  $num = $array_length;
  //numb 는 총 데이터의 개수 = 총 친구의 명수
  $page = ($_GET['page'])?$_GET['page']:1;
  // get으로 넘어온 값(페이지 넘버)이 있으면 그 값을 적용하고, 없으면 1을 적용해라
  $list = 5; //한 페이지에 보여줄 친구 수
  $block = 4; // 한 블록에 몇개의 페이지를 보여줄지

  //ceil 은 올림을 해주는 함수
  $pageNum = ceil($num/$list);// 총 페이지 수
  $blockNum = ceil($pageNum/$block); // 총 블록개수(페이지묶음)
  $nowBlock = ceil($page/$block); // 현제 블록

  //블록 블록안에서
  $s_page = ($nowBlock * $block) -($block-1);//시작페이지 구하기 위한 공식이다.
    // @@ 시작페이지는 "현제 블록* 블록"으로 값으로 현재 블록의 끝페에지 값을 구하고,
    // 거기에 블록-1한 값을 빼면 시작페이지가 나온다.
    // 시작페이지를 사용해서 변경된 페이지 값이 get으로 들어왔을때 현제 블럭의 값을 구할 수 있고,
    // 그 블록값을 통해 현재 블록의 영역을 표시해줄 수 있다.
  if ($s_page <=1) {
    $s_page = 1;
    // get으로 넘어온 페이지 값이 0보다 같거나 작을 시 s_page 값은 음수가 됨으로 조건문으로
    // s_page를 1보다 작지 않게 한다.

  }
  $e_page = $nowBlock*$block;
  if ($pageNum <= $e_page) {
    $e_page = $pageNum;
    //get으로 넘어온 페이지 값이 마지막 페이지보다 클 경우 총 페이지수 보다 e_page가 커지기 때문에
    // 조건문으로 e_page를 마지막 페이지를 넣지 못하게한다.

  }
  echo "<br> 총 게시물".$num;
  echo "<br> 시작 페이지".$s_page;
  echo "<br> 끝 페이지".$e_page;
  echo "현재 페이지는".$page."<br/>";
  echo "현재 블록은".$nowBlock."<br/>";

  echo "현재 블록의 시작 페이지는".$s_page."<br/>";
  echo "현재 블록의 끝 페이지는".$e_page."<br/>";

  echo "총 페이지는".$pageNum."<br/>";
  echo "총 블록은".$blockNum."<br/>";

  $addr = 'myfriends.php';

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
    <div class="container">


    <!-- <p>ID: <?php echo $_GET["일촌"]; ?></p> -->
    <!-- 데이터 베이스에서 가져온 일촌목록들 -->
    <?php
    for ($p=$s_page; $p<=$e_page; $p++) {
      //p는 블록의 시작페이지고, p는 블록의 끝페이지보다 작거나 같을때, p는 1씩 증가한다.
      //블록의 시작 페이지 부터 끝 페이지까지 해당페이지 숫자로 링크를 걸어 이동할 수 있게한다.
    ?>

        <a href="<?=$addr?>?page=<?=$p?>"><?=$p?></a>
        <!-- a 테그로 하이버링크를 만들고 하이퍼 링크를 누를시 해당 페이지로 get 방식으로 넘어가게 된다. -->

    <?php
    }
    ?>
    <div>
        <a href="<?=$addr?>?page=<?=$s_page-1?>">이전</a>
        <!-- 이전을 누를시 현제 블록 1칸 뒤의 마지막 페이지로 간다. -->
        <?php
          if ($e_page >= $pageNum) {//블록의 마지막페이지의 값이 총 페이지 개수값과 같거나 크면 '다음' 대신 '끝'이라고 표시하여준다.
            $next = '끝';
            $last_page = $pageNum;
          }else {
            $next = "다음";
            $last_page = $e_page+1;
          } ?>
        <a href="<?=$addr?>?page=<?=$last_page?>"><?=$next ?></a>
        <!-- 다음을 누를시 현제 블록 1칸 앞의 첫번째 블록으로 간다.  -->
    </div>
    <table>


    <?php
      $s_point = ($page-1)*$list;//DB에서 값을 가져오기를 시작하는 지점을 정하는 코드다.
      //page값을 이용하여 시작지점을 구해야 그로부터 list개의 데이터를 불러와 화면에 표시할 수 있다.
      $query = 'SELECT mail,name FROM user_info WHERE '.$where_condition." LIMIT $s_point,$list";

      $statement = $connect->query($query);
      while ($row = $statement->fetch()) {
        ?><tr>
            <td><?=$row['mail'] ?></td>
            <td><?=$row['name'] ?></td>
          </tr>
        <?php

      }
     ?>

      </table>

     </div>
  </body>
</html>
