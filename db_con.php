<?php
    $conn = mysqli_connect('localhost', 'whanshop22', 'qM8RNGnbORz3Sk1l', 'whanshop22', '3307');
    if($conn){
        echo "<script>console.log('DB connect success');</script>";
    }
    else{
        echo "<script>console.log('DB connect fail');</script>";
    }
?>
