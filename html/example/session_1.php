<?php
  session_start();
  // ses
  $_SESSION[test2]= '원우원우원우';
  echo '세션 테스트입니다. 저장된 값은 '.$_SESSION[test2].' 입니다.';

 ?>

 <!--
 <?php
 // session_save_path('./session');
 // session_start();
 // $_SESSION['title'] = '생활코딩';
 ?> -->
