
<?php
    include("./db_con.php"); 

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
    
    mysqli_close($conn);
    ?>