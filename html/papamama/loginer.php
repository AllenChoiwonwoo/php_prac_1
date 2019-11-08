<?php
session_cache_expire(1440);
session_start();
error_reporting(0);
echo session_cache_expire();
//post로 아이디 비번을 받아서  mail, pw로 가져온 id 값이 있으면 그 번호로 로그인 시키고 없으면 다시 입력하라는 알림창을 띄워준다.

  // code...
  $mail = $_POST['inputEmail'];
  $password = $_POST['inputPassword'];

  $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
  $stmt = $pdo->prepare("SELECT id,name,likelist from user_info where mail='$mail' AND password = '$password'");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $name = $result['name'];
  $id = $result['id'];//id = 38
  $likelist = $result['likelist'];
  // echo "<script>alert(\"$id\");</script>";
  if (!empty($id)) {// 아이디 비번이 일치할경우


    $_SESSION['id']=$id;
    $_SESSION['mail']=$mail;
    $_SESSION['name']=$name;
    $_SESSION['likelist']=$likelist;

    if ($_POST['autologin'] == remember) {//오토로그인 체크시 cookie에 회원정보를 저장해 자동로그인을 구현한다.
      setcookie('autologin',"autologin",time()+(1440),'/');
      setcookie('id',$id,time()+(1440),'/');
      setcookie('mail',$mail,time()+(1440),'/');
      setcookie('name',$name,time()+(1440),'/');
      setCookie('likelist',$likelist,time()+1440,'/');
      // code...
    }




    // echo "<script>alert(\"$_SESSION[mail]\");</script>";

    // echo "<script>alert(\"로그인 되었습니다.\");</script>";

    // echo "<script";

    // code...
  }else {
    // code...
    echo "<script>alert(\"아이디비/비밀번호가 일치하지 않습니다. 다시 입력하세요\");</script>";
    echo "<script>history.back(); </script>";
  }
  header('Location: ./main.php');

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <!-- <form class="" action="main.php" method="post"> -->
       <!-- $user_id = $_POST["inputEmail"]; -->
       <!-- <input type="hidden" name="inputEmail" value="<?php echo $mail; ?>">
       <input type="submit" value="main으로 가기"> -->

     </form>
   </body>
 </html>
