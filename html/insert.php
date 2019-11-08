<?php

    error_reporting(E_ALL);
    ini_set('display_errors',1);

    include('dbcon.php');


    if( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit']))
    //서버에서 온 메소드가 post 이고 post로 온 submit값이 비어있지 않으면
    //isset은 값이 존제하는지, 비어있는지 체크하는 함수이다.
    {

        $name=$_POST['name'];//post로 온 name값을 name에 넣는다.
        $country=$_POST['country'];// post로 온 contry값을 contry에 넣는다.

        if(empty($name)){
            $errMSG = "이름을 입력하세요.";
            //만약 name 에 값이 없거나,0,false,null 이면 true를 반환한다.
            //->비어있으면 true로 if문 안으로 들어온다.
        }
        else if(empty($country)){
            $errMSG = "나라를 입력하세요.";
        }

        if(!isset($errMSG))
        {// ! (errMSG 에 값이 있으면) = 값이 없으면 = 에러가 안나면
            try{
                $stmt = $con->prepare('INSERT INTO person(name, country) VALUES(:name, :country)');
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':country', $country);

                if($stmt->execute())
                {
                    $successMSG = "새로운 사용자를 추가했습니다.";
                }
                else
                {
                    $errMSG = "사용자 추가 에러";
                }

            } catch(PDOException $e) {
                die("Database error: " . $e->getMessage());
            }
        }

    }
?>

<html>
   <body>
        <?php
        if (isset($errMSG)) echo $errMSG;
        if (isset($successMSG)) echo $successMSG;
        ?>

        <form action="<?php $_PHP_SELF ?>" method="POST">
            Name: <input type = "text" name = "name" />
            Country: <input type = "text" name = "country" />
            <input type = "submit" name = "submit" />
        </form>

   </body>
</html>
