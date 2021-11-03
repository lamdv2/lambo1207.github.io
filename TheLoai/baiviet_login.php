<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .loginrow{
            padding: 10px;
            display: flex;
        }

    </style>
</head>
<body>

    <?php
        if(isset($_POST["btnLogin"])){
            $username = $_POST["username"];
            $pass = $_POST["password"];

            if($username == "admin" && $pass == "123456"){
                $_SESSION["username"] = "admin";
                header("location: baiviet.php");
            }
        }
    ?>

    <div class="container">
        <form method="post"> 
        <div class="loginrow">
                    <p>Tên đăng nhập</p>
                    <input type="text" name="username" required placeholder="VD: Dream Team">
                </div>
                <div class="loginrow">
                    <p>Mật khẩu</p>
                    <input type="password" name="password" required placeholder="Nhập mật khẩu">
                </div>
                <div class="loginrow">
                    <input type="submit" name="submit" value="Đăng nhập" class="btnLogin">
                    <a href="#">Quên mật khẩu</a>
                </div>
                <div class="loginrow">
                    <input type="reset" name="reset" value="cancel" class="btnCancel">
                </div>
        </form>
    </div>
</body>
</html>