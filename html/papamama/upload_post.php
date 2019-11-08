<?php

  ini_set('display_errors', '0');
  session_start();

  $id = $_SESSION[id];
  $mail = $_SESSION[mail];
  $name = $_SESSION[name];

  $user_id = $mail;
  $uploadfile = ''; // 서버에 저장된 경로
  if (!empty($_FILES['userfile'])) {//post로 전달 된 값이 있다면
    // code...
    ini_set("display_errors", "1");
    $uploaddir = '/var/www/html/papamama/src/uploaded_img/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    // echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        // echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
        // echo '저장위치 '.$uploadfile;
    } else {
        // print "파일 업로드 공격의 가능성이 있습니다!\n";
    }
    // echo '자세한 디버깅 정보입니다:';
    // print $_FILES['userfile']['tmp_name'];
    // print_r($_FILES);
    // print "</pre>";
    // echo "현재페이제에 post 성공";
    // echo '<pre>' print_r 현재페이제에 post 성공 '</pre>';

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
    <?php
    $active3 = "active";
     include 'manubar.php'; ?>
<!--  여기까지 네비게이션 바-->
<br><br><br>
    <div class="container" align="center">
      <!-- <form class="" action="index.html" method="post"> -->
      <div class="" style="width: 300px; height: 300px; overflow: hidden;"></center>
        <img src="<?php
        $edited_img_src = './'.substr($uploadfile, 23);
         echo $edited_img_src;
          ?>" alt='업로드한 사진이 없습니다.업로드 해주세요' style="width: auto; height: 300px;">
      </div>
        <div class="form-control-file">
          <!-- <label for="exampleInputFile">File input</label> -->
          <br>
            <!--choose file 을 누르면 팝업창이 생성되면서 그것을 사진을 고른다.  -->
          <form enctype="multipart/form-data" action="upload_post.php?name=<?php echo $user_id ?>" method="POST" aria-describedby="fileHelp">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            <input name="userfile" type="file" onchange="fileUpload(this)"/>
            <input type="submit" value="사진업로드" />
            <!-- 이 폼에서 submit을 할 시 다른 글같은 데이터도 같이 보내면 미리 써놓아도 사라지지 않는다. -->
          </form>

          <!-- <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"> -->
          <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
        </div>
      <!-- </form> -->
      <div>
          <div class="col-lg-6">
            <div class="bs-component">
              <!-- 페이지 이동  -->
              <form action="upload_poster.php" method="post">
                <fieldset>
                  <!-- <legend>Legend</legend> -->
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">메일주소</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control-plaintext" name="mail" value="<?php echo $user_id; ?>">
                      <input type="hidden" class="form-control-plaintext" id="staticId" name="id" value="<?php echo $id; ?>">
                      <input type="hidden" class="form-control-plaintext" id="staticId" name="img_src" value="<?php echo $uploadfile; ?>">

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">이름</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="name" value="<?php echo $name; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">태그</label>
                    <input type="text" class="form-control col-sm " name="tag"  placeholder="태그를 입려하세요 (ex : #가족여행 #일상 )">
                  </div>

                  <div class="form-group row">
                    <label for="exampleTextarea" class="col-form-label">내용을 입력하세요</label>
                    <textarea class="form-control" name="caption" id="exampleTextarea" rows="5"></textarea>
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

                  <button type="submit" class="btn btn-primary" style="width:100%;">등록</button>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
      <!-- <script src="./4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script> -->
      <script src="./4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  </body>
</html>
