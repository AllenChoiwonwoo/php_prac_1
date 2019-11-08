<?php
  session_start();

  // $name = $_POST['name'];
  $name = $_SESSION['name'];
  print "이름은 ".$name."<br>";
  // $id = $_POST['id'];
  $id = $_SESSION['id'];
  // $mail = $_POST['mail'];
  $mail = $_SESSION['mail'];

  $post_id = $_POST['post_id'];
  $img_src = $_POST['img_src'];
  $tag = $_POST['tag'];
  $caption = $_POST['caption'];
  // echo "<script>alert(\"$post_id.$img_src.$tag.$caption\");</script>";
  //$openarea = $_POSt['optionsRadios']; //
  //$comment_permit = $_POST['checkbox'];


  try {
    // $id_gallery = $id."_gallery";
    // echo "<script>alert(\"$id_gallery\");</script>";
    print $img_src."<br></br>";
    $edited_img_src = substr($img_src, 23);//이미지 상대주소
    print $edited_img_src;
      $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
      $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "UPDATE posts SET image_src='$img_src', caption='$caption', editdate=now(), tag='$tag' WHERE post_id='$post_id'";

       print "<bt> </br>".$query;
      $pdo->exec($query);
      echo"<script>alert(\"게시물이 수정되었습니다\");</script>";

      echo"<script>location.href='post_detail.php';</script>";
  } catch(PDOException $e){
      echo "<br>ERR:" . $e->getMessage() + "<br>";
       // $result = "#ERR:" . $e->getMessage();
  }

  try {
    $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    $query = "select img_src,caption from 38_gallery where image_src = $img_src";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $topic = $stmt->fetch();
    // echo "<pre>";
    // print_r($topic);
    // echo "왜 왜왜 ";
    // printf($topic);
    // print($topic);
    // echo "</pre>";
  } catch (PDOException $e) {
    echo "<br><html><body><h1>ERR:" . $e->getMessage() + "</h1></body></html>";

  }
  // echo "아무것도 안떠?";



 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <img src="<?php echo "./".$edited_img_src; ?>" alt="">
   </body>
 </html>
