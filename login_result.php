<?php
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
?>