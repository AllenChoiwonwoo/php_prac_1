
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>회원가입</title>

<link href="4.3/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="4.3/dist/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
  .divider-text {
  position: relative;
  text-align: center;
  margin-top: 15px;
  margin-bottom: 15px;
}
.divider-text span {
  padding: 7px;
  font-size: 12px;
  position: relative;
  z-index: 2;
}
.divider-text:after {
  content: "";
  position: absolute;
  width: 100%;
  border-bottom: 1px solid #ddd;
  top: 55%;
  left: 0;
  z-index: 1;
}

.btn-facebook {
  background-color: #405D9D;
  color: #fff;
}
.btn-twitter {
  background-color: #42AEEC;
  color: #fff;
}
  </style>
  <script type="text/javascript">
  $(function(){

  //아이디 중복 확인 소스
  var memberIdCheck = $('.memberIdCheck');
  var memberId = $('.memberId');
  var memberIdComment = $('.memberIdComment');
  var memberPw = $('.memberPw');
  var memberPw2 = $('.memberPw2');
  var memberPw2Comment = $('.memberPw2Comment');
  var memberNickName = $('.memberNickName');
  var memberNickNameComment = $('.memberNickNameComment');
  var memberEmailAddress = $('.memberEmailAddress');
  var memberEmailAddressComment = $('.memberEmailAddressComment');
  var memberBirthDay = $('.memberBirthDay');
  var memberBirthDayComment = $('.memberBirthDayComment');
  var idCheck = $('.idCheck');
  var pwCheck2 = $('.pwCheck2');
  var eMailCheck = $('.eMailCheck');

  memberIdCheck.click(function(){
      console.log(memberId.val());
      $.ajax({
          type: 'post',
          dataType: 'json',
          url: '../member/memberIdCheck.php',
          data: {memberId: memberId.val()},

          success: function (json) {
              if(json.res == 'good') {
                  console.log(json.res);
                  memberIdComment.text('사용가능한 아이디 입니다.');
                  idCheck.val('1');
              }else{
                  memberIdComment.text('다른 아이디를 입력해 주세요.');
                  memberId.focus();
              }
          },

          error: function(){
            console.log('failed');

          }
      })
  });

  //비밀번호 동일 한지 체크
  pw_conferm.blur(function(){
     if(pw_conferm.val() == password.val()){
         memberPw2Comment.text('비밀번호가 일치합니다.');
         pwCheck2.val('1');
     }else{
         memberPw2Comment.text('비밀번호가 일치하지 않습니다.');

     }
  });

  //이메일 유효성 검사
  memberEmailAddress.blur(function(){
      var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
      if(regex.test(memberEmailAddress.val()) === false){
          memberEmailAddressComment.text('이메일이 유효성에 맞지 않습니다.');
          eMailCheck.val('1');
      }else{
          memberEmailAddressComment.text('올바른 이메일 입니다.');
      }
  });

});

function checkSubmit(){
  var idCheck = $('.idCheck');
  var pwCheck2 = $('.pwCheck2');
  var eMailCheck = $('.eMailCheck');
  var memberBirthDay = $('.memberBirthDay');
  var memberNickName = $('.memberNickName');
  var memberName = $('.memberName');


  if(idCheck.val() == '1'){
      res = true;
  }else{
      res = false;
  }
  if(pwCheck2.val() == '1'){
      res = true;
  }else{
      res = false;
  }
  if(eMailCheck.val() == '1'){
      res = true;
  }else{
      res = false;
  }

  if(memberName.val() != ''){
      res = true;
  }else{
      res = false;
  }
  if(memberBirthDay.val() != ''){
      res = true;
  }else{
      res = false;
  }
  if(memberNickName.val() != ''){
      res = true;
  }else{
      res = false;
  }

  if(res == false){
      alert('회원가입 폼을 정확히 채워 주세요.');
  }
  return res;

}
  </script>

</head>
<!-- Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
<br>
<!-- <p class="text-center">More bootstrap 4 components on <a href="http://bootstrap-ecommerce.com/"> Bootstrap-ecommerce.com</a></p> -->
<hr>





<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
  <div class="text-center ">
    <img class="mb" src="http://localhost/papamama/src/img/PapaMama_logo.png" alt="" height="120">
    <!-- <h1 class="h1 mb-3 font-weight-normal">PapaMama</h1> -->
    <!-- <p>사랑하는 사람들과 함께 추억을 나누세요 <br><code>: Share your memory with who you love</code> <br> <a href="https://caniuse.com/#feat=css-placeholder-shown">With kakaoTalk, Facebook, and instagram.</a></p> -->
  </div>

	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form method="post" action="joiner.php">
	<div class="form-group input-group" >
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full name" type="text">
        <div class="memberIdComment"> </div>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select name="phone1" class="custom-select" style="max-width: 120px;">
		    <option selected="" value="010">010</option>
		    <option value="019">019</option>
		    <option value="018">018</option>
		    <option value="017">017</option>
		</select>
    	<input name="phone2" class="form-control" placeholder="Phone number" type="number">
    </div> <!-- form-group// -->

    <!-- <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select class="form-control">
			<option selected=""> Select job type</option>
			<option>Designer</option>
			<option>Manager</option>
			<option>Accaunting</option>
		</select>
	</div> -->

  <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password"class="form-control" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="pw_conferm" class="form-control" placeholder="Repeat password" type="password">
        <div class="memberPw2Comment comment">

        </div>
    </div> <!-- form-group// -->
    <div class="">
      <p>가입하면 PapaMama 의<a href="customerService.php#sub-heading">약관과 각종 데이터 정책"</a> 약관, 데이터 정책 및 쿠키 정책</a>에 동의하게 됩니다.</p>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->
    <p class="text-center">Have an account? <a href="">Log In</a> </p>
</form>
</article>
</div> <!-- card.// -->

</div>
<!--container end.//-->

<br><br>
<!-- <article class="bg-secondary mb-3">
<div class="card-body text-center">
    <h3 class="text-white mt-3">Bootstrap 4 UI KIT</h3>
<p class="h5 text-white">Components and templates  <br> for Ecommerce, marketplace, booking websites
and product landing pages</p>   <br>
<p><a class="btn btn-warning" target="_blank" href="http://bootstrap-ecommerce.com/"> Bootstrap-ecommerce.com
 <i class="fa fa-window-restore "></i></a></p>
</div>
<br><br>
</article> -->
