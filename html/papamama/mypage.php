
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

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
    <link href="form-validation.css" rel="stylesheet">
  </head>


  <body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
   <img src="http://localhost/papamama/src/img/PapaMama_logo.png" alt="PapaMama" width="55">
 </a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>

 <div class="collapse navbar-collapse" id="navbarsExampleDefault">
   <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
       <a class="nav-link" href="#">mypage<span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">좋아요</a>
     </li>
     <!-- <li class="nav-item">
       <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
     </li> -->
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
       <div class="dropdown-menu" aria-labelledby="dropdown01">
         <a class="dropdown-item" href="#">Action</a>
         <a class="dropdown-item" href="#">Another action</a>
         <a class="dropdown-item" href="#">Something else here</a>
       </div>
     </li>
   </ul>
   <form class="form-inline my-2 my-lg-0">
     <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
     <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
   </form>
 </div>
</nav>
<!--  여기까지 네비게이션 바-->

    <div class="container">
      <div class="col-md-4">
        <br><br><br><br>
      </div>
  <!-- <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>화면의 상단</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div> -->

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">다가오는 생일</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">첫째큰아버지 생신</h6>
            <small class="text-muted">2월 23일(오늘)</small>
          </div>
          <!-- <span class="text-muted">$12</span> -->
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">홍길동 생일</h6>
            <small class="text-muted">2월 24일</small>
          </div>
          <!-- <span class="text-muted">$8</span> -->
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">배수지 생일</h6>
            <small class="text-muted">2월 24</small>
          </div>
          <!-- <span class="text-muted">$5</span> -->
        <!-- </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$20</strong>
        </li> -->
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">선물하기 </button>
            <button type="button" class="btn btn-sm btn-outline-secondary">카드보내 </button>
          </div>
          <!-- <button type="button" name="선물하기">선물하기/카드보내기</button> -->
          <!-- <input type="text" class="form-control" placeholder="Promo code"> -->
          <!-- <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">선물하기</button>
          </div> -->
        </div>
      </div>
      </form>
    </div>


    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" novalidate>
<!-- 여기서 부터 이미지 카드뷰 -->

<div class="">
        <div class="card mb-4 box-s">
          <img class="card-img-top" src="src/img/dating_pic1.jpg" alt="trip_pic3">
          <div class="card-body">
            <p class="card-text">엄마가 저 신화의 애릭 닮았다고해서, 애릭 팬이셨던 음악선생님께 맞았던 기억이나네요</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
              </div>
              <small class="text-muted">27 mins</small>
            </div>
          </div>
        </div>
      </div>
        <div class="">
                <div class="card mb-4 box-s">
                  <img class="card-img-top" src="src/img/trip_pic5.jpg" alt="trip_pic3">
                  <div class="card-body">
                    <p class="card-text">제가 뉴욕 여행가서 찍은 사진이에요 잘 찍었죠. 엄마 아빠 보고싶어요. 돌아가서 봬요</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                      </div>
                      <small class="text-muted">1 weeks</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="">
                      <div class="card mb-4 box-s">
                        <img class="card-img-top" src="src/img/trip_pic4.jpg" alt="trip_pic3">
                        <div class="card-body">
                          <p class="card-text">워싱턴이에요! 전기세 많이 나오겠죠?</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                              <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                            </div>
                            <small class="text-muted">3 weeks</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="">
                            <div class="card mb-4 box-s">
                              <img class="card-img-top" src="src/img/familyimage1.jpg" alt="trip_pic3">
                              <div class="card-body">
                                <p class="card-text">저 유치원때 가족여행갔던 사진이에요. 다 같이 또가요</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                                  </div>
                                  <small class="text-muted">1 month</small>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="">
                                  <div class="card mb-4 box-s">
                                    <img class="card-img-top" src="src/img/food_pic2.jpeg" alt="trip_pic3">
                                    <div class="card-body">
                                      <p class="card-text">랍스타 먹으러 왔어요~ 저는 게맛살이 더 좋아요</p>
                                      <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                                          <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                                        </div>
                                        <small class="text-muted">1 month</small>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="">
                                        <div class="card mb-4 box-s">
                                          <img class="card-img-top" src="src/img/hollyday_pic1.jpg" alt="trip_pic3">
                                          <div class="card-body">
                                            <p class="card-text">작년 차례 사진이에요 큰아버지 건강하셔야하는데 걱정이에요. 건강하세요 큰아버지</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                              <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                                              </div>
                                              <small class="text-muted">2 month</small>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="">
                                              <div class="card mb-4 box-s">
                                                <img class="card-img-top" src="src/img/mom_hiking1.jpg" alt="trip_pic3">
                                                <div class="card-body">
                                                  <p class="card-text">아들 엄마 산에왔어. 상왕봉 정상이야! 아들도 운동해야지</p>
                                                  <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                                                      <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                                                    </div>
                                                    <small class="text-muted">1 month</small>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="">
                                                    <div class="card mb-4 box-s">
                                                      <img class="card-img-top" src="src/img/trip_pic1.png" alt="trip_pic3">
                                                      <div class="card-body">
                                                        <p class="card-text">엄마 나 영어마을 왔어</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                          <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                                                            <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                                                          </div>
                                                          <small class="text-muted">1 month</small>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="">
                                                          <div class="card mb-4 box-s">
                                                            <img class="card-img-top" src="src/img/trip_pic2.JPG" alt="trip_pic3">
                                                            <div class="card-body">
                                                              <p class="card-text">가우디 구엘공원에 누나와 함께, 누나는 지금이 제일 예뻐 제발 내 쪽을 보지 말아줘</p>
                                                              <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                  <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                                                                  <button type="button" class="btn btn-sm btn-outline-secondary">댓글쓰기</button>
                                                                </div>
                                                                <small class="text-muted">2 month</small>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>



        <!-- 이름 입력란 -->
        <!-- <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div> -->

        <!-- <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div> -->

        <!-- <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div> -->

        <!-- <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div> -->

        <!-- <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div> -->

        <!-- <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div> -->
        <!-- <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4"> -->

        <!-- <h4 class="mb-3">Payment</h4> -->

        <!-- <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div> -->
        <!-- <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div> -->
        <!-- <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div> -->


        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">지난 사진 더보기</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script></body>
</html>
