<?php
session_start();
// $sessioned_name = $_SESSION['name'];

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- <meta charset="utf-8"> -->
    <title>로그인</title>

    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
   <meta name="generator" content="Jekyll v3.8.5">
   <title>PapaMama_login</title>

   <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/floating-labels/">

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
   <!-- Custom styles for this template -->
   <link href="https://getbootstrap.com/docs/4.3/examples/floating-labels/floating-labels.css" rel="stylesheet">
  </head>
  <body>


    <!-- <img src="http://localhost/papamama/src/img/PapaMama_logo.png" height="150" alt="파파맘마 로고">
    <h3>PapaMama</h3><br>
    <h2>로그인</h2></center>
    <form class="" action="main.php" method="post">
      <b>ID</b><input type="text" size=10 maxlength="25" name="id" value=""><br>
      <b>password</b><input type="password" name="" size=10 maxlength=10 name="pwd"><br>
      <input type="submit" name="submit" value="로그인">


    </form>
    <form class="" action="join.php" method="post">
      <input type="submit" name="go_join" value="회원가입">
    </form>
    <form class="" action="introduce.php" method="get"> -->
      <!-- <a href="i">회사 소개</a> -->
      <!-- <input type="submit" name="소개글" value="info">
    </form> -->



  <!-- <form class="form-signin" action="main.php" method="post"> -->
  <form class="form-signin" action="loginer.php" method="post">
  <div class="text-center mb-4">
    <img class="mb" src="http://localhost/papamama/src/img/PapaMama_logo.png" alt="" height="155">
    <h1 class="h1 mb-3 font-weight-normal">PapaMama</h1>
    <p>사랑하는 사람들과 함께 추억을 나누세요 <br><code>: Share your memory with who you love</code> <br>
      <!-- <a href="https://caniuse.com/#feat=css-placeholder-shown">With kakaoTalk, Facebook, and instagram.</a> -->
    </p>
  </div>


  <div class="form-label-group">
    <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputEmail">Email address</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
    <label for="inputPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" name="autologin" value="remember"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  <div class="text-center mb-4"><br>
    <a href="join.php">가입하기</a>
  </div>
  <p class="mt-3 mb-3 text-muted text-center">&copy; 2018-2019</p>
</form>


  </body>
</html>
