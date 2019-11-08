
<?php
$PHP_SELP = "paging_ex1.php";

try {
  // $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
  $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
  // $data = mysql_query("SELECT no FROM list ORDER BY no DESC");
  $statement = $pdo->query("SELECT id, name FROM test1"); //select문을 작성
  $num = count($statement->fetchAll()); //총개수를 구하기 위한 코드
} catch(PDOException $e){
    $result = "#ERR:" . $e->getMessage();
}


$page = ($_GET['page'])?$_GET['page']:1;// 아마 get 으로 넘어온 값이 없으면 get[page]=1이라는 갓 같다.
$list = 10;// 한 페이지에 보여줄 레코드 개수
$block = 3;// 페이지 묵음 개수
//ceil 은 올림을 해주는 함수
$pageNum = ceil($num/$list); // 총 레코드 개수에서 나누기 10 하고 나머지가 있으면 올림 = 총 페이지 수
$blockNum = ceil($pageNum/$block); // 총 페이지수 나누기 3 하고 나머지는 올림 = 총 블록 개수
$nowBlock = ceil($page/$block); // 나누어서 떨어지지 않으면 무조건 올림이 되기 때문에  결과값은 현재 블록을 나타낸다.

//블록안에서
$s_page = ($nowBlock * $block) - 2; // 블럭의 시작페이지 = 현제 페이지 * 블럭(3) -2 (3개가 한블럭이기 때문에)
// -2 시작페이지, -1 두번째 페이지 , 0 마지막 페이지
if ($s_page <= 1) { // 시작하는 페이지가 1과 같거나 작다면
    $s_page = 1; //  시작페이지는 1이다.
}
$e_page = $nowBlock*$block; //마지막 페이지는 현제 블락 * 블락(3)이다.
if ($pageNum <= $e_page) { // 마지막 페이지가 총페이지 보다 크거나 같다면
    $e_page = $pageNum; // 총페이지가 마지막 페이지 이다.
}


echo "현재 페이지는".$page."<br/>";//
echo "현재 블록은".$nowBlock."<br/>";

echo "현재 블록의 시작 페이지는".$s_page."<br/>";
echo "현재 블록의 끝 페이지는".$e_page."<br/>";

echo "총 페이지는".$pageNum."<br/>";
echo "총 블록은".$blockNum."<br/>";

for ($p=$s_page; $p<=$e_page; $p++) { //p는 블록의 시작페이지고, p는 블록의 끝페이지보다 작거나 같을때, p는 1씩 증가한다.
?>

    <a href="<?=$PHP_SELP?>?page=<?=$p?>"><?=$p?></a>
    <!-- a 테그로 하이버링크를 만들고 하이퍼 링크를 누를시 해당 페이지로 get 방식으로 넘어가게 된다. -->

<?php
}
?>
<div>
    <a href="<?=$PHP_SELP?>?page=<?=$s_page-1?>">이전</a>
    <!-- 이전을 누를시 현제 블록 1칸 뒤의 마지막 페이지로 간다. -->
    <a href="<?=$PHP_SELP?>?page=<?=$e_page+1?>">다음</a>
    <!-- 다음을 누를시 현제 블록 1칸 앞의 첫번째 블록으로 간다.  -->
</div>


<?php
$s_point = ($page-1) * $list;// spoint는  db에서 불러오기 시작할 지점이다.
// 여기서는 현제 페이지 -1 한 값에 list(10)을 더한 수 이다.

// $real_data =("SELECT * FROM test1 LIMIT $s_point,$list");
//spoint 부터 list(10)개의 데이터를 불러와서
$fetch = $pdo->query("SELECT * FROM test1 LIMIT $s_point,$list");
while ($row = $fetch->fetch()) {
  print_r($row);
  echo "<br>";
  // code...
}
?>
