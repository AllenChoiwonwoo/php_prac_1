<script type="text/javascript">
  var cook = getCookie('img_src');
  alert(cook);
</script>

<?
/*
게시판 종류는 순서별로 정의 해줍니다
0 = 자유게시판
1 = 스크린샷
2 = 질문게시판 등....
게시판 순서에 맞게 뷰인덱스 번호를 쿠키에 추가
*/

//게시판 종류 분류 배열 (게시판 분류만큼 설정)
$boardType = array("free","screen","qna","other");

// 아래 게시판 이름과 페이지 인덱스는 테스트를 위해 임의로 넣은값
$boardName = 'free'; //현재 게시판 이름
$view_index = 3;    //페이지 읽을 인덱스

/* 현재 게시판의 index 값 */
$boardIndex = array_Index($boardType,$boardName);
if(!$boardIndex) $boardIndex = 0;

// 쿠키값 (실제 기존에 저장되어있던 쿠키를 가져온다 처음에는 없겠지만)
$boardCookie = unserialize(stripslashes($_COOKIE['boardCookie']));

$board_arr    = explode(',',$boardCookie[$boardIndex]);

//현재 읽으려는 view 인덱스 값이 해당 게시판 배열에 있는지 검사
if(!in_array($view_index, $board_arr)){
    //조회수 올리고 쿠키에 해당 index번호 추가
    echo '<br>조회수up<br>';
    setBoardCookie();
}else{
    echo '<br>그냥 출력';
} 

/* 쿠키 셋 */
function setBoardCookie(){
    GLOBAL $boardCookie;
    GLOBAL $view_index;
    GLOBAL $boardIndex;

    if($boardCookie[$boardIndex]){
        $value = $boardCookie[$boardIndex].','.$view_index;
    }else{
        $value = $view_index;
    }
    $boardCookie[$boardIndex] = $value;

    $cookieSet = serialize($boardCookie);
    setcookie("boardCookie", get_magic_quotes_gpc() ? $cookieSet : addslashes($cookieSet) ,mktime(00,00,0,12,30,2030));
}
/* 배열 인덱스 번호 */
function array_Index($array,$search){
    for($i=0; $i<count($array); $i++){
        if($array[$i]==$search)    return $i;
    }
}
