<?php
<?php
$result = "";
try {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=mysampledata;charset=utf8", "root","1234");
    $statement = $pdo->query("select * from sampletable");
    while($record = $statement->fetch(PDO::FETCH_ASSOC)){
        $result .= "<tr>";
        foreach($record as $column){
            $result .= "<td>" . htmlspecialchars($column) . "</td>";
        }
        $result .= "</tr>";
    }
} catch(PDOException $e){
    $result = "#ERR:" . $e->getMessage();
    echo $result;
}
$pdo = null;
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>sample page</title>

    </head>
    <body>
        <h1>Hello PHP!</h1>
        <table>
        <form method="post" action="./add.php">
            <tr><td>NAME:</td><td><input type="text" name="name"></td></tr>
            <tr><td>MAIL:</td><td><input type="text" name="mail"></td></tr>
            <tr><td>TEL:</td><td><input type="text" name="tel"></td></tr>
            <tr><td>MEMO:</td><td><textarea name="memo"></textarea></td></tr>
            <tr><td></td><td><input type="submit" value="추가"></td></tr>
        </form>
        </table>
        <hr>
        <table>
        <?php echo $result; ?>
        </table>
    </body>
</html>
