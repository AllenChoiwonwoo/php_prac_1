<?php
 echo "<script>alert(\"오늘본 사진을 등록한다.\");</script>";
 error_reporting(0);
 $a =20;
  while ($a > 0) {
    // code...
  $img = $_COOKIE[$a];
  echo "<br> ".$a." = ".$img;
  $a--;
  }

 ?>
