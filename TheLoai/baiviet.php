<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("location: baiviet_login.php");
    }
    echo "Hello!!!" . $_SESSION["username"];
    echo "<a href= 'logout.php'>Dang xuat </a> ";
    echo "Da dang nhap";
?>