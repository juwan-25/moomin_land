<?php
    setcookie('userId','',time()-1);
    setcookie('userPass','',time()-1);
    echo "<script>location.href='index.php'</script>";
?>