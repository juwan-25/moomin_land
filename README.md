# moomin_land
### moomin land 쇼핑몰을 클론코딩한 웹 페이지
클론코딩이어서 특히 css와 부트스트랩 사용을 많이 하였습니다. <br>
mySQL을 활용해 정보를 저장하고 Apache서버를 통해 배포하였습니다. <br>
 😥 현재는 서버가 닫혀 로컬에서만 열 수 있습니다... <br><br>
 
![image](https://github.com/juwan-25/moomin_land/assets/83991017/3b6afcc7-8cbb-466b-ab01-4cd7838b4fa7)
![image](https://github.com/juwan-25/moomin_land/assets/83991017/269ca5cb-2d2f-4222-9491-e74181abc8cc)
![image](https://github.com/juwan-25/moomin_land/assets/83991017/c6ce7ce7-5106-4e89-85d1-4daa335ef13a)


<br>
실제 웹사이트의 일부 모습입니다. <br><br>

#### 기능 구현 코드 설명
<details>
<summary>로그인, 회원가입</summary>
 
``` php
$uId = $_POST['userId'];
$uPass = $_POST['userPass'];

include('./db_con.php');

$sql = "select * from user where uid='$uId'&&upass='$uPass';";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count==0){
    echo "<script>alert('아이디 혹은 비밀번호 오류!');
            history.go(-1);</script>";
} else {
    //쿠키설정
    setcookie('userId', $uId, time()+3600);
    setcookie('userPass', $uPass, time()+3600);

    echo "<script>alert('로그인 성공!')</script>";

    echo "<script>location.href='index.php'</script>";
}
```
mySQL DB에 저장된 회원정보와 비교하여 아이디와 비밀번호가 일치할 경우 로그인 되도록 구현하였습니다. <br>
로그인이 되면 아이디와 비밀번호 값을 쿠키로 설정해주어 1시간 동안 유지되도록 하였습니다. <br><br>
  
``` php
$uid = $_POST['userId'];
$upass = $_POST['userPass'];
$passck = $_POST['userPassck'];
$uname = $_POST['userName'];
$email = $_POST['userMail'];
$tel = $_POST['userTel'];
try{
    $sql = "insert into user(uid, upass, uname, utel, uemail) values ('$uid', '$upass', '$uname', '$tel', '$email');";
    mysqli_query($conn, $sql);

    setcookie('userId', $uId, time()+3600);
    setcookie('userPass', $uPass, time()+3600);
    echo "<script>
        alert('회원가입 성공');
        window.location.href = 'index.php';
    </script>";
}catch(Exception $e){
    if(strpos($e, "PRIMARY")) echo "<script>
    alert('존재하는 아이디입니다.');
    history.back();
    </script>";
}
```
mySQL DB에 저장된 회원정보와 비교하여 없는 아이디 값일 경우 회원가입이 가능하도록 하였습니다. <br>
새로운 회원정보는 insert문을 통해 DB에 저장하고 로그인이 되도록 아이디와 비밀번호 값을 쿠키로 설정해주었습니다. <br><br>
</details>

<details>
<summary>상품 정렬 및 검색, 상세 정보</summary>
 
``` php
for($i=0; $i<$count; $i++){
    $re[$i] = mysqli_fetch_row($result);

    echo "<li class='searchitemcont'>";
    echo "<div class='product'>";
    echo "<a href='./product_detail.php?pid=".$re[$i][4]."' class='productLink'>";
    echo "<img src='".$re[$i][3]."'>";
    echo "</a>";
    echo "<p class='product_name'>".$re[$i][0]."</p>";
    echo "<p class='product_sel'>".$re[$i][1]."원</p>";
    echo "</div>";
    echo "</li>";
}

```
mySQL DB에 저장된 상품 정보와 사용자가 요구한 조건이 일치하는지 비교 후 맞다면 그에 대한 정보가 나오도록 하였습니다. <br>
상품이 전체가 출력되어야 하는 경우 조건 걸지 않아 필요한 정보가 나오도록 하였습니다. <br><br>

``` php
<div id="wrap">
    <div class="container">
        <div class="section_left">
            <?php 
                echo "<img src='".$re[3]."'>";
            ?>

        </div>
        <div class="section_right">
        <?php
            echo "<p class='product_name'>".$re[0]."</p>";
            echo "<p class='product_sel'>".$re[1]."원</p>";
        ?>
            <div class="total">

                <P class="total_text">TOTAL : </p>
                <?php
                    echo "<P class='total_sel'>".$re[1]."원</p>";
                ?>
            </div>  
            <form method="post" action="./cart.php">
                <div class="product_btn">
                    <a href="./cart.php?pid=<?php $re[4] ?>"><button type="submit" class="btncart">ADD TO CART</button></a> 
                    <button type="submit" class="btnbuy">BUY NOW</button> 
                </div>  
            </form>
        </div>
    </div>
</div>
```
상품이 클릭되면 id 값을 함께 넘겨 일치하는 상품을 DB에서 찾아 정보가 출력되도록 하였습니다. <br>
</details>
