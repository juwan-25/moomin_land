<!doctype html>
<?php

include('./db_con.php');

$sql = "select * from product where new=1;";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MOONIN LAND</title>
        <link rel="stylesheet" href="css/swiper.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        
        
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper@6.4.5/swiper.scss">
      </head>
    <body>
        <!-- header -->
        <div id="header">
          <nav class="navbar fixed-top navbar-expand-lg bg-light">
            <div class="container-fluid">
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav navbar-right">
                  <li class="nav-item">
                    <?php
                      if(!isset($_COOKIE['userId'])||!isset($_COOKIE['userPass'])){
                        echo "<a class='nav-link' href='login.php'>로그인</a>";
                      } else {
                        echo "<a class='nav-link' href='#'></a>";
                      }
                    ?>
                  </li>
                  <li class="nav-item">
                  <?php
                      if(!isset($_COOKIE['userId'])||!isset($_COOKIE['userPass'])){
                        echo "<a class='nav-link' href='signup.php'>회원가입</a>";
                      } else {
                        echo "<a class='nav-link' href='logout.php'>로그아웃</a>";
                      }
                    ?>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">마이페이지</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <div class="logotab fixed-top2">
            <div class="inner">
              <a href="index.php" class="logo">
                <img class="logoimg" src="./img/mainlogo.png">
              </a>
              <div class="logomenu">
                <ul>
                  <li>
                    <a href="#" class="menu_basket">장바구니</a>
                  </li>
                  <li class="bar"></li>
                  <li>
                    <a href="#" class="menu_truck">주문배송조회</a>
                  </li>
                  <li>
                    <a href="https://www.facebook.com/moominlandjeju">
                      <img class="faceimg" src="./img/ico_facebooknew.png">
                    </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/moominlandjeju/">
                      <img class="instaimg" src="./img/ico_instagramnew.png" >
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="shoptab fixed-top3">
            <ul class="nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link" href="#">이벤트</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">테마기획전</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="toy.php">토이</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">문구</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">리빙</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">여행</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">도서</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">고객센터</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- header -->

        <!-- contents -->
        <div id="wrap">
          <!-- banner -->
          <div class="banner">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                  <div class="swiper-slide"><img src="./img/banner1.jpeg" width="100%" height="100%" style="object-fit: cover;"></div>
                  <div class="swiper-slide"><img src="./img/banner2.jpeg" width="100%" height="100%" style="object-fit: cover;"></div>
              </div>
            </div>
          
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
            <script>
                const swiper = new Swiper('.swiper-container', {
                      //기본 셋팅
                      //방향 셋팅 vertical 수직, horizontal 수평 설정이 없으면 수평
                      direction: 'horizontal',
                      //한번에 보여지는 페이지 숫자
                      slidesPerView: 1,

                      //드레그 기능 true 사용가능 false 사용불가
                      debugger: true,
                      //마우스 휠기능 true 사용가능 false 사용불가
                      mousewheel: true,
                      //반복 기능 true 사용가능 false 사용불가
                      loop: true,
                      //선택된 슬라이드를 중심으로 true 사용가능 false 사용불가 djqt
                      centeredSlides: true,

                      pagination: {
                          //페이지 기능
                          el: '.swiper-pagination',
                          //클릭 가능여부
                          clickable: true,
                      },

                    
                      autoplay: {
                          delay: 3200,
                          disableOnInteraction: false,
                      },
                      });
            </script>
          </div>
          <!-- banner -->

          <!-- building img -->
          <div class="building">
            <img src="./img/building.jpeg" style="width:100%">
          </div>
          <!-- building img -->

          <!-- event -->
          <div class="event">
            <div class="inner mt_90">
              <div class="title">
                <h2>
                   <span class="">이벤트</span>
                </h2>
              </div>
            </div>
            <div class="eventimg">
              <ul>
                <li class="eventcont1">
                  <div class="leftArea">
                    <a href="#" class="imgLink">
                      <img src="./img/event/event1.jpg" alt="">
                    </a>
                  </div>
                </li>
                <li class="eventcont2">
                  <div class="leftArea">
                    <a href="#" class="imgLink">
                      <img src="./img/event/event2.jpg" alt="">
                    </a>
                  </div>
                </li>
                <li class="eventcont1">
                  <div class="leftArea">
                    <a href="#" class="imgLink">
                      <img src="./img/event/event3.jpg" alt="">
                    </a>
                  </div>
                </li>
                <li class="eventcont2">
                  <div class="leftArea">
                    <a href="#" class="imgLink">
                      <img src="./img/event/event4.jpg" alt="">
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- event -->

          <!-- new item -->
          <div class="newitem">
            <div class="inner mt_90">
              <div class="title mb_30">
                <h2>
                   <span >신상품</span>
                </h2>
              </div>
            </div>
            <div class="newitemimg">
              <ul>
              <?php
                for($i=0; $i<$count; $i++){
                  $re[$i] = mysqli_fetch_row($result);
                  echo "<li class='newitemcont'>";
                  echo "<div class='product'>";
                  echo "<a href='./product_detail.php?pid=".$re[$i][4]."' class='productLink'>";
                  echo "<img src='".$re[$i][3]."'>";
                  echo "</a>";
                  echo "<p class='product_name'>".$re[$i][0]."</p>";
                  echo "<p class='product_sel'>".$re[$i][1]."원</p>";
                  echo "</div>";
                  echo "</li>";
                  
                }
              ?>
              </ul>
            </div>
          </div>
          <!-- new item -->
        
        </div>
        <!-- contents -->


        <div id="footer" >
          <div class="inner">
            <div class="xans-element- xans-layout xans-layout-footer">
              <ul>
                <li>
                  <h2>무민 온라인숍</h2>
                  <p class="mt_5">(주)제이콥에프앤비 <span>대표자 : 김종석</span></p>
                  <p>사업자 등록번호 : 560-87-00390</p>
                  <p>법인등록번호 : 110111-4089606</p>
                  <p>통신판매업 신고 2021-안덕-0003호</p>
                  
                  <p class="mt_20">대표번호 : 064-794-0420</p>
                  <p>팩스번호 : 064-794-0423</p>
                  <p>주소 : 제주특별자치도 서귀포시 안덕면 병악로 420</p>
                </li>
              </ul>
          </div>
        </div>  
    </body>
</html>


