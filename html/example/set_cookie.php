<?php
  session_start();
  setCookie('cookie_2', '2222', time()+1400, '/');
  $_SESSION['sess'] = "session가능";
  static $val = "스테틱";

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <a href='js_function_getElementById.php'>script쿠키 테스트</a>
   </body>
 </html>
