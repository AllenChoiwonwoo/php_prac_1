<?php

  session_start();
  session_destroy();

  setcookie('id', '', time()-3600, '/');
  setcookie('mail', '', time()-3600, '/');
  setcookie('name', '', time()-3600, '/');

  $count = $_COOKIE['watch_today'];
  for ($i=0; $i < 10 ; $i++) {
    // code...
    setCookie(($count), '', time()-1000,'/');
    $count -=1;
  }
  setCookie('watch_today', '', time()-1000, '/');


  header('Location: ./login.php');
  exit

 ?>
