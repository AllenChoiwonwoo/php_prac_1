<?php
$result = "";
$query = "select * from sampletable";
if (isset($_POST['name'])){
    $fstr = $_POST['name'];
    // echo $_POST['name'];
    if ($fstr != ''){
        $query .= " where name = '$fstr'";
    }// post로 넘겨밭은 값을　name에　$fstr　에　그안에　값이　있다면　쿼리문에　추가한다．
}
try {
    $pdo = new PDO("mysql:host=localhost;dbname=mysampledata;charset=utf8", "root","sql");
    $statement = $pdo->query($query);
    while($record = $statement->fetch(PDO::FETCH_ASSOC)){//fatch 를　통해서　stmt에서　가저온　레코드를　차례도　꺼낼　수　있다．
        $result .= "<tr>";
        foreach($record as $column){
            $result .= "<td>" . $column . "</td>";
        }
        $result .= "</tr>";
    }
} catch(PDOException $e){
    $result = "#ERR:" . $e->getMessage();
}
$pdo = null;
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
        <form method="post" action="./pdo_index_3.php">
            <tr><td>검색 문장:</td><td><input type="text" name="name"></td></tr>
            <tr><td></td><td><input type="submit" value="송신"></td></tr>
        </form>
      </table>
        <hr>
        <table>
        <?php echo $result; ?>
        </table>
        <hr>
        <table>
          <form method="post" action="./remove.php">
            <tr><td>검색 단어:</td><td><input type="text" name="name"></td></tr>
            <tr><td></td><td><input type="submit" value="송신"></td></tr>
          </form>
        </table>
        <table>
          <!-- 누구의　어떤　값을　삭제하게　할것인가　처럼　입력을　２개　받아야한다． -->
          <form method="post" action="./edit.php">
            <tr><td>바꿀내용:</td><td><input type="text" name="text"></td></tr>
            <tr><td>바꿀항목:</td><td><input type="text" name="col"></td></tr>
            <tr><td>바꿀사람:</td><td><input type="text" name="row"></td></tr>

            <!-- <tr><td>수정할　내용:</td><td><input type="text" name="edit"></td></tr> -->
            <tr><td></td><td><input type="submit" value="송신"></td></tr>
          </form>
        </table>
    </body>
</html>
