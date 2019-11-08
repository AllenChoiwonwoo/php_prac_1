<?php
$result = "";
 try {
    $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    $statement = $pdo->query("select * from person");
    while($record = $statement->fetch(PDO::FETCH_ASSOC)){
      $result .= "<tr>";
       foreach($record as $column){
          $result .= "<td>" . $column . "</td>";
        } $result .= "</tr>";
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
                table tr td { padding:5px; background-color:#DDFFCC; }
              </style>
          </head>
            <body>
              <h1>Hello PHP!</h1>
                <table>
                 <?php echo $result; ?>
                </table>
               </body>
             </html>
