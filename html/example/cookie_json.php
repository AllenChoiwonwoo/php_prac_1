/*
  @1번 방법
  선택한 사진의 값을 받아와서 "watch_today" 배열의 0번에 넣는다.
  watch_today 배열을 json 화 시킨다.
  watch_today_cookie 에 넣는다.

  다시 메인으로 가면 좌측에
  json 화 된  watch_today_cookie 를 가져와 watch_today 배열로 바꾼다.
  배열 순서대로 이미지를 표시해준다.

  @2번 방법
  사진을 선택한다.
    post 로 img_src 가 넘어간다.
  쿠키에 선택한 사진을 setCookie(1,img_src , 만료일) 이래 저장한다.

  쿠키에 1을 저장한다.
    watch_today 쿠키에 int 1을 저장
  사진을 또 선택한다.

  쿠키에 선택한 사진을 setCookie("쿠키에 저장된1"+1, img_src, 만료일)
  쿠키에 2를 저장한다.
  .........
  5개 이상이되도 화면엔 5개만 보여준다.
    for(a=watch_today-5 , a < watch_today, a++)
      보여라 사진을


  10개까지 저장하고 10개 이상은 11이되면 1을 지우고 12가 되면 2를 지운다.
    setcookie('11, '', time()-3600, '/'); = 쿠키 지우기

*/
