<?php
\
ini_set('display_errors', '0');
session_start();
  $cww =0;
  $mjh =1;
  $kth =1;
  $aa = 123;
  // setCookie('cookie_2',"무엇인가?", time()+1400, '/');
  // $cookie = $_COOKIE['cookie_2'];
  // echo $cookie;\
  $session = $_SESSION['sess'];
  echo $var;
  echo "없는값 ".$_COOKIE['likelist'];

  $array = [];
  $array[] ="a";
  $array[] ="b";
  $array[] ="c";

  array_unshift($array, $post_id);

 ?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript">
      function change(val){
        var sample = document.getElementById("wonwoo");

        if (sample.innerHTML == "hii" ) {
          for (var i = 0; i < 100; i++) {
            var nub = i;
          }





          sample.innerHTML = "<?php echo $session; ?>";
          alert("val");
        }else {
          sample.innerHTML = "hi"
        }

      }
    </script>
  </head>
  <body>
    <p id="wonwoo">hii</p>
    <script type="text/javascript">
      function test(){
        alert("알람"+"abc");
      }
      test();
    </script>
    <button onclick="change(123)">click</button>

  </body>
</html>
