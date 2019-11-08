<?php
  ini_set('display_errors', '0');
  session_start();
  if ($_POST['post_writer_mail'] != $_SESSION['mail']) {
    // code...
    echo "<script>alert(\"권한이 없습니다.\");</script>";
    echo"<script>location.href='main.php';</script>";
    return;
  }
  $post_id = $_POST['post_id'];//글번호
  $post_src = $_POST['post_src'];// 서버에 저장된 이미지 주소
  $post_writer_mail = $_POST['post_writer_mail']; // 근쓴이 메일주소
  $post_caption = $_POST['post_caption'];// 글내용
  // echo $post_id.$post_src.$post_writer_mail.$post_caption;
  // echo "<script>alert(\"전달된값 확인\");</script>";
  $delete_call = $_POST['delete_call'];
  // echo "<script>alert(\"$delete_call\");</script>";


  if ($_POST['delete_call']==1) {// 삭제 버튼을 눌렀을때
    // echo "<script>alert(\"delete_call 문 안\");</script>";
    try {
      // $id_gallery = $id."_gallery";
      // echo "<script>alert(\"$id_gallery\");</script>";
      // print $img_src."<br></br>";
      $edited_img_src = substr($img_src, 23);//이미지 상대주소
      // print $edited_img_src;
        $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $query = "UPDATE posts SET image_src=$img_src, caption=$caption, editdate=now(), tag=$tag WHERE post_id=$post_id";
        //게시물 삭제 쿼리
        // $query = "DELETE FROM posts WHERE post_id = $post_id";
        $query = "UPDATE posts SET del=1 WHERE post_id = $post_id";
         // print "<bt> </br>".$query;
        $pdo->exec($query);
        //게시물에 달린 댓글까지 다 삭제 쿼리
        // $query2 = "DELETE FROM comments WHERE parent_post = $post_id";
        // $pdo->exec($query2);
        echo"<script>alert(\"게시물이 삭제되었습니다\");</script>";
        echo"<script>location.href='main.php';</script>";




        // echo"<script>location.href='mypage_old.php';</script>";
    } catch(PDOException $e){
        echo "<br>ERR:" . $e->getMessage() + "<br>";
         // $result = "#ERR:" . $e->getMessage();
    }

    // code...
  }



 ?>
 <?php


   $id = $_SESSION[id]; //로그인 id
   $mail = $_SESSION[mail]; // 로그인 mail
   $name = $_SESSION[name]; // 로그인 name

   $user_id = $mail;
   $uploadfile = ''; // 서버에 저장된 경로
   if (!empty($_FILES['userfile'])) {//post로 전달 된 값이 있다면 = 업로드를 눌러서 사진을 보내왔다면
     // code...
     ini_set("display_errors", "1");
     $uploaddir = '/var/www/html/papamama/src/uploaded_img/';
     $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
     // echo '<pre>';
     if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
         // echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
         // echo '저장위치 '.$uploadfile;
         $edited_img_src = './'.substr($uploadfile, 23);
         echo "사진 업로드 성공";

         $_SESSION['post_src'] = $edited_img_src; // 세션에 저장된 post_src(post_detail에서 보여줄 이미지)를 업로드 성공한 이미지로 바꾼다.

     } else {
         // print "파일 업로드 공격의 가능성이 있습니다!\n";
     }
     // echo '자세한 디버깅 정보입니다:';
     // print $_FILES['userfile']['tmp_name'];
     // print_r($_FILES);
     // print "</pre>";


   }else {// main에서 넘어온것이라면
     // code...
     $edited_img_src = $post_src;
   }

  ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <link rel="stylesheet" href="./4.3/dist/css/bootstrap.css" media="screen">
     <link rel="stylesheet" href="./4.3/dist/css/bootstrap.min.css">

     <script src="./4.3/dist/js/bootstrap.min.js"></script>
     <script>

      var _gaq = _gaq || [];
       _gaq.push(['_setAccount', 'UA-23019901-1']);
       _gaq.push(['_setDomainName', "bootswatch.com"]);
         _gaq.push(['_setAllowLinker', true]);
       _gaq.push(['_trackPageview']);

         function fileUpload(fis) {
           var str = fis.value;
           alert("파일네임: "+ fis.value.substring(str.lastIndexOf("\\")+1));
         }

     </script>
   </head>
   <body>
     <div class="container">
       <!-- <form class="" action="index.html" method="post"> -->
       <div class="" style="width: 300px; height: 300px; overflow: hidden"></center>
         <img src="<?php echo $edited_img_src; ?>" alt="사용자가 선택한 사진" style="width: auto; height: 300px; margin-left: -20px;">
       </div>
         <div class="form-control-file">
           <label for="exampleInputFile"></label><br>
             <!--choose file 을 누르면 팝업창이 생성되면서 그것을 사진을 고른다.  -->
           <form enctype="multipart/form-data" action="post_edit.php?name=<?php echo $user_id ?>" method="POST" aria-describedby="fileHelp">
             <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
             <input name="userfile" type="file" onchange="fileUpload(this)"/>
             <input type="hidden" name="post_writer_mail" value="<?php echo $post_writer_mail; ?>">
             <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
             <input type="hidden" name="post_caption" value="<?php echo $post_caption ?>">


             <input type="submit" value="사진업로드" />
             <!-- 이 폼에서 submit을 할 시 다른 글같은 데이터도 같이 보내면 미리 써놓아도 사라지지 않는다. -->
           </form>

           <!-- <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"> -->
           <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
         </div>
       <!-- </form> -->
       <div class="row" style="margin:15px, padding:10px;">
           <div class="col-lg-6">
             <div class="bs-component">
               <!-- 페이지 이동  -->
               <form action="post_editor.php" method="post">
                 <fieldset>
                   <!-- <legend>Legend</legend> -->
                   <div class="form-group row">
                     <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control-plaintext" name="mail" value="<?php echo $user_id; ?>">
                       <input type="hidden" class="form-control-plaintext" id="staticId" name="id" value="<?php echo $id; ?>">
                       <input type="hidden" class="form-control-plaintext" id="staticId" name="post_id" value="<?php echo $post_id; ?>">
                       <input type="hidden" class="form-control-plaintext" id="staticId" name="img_src" value="<?php echo $edited_img_src; ?>">

                     </div>
                   </div>
                   <div class="form-group row">
                     <label for="staticEmail" class="col-sm-2 col-form-label">이름</label>
                     <div class="col-sm-10">
                       <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="name" value="<?php echo $name; ?>">
                     </div>
                   </div>
                   <div class="form-group">
                     <label for="exampleInputPassword1">테그</label>
                     <input type="text" class="form-control" name="tag"  placeholder="테그를 입려하세요 (ex : #가족여행 #일상 )">
                   </div>
                   <div class="form-group">
                     <label for="exampleTextarea">내용을 입력하세요</label>
                     <!-- <label for=""></label> -->
                     <textarea class="form-control" name="caption" id="exampleTextarea" rows="5"><?php echo $post_caption ?></textarea>
                   </div>

                   <div class="">
                     <img src="" alt="">
                   </div>

                   <!-- <fieldset class="form-group">
                     <legend>공개설정</legend>
                     <div class="form-check">
                       <label class="form-check-label">
                         <input type="radio" class="form-check-input" name="optionsRadios" id="1" value="1" checked>
                         1촌까지 공개
                       </label>
                     </div>
                     <div class="form-check">
                     <label class="form-check-label">
                         <input type="radio" class="form-check-input" name="optionsRadios" id="2" value="2">
                         4촌까지 공개
                       </label>
                     </div>
                     <div class="form-check">
                     <label class="form-check-label">
                         <input type="radio" class="form-check-input" name="optionsRadios" id="3" value="3" >
                         친구까지 공개
                       </label>
                     </div>
                     <div class="form-check">
                     <label class="form-check-label">
                         <input type="radio" class="form-check-input" name="optionsRadios" id="4" value="4" >
                         전체 공개
                       </label>
                     </div>
                   </fieldset>

                   <fieldset class="form-group">
                     <legend>댓글허용</legend>
                     <div class="form-check">
                       <label class="form-check-label">
                         <input class="form-check-input" type="checkbox" value="1" checked>
                         댓글 허용
                       </label>
                     </div>

                   </fieldset> -->

                   <button type="submit" class="btn btn-primary">수정</button>
                 </fieldset>
               </form>
             </div>
           </div>
         </div>
     <?php

      ?>
   </body>
 </html>
