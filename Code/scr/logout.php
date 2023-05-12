<?php
    setcookie("userName","", time()-7200);
    setcookie("uID","", time()-7200);
    header('location: home.php');
?>