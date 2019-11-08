<?php
  if ($_POST['editing_comment']) {

    $editing_comment = $_POST['editing_comment'];
    $editing_comm_id = $_POST['editing_comm_id'];

    $pdo = new PDO("mysql:host=localhost;dbname=papamamaDB;charset=utf8", "root","sql");
    $query = "UPDATE comments SET comment='$editing_comment' where comm_id = '$editing_comm_id'";
    $pdo->exec($query);
    echo "<script>alert(\"수정되었습니다.\");</script>";
    echo"<script>location.href='post_detail.php';</script>";


    // code...
  }else {
    echo "<script>alert(\"넘어온 값이 없음.\");</script>";
  }
  $comm_id = $_POST['comm_id'];
  $mail = $_POST['mail'];
  $comment = $_POST['comment'];
  session_start();
  echo "<script>alert(\"$comm_id.$mail.$comment\");</script>";
  echo $_SESSION['mail'];
  if ($mail != $_SESSION['mail']) {// 작성자 일치 비교 문
    // code...
    echo "<script>alert(\"작성자가 아님니다. 댓글을 수정할 수 없습니다.\");</script>";
    echo "<script>history.back(); </script>";
  }

 ?>
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
     <meta name="generator" content="Jekyll v3.8.5">
     <title><?php echo $id; ?></title>

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
     <script type="text/javascript">
       function change_button(){

         var numb = $("#parent_comm"+).val();
         // var aaa = <? echo $parent_comm_numb; ?>
         alert('대댓글 버튼눌림'+numb);
         document.getElementById("change").value = '대댓글등록';
         document.getElementById("cocomm").value = numb;

       }
     </script>

     <!-- Custom styles for this template -->
     <link href="form-validation.css" rel="stylesheet">
   </head>
   <body>
     <div class="container">
       <div class="card mb-4 box-s">
         <form class="" action="edit_comm.php" method="post">
           <span><input type="text" name="editing_comment" value="<?php echo $comment; ?>"></span>
           <span>
             <input type="hidden" name="editing_comm_id" value="<?php echo $comm_id; ?>">
             <!-- <input type="hidden" name="" value=""> -->
           </span>
           <span><input type="submit" name="" value="수정"></span>

         </form>
       </div>
     </div>




   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
   <script src="form-validation.js"></script></body>
 </html>
