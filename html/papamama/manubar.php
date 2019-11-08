<?php
  ini_set('display_errors', '0');
  if (empty($active1 || $active2 || $active3)) {
    // code...
    $active1 = ""; $active2 = ""; $active3 = "";
  }
 ?>
<!-- <script src="./4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script> -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
<a class="navbar-brand" href="#">
<img src="http://localhost/papamama/src/img/PapaMama_logo.png" alt="PapaMama" width="55">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse"
data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<script type="text/javascript">
function log_out(val){
 if(confirm("로그아웃 하시겠습니까?")){
   location.href='logout.php';
   return true;
 } else {
   return false;
 }

}
</script>

<div class="collapse navbar-collapse" id="navbarsExampleDefault">
<ul class="navbar-nav mr-auto">
 <li class="nav-item <?=$active2  ?>">
   <a class="nav-link" href="mypage_old.php">마이페이지<span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=$active1  ?>">
   <a class="nav-link" href="main.php">메인<span class="sr-only">(current)</span></a>
   <!-- <a class="nav-link" href="#">좋아요</a> -->
 </li>
 <li class="nav-item <?=$active3  ?>">
   <a class="nav-link" href="upload_post.php?name=<?php echo $user_id; ?>">사진업로드</a>
   <!-- <a class="nav-link" href="upload_img_finder.php?name=<?php echo $user_id; ?>">사진업로드</a> -->
   <!-- 사진 업로드 를 누르면 아이디를 post로 보낸다. -->
 </li>
 <!-- <li class="nav-item">
   <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
 </li> -->
 <li class="nav-item dropdown">
   <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">메뉴 더보기</a>
   <div class="dropdown-menu" aria-labelledby="dropdown01">
     <a class="dropdown-item" href="#" onclick="log_out(1234);">로그아웃</a>
     <!-- <form class="" action="logout.php" method="post">
       <input class="dropdown-item" type="submit" onclick="log_out(1234);" name="" value="로그아웃">
     </form> -->
     <!-- <a class="dropdown-item" href="#">Another action</a> -->
     <!-- <a class="dropdown-item" href="#">Something else here</a> -->
   </div>
 </li>



</ul>
<form class="nav-item form-inline my-2 my-lg-0" action="search.php" method="get">
 <!-- <a class="nav-link" href="#">마이페이지</a> -->


 <input type="text" name="search" placeholder="친구찾기(아이디를 입력하세요)">
 <input type="submit" value="찾기">
</form>

<!-- <form class="nav-item form-inline my-2 my-lg-0" action="search.php" method="get">
 <input class="form-control mr-sm-2" type="text" name="search" placeholder="search" aria-label="Search">
 <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
</form> -->

</div>
</nav>
